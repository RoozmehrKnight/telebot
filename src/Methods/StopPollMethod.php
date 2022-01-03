<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Abstract\TelegramMethod;
use WeStacks\TeleBot\Objects\InlineKeyboardMarkup;

/**
 * Use this method to stop a poll which was sent by the bot. On success, the stopped [Poll](https://core.telegram.org/bots/api#poll) is returned.
 *
 * @property string $chat_id __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property integer $message_id __Required: Yes__. Identifier of the original message with the poll
 * @property InlineKeyboardMarkup $reply_markup __Required: Optional__. A JSON-serialized object for a new message inline keyboard.
 */
class StopPollMethod extends TelegramMethod
{
	protected string $method = 'stopPoll';
	protected string $expect = 'Poll';

	protected array $parameters = [
		'chat_id' => 'string',
		'message_id' => 'integer',
		'reply_markup' => 'InlineKeyboardMarkup',
	];
}
