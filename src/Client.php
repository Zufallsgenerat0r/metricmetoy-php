<?php

declare(strict_types=1);

namespace MetricMetoy\Logger;

class Client
{
    private Connection $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function increment(string $key): void
    {
        $this->count($key, 1);
    }

    public function decrement(string $key): void
    {
        $this->count($key, -1);
    }

    public function count(string $key, $value): void
    {
        $this->send($key, $value);
    }

    private function send(string $key, $value): void
    {
        $message = $key . ':' . $value;

        $this->connection->send($message);
    }
}
