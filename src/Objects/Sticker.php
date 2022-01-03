<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Abstract\TelegramObject;

/**
 * This object represents a sticker.
 *
 * @property string $file_id Identifier for this file, which can be used to download or reuse the file
 * @property string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property integer $width Sticker width
 * @property integer $height Sticker height
 * @property boolean $is_animated True, if the sticker is animated
 * @property PhotoSize $thumb Optional. Sticker thumbnail in the .WEBP or .JPG format
 * @property string $emoji Optional. Emoji associated with the sticker
 * @property string $set_name Optional. Name of the sticker set to which the sticker belongs
 * @property MaskPosition $mask_position Optional. For mask stickers, the position where the mask should be placed
 * @property integer $file_size Optional. File size in bytes
 */
class Sticker extends TelegramObject
{
	protected array $attributes = [
		'file_id' => 'string',
		'file_unique_id' => 'string',
		'width' => 'integer',
		'height' => 'integer',
		'is_animated' => 'boolean',
		'thumb' => 'PhotoSize',
		'emoji' => 'string',
		'set_name' => 'string',
		'mask_position' => 'MaskPosition',
		'file_size' => 'integer',
	];
}
