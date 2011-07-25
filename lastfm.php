<?php 
// Enter your LastFM username
$lastfm_user = 'mbriney';

?>



<style>
.album {font-size:11px; font-family:Arial; width: 64px; height: 140px; float:left; text-align: center; padding: 7px;}
</style>

<?php

$getlastfm = "http://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user=".$lastfm_user."&api_key=b25b959554ed76058ac220b7b2e0a026&limit=200";
$xml = simplexml_load_file($getlastfm);

$music = $xml->recenttracks->track;

for ($i = 0; $i < 200; $i++) {

	echo "<div class='album'>";
		echo "<a href='".$music[$i]->url."' target='_blank'>";
		if ($music[$i]->image <> ''){
			echo "<img src='".$music[$i]->image."' border='0' width='64' height='64'></a><br>";
		} else {
			echo "<img src='nocover.png' border='0' width='64' height='64'></a><br>";
		}
		echo "<b>".$music[$i]->artist . "</b><br>";
		echo $music[$i]->name . "<br>";
	echo "</div>";
}

?>