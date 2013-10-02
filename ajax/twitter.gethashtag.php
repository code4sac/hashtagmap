<?php
ini_set('display_errors', 1);
require_once('../lib/TwitterAPIExchange.php');
require_once('../lib/util.php');

$hash_tag = $_GET['ht'];

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "284255296-KHR2Uv8Fw2A9UQZUGpsLMl2wLc2NVbd0iy1aNsSL",
    'oauth_access_token_secret' => "nwcwFRyMjRMAYmlcDCz8MjD0AIKS0oF0BWnherUIiI",
    'consumer_key' => "Dr0QqWsJhcqO9lcnn1clxg",
    'consumer_secret' => "SLPoBbkoPbbN4n9PUgZDMo7catu7XQyZAJ4DP8Sd6AQ"
);

$url = 'https://api.twitter.com/1.1/search/tweets.json';

$getfield = '?q=#'.$hash_tag.'&count=200';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
$ret = $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();

print $ret;

