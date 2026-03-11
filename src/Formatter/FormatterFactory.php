<?php

namespace Occulo\Gendiff\Formatter;

use Occulo\Gendiff\Formatter\StylishFormatter;
use Occulo\Gendiff\Formatter\PlainFormatter;
use Occulo\Gendiff\Formatter\JsonFormatter;

class FormatterFactory
{
    private const DEFAULT_FORMATS = [
        'stylish' => StylishFormatter::class,
        'plain' => PlainFormatter::class,
        'json' => JsonFormatter::class,
    ];

    public function build(string $format = 'stylish'): FormatterInterface
    {
        if (!isset(self::DEFAULT_FORMATS[$format])) {
            throw new \Exception("Unsupported format");
        }
        return new (self::DEFAULT_FORMATS[$format])();
    }
}
