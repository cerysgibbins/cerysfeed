<?php

include __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;
use CerysFeed\Adapters\TwitterDatabaseAdapter;
use CerysFeed\TwigRenderer;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/../.env');

$database = new TwitterDatabaseAdapter(
    getenv('DATABASE_USER'),
    getenv('DATABASE_PASSWORD'), 
    getenv('DATABASE_HOST'),
    getenv('DATABASE_DATABASE')
);
$statuses = $database->readTweets(10);

$renderer = new TwigRenderer();

echo $renderer->render($statuses);
