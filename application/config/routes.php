<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'login';

$route['twitter.html'] 		= 'dashboard/twitter';
$route['instagram.html'] 	= 'dashboard/instagram';
$route['tiktok.html'] 		= 'dashboard/tiktok';
$route['telegram.html'] 	= 'dashboard/telegram';

$route['influencer.html'] = 'modules/influencer';
$route['hashtag.html'] = 'modules/hashtag';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
