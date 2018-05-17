<?php

namespace CerysFeed;

use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterApi
{
    private $connection;

    public function __construct($consumerKey, $consumerSecret, $accessToken, $tokenSecret)
    {
        $this->connection = new TwitterOAuth(
            $consumerKey, $consumerSecret, $accessToken, $tokenSecret
        );
    }

    public function getStatuses($screenName, $count)
    {
        $statuses = $this->connection->get(
            'statuses/user_timeline', 
            [
                'count' => $count, 
                'exclude_replies' => true, 
                'screen_name' => $screenName
            ]
        );
        
        return $statuses;
    }
}
