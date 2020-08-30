<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'dashboard/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//auth
$route['login'] = 'auth/login';
$route['logout'] = 'auth/logout';
$route['recover'] = 'auth/forgetpassword';
$route['verification'] = 'auth/recovery_verification';

