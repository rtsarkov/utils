<?php

class Phone
{
    /**
     * @throws Exception
     */
    public function __construct(
        public string $phone = ''
    )
    {
        $this->formater();
        $this->validate();
    }

    private function formater(): void
    {
        $this->phone = str_replace([' ', '-', '+', '(', ')'], '', $this->phone);
    }

    public static function make(string $phone): self
    {
        return new self($phone);
    }
    private function validate(): void
    {
        if ($this->phone === '') {
            throw new \RuntimeException('Phone is required');
        }

        if (!preg_match('/^7[0-9]{10}$/', $this->phone)) {
            throw new \RuntimeException('Phone must be 10 digits phone number');
        }
    }

    public function get()
    {
        return $this->phone;
    }

    public function __toString(): string
    {
        return $this->phone;
    }
}