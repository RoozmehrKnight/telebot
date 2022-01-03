<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Abstract\TelegramObject;

/**
 * This object represents a unique message identifier.
 *
 * @property integer $message_id Unique message identifier
 */
class MessageId extends TelegramObject
{
	protected array $attributes = ['message_id' => 'integer'];
}
