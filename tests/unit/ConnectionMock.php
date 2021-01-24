<?php

declare(strict_types=1);

namespace MetricMetoy\Test\Logger;

use MetricMetoy\Logger\Connection;

class ConnectionMock implements Connection
{
    public $messages = [];

    public function send(string $message): void
    {
        $this->messages[] = $message;
    }

    public function getLastMessage()
    {
        return end($this->messages) ?? null;
    }
}

