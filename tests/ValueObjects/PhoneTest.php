<?php

use MioCode\Utils\ValueObjects\Phone;
use PHPUnit\Framework\TestCase;

class PhoneTest extends TestCase
{
    public function testValidPhoneNumber()
    {
        $phone = new Phone('+7 (123) 456-7890');
        $this->assertEquals('71234567890', $phone->get());
    }

    public function testValidPhoneNumberWithStaticMethod()
    {
        $phone = Phone::make('+7 123 456-7890');
        $this->assertEquals('71234567890', $phone->get());
    }

    public function testEmptyPhoneThrowsException()
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Phone is required');

        new Phone('');
    }

    public function testInvalidPhoneThrowsException()
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Phone must be 10 digits phone number');

        new Phone('81234567890');  // Начинается не с '7'
    }

    public function testPhoneToString()
    {
        $phone = new Phone('+7 (123) 456-7890');
        $this->assertEquals('71234567890', (string) $phone);
    }

    public function testPhoneNumberTooShortThrowsException()
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Phone must be 10 digits phone number');

        new Phone('+7 (123) 456');
    }

    public function testPhoneNumberTooLongThrowsException()
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Phone must be 10 digits phone number');

        new Phone('+7 (123) 456-789012');
    }
}
