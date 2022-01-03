<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Abstract\TelegramMethod;

/**
 * Use this method to get information about a member of a chat. Returns a [ChatMember](https://core.telegram.org/bots/api#chatmember) object on success.
 *
 * @property string $chat_id __Required: Yes__. Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
 * @property integer $user_id __Required: Yes__. Unique identifier of the target user
 */
class GetChatMemberMethod extends TelegramMethod
{
	protected string $method = 'getChatMember';
	protected string $expect = 'ChatMember';
	protected array $parameters = ['chat_id' => 'string', 'user_id' => 'integer'];
}
