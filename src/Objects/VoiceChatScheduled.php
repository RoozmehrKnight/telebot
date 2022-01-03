<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Abstract\TelegramObject;

/**
 * This object represents a service message about a voice chat scheduled in the chat.
 *
 * @property integer $start_date Point in time (Unix timestamp) when the voice chat is supposed to be started by a chat administrator
 */
class VoiceChatScheduled extends TelegramObject
{
	protected array $attributes = ['start_date' => 'integer'];
}
