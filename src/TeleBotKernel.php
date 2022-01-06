<?php

namespace WeStacks\TeleBot;

use WeStacks\TeleBot\Abstract\UpdateHandler;
use WeStacks\TeleBot\Exception\TeleBotMehtodException;
use WeStacks\TeleBot\Handlers\CommandHandler;
use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\Objects\BotCommandScope;

class TeleBotKernel
{
    /**
     * Array of update handlers.
     * @var string[]|callable[]
     */
    protected $handlers = [];

    public function __construct(array $handlers)
    {
        $this->add($handlers);
    }

    /**
     * Runs a middleware pipeline of update handlers for given telegram `$update` using `$bot`
     * @return mixed
     */
    public function run(TeleBot $bot, Update $update)
    {
        $last = count($this->handlers) - 1;
        $runner = function (int $index) use ($bot, $update, $last, &$runner) {
            if ($index > $last) return function () { return true; };
            $handler = $this->handlers[$index];

            $handler = is_subclass_of($handler, UpdateHandler::class) ?
                (new $handler($bot, $update)) :
                function ($next) use ($handler, $bot, $update) {
                    return $handler($bot, $update, $next);
                };

            return $handler($runner($index + 1));
        };

        return $runner(0);
    }

    /**
     * Add new update handler(s).
     * @param array|Closure|string $handler string that represents `UpdateHandler` subclass resolution or closure function. You also may give an array to add multiple handlers.
     * @throws TeleBotMehtodException
     */
    public function add($handler)
    {
        if (is_array($handler)) {
            foreach ($handler as $sub) {
                $this->add($sub);
            }
            return;
        }

        if (is_subclass_of($handler, UpdateHandler::class) || is_callable($handler)) {
            $this->handlers[] = $handler;
            return;
        }

        throw TeleBotMehtodException::wrongHandlerType(is_string($handler) ? $handler : gettype($handler));
    }

    public function call($handler, TeleBot $bot, Update $update, bool $force = false)
    {
        if (is_array($handler)) {
            foreach ($handler as $sub) {
                $this->call($sub, $bot, $update, $force);
            }
            return;
        }

        if (is_subclass_of($handler, UpdateHandler::class)) {
            if (is_string($handler)) $handler = new $handler($bot, $update);
            return $force ? $handler->handle() : $handler(function() { return true; });
        }

        if (is_callable($handler)) {
            return $handler($bot, $update, function() { return true; });
        }

        throw TeleBotMehtodException::wrongHandlerType(is_string($handler) ? $handler : gettype($handler));
    }

    /**
     * Remove all update handlers.
     */
    public function clear()
    {
        $this->handlers = [];
    }

    public function commands()
    {
        $commands = array_filter($this->handlers, function($handler) {
            return is_subclass_of($handler, CommandHandler::class);
        });

        return array_merge(...array_map(function ($command) {
            return $command::getBotCommand();
        }, $commands));
    }

    public function commandGroups()
    {
        $commands = array_filter($this->handlers, function($handler) {
            return is_subclass_of($handler, CommandHandler::class);
        });

        $groups = [];

        foreach ($commands as $command) {
            /** @var BotCommandScope */
            foreach ($command::getCommandScopes() as $scope) {
                switch ($scope->type) {
                    case 'default':
                    case 'all_private_chats':
                    case 'all_group_chats':
                    case 'all_chat_administrators':
                        $groups[$scope->type] = array_merge(
                            $command::getBotCommand(), $groups[$scope->type] ?? []
                        );
                        break;

                    case 'chat':
                    case 'chat_administrators':
                        $groups[$scope->type][$scope->chat_id] = array_merge(
                            $command::getBotCommand(), $groups[$scope->type][$scope->chat_id] ?? []
                        );
                        break;

                    case 'chat_member':
                        $groups[$scope->type][$scope->chat_id][$scope->user_id] = array_merge(
                            $command::getBotCommand(),
                            $groups[$scope->type][$scope->chat_id][$scope->user_id] ?? []
                        );
                        break;
                }
            }
        }

        $commands = [];

        foreach ($groups as $scopeType => $group) {
            switch ($scopeType) {
                case 'default':
                case 'all_private_chats':
                case 'all_group_chats':
                case 'all_chat_administrators':
                    $commands[] = [
                        'scope' => [ 'type' => $scopeType ],
                        'commands' => $group
                    ];
                    break;
                case 'chat':
                case 'chat_administrators':
                    foreach ($group as $chatId => $_group) {
                        $commands[] = [
                            'scope' => ['type' => $scopeType, 'chat_id' => $chatId],
                            'commands' => $_group
                        ];
                    }
                    break;

                case 'chat_member':
                    foreach ($group as $chatId => $_group) {
                        foreach ($_group as $userId => $__group) {
                            $commands[] = [
                                'scope' => ['type' => $scopeType, 'chat_id' => $chatId, 'user_id' => $userId],
                                'commands' => $__group
                            ];
                        }
                    }
                    break;
            }
        }

        return $commands;
    }
}