<?php
session_start();

require 'config.php';

require BASE_DIR . '/includes/db.php';

require BASE_DIR . '/models/BaseModel.php';
require BASE_DIR . '/models/Page.php';
require BASE_DIR . '/models/Post.php';
require BASE_DIR . '/models/User.php';

// get User from session
$user_model = new User();
$user_id = $_SESSION['user_id'] ?? 0;
$user = ($user_id) ? $user_model->getById($user_id) : false;

// set timezone
setlocale(LC_ALL, 'nl_NL');

// check if system is windows
$userSystem = $_SERVER['SystemRoot'] ?? '';
if (strpos($userSystem, 'WINDOWS') !== false) {
    setlocale(LC_ALL, 'nld_nld');
}