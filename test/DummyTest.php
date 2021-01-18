<?php

declare(strict_types=1);

namespace MetricMetoy\Test\Statsd;

use PHPUnit\Framework\TestCase;

class DummyTest extends TestCase
{
    public function testAdd()
    {
        $this->assertEquals(1+1, 2);
    }
}

