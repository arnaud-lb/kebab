<?php

namespace Mention\Kebab\Tests\Benchmark;

use Mention\Kebab\Json\JsonUtils;

class IsValidJsonBench
{
    private string $largeInvalidString;
    private string $smallInvalidString;

    public function __construct()
    {
        $this->largeInvalidString = str_repeat('a', 10 * 1024);
        $this->smallInvalidString = 'zzz';
    }

    public function benchLargeStringWithBypass(): void
    {
        JsonUtils::isValidJson($this->largeInvalidString);
    }

    public function benchLargeStringWithoutBypass(): void
    {
        JsonUtils::isValidJsonWithoutBypass($this->largeInvalidString);
    }

    public function benchSmallStringWithBypass(): void
    {
        JsonUtils::isValidJson($this->smallInvalidString);
    }

    public function benchSmallStringWithoutBypass(): void
    {
        JsonUtils::isValidJsonWithoutBypass($this->smallInvalidString);
    }

}
