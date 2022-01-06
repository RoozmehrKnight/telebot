<?php

namespace WeStacks\TeleBot\Traits;

use Closure;
use WeStacks\TeleBot\Exception\TeleBotMehtodException;
use WeStacks\TeleBot\TeleBotKernel;
use WeStacks\TeleBot\Objects\BotCommand;
use WeStacks\TeleBot\Objects\Update;

trait HandlesUpdates
{
    /**
     * Kernel for handling updates.
     *
     * @var TeleBotKernel
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
        $this->kernel->add($handler);
    }

    /**
     * Remove all update handlers from bot instance.
     */
    public function clearHandlers()
    {
        $this->kernel->clear();
    }

    /**
     * Handle given update.
     *
     * @param Update $update - Telegram update object. Leave empty to try to get it from incoming POST request (for handling webhook)
     *
     * @return false|Update
     */
    public function handleUpdate(Update $update)
    {
        return $this->kernel->run($this, $update);
    }

    /**
     * Get local bot instance commands registered by commands handlers.
     *
     * @param string $scope Commands scope.
     *
     * @return BotCommand[]
     */
    public function getLocalCommands()
    {
        return $this->kernel->commandGroups();
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
        $this->kernel->call($handler, $this, $update, $force);
    }
}
