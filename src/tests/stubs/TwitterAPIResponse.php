<?php

namespace CerysFeed\Tests\Stubs;

class TwitterAPIResponse {
    public $text = 'Cerys is awesome';
    public $created_at = '2018-07-04';
    public $user;
    
    public function __construct() {
        $this->user = new ScreenName();
    }
}
