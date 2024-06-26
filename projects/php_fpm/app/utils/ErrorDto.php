<?php
// PHP8.3
declare(strict_types=1);

class ErrorDto
{
    public ?string $code = null;
    public ?string $message = null;

    public function __construct(?string $message = "Bad Request", ?string $code = null)
    {
        $this->message = $message;
        $this->code = $code;
    }
}
