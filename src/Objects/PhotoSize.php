<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Abstract\TelegramObject;

/**
 * This object represents one size of a photo or a [file](https://core.telegram.org/bots/api#document) / [sticker](https://core.telegram.org/bots/api#sticker) thumbnail.
 *
 * @property string $file_id Identifier for this file, which can be used to download or reuse the file
 * @property string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property integer $width Photo width
 * @property integer $height Photo height
 * @property integer $file_size Optional. File size in bytes
 */
class PhotoSize extends TelegramObject
{
	protected array $attributes = [
		'file_id' => 'string',
		'file_unique_id' => 'string',
		'width' => 'integer',
		'height' => 'integer',
		'file_size' => 'integer',
	];
}
