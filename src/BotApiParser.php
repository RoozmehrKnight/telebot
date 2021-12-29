<?php

namespace WeStacks\TeleBot;

use DOMDocument;
use DOMElement;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use Nette\PhpGenerator\PsrPrinter;
use Soundasleep\Html2Text;

final class BotApiParser
{
    private array $methods = [];
    private array $objects = [];

    private DOMDocument $doc;

    public function __construct()
    {
        $this->doc = new DOMDocument();
        $this->doc->loadHTMLFile("https://core.telegram.org/bots/api");
        $this->load();
    }

    private function load()
    {
        /** @var DOMElement */
        $body = $this->doc->getElementsByTagName('body')[0];
        $headers = $body->getElementsByTagName('h4');

        /** @var DOMElement */
        foreach ($headers as $h4) {

            if ($this->isObject($h4)) {
                $this->addObject($h4);
            }

            else if ($this->isMethod($h4)) {
                $this->addMethod($h4);
            }
        }
    }

    private function isObject(DOMElement $h4)
    {
        return preg_match("/^[A-Z][a-zA-Z]*$/mx", $h4->textContent);
    }

    private function addObject(DOMElement $h4)
    {
        $description = [];
        $attributes = [];
        $element = $h4;

        while (($element = $element?->nextElementSibling) && in_array($element->tagName, ['p', 'ul', 'ol', 'blockquote'])) {
            $description[] = $this->parseHTML($element->ownerDocument->saveHTML($element));
        }

        $description = implode(PHP_EOL.PHP_EOL, $description);

        if ($element->tagName == 'table') {
            $attributes = $this->getTableData($element);
        }

        $this->objects[$h4->textContent] = compact('description', 'attributes');
    }

    public function generate()
    {
        $this->generateObjects();
        $this->generateMethods();
    }

    private function isMethod(DOMElement $h4)
    {
        return preg_match("/^[a-z][a-zA-Z]*$/mx", $h4->textContent);
    }

    private function addMethod(DOMElement $h4)
    {
        $description = [];
        $parameters = [];
        $element = $h4;

        while (($element = $element?->nextElementSibling) && in_array($element?->tagName, ['p', 'ul', 'ol', 'blockquote'])) {
            $description[] = $this->parseHTML($element->ownerDocument->saveHTML($element));
        }

        $description = implode(PHP_EOL.PHP_EOL, $description);

        $name = ucfirst($h4->textContent).'Method';


        if ($element->tagName == 'table') {
            $parameters = $this->getTableData($element);
        }

        $this->methods[$h4->textContent] = compact('name', 'description', 'parameters');
    }

    private function parseHTML(string $html)
    {
        return Html2Text::convert($html, [
            'ignore_errors' => true
        ]);
    }

    private function getTableData(DOMElement $table)
    {
        /** @var DOMElement */
        foreach ($table->getElementsByTagName('tbody')[0]->getElementsByTagName('tr') as $node) {
            $data[] = array_map(function ($node) {
                    $md = $this->parseHTML($node->ownerDocument->saveHTML($node));

                    if (preg_match("/(Array of )?\[([A-Z][a-zA-Z]*)\]\(#[a-z]*\)/m", $md, $matches)) {
                        $md = $matches[1] == 'Array of ' ?
                            ["WeStacks\\TeleBot\\Objects\\{$matches[2]}"] :
                            "WeStacks\\TeleBot\\Objects\\{$matches[2]}";
                    }

                    return $md;
                }, iterator_to_array($node->getElementsByTagName('td')));
        }
        return $data;
    }

    private function generateMethods()
    {
        foreach ($this->methods as $name => $options) {
            $namespace = new PhpNamespace('App\\Methods');
            $namespace->addUse(\WeStacks\TeleBot\Interfaces\TelegramMethod::class);

            $class = new ClassType($options['name']);
            $class->setExtends(\WeStacks\TeleBot\Interfaces\TelegramMethod::class);

            $class->addProperty('method', $name)
                ->setType('string')
                ->setProtected();

            $class->addProperty('expect', 'boolean')
                ->setType('string')
                ->setProtected();

            $class->addProperty('parameters', $this->createParams($options['parameters']))
                ->setType('array')
                ->setProtected();

            $namespace->add($class);

            echo __DIR__."/New/Methods/".$options['name'].".php".PHP_EOL;

            file_put_contents(
                __DIR__."/New/Methods/".$options['name'].".php",
                "<?php\n\n" . $namespace
            );
        }
    }

    private function generateObjects()
    {
        $printer = new PsrPrinter;

        foreach ($this->objects as $name => $options) {
            $namespace = new PhpNamespace('App\\Objects');
            $namespace->addUse(\WeStacks\TeleBot\Interfaces\TelegramObject::class);

            $class = new ClassType($name);
            $class->setExtends(\WeStacks\TeleBot\Interfaces\TelegramObject::class)
                ->addComment($options['description']."\n");

            foreach ($options['attributes'] as $option) {
                $class->addComment("@property {$option[1]} \${$option[0]} {$option[2]}");
                if (is_array($option[1])) $option[1] = $option[1][0];
                if (class_exists($option[1]) && $option[1] != 'WeStacks\\TeleBot\\Objects\\'.$name) {
                    $namespace->addUse($option[1]);
                }
            }

            $class->addProperty('attributes', $this->createParams($options['attributes']))
                ->setType('array')
                ->setProtected();

            $namespace->add($class);

            echo __DIR__."/New/Objects/".$name.".php".PHP_EOL;

            file_put_contents(
                __DIR__."/New/Objects/".$name.".php",
                "<?php\n\n" . $this->resetClassNames($printer->printNamespace($namespace))
            );
        }
    }

    private function createParams(array $params)
    {
        $res = [];
        foreach ($params as $param) {
            $res[$param[0]] = $param[1];
        }
        return $res;
    }

    private function resetClassNames($phpNamespace)
    {
        while (preg_match('/\'WeStacks\\\\TeleBot\\\\Objects\\\\([a-zA-Z0-9]*)\'/m', (string) $phpNamespace, $matches)) {
            $phpNamespace = preg_replace('/\'WeStacks\\\\TeleBot\\\\Objects\\\\([a-zA-Z0-9]*)\'/m', $matches[1].'::class', (string) $phpNamespace, 1);
        }

        return $phpNamespace;
    }
}