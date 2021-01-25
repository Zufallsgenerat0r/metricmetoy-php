<?php

declare(strict_types=1);

namespace MetricMetoy\Test\Logger\Connection;

use MetricMetoy\Logger\Connection\File as File;
use MetricMetoy\Logger\Client as Client;
use PHPUnit\Framework\TestCase;


class FileIntegrationTest extends TestCase
{
    public function testWritingMeasurementToFile()
    {
        $connection = new File('./tests/integration/data/test.log');
        $client = new Client($connection);
        $client->increment('filewritten');
        $connection->close();

        $this->assertEquals('filewritten:1' . PHP_EOL, file_get_contents('./tests/integration/data/test.log'));
        unlink('./tests/integration/data/test.log');
    }
}

