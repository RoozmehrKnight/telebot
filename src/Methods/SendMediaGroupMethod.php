<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Abstract\TelegramMethod;
use WeStacks\TeleBot\Objects\InputMediaAudioInputMediaDocumentInputMediaPhotoandInputMediaVideo;

/**
 * Use this method to send a group of photos, videos, documents or audios as an album. Documents and audio files can be only grouped in an album with messages of the same type. On success, an array of [Messages](https://core.telegram.org/bots/api#message) that were sent is returned.
 *
 * @property string $chat_id __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property InputMedia[] $media __Required: Yes__. A JSON-serialized array describing messages to be sent, must include 2-10 items
 * @property boolean $disable_notification __Required: Optional__. Sends messages silently. Users will receive a notification with no sound.
 * @property boolean $protect_content __Required: Optional__. Protects the contents of the sent messages from forwarding and saving
 * @property integer $reply_to_message_id __Required: Optional__. If the messages are a reply, ID of the original message
 * @property boolean $allow_sending_without_reply __Required: Optional__. Pass True, if the message should be sent even if the specified replied-to message is not found
 */
class SendMediaGroupMethod extends TelegramMethod
{
	protected string $method = 'sendMediaGroup';
	protected string $expect = 'Message[]';

	protected array $parameters = [
		'chat_id' => 'string',
		'media' => 'InputMedia[]',
		'disable_notification' => 'boolean',
		'protect_content' => 'boolean',
		'reply_to_message_id' => 'integer',
		'allow_sending_without_reply' => 'boolean',
	];
}
