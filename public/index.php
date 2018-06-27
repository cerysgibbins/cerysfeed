<?php

include __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;
use CerysFeed\Adapters\AbrahamTwitterAdapter;
use CerysFeed\TwigRenderer;

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

$renderer = new TwigRenderer();

echo $renderer->render($statuses);
