<?php

namespace WeStacks\TeleBot\Tests\Helpers;

use WeStacks\TeleBot\Abstract\UpdateHandler;
use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\TeleBot;

class TestUpdateHandler extends UpdateHandler
{
    public static function trigger(Update $update, TeleBot $bot)
    {
        return false;
    }

    public function handle()
    {
        echo 'TestUpdateHandler';
    }
}