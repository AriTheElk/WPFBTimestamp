<?php
/*
Plugin Name: WPFB Timestamp
Plugin URI: https://github.com/iGARET/WPFBTimestamp
Description: A FaceBook inspired "Time Ago" time stamp plugin. Examples: "Yesterday at 1:42pm", "About an hour ago", "August 14 at 4:00am", and more! It automagically selects to display more/less data depending on how recent the post was.
Version: 1.2.1
Author: iGARET
Author URI: http://igaret.com
*/




include_once('updater.php');

define('WP_GITHUB_FORCE_UPDATE', true);

if (is_admin()) { // note the use of is_admin() to double check that this is happening in the admin

	$config = array(
		'slug' => plugin_basename(__FILE__),
		'proper_folder_name' => 'WPFBTimestamp',
		'api_url' => 'https://api.github.com/repos/iGARET/WPFBTimestamp',
		'raw_url' => 'https://raw.github.com/iGARET/WPFBTimestamp/master',
		'github_url' => 'https://github.com/iGARET/WPFBTimestamp',
		'zip_url' => 'https://github.com/iGARET/WPFBTimestamp/zipball/master',
		'sslverify' => true,
		'requires' => '3.0',
		'tested' => '3.3.2',
	);

	new WPGitHubUpdater($config);

}



function wpfbts($postTime)
{
/*
	* Variables
*/
	if (!$postTime){ $postTime = get_the_time('U'); }
	$time			= date('U') - $postTime;
	$seconds		= $time;
	$minutes		= round($time / 60);
	$hours			= round($time / 3600);
	$days			= round($time / 86400);
	$weeks			= round($time / 604800);
	$months			= round($time / 2419200);
	$years			= round($time / 29030400);
	$recentDate1 	= date("l", $postTime);
	$recentDate2 	= intval(date("h", $postTime));
	$recentDate3 	= date("ia", $postTime);
	$recentDate 	= $recentDate1 . " at " . $recentDate2 . ":" . $recentDate3;
	$longerDate 	= date("F j", $postTime) . " at " . $recentDate2 . ":" . $recentDate3;
	$overYear 		= date("F j, Y", $postTime) . " at " . $recentDate2 . ":" . $recentDate3;
/*
	* Under a minute
*/
	if($seconds <= 60){
		$time="$seconds seconds ago";   

/*
	* Under an hour
*/
	}else if($minutes <= 60){

	if($minutes == 1){
		$time="About a minute ago";
	}else{
		$time="$minutes minutes ago";
	}

/*
	* Under a day
*/
	}else if($hours <= 24){

	if($hours == 1){
		$time="About an hour ago";
	}else{
		$time="$hours hours ago";
	}

/*
	* Under 5 days
*/
	}else if($days < 5){

	if($days == 1){
		$time="Yesterday at $recentDate2:$recentDate3";
	}else{
		$time= $recentDate;
	}


/*
	* Under a year
*/
	}else if($months <= 12){

		$time=$longerDate;

/*
	* Over a year
*/
	}else{  
		$time=$overYear;
	}

	return $time;
}
?>