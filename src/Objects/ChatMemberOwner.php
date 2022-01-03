<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Abstract\TelegramObject;

/**
 * Represents a [chat member](https://core.telegram.org/bots/api#chatmember) that owns the chat and has all administrator privileges.
 *
 * @property string $status The member's status in the chat, always “creator”
 * @property User $user Information about the user
 * @property boolean $is_anonymous True, if the user's presence in the chat is hidden
 * @property string $custom_title Optional. Custom title for this user
 */
class ChatMemberOwner extends ChatMember
{
	protected array $attributes = [
		'status' => 'string',
		'user' => 'User',
		'is_anonymous' => 'boolean',
		'custom_title' => 'string',
	];
}
