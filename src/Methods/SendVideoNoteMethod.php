<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Abstract\TelegramMethod;
use WeStacks\TeleBot\Objects\ForceReply;
use WeStacks\TeleBot\Objects\InlineKeyboardMarkup;
use WeStacks\TeleBot\Objects\InputFile;
use WeStacks\TeleBot\Objects\ReplyKeyboardMarkup;
use WeStacks\TeleBot\Objects\ReplyKeyboardRemove;

/**
 * As of [v.4.0](https://telegram.org/blog/video-messages-and-telescope), Telegram clients support rounded square mp4 videos of up to 1 minute long. Use this method to send video messages. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
 *
 * @property string $chat_id __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property InputFile $video_note __Required: Yes__. Video note to send. Pass a file_id as String to send a video note that exists on the Telegram servers (recommended) or upload a new video using multipart/form-data. More info on Sending Files ». Sending video notes by a URL is currently unsupported
 * @property integer $duration __Required: Optional__. Duration of sent video in seconds
 * @property integer $length __Required: Optional__. Video width and height, i.e. diameter of the video message
 * @property InputFile $thumb __Required: Optional__. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://” if the thumbnail was uploaded using multipart/form-data under . More info on Sending Files »
 * @property boolean $disable_notification __Required: Optional__. Sends the message silently. Users will receive a notification with no sound.
 * @property boolean $protect_content __Required: Optional__. Protects the contents of the sent message from forwarding and saving
 * @property integer $reply_to_message_id __Required: Optional__. If the message is a reply, ID of the original message
 * @property boolean $allow_sending_without_reply __Required: Optional__. Pass True, if the message should be sent even if the specified replied-to message is not found
 * @property InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup __Required: Optional__. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
 */
class SendVideoNoteMethod extends TelegramMethod
{
	protected string $method = 'sendVideoNote';
	protected string $expect = 'Message';

	protected array $parameters = [
		'chat_id' => 'string',
		'video_note' => 'InputFile',
		'duration' => 'integer',
		'length' => 'integer',
		'thumb' => 'InputFile',
		'disable_notification' => 'boolean',
		'protect_content' => 'boolean',
		'reply_to_message_id' => 'integer',
		'allow_sending_without_reply' => 'boolean',
		'reply_markup' => 'InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply',
	];
}
