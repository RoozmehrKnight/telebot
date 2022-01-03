<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Abstract\TelegramMethod;

/**
 * Use this method to promote or demote a user in a supergroup or a channel. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Pass False for all boolean parameters to demote a user. Returns True on success.
 *
 * @property string $chat_id __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property integer $user_id __Required: Yes__. Unique identifier of the target user
 * @property boolean $is_anonymous __Required: Optional__. Pass True, if the administrator's presence in the chat is hidden
 * @property boolean $can_manage_chat __Required: Optional__. Pass True, if the administrator can access the chat event log, chat statistics, message statistics in channels, see channel members, see anonymous administrators in supergroups and ignore slow mode. Implied by any other administrator privilege
 * @property boolean $can_post_messages __Required: Optional__. Pass True, if the administrator can create channel posts, channels only
 * @property boolean $can_edit_messages __Required: Optional__. Pass True, if the administrator can edit messages of other users and can pin messages, channels only
 * @property boolean $can_delete_messages __Required: Optional__. Pass True, if the administrator can delete messages of other users
 * @property boolean $can_manage_voice_chats __Required: Optional__. Pass True, if the administrator can manage voice chats
 * @property boolean $can_restrict_members __Required: Optional__. Pass True, if the administrator can restrict, ban or unban chat members
 * @property boolean $can_promote_members __Required: Optional__. Pass True, if the administrator can add new administrators with a subset of their own privileges or demote administrators that he has promoted, directly or indirectly (promoted by administrators that were appointed by him)
 * @property boolean $can_change_info __Required: Optional__. Pass True, if the administrator can change chat title, photo and other settings
 * @property boolean $can_invite_users __Required: Optional__. Pass True, if the administrator can invite new users to the chat
 * @property boolean $can_pin_messages __Required: Optional__. Pass True, if the administrator can pin messages, supergroups only
 */
class PromoteChatMemberMethod extends TelegramMethod
{
	protected string $method = 'promoteChatMember';
	protected string $expect = 'boolean';

	protected array $parameters = [
		'chat_id' => 'string',
		'user_id' => 'integer',
		'is_anonymous' => 'boolean',
		'can_manage_chat' => 'boolean',
		'can_post_messages' => 'boolean',
		'can_edit_messages' => 'boolean',
		'can_delete_messages' => 'boolean',
		'can_manage_voice_chats' => 'boolean',
		'can_restrict_members' => 'boolean',
		'can_promote_members' => 'boolean',
		'can_change_info' => 'boolean',
		'can_invite_users' => 'boolean',
		'can_pin_messages' => 'boolean',
	];
}
