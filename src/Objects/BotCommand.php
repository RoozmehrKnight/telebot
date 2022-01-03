<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Abstract\TelegramObject;

/**
 * This object represents a bot command.
 *
 * @property string $command Text of the command; 1-32 characters. Can contain only lowercase English letters, digits and underscores.
 * @property string $description Description of the command; 1-256 characters.
 */
class BotCommand extends TelegramObject
{
	protected array $attributes = ['command' => 'string', 'description' => 'string'];
}
