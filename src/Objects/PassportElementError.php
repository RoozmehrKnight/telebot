<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Abstract\TelegramObject;
use WeStacks\TeleBot\Exception\TeleBotObjectException;

/**
 * This object represents an error in the Telegram Passport element which was submitted that should be resolved by the user. It should be one of:
 *
 * - [PassportElementErrorDataField](https://core.telegram.org/bots/api#passportelementerrordatafield)
 * - [PassportElementErrorFrontSide](https://core.telegram.org/bots/api#passportelementerrorfrontside)
 * - [PassportElementErrorReverseSide](https://core.telegram.org/bots/api#passportelementerrorreverseside)
 * - [PassportElementErrorSelfie](https://core.telegram.org/bots/api#passportelementerrorselfie)
 * - [PassportElementErrorFile](https://core.telegram.org/bots/api#passportelementerrorfile)
 * - [PassportElementErrorFiles](https://core.telegram.org/bots/api#passportelementerrorfiles)
 * - [PassportElementErrorTranslationFile](https://core.telegram.org/bots/api#passportelementerrortranslationfile)
 * - [PassportElementErrorTranslationFiles](https://core.telegram.org/bots/api#passportelementerrortranslationfiles)
 * - [PassportElementErrorUnspecified](https://core.telegram.org/bots/api#passportelementerrorunspecified)
 */
abstract class PassportElementError extends TelegramObject
{
	protected static $types = [
		'data' => PassportElementErrorDataField::class,
		'front_side' => PassportElementErrorFrontSide::class,
		'reverse_side' => PassportElementErrorReverseSide::class,
		'selfie' => PassportElementErrorSelfie::class,
		'file' => PassportElementErrorFile::class,
		'files' => PassportElementErrorFiles::class,
		'translation_file' => PassportElementErrorTranslationFile::class,
		'translation_files' => PassportElementErrorTranslationFiles::class,
		'unspecified' => PassportElementErrorUnspecified::class,
	];

    public static function create($object)
    {
        $object = (array) $object;

        if ($class = static::$types[$object['source'] ?? null] ?? null) {
            return new $class($object);
        }

        throw TeleBotObjectException::uncastableType(static::class, gettype($object));
    }
}
