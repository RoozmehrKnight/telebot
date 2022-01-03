<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Abstract\TelegramMethod;

/**
 * Use this method to move a sticker in a set created by the bot to a specific position. Returns True on success.
 *
 * @property string $sticker __Required: Yes__. File identifier of the sticker
 * @property integer $position __Required: Yes__. New sticker position in the set, zero-based
 */
class SetStickerPositionInSetMethod extends TelegramMethod
{
	protected string $method = 'setStickerPositionInSet';
	protected string $expect = 'boolean';
	protected array $parameters = ['sticker' => 'string', 'position' => 'integer'];
}
