<?php
defined('BASEPATH') or exit('No direct script access allowed');

$active_group = 'default';
$query_builder = true;
$root = true;

if ($_SERVER['HTTP_HOST'] == 'localhost') {
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'tnpsc_career1';
    $environment = 'development';

    
} else {
    $hostname = 'localhost';
    $username = 'tnpsccar_care';
    $password = 'Welcome!23';
    $database = 'tnpsccar_tnpsc_career';
    $environment = 'production';
}
$db['default'] = array(
    'dsn' => '',
    'hostname' => $hostname,
    'username' => $username,
    'password' => $password,
    'database' => $database,
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => false,
    'db_debug' => (ENVIRONMENT !== $environment),
    'cache_on' => false,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => false,
    'compress' => false,
    'stricton' => false,
    'failover' => array(),
    'save_queries' => true,
);