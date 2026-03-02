<?php

namespace Differ\Differ;

use Hexlet\Code\Differ as DiffService;
use Hexlet\Code\ParserFactory;
use Hexlet\Code\FormatterFactory;

function genDiff(string $firstPath, string $secondPath, string $format = 'stylish'): string
{
    $firstFile = ParserFactory::build($firstPath)->parse($firstPath);
    $secondFile = ParserFactory::build($secondPath)->parse($secondPath);
    $diff = (new DiffService())->genDiff($firstFile, $secondFile);
    return FormatterFactory::build($format)->format($diff);
}
