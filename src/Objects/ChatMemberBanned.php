<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Abstract\TelegramObject;

/**
 * Represents a [chat member](https://core.telegram.org/bots/api#chatmember) that was banned in the chat and can't return to the chat or view chat messages.
 *
 * @property string $status The member's status in the chat, always “kicked”
 * @property User $user Information about the user
 * @property integer $until_date Date when restrictions will be lifted for this user; unix time. If 0, then the user is banned forever
 */
class ChatMemberBanned extends ChatMember
{
	protected array $attributes = ['status' => 'string', 'user' => 'User', 'until_date' => 'integer'];
}
