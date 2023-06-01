<?php
session_start();
unset($_SESSION['user_id']);
session_destroy();
header('Location: sigin_user.php');
exit;