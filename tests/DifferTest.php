<?php

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Hexlet\Code\ParserFactory;
use Hexlet\Code\Differ;

class DifferTest extends TestCase
{
    public static function fileProvider(): array
    {
        return [
            'json' => [
                __DIR__ . '/fixtures/json/file1.json',
                __DIR__ . '/fixtures/json/file2.json'
            ],
            'yaml' => [
                __DIR__ . '/fixtures/yaml/file1.yaml',
                __DIR__ . '/fixtures/yaml/file2.yaml'
            ],
        ];
    }

    #[DataProvider('fileProvider')]
    public function testGenDiff($firstPath, $secondPath): void
    {
        $firstFile = ParserFactory::build($firstPath)->parse($firstPath);
        $secondFile = ParserFactory::build($secondPath)->parse($secondPath);
        $differ = new Differ();
        $actual = $differ->genDiff($firstFile, $secondFile);
        $expected = require __DIR__ . '/fixtures/expected_differ.php';
        $this->assertEquals($expected, $actual);
    }
}
