<?php

include __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;
use CerysFeed\TwitterApi;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/../.env');

$connection = new TwitterApi(
    getenv('TWITTER_CONSUMER_KEY'),
    getenv('TWITTER_CONSUMER_SECRET'), 
    getenv('TWITTER_ACCESS_TOKEN'), 
    getenv('TWITTER_TOKEN_SECRET')
);

$statuses = $connection->getStatuses('cerysgibbins', 10);

foreach($statuses as $status) {
    echo $status->text;
    echo "\n";
}
