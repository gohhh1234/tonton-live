<?php

$url = "https://headend-api.tonton.com.my/v210/api/playback.class.api.php/GOgetLiveConfig/378/1/6420325?format=json&appID=TONTON&rate=WIFIHIGH&plt=web&manufacturer=chrome&serviceID=default&model=Mozilla/5.0%20(Windows%20NT%2010.0;%20Win64;%20x64)%20AppleWebKit/537.36%20(KHTML,%20like%20Gecko)%20Chrome/131.0.0.0%20Safari/537.36&firmwareVersion=10&appVersion=6.0.30&deviceOS=PCBROWSER&limitAdTracking=0";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Referer: https://www.xtra.com.my/live-tv",
   "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
preg_match('/qualities":({.+?}),"/', $resp, $matches);
$arr = json_decode($matches[1], true);
    $m3u8_raw = $arr['auto'][0]['url'];
    $url = $m3u8_raw;

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
echo $resp;
?>
