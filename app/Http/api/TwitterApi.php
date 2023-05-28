<?php

namespace App\Http\Api;

// Import library
use Abraham\TwitterOAuth\TwitterOAuth;
use Illuminate\Support\Facades\Log;

class TwitterApi
{
    private $connection;
    
    // 接続
    public function __construct()
    {
        $this->connection  = new TwitterOAuth(
            env('TWITTER_CLIENT_KEY'),
            env('TWITTER_CLIENT_SECRET'),
            env('TWITTER_CLIENT_ID_ACCESS_TOKEN'),
            env('TWITTER_CLIENT_ID_ACCESS_TOKEN_SECRET'));
    }

    public function searchTweets(String $searchWord)
    {
        $totalTweets = "";
        $searchResults = $this->connection ->get("search/tweets",[
            'q' => $searchWord,
            'count' => 100,
        ]);
        
        //Log::Info('Search Results:', $searchResults->statuses);
        Log::Info('Search Results:', (array) $searchResults);
        
        $searchResults = json_decode(json_encode($searchResults->statuses), true);
    
        foreach ($searchResults as $searchResult) {
            $totalTweets .= $searchResult["text"];
        }

        $totalTweets = mb_strcut($totalTweets, 0, 5000, "UTF-8");
        return $totalTweets;
    }

}