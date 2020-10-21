<?php
session_start();

require 'config.php';

require BASE_DIR . '/includes/db.php';

require BASE_DIR . '/models/BaseModel.php';
require BASE_DIR . '/models/Page.php';
require BASE_DIR . '/models/Post.php';
require BASE_DIR . '/models/User.php';

//Get User from session
$user_id = $_SESSION['user_id'] ?? 0;
$user = ($user_id) ? User::getById($user_id) : false;