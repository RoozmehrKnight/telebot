<?php

namespace WeStacks\TeleBot\Abstract;

use ArrayIterator;
use IteratorAggregate;
use Traversable;
use WeStacks\TeleBot\Exception\TeleBotObjectException;
use WeStacks\TeleBot\Helpers\TypeCaster;

/**
 * Basic Telegram object class. All Telegram api objects should extend this class.
 */
abstract class TelegramObject implements IteratorAggregate
{
    /**
     * Array of object properties.
     */
    protected array $properties = [];

    /**
     * Array representation of given object attributes, where `$key` - is property name and `$value` - property type.
     */
    protected array $attributes = [];

    /**
     * Create new Telegram object instance.
     *
     * @throws TeleBotObjectException
     */
    public function __construct(array|object $object)
    {
        $this->properties = TypeCaster::castValues($object, $this->attributes);
    }

    public function __get($key)
    {
        return $this->properties[$key] ?? NULL;
    }

    public function __set($key, $value)
    {
        throw TeleBotObjectException::inaccessibleVariable($key, self::class);
    }

    public function __isset($key)
    {
        return isset($this->properties[$key]);
    }

    public function __unset($key)
    {
        throw TeleBotObjectException::inaccessibleUnsetVariable($key, self::class);
    }

    public function __toString()
    {
        return json_encode($this->toArray());
    }

    public function __debugInfo()
    {
        return $this->properties;
    }

    /**
     * Create new Telegram object instance.
     *
     * @throws TeleBotObjectException
     * @return static
     */
    public static function create(array|object $object)
    {
        return new static($object);
    }

    /**
     * Get associative array representation of this object.
     *
     * @return array
     */
    public function toArray()
    {
        return TypeCaster::stripArrays($this->properties);
    }

    /**
     * Get json representation of this object.
     *
     * @return string
     */
    public function toJson()
    {
        return (string) $this;
    }

    /**
     * Seek through object properties using dot notation
     * Example: ```get('message.from.id')```.
     *
     * @param string $property  String in dot notation format
     * @param mixed  $default  The default return value if given key is not exists
     *
     * @throws WeStacks\TeleBot\Exception\TeleBotObjectException
     *
     * @return mixed
     */
    public function get(string $property, $default = null)
    {
        $data = $this->properties;

        if (!preg_match("/\.[^.]/", $property) || preg_match("/\s+/", $property)) {
            throw TeleBotObjectException::invalidDotNotation($property);
        }

        foreach (explode('.', $property) as $key) {
            $data = is_array($data) ? ($data[$key] ?? null) : $data?->{$key} ?? $default;
        }

        return $data;
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->properties);
    }
}
