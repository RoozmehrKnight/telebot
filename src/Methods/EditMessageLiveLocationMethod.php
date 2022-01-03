<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Abstract\TelegramMethod;
use WeStacks\TeleBot\Objects\InlineKeyboardMarkup;

/**
 * Use this method to edit live location messages. A location can be edited until its live_period expires or editing is explicitly disabled by a call to [stopMessageLiveLocation](https://core.telegram.org/bots/api#stopmessagelivelocation). On success, if the edited message is not an inline message, the edited [Message](https://core.telegram.org/bots/api#message) is returned, otherwise True is returned.
 *
 * @property string $chat_id __Required: Optional__. Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property integer $message_id __Required: Optional__. Required if inline_message_id is not specified. Identifier of the message to edit
 * @property string $inline_message_id __Required: Optional__. Required if chat_id and message_id are not specified. Identifier of the inline message
 * @property double number $latitude __Required: Yes__. Latitude of new location
 * @property double number $longitude __Required: Yes__. Longitude of new location
 * @property double number $horizontal_accuracy __Required: Optional__. The radius of uncertainty for the location, measured in meters; 0-1500
 * @property integer $heading __Required: Optional__. Direction in which the user is moving, in degrees. Must be between 1 and 360 if specified.
 * @property integer $proximity_alert_radius __Required: Optional__. Maximum distance for proximity alerts about approaching another chat member, in meters. Must be between 1 and 100000 if specified.
 * @property InlineKeyboardMarkup $reply_markup __Required: Optional__. A JSON-serialized object for a new inline keyboard.
 */
class EditMessageLiveLocationMethod extends TelegramMethod
{
	protected string $method = 'editMessageLiveLocation';
	protected string $expect = 'Message|boolean';

	protected array $parameters = [
		'chat_id' => 'string',
		'message_id' => 'integer',
		'inline_message_id' => 'string',
		'latitude' => 'double number',
		'longitude' => 'double number',
		'horizontal_accuracy' => 'double number',
		'heading' => 'integer',
		'proximity_alert_radius' => 'integer',
		'reply_markup' => 'InlineKeyboardMarkup',
	];
}
