<?php

namespace WeStacks\TeleBot\Traits;

use Closure;
use Exception;
use WeStacks\TeleBot\Exception\TeleBotMehtodException;
use WeStacks\TeleBot\HandlerKernel;
use WeStacks\TeleBot\Handlers\CommandHandler;
use WeStacks\TeleBot\Interfaces\UpdateHandler;
use WeStacks\TeleBot\Objects\BotCommand;
use WeStacks\TeleBot\Objects\Update;

trait HandlesUpdates
{
    /**
     * Kernel of
     * 
     * @var HandlerKernel
     */
    private $kernel;

    /**
     * Add new update handler(s) to the bot instance.
     *
     * @param array|Closure|string $handler string that represents `UpdateHandler` subclass resolution or closure function. You also may give an array to add multiple handlers.
     *
     * @throws TeleBotMehtodException
     */
    public function addHandler($handler)
    {
        $this->kernel->addHandler($handler);
    }

    /**
     * Remove all update handlers from bot instance.
     */
    public function clearHandlers()
    {
        $this->kernel = new (get_class($this->kernel));
    }

    /**
     * Handle given update.
     *
     * @param Update $update - Telegram update object. Leave empty to try to get it from incoming POST request (for handling webhook)
     *
     * @return void
     */
    public function handleUpdate(Update $update)
    {
        foreach ($this->kernel->handlers() as $handler) {
            $this->callHandler($handler, $update);
        }
    }

    /**
     * Run update handler.
     *
     * @param Closure|string $handler string that represents `UpdateHandler` subclass resolution or closure function. You also may give an array to add multiple handlers.
     * @param Update         $update  Telegram Update
     * @param bool           $force   run handler unconditionally
     *
     * @throws TeleBotMehtodException
     */
    public function callHandler($handler, Update $update, bool $force = false)
    {
        if (!$this->isUpdateHandler($handler)) {
            throw TeleBotMehtodException::wrongHandlerType(is_string($handler) ? $handler : gettype($handler));
        }

        if (is_callable($handler)) {
            $handler($update, $force);
        } elseif ($force || method_exists($handler, 'trigger') && $handler::trigger($update, $this)) {
            (new $handler($this, $update))->handle();
        }
    }

    /**
     * Get local bot instance commands registered by commands handlers.
     * 
     * @param string $scope Commands scope.
     *
     * @return BotCommand[]
     */
    public function getLocalCommands(string $scope = 'default')
    {
        return $this->kernel->getCommands($scope);
    }

    public function getLocalCommandsDatasets()
    {
        return $this->kernel->commandsDatasets();
    }

    /**
     * Get scope with registered commands.
     * 
     * @param string $scope Commands scope.
     *
     * @return BotCommand[]|BotCommand[][]|BotCommand[][][]
     */
    public function getScope(string $scope = 'default')
    {
        return $this->kernel->getScope($scope);
    }

    /**
     * Check if `$handler` is a valid update handler`.
     *
     * @param mixed $handler - update handler
     *
     * @return bool
     */
    private function isUpdateHandler($handler)
    {
        return is_callable($handler) ||
            is_string($handler) && class_exists($handler) && is_subclass_of($handler, UpdateHandler::class);
    }
}
