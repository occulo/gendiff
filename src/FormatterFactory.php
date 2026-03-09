<?php

namespace Hexlet\Code;

use Hexlet\Code\Formatters\StylishFormatter;
use Hexlet\Code\Formatters\PlainFormatter;
use Hexlet\Code\Formatters\JsonFormatter;

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
