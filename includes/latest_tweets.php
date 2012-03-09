<?php 

$ch = curl_init();


curl_setopt($ch, CURLOPT_URL, "http://api.twitter.com/1/statuses/user_timeline.json?screen_name=jefferymills");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$contents = curl_exec($ch);

curl_close($ch);

$decoded = json_decode($contents);

print_r($decoded);

 ?>