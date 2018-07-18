<?php

namespace CerysFeed\Factories;

use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterOAuthFactory 
{
    /**
     * @param string $consumerKey
     * @param string $consumerSecret
     * @param string $accessToken
     * @param string $tokenSecret
     * @return TwitterOAuth
     */
    public function create($consumerKey, $consumerSecret, $accessToken, $tokenSecret) 
    {
        return new TwitterOAuth(
            $consumerKey, $consumerSecret, $accessToken, $tokenSecret
        );
    }
}
