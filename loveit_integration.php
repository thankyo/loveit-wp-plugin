<?php
/**
 * @package LoveIt Integration
 * @version 0.1
 */
/*
Plugin Name: LoveIt Integration
Plugin URI:
Description: This is LoveIt integration plugin
Version: 0.1
Author URI: http://github.com/thankyo
Text Domain: LoveIt Integration
*/

// This just echoes the chosen line, we'll position it later
function loveit_button($input) {
 $link = get_permalink();
 if (strpos($link, 'https') === 0) {
	$link = substr($link, 7, strlen($link));
 } else {
	$link = substr($link, 6, strlen($link));
 }
 $loveItLink = "http://localhost:8080/api/v1/thank/http" . $link;
 return $input . "<iframe src='". $loveItLink . "' width='100' height='50' frameBorder='0'/>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'the_content', 'loveit_button' );

?>