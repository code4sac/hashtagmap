<?php
ini_set('display_errors', 1);
require_once('lib/TwitterAPIExchange.php');
require_once('lib/util.php');

$hash_tag = "#cfabrigade";

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "284255296-KHR2Uv8Fw2A9UQZUGpsLMl2wLc2NVbd0iy1aNsSL",
    'oauth_access_token_secret' => "nwcwFRyMjRMAYmlcDCz8MjD0AIKS0oF0BWnherUIiI",
    'consumer_key' => "Dr0QqWsJhcqO9lcnn1clxg",
    'consumer_secret' => "SLPoBbkoPbbN4n9PUgZDMo7catu7XQyZAJ4DP8Sd6AQ"
);

/** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
//$url = 'https://api.twitter.com/1.1/blocks/create.json';
//$requestMethod = 'POST';

/** POST fields required by the URL above. See relevant docs as above **/
//$postfields = array(
//    'screen_name' => 'usernameToBlock', 
//    'skip_status' => '1'
//);

/** Perform a POST request and echo the response **/
//$twitter = new TwitterAPIExchange($settings);
//echo $twitter->buildOauth($url, $requestMethod)
//             ->setPostfields($postfields)
//             ->performRequest();
$url = 'https://api.twitter.com/1.1/search/tweets.json';
$getfield = '?q='.$hash_tag.'&include_entities=true';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
$ret = $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();

print $ret;

exit;





/** Perform a GET request and echo the response **/
/** Note: Set the GET field BEFORE calling buildOauth(); **/
$url = 'https://api.twitter.com/1.1/followers/ids.json';
$getfield = '?screen_name=_abraxxus';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
echo $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();



