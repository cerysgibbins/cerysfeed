<?php

namespace CerysFeed\Adapters;

interface TwitterAdapter
{
    public function initialise($consumerKey, $consumerSecret, $accessToken, $tokenSecret);

    public function getStatuses($screenName, $count);

    public function tweet($status);
    
    public function date($status);

    public function user($status);        
}
