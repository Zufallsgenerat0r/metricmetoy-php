<?php

declare(strict_types=1);

namespace MetricMetoy\Logger\Connection;

use MetricMetoy\Logger\Connection;

class File implements Connection
{
    private $handle;
    private string $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    private function open(): void
    {
        $this->handle = @fopen($this->filePath, "a+");
    }

    public function send(string $message): void
    {
        if (empty($message)) {
            return;
        }

        if (!$this->handle) {
            $this->open();
        }

        if ($this->handle) {
            fwrite($this->handle, $message . PHP_EOL);
        }
    }

    public function close(): void
    {
        if (is_resource($this->handle)) {
            fclose($this->handle);
        }

        $this->handle = null;
    }
}

