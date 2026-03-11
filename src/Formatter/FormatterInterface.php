<?php

namespace Occulo\Gendiff\Formatter;

interface FormatterInterface
{
    public function format(array $data): string;
}
