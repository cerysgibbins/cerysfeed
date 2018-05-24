<?php

include __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;
use CerysFeed\Adapters\AbrahamTwitterAdapter;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/../.env');

$twitter = new AbrahamTwitterAdapter();
$twitter->initialise(
    getenv('TWITTER_CONSUMER_KEY'),
    getenv('TWITTER_CONSUMER_SECRET'), 
    getenv('TWITTER_ACCESS_TOKEN'), 
    getenv('TWITTER_TOKEN_SECRET')
);
$statuses = $twitter->getStatuses('cerysgibbins', 5);

foreach($statuses as $status) {
    echo $twitter->tweet($status);   
    echo "\n"; 
    echo $twitter->user($status);
    echo "\n"; 
    echo $twitter->date($status)->format('jS M Y h:ia');
    echo "\n";
}
