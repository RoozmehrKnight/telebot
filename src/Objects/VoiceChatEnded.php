<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Abstract\TelegramObject;

/**
 * This object represents a service message about a voice chat ended in the chat.
 *
 * @property integer $duration Voice chat duration in seconds
 */
class VoiceChatEnded extends TelegramObject
{
	protected array $attributes = ['duration' => 'integer'];
}
