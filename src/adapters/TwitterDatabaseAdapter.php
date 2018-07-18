<?php 

namespace CerysFeed\Adapters;

use \PDO as PDO;

class TwitterDatabaseAdapter implements DatabaseAdapter
{
    private $database;
    private $dsn;

    public function __construct($username, $password, $host, $name)
    {
        $this->dsn = 'mysql:dbname='.$name.';host='.$host;
        $this->database = new PDO($this->dsn, $username, $password);
    }

    public function writeTweet($status)
    {
        $tweetQuery = $this->database->prepare('SELECT id FROM tweets WHERE tweet_id=:tweetId');
        $tweetCount = $tweetQuery->execute([
            'tweetId'=>$status['tweet_id'],
        ]);
    
        if ($tweetQuery->rowCount() == 0) {
            $tweetQuery = $this->database->prepare('INSERT INTO tweets SET user=:user, tweet=:tweet, date=:date, tweet_id=:tweetId');
            $tweetQuery->execute([
                'user'=>$status['user'],
                'tweet'=>$status['tweet'],
                'date'=>$status['date']->format('Y-m-d H:i:s'),
                'tweetId'=>$status['tweet_id'],
            ]);
        }
    }

    public function readTWeets($numberOfTweets)
    {
        $tweetQuery = $this->database->prepare('SELECT * FROM tweets ORDER BY date DESC LIMIT '.intval($numberOfTweets));
        $tweetQuery->execute([
            
        ]);
      
        return $tweetQuery->fetchAll();
    }

    public function __destruct()
    {
        $this->dsn = null;
    }
}
