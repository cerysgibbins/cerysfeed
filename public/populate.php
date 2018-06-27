<?php

include __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;
use CerysFeed\Adapters\AbrahamTwitterAdapter;
use CerysFeed\Adapters\TwitterDatabaseAdapter;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/../.env');

$twitter = new AbrahamTwitterAdapter();
$twitter->initialise(
    getenv('TWITTER_CONSUMER_KEY'),
    getenv('TWITTER_CONSUMER_SECRET'), 
    getenv('TWITTER_ACCESS_TOKEN'), 
    getenv('TWITTER_TOKEN_SECRET')
);
$statuses = $twitter->getStatuses('cerysgibbins', 15);

$database = new TwitterDatabaseAdapter(
    getenv('DATABASE_USER'),
    getenv('DATABASE_PASSWORD'), 
    getenv('DATABASE_HOST'),
    getenv('DATABASE_DATABASE')
);

foreach($statuses as $status) {
    $database->writeTweet($status);
}
