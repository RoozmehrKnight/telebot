<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Abstract\TelegramObject;

/**
 * This object represents a sticker set.
 *
 * @property string $name Sticker set name
 * @property string $title Sticker set title
 * @property boolean $is_animated True, if the sticker set contains animated stickers
 * @property boolean $contains_masks True, if the sticker set contains masks
 * @property Sticker[] $stickers List of all set stickers
 * @property PhotoSize $thumb Optional. Sticker set thumbnail in the .WEBP or .TGS format
 */
class StickerSet extends TelegramObject
{
	protected array $attributes = [
		'name' => 'string',
		'title' => 'string',
		'is_animated' => 'boolean',
		'contains_masks' => 'boolean',
		'stickers' => 'Sticker[]',
		'thumb' => 'PhotoSize',
	];
}
