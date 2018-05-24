<?php

namespace CerysFeed\Adapters;

use Abraham\TwitterOAuth\TwitterOAuth;

class AbrahamTwitterAdapter implements TwitterAdapter
{
    private $connection;

    public function initialise($consumerKey, $consumerSecret, $accessToken, $tokenSecret)
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

    public function tweet($status)
    {
        return $status->text;
    }
    
    public function date()
    {
        return new \DateTime();
    }

    public function user() 
    {
        return 'username';
    }
}
