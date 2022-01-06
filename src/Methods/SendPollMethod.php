<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Abstract\TelegramMethod;
use WeStacks\TeleBot\Objects\ForceReply;
use WeStacks\TeleBot\Objects\InlineKeyboardMarkup;
use WeStacks\TeleBot\Objects\MessageEntity;
use WeStacks\TeleBot\Objects\ReplyKeyboardMarkup;
use WeStacks\TeleBot\Objects\ReplyKeyboardRemove;

/**
 * Use this method to send a native poll. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
 *
 * @property string $chat_id __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property string $question __Required: Yes__. Poll question, 1-300 characters
 * @property string[] $options __Required: Yes__. A JSON-serialized list of answer options, 2-10 strings 1-100 characters each
 * @property boolean $is_anonymous __Required: Optional__. True, if the poll needs to be anonymous, defaults to True
 * @property string $type __Required: Optional__. Poll type, “quiz” or “regular”, defaults to “regular”
 * @property boolean $allows_multiple_answers __Required: Optional__. True, if the poll allows multiple answers, ignored for polls in quiz mode, defaults to False
 * @property integer $correct_option_id __Required: Optional__. 0-based identifier of the correct answer option, required for polls in quiz mode
 * @property string $explanation __Required: Optional__. Text that is shown when a user chooses an incorrect answer or taps on the lamp icon in a quiz-style poll, 0-200 characters with at most 2 line feeds after entities parsing
 * @property string $explanation_parse_mode __Required: Optional__. Mode for parsing entities in the explanation. See formatting options for more details.
 * @property MessageEntity[] $explanation_entities __Required: Optional__. A JSON-serialized list of special entities that appear in the poll explanation, which can be specified instead of parse_mode
 * @property integer $open_period __Required: Optional__. Amount of time in seconds the poll will be active after creation, 5-600. Can't be used together with close_date.
 * @property integer $close_date __Required: Optional__. Point in time (Unix timestamp) when the poll will be automatically closed. Must be at least 5 and no more than 600 seconds in the future. Can't be used together with open_period.
 * @property boolean $is_closed __Required: Optional__. Pass True, if the poll needs to be immediately closed. This can be useful for poll preview.
 * @property boolean $disable_notification __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * @property boolean $protect_content __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * @property integer $reply_to_message_id __Required: Optional__. If the message is a reply, ID of the original message
 * @property boolean $allow_sending_without_reply __Required: Optional__. Pass True, if the message should be sent even if the specified replied-to message is not found
 * @property Keyboard $reply_markup __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
 */
class SendPollMethod extends TelegramMethod
{
	protected string $method = 'sendPoll';
	protected string $expect = 'Message';

	protected array $parameters = [
		'chat_id' => 'string',
		'question' => 'string',
		'options' => 'string[]',
		'is_anonymous' => 'boolean',
		'type' => 'string',
		'allows_multiple_answers' => 'boolean',
		'correct_option_id' => 'integer',
		'explanation' => 'string',
		'explanation_parse_mode' => 'string',
		'explanation_entities' => 'MessageEntity[]',
		'open_period' => 'integer',
		'close_date' => 'integer',
		'is_closed' => 'boolean',
		'disable_notification' => 'boolean',
		'protect_content' => 'boolean',
		'reply_to_message_id' => 'integer',
		'allow_sending_without_reply' => 'boolean',
		'reply_markup' => 'Keyboard',
	];
}
