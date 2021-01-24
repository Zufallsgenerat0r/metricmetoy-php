# metricmetoy-php

A client library to facilitate logging.

## Motivation and Backround

A toy project to show what I would consider good PHP development practices. Idea
for functionality is a project done at an former employer.

## Installation

To install run the folling command using `composer`:

```bash
composer require kilian/metricmetoy-php
```

## Usage

```php
<?php
$connection = new \MetricMetoy\Logger\Connection\ErrorLog();
$client = new \MetricMetoy\Logger\Client($connection);

// simple counts
$statsd->increment("importantMetric");
$statsd->decrement("doomsday");
$statsd->count("linesOfCode", 9000);
```

