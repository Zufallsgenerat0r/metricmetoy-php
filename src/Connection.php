<?php

declare(strict_types=1);

namespace MetricMetoy\Logger;

interface Connection
{
    public function send(string $message): void;
}
