<?php

namespace WeStacks\TeleBot\Tests\Unit;

use PHPUnit\Framework\TestCase;
use WeStacks\TeleBot\Exception\TeleBotObjectException;
use WeStacks\TeleBot\Objects\Passport\PassportElementError;
use WeStacks\TeleBot\Objects\Passport\PassportElementErrorDataField;
use WeStacks\TeleBot\Objects\Passport\PassportElementErrorFile;
use WeStacks\TeleBot\Objects\Passport\PassportElementErrorFiles;
use WeStacks\TeleBot\Objects\Passport\PassportElementErrorFrontSide;
use WeStacks\TeleBot\Objects\Passport\PassportElementErrorReverseSide;
use WeStacks\TeleBot\Objects\Passport\PassportElementErrorSelfie;
use WeStacks\TeleBot\Objects\Passport\PassportElementErrorTranslationFile;
use WeStacks\TeleBot\Objects\Passport\PassportElementErrorTranslationFiles;
use WeStacks\TeleBot\Objects\Passport\PassportElementErrorUnspecified;

class PassportElementErrorTest extends TestCase
{
    public function testPassportElementError()
    {
        $object = PassportElementError::create(['source' => 'data']);
        $this->assertInstanceOf(PassportElementErrorDataField::class, $object);

        $object = PassportElementError::create(['source' => 'front_side']);
        $this->assertInstanceOf(PassportElementErrorFrontSide::class, $object);

        $object = PassportElementError::create(['source' => 'reverse_side']);
        $this->assertInstanceOf(PassportElementErrorReverseSide::class, $object);

        $object = PassportElementError::create(['source' => 'selfie']);
        $this->assertInstanceOf(PassportElementErrorSelfie::class, $object);

        $object = PassportElementError::create(['source' => 'file']);
        $this->assertInstanceOf(PassportElementErrorFile::class, $object);

        $object = PassportElementError::create(['source' => 'files']);
        $this->assertInstanceOf(PassportElementErrorFiles::class, $object);

        $object = PassportElementError::create(['source' => 'translation_file']);
        $this->assertInstanceOf(PassportElementErrorTranslationFile::class, $object);

        $object = PassportElementError::create(['source' => 'translation_files']);
        $this->assertInstanceOf(PassportElementErrorTranslationFiles::class, $object);

        $object = PassportElementError::create(['source' => 'unspecified']);
        $this->assertInstanceOf(PassportElementErrorUnspecified::class, $object);
    }

    public function testWrongPassportElementError()
    {
        $this->expectException(TeleBotObjectException::class);
        PassportElementError::create(['source' => 'some_wrong_type']);
    }
}
