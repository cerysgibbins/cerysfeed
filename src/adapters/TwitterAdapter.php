<?php

namespace CerysFeed\Adapters;

use CerysFeed\Factories\TwitterOAuthFactory;

interface TwitterAdapter
{
    /**
     * @param TwitterOAuthFactory $twitterFactory
     * @param string $consumerKey
     * @param string $consumerSecret
     * @param string $accessToken
     * @param string $tokenSecret
     * @return void
     */
    public function initialise(TwitterOAuthFactory $twitterFactory, $consumerKey, $consumerSecret, $accessToken, $tokenSecret);

    public function getStatuses($screenName, $count);

    public function tweet($status);
    
    public function date($status);

    public function user($status);     
    
    public function tweetId($status);
}
