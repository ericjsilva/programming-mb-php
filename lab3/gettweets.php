<?php

require_once("TwitterApiExchange.php");

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
  'oauth_access_token' => "22220266-noURhC042dPLeC7inf3N0DUgWlAcmiFB7bisfCs29",
  'oauth_access_token_secret' => "GeNYkztiEBbcGtUO6KhcAMVyWspElvyzgKH2lE5svgOwE",
  'consumer_key' => "8OrmqfA5c8w25B5fSGSFYMZuP",
  'consumer_secret' => "aUNN7iq9qRoEPbrsOrDuYHn1jlXZerZ8N6D18WqvxishmmqMfz"
);

function getTweets($hash_tag)
{
  global $settings;

  $url = 'https://api.twitter.com/1.1/search/tweets.json';
  $getfield = '?q=' . $hash_tag;

  // $getfield = '?q=test&geocode= 40.3600,-75.9120,15mi&count=100";';

  $requestMethod = 'GET';

  $twitter = new TwitterAPIExchange($settings);
  $response = $twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest();

  $tweet_data = json_decode($response, TRUE);

  // Uncomment to see response from Twitter API
  // var_dump(json_encode($response));

  echo "<div id='stem-twitter'>";
  foreach ($tweet_data['statuses'] as $item) {
    print_tweet($item);
  }
  echo "</div>";

  return true;
}

function print_tweet($tweet) {
  $make_link = TRUE;
  echo "<div class='tweet'>";
  // print twitter handle
  echo "<div class='by'>";
  // If the $make_link is true, create a link.
  $username = $tweet['user']['screen_name'];
  if ($make_link) {
    $usernameText = "<a href='https://twitter.com/" . $username . "'>@" . $username . "</a>";
  } else {
    $usernameText = "@" . $username;
  }

  // Print the twitter username
  echo $usernameText;
  echo "</div>";

  // Print the tweet text
  echo $tweet['text'];
  if (isset($tweet['entities']['media'])) {
    echo "<img src='" . $tweet['entities']['media'][0]['media_url'] . ":thumb' alt='' width='150'>";
  }

  // Print the time of the tweet
  echo "<div class='time'>" . $tweet['created_at'] . "</div>";

  echo "</div>";
}

getTweets('#daretodo');

?>
<html>
<head>
  <title>My Twitter Feed App</title>
  <style>
    #stem-twitter {
      width: 80%;
      font-family: arial, "Helvetica Neue", Helvetica;
      font-size: 12px;
      color: #333333;
      padding: 10px;
      margin:0 auto;
    }

    #stem-twitter .tweet {
      width: 200px;
      margin:5px;
      padding: 5px;
      float:left;
      background:#f1f1f1;
      border:3px solid #aaa;
    }

    #stem-twitter .tweet .time {
      font-size: 10px;
      font-style: italic;
      color: #666666;
    }

    #stem-twitter .tweet .by {
      font-size: 10px;
      font-style: bold;
      color: #13c9d0;
    }

    #stem-twitter .tweet .by a {
      text-decoration: none;
      color: #13c9d0;
    }

    #stem-twitter .tweet .by a:hover {
      text-decoration: underline;
    }

    html {
      height: 100%;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      background: #70bg32;
      background-repeat:no-repeat;
      background: -webkit-linear-gradient( to left top, blue, red);
      background: -moz-linear-gradient( to left top, blue, red);
      background: -ms-linear-gradient( to left top, blue, red);
      background: -o-linear-gradient( to left top, blue, red);
      background: linear-gradient( to left top, blue, red);
    }
  </style>
</head>
</html>
