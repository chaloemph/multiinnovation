<?php

$url = "http://www.google.com";
$ch = curl_init();
$timeout = 5;
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$html = curl_exec($ch);
curl_close($ch);

$dom = new DOMDocument();

@$dom->loadHTML($html);


print_r($html);

foreach($dom->getElementsByTagName('p') as $link) {
    echo $dom->saveXML( $link);
    echo "<br />";
}
?>