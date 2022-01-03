<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Abstract\TelegramMethod;
use WeStacks\TeleBot\Objects\InputFile;

/**
 * Use this method to upload a .PNG file with a sticker for later use in createNewStickerSet and addStickerToSet methods (can be used multiple times). Returns the uploaded [File](https://core.telegram.org/bots/api#file) on success.
 *
 * @property integer $user_id __Required: Yes__. User identifier of sticker file owner
 * @property InputFile $png_sticker __Required: Yes__. PNG image with the sticker, must be up to 512 kilobytes in size, dimensions must not exceed 512px, and either width or height must be exactly 512px. More info on Sending Files »
 */
class UploadStickerFileMethod extends TelegramMethod
{
	protected string $method = 'uploadStickerFile';
	protected string $expect = 'File';
	protected array $parameters = ['user_id' => 'integer', 'png_sticker' => 'InputFile'];
}
