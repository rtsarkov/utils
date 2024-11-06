<?php

namespace MioCode\Utils\ValueObjects;
use Exception;

class Email
{
    /**
     * @throws Exception
     */
    public function __construct(
        public string $email = ''
    )
    {
        $this->validate();
    }

    private function validate(): void
    {
        if (!preg_match("/^[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5}$/i", $this->email)) {
            throw new \RuntimeException('Email is not correct');
        }
    }

    public static function make(string $email): self
    {
        return new self($email);
    }

    public function get(): string
    {
        return $this->email;
    }

    public function __toString(): string
    {
        return $this->email;
    }
}