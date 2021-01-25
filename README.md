# metricmetoy-php

A client library to facilitate logging.

## Motivation and Backround

A toy project to show what I would consider good PHP development practices. Idea
for functionality is a project done at an former employer.

## Installation

To install run the folling command using `composer`:

```bash composer require kilian/metricmetoy-php ```

## Usage

The format of the logging messages is defined as key:value. For possible logging
Endpoints please have a look at the src/Connection folder. 

Currently availible are: 
* PHP error log
* Dummy Class that will send your messages to the great beyond (use for testing)
* Logging to a file on disk


```php 
<?php $connection = new \MetricMetoy\Logger\Connection\ErrorLog();
$client = new \MetricMetoy\Logger\Client($connection);

// simple counts 
$statsd->increment("importantMetric");
$statsd->decrement("doomsday"); 
$statsd->count("linesOfCode", 9000); 
```

For conncetions using file desriptors please close the connection after usage.

