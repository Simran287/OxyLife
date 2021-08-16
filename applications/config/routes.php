<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'HomeController/login_signup';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
//$route['login'] = 'HomeController/login';
$route['signin'] = 'HomeController/login_signin';
$route['userdetails'] = 'HomeController/userdetails';
$route['registration'] = 'HomeController/register';
$route['pictureupload'] = 'HomeController/display_picture_upload';
$route['store-image'] = 'HomeController/store';
$route['mainpage'] = 'HomeController/mainpage';
$route['showstatus'] = 'HomeController/showstatus';
$route['usershow'] = 'HomeController/user_show';
?>
