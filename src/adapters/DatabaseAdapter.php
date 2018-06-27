<?php

namespace CerysFeed\Adapters;

interface DatabaseAdapter 
{
    public function writeTweet($status);

    public function readTweets($numberOfTweets);
}
