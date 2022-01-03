<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Abstract\TelegramObject;

/**
 * Represents a [chat member](https://core.telegram.org/bots/api#chatmember) that has no additional privileges or restrictions.
 *
 * @property string $status The member's status in the chat, always “member”
 * @property User $user Information about the user
 */
class ChatMemberMember extends ChatMember
{
	protected array $attributes = ['status' => 'string', 'user' => 'User'];
}
