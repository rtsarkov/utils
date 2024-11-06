<?php

use PHPUnit\Framework\TestCase;
use MioCode\Utils\ValueObjects\Email;

class EmailTest extends TestCase
{
    public function testValidEmail()
    {
        $email = new Email('test@example.com');
        $this->assertEquals('test@example.com', $email->get());
    }

    public function testValidEmailWithStaticMethod()
    {
        $email = Email::make('user.name@example-domain.com');
        $this->assertEquals('user.name@example-domain.com', $email->get());
    }

    public function testInvalidEmailThrowsException()
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Email is not correct');

        new Email('invalid-email');
    }

    public function testEmailWithInvalidDomainThrowsException()
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Email is not correct');

        new Email('user@invalid-domain');
    }

    public function testEmptyEmailThrowsException()
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Email is not correct');

        new Email('');
    }

    public function testEmailToString()
    {
        $email = new Email('user@example.com');
        $this->assertEquals('user@example.com', (string) $email);
    }
}
