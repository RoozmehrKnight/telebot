<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Abstract\TelegramObject;

/**
 * This object represents a service message about new members invited to a voice chat.
 *
 * @property User[] $users Optional. New members that were invited to the voice chat
 */
class VoiceChatParticipantsInvited extends TelegramObject
{
	protected array $attributes = ['users' => 'User[]'];
}
