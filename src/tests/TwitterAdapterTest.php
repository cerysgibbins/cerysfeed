<?php 

namespace CerysFeed\Tests;

use PHPUnit\Framework\TestCase;
use CerysFeed\Adapters\AbrahamTwitterAdapter;
use CerysFeed\Tests\Stubs\TwitterAPIResponse;
use CerysFeed\Tests\Stubs\InvalidTwitterAPIResponse;

class TwitterAdapterTest extends TestCase
{
    public function testCallingTweetWithValidStatusReturnsTweetText()
    {
        $expectedTweet = 'Cerys is awesome';

        $status = new TwitterAPIResponse();

        $twitterAdapter = new AbrahamTwitterAdapter();

        $this->assertEquals($expectedTweet, $twitterAdapter->tweet($status));
    }

    public function testCallingDateWithValidStatusReturnsDateTimeObjectSetToCorrectDate()
    {
        $expectedDate = new \DateTime('2018-07-04');

        $status = new TwitterAPIResponse();

        $twitterAdapter = new AbrahamTwitterAdapter();

        $this->assertInstanceOf(\DateTime::class, $twitterAdapter->date($status));

        $this->assertEquals($expectedDate, $twitterAdapter->date($status));
    }

    public function testCallingDateWithInvalidStatusReturnsNull()
    {
        $status = new InvalidTwitterAPIResponse();

        $twitterAdapter = new AbrahamTwitterAdapter();

        $this->assertNull($twitterAdapter->date($status));
    }

    public function testCallingUserWithValidStatusReturnsUsername()
    {
        $expectedUsermame = 'cerysgibbins';

        $status = new TwitterAPIResponse();

        $twitterAdapter = new AbrahamTwitterAdapter();

        $this->assertEquals($expectedUsermame, $twitterAdapter->user($status));
    }

    public function testGetStatusesReturnsArrayOfStatuses()
    {
        
    }
}
