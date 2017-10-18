<?php

use PHPUnit\Framework\TestCase;

class pdateTest extends TestCase
{
    public function testPCheckDate()
    {
        $_persianDate = pgetdate(time());
        $this->assertFalse(mb_detect_encoding($_persianDate['month'], 'ASCII'));
    }
}
