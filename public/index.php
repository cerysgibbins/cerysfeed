<?php

include __DIR__ . '/../vendor/autoload.php';

use Abraham\TwitterOAuth\TwitterOAuth;
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/../.env');

$connection = new TwitterOAuth(
    getenv('TWITTER_CONSUMER_KEY'),
    getenv('TWITTER_CONSUMER_SECRET'), 
    getenv('TWITTER_ACCESS_TOKEN'), 
    getenv('TWITTER_TOKEN_SECRET')
);

$statuses = $connection->get('statuses/user_timeline', ['count' => 1, 'exclude_replies' => true, 'screen_name' => 'cerysgibbins']);

//var_dump($statuses);

echo $statuses[0]->text;

