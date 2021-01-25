<?php

declare(strict_types=1);

namespace MetricMetoy\Test\Logger\Connection;

use MetricMetoy\Logger\Connection\File;
use PHPUnit\Framework\TestCase;

class FileTest extends TestCase
{
    public function testSend()
    {
        $metric = 'filetest:1';
        $connection = new File('php://memory');
        $connection->send($metric);

        $handle = $this->getFileHandle($connection);
        rewind($handle);
        $this->assertEquals($metric . PHP_EOL, stream_get_contents($handle));
    }

    public function testSendWithBrokenData()
    {
        $connection = new File('php://memory');
        $connection->send('');
        $this->assertNull($this->getFileHandle($connection));
    }
    
    /*
     * Helper function with reflection magic
     */
    private function getFileHandle($file)
    {
        $reflector = new \ReflectionClass($file);
        $reflectorProperty = $reflector->getProperty('handle');
        $reflectorProperty->setAccessible(true);
        return $reflectorProperty->getValue($file);
    }
}

