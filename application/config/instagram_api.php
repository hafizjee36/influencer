<?php

/*
|--------------------------------------------------------------------------
| Instagram
|--------------------------------------------------------------------------
|
| Instagram client details
|
*/
 
$config['instagram_client_name']	= 'Hafiz';
$config['instagram_client_id']		= '5600079653430700';
$config['instagram_client_secret']	= '8c8f09613686a7f68fafb91078aa5dbc';
$config['instagram_callback_url']	= 'https://localhost/fiver/demo/authorize/get_code';//e.g. http://yourwebsite.com/authorize/get_code/
$config['instagram_website']		= 'https://localhost/fiver/demo';//e.g. http://yourwebsite.com/
$config['instagram_description']	= '';
	
/**
 * Instagram provides the following scope permissions which can be combined as likes+comments
 * 
 * basic - to read any and all data related to a user (e.g. following/followed-by lists, photos, etc.) (granted by default)
 * comments - to create or delete comments on a user’s behalf
 * relationships - to follow and unfollow users on a user’s behalf
 * likes - to like and unlike items on a user’s behalf
 * 
 */
$config['instagram_scope'] = 'user_profile,user_media';

// There was issues with some servers not being able to retrieve the data through https
// If you have this problem set the following to FALSE 

$config['instagram_ssl_verify']		= TRUE;
