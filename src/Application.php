<?php

namespace Hexlet\Code;

use Hexlet\Code\Differ;
use Hexlet\Code\Parser;
use Hexlet\Code\FormatterFactory;

class Application
{
    private $parser;
    private $factory;
    private $differ;

    public function __construct()
    {
        $this->parser = new Parser();
        $this->factory = new FormatterFactory();
        $this->differ = new Differ();
    }

    public function run(string $firstPath, string $secondPath, string $format = 'stylish'): string
    {
        $first = $this->parser->parse($firstPath);
        $second = $this->parser->parse($secondPath);
        $diff = $this->differ->buildDiff($first, $second);
        return $this->factory->build($format)->format($diff);
    }
}
