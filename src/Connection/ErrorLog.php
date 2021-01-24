<?php

declare(strict_types=1);

namespace MetricMetoy\Logger\Connection;

use MetricMetoy\Logger\Connection as Connection;

class ErrorLog implements Connection
{
    public function send(string $message): void
    {
        error_log($message);
    }
}

