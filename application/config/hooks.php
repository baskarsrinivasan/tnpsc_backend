<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$hook['pre_system'] = array(
    'function' => 'auth_constants',
    'filename' => 'auth_constants.php',
    'filepath' => 'third_party/community_auth/hooks'
);
$hook['post_system'] = array(
    'function' => 'auth_sess_check',
    'filename' => 'auth_sess_check.php',
    'filepath' => 'third_party/community_auth/hooks'
);