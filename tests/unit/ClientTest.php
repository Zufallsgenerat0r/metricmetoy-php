<?php

declare(strict_types=1);

namespace MetricMetoy\Test\Logger;

use MetricMetoy\Logger\Client as Client;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    private Client $client;
    private $connection;

    protected function setUp(): void
    {
        $this->connection = new ConnectionMock();
        $this->client = new Client($this->connection);
    }

    public function testCountWithInteger()
    {
        $this->client->count('importantValue', 42);
        $this->assertEquals(
            'importantValue:42',
            $this->connection->getLastMessage()
        );
    }

    public function testCountWithFloat()
    {
        $this->client->count('importantValue', 42.42);
        $this->assertEquals(
            'importantValue:42.42',
            $this->connection->getLastMessage()
        );
    }

    public function testIncrement()
    {
        $this->client->increment('importantValue');
        $this->assertEquals(
            'importantValue:1',
            $this->connection->getLastMessage()
        );
    }

    public function testDecrement()
    {
        $this->client->decrement('importantValue');
        $this->assertEquals(
            'importantValue:-1',
            $this->connection->getLastMessage()
        );
    }
}

