<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Abstract\TelegramObject;

/**
 * This object represents changes in the status of a chat member.
 *
 * @property Chat $chat Chat the user belongs to
 * @property User $from Performer of the action, which resulted in the change
 * @property integer $date Date the change was done in Unix time
 * @property ChatMemberOwner|ChatMemberAdministrator|ChatMemberMember|ChatMemberRestricted|ChatMemberLeft|ChatMemberBanned $old_chat_member Previous information about the chat member
 * @property ChatMemberOwner|ChatMemberAdministrator|ChatMemberMember|ChatMemberRestricted|ChatMemberLeft|ChatMemberBanned $new_chat_member New information about the chat member
 * @property ChatInviteLink $invite_link Optional. Chat invite link, which was used by the user to join the chat; for joining by invite link events only.
 */
class ChatMemberUpdated extends TelegramObject
{
	protected array $attributes = [
		'chat' => 'Chat',
		'from' => 'User',
		'date' => 'integer',
		'old_chat_member' => 'ChatMember',
		'new_chat_member' => 'ChatMember',
		'invite_link' => 'ChatInviteLink',
	];
}
