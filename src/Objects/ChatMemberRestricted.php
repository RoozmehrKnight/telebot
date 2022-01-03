<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Abstract\TelegramObject;

/**
 * Represents a [chat member](https://core.telegram.org/bots/api#chatmember) that is under certain restrictions in the chat. Supergroups only.
 *
 * @property string $status The member's status in the chat, always “restricted”
 * @property User $user Information about the user
 * @property boolean $is_member True, if the user is a member of the chat at the moment of the request
 * @property boolean $can_change_info True, if the user is allowed to change the chat title, photo and other settings
 * @property boolean $can_invite_users True, if the user is allowed to invite new users to the chat
 * @property boolean $can_pin_messages True, if the user is allowed to pin messages
 * @property boolean $can_send_messages True, if the user is allowed to send text messages, contacts, locations and venues
 * @property boolean $can_send_media_messages True, if the user is allowed to send audios, documents, photos, videos, video notes and voice notes
 * @property boolean $can_send_polls True, if the user is allowed to send polls
 * @property boolean $can_send_other_messages True, if the user is allowed to send animations, games, stickers and use inline bots
 * @property boolean $can_add_web_page_previews True, if the user is allowed to add web page previews to their messages
 * @property integer $until_date Date when restrictions will be lifted for this user; unix time. If 0, then the user is restricted forever
 */
class ChatMemberRestricted extends ChatMember
{
	protected array $attributes = [
		'status' => 'string',
		'user' => 'User',
		'is_member' => 'boolean',
		'can_change_info' => 'boolean',
		'can_invite_users' => 'boolean',
		'can_pin_messages' => 'boolean',
		'can_send_messages' => 'boolean',
		'can_send_media_messages' => 'boolean',
		'can_send_polls' => 'boolean',
		'can_send_other_messages' => 'boolean',
		'can_add_web_page_previews' => 'boolean',
		'until_date' => 'integer',
	];
}
