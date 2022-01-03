<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Abstract\TelegramMethod;
use WeStacks\TeleBot\Objects\ForceReply;
use WeStacks\TeleBot\Objects\InlineKeyboardMarkup;
use WeStacks\TeleBot\Objects\ReplyKeyboardMarkup;
use WeStacks\TeleBot\Objects\ReplyKeyboardRemove;

/**
 * Use this method to send phone contacts. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
 *
 * @property string $chat_id __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property string $phone_number __Required: Yes__. Contact's phone number
 * @property string $first_name __Required: Yes__. Contact's first name
 * @property string $last_name __Required: Optional__. Contact's last name
 * @property string $vcard __Required: Optional__. Additional data about the contact in the form of a vCard, 0-2048 bytes
 * @property boolean $disable_notification __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * @property boolean $protect_content __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * @property integer $reply_to_message_id __Required: Optional__. If the message is a reply, ID of the original message
 * @property boolean $allow_sending_without_reply __Required: Optional__. Pass True, if the message should be sent even if the specified replied-to message is not found
 * @property InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove keyboard or to force a reply from the user.
 */
class SendContactMethod extends TelegramMethod
{
	protected string $method = 'sendContact';
	protected string $expect = 'Message';

	protected array $parameters = [
		'chat_id' => 'string',
		'phone_number' => 'string',
		'first_name' => 'string',
		'last_name' => 'string',
		'vcard' => 'string',
		'disable_notification' => 'boolean',
		'protect_content' => 'boolean',
		'reply_to_message_id' => 'integer',
		'allow_sending_without_reply' => 'boolean',
		'reply_markup' => 'InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply',
	];
}
