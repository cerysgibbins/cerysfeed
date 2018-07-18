<?php

namespace CerysFeed\Adapters;

use Abraham\TwitterOAuth\TwitterOAuth;

class AbrahamTwitterAdapter implements TwitterAdapter
{
    private $connection;

    /**
     * @param TwitterOAuthFactory $twitterFactory
     * @param string $consumerKey
     * @param string $consumerSecret
     * @param string $accessToken
     * @param string $tokenSecret
     * @return void
     */
    public function initialise($twitterFactory, $consumerKey, $consumerSecret, $accessToken, $tokenSecret)
    {
        $this->connection = $twitterFactory->create(
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
       
        return $this->buildStatusArray($statuses);
    }

    public function tweet($status)
    {
        return $status->text;
    }
    
    public function date($status)
    {
        try {
            $dateTime = new \DateTime($status->created_at);
        } catch (\Exception $exception) {
            return null;
        }
        
        return $dateTime;
    }

    public function user($status) 
    {
        return $status->user->screen_name;
    }

    public function tweetId($status) 
    {
        return $status->id;
    }

    private function buildStatusArray($statuses)
    {
        $statusArray = [];

        foreach($statuses as $status) {
            $statusArray[] = [
                'user' => $this->user($status),
                'date' => $this->date($status),
                'tweet' => $this->tweet($status),
                'tweet_id' => $this->tweetId($status),
            ];
        }
        
        return $statusArray;
    }
}
