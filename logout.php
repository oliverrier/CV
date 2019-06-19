<?php
session_name('adminCV');
session_start();
session_destroy();
header('Location: login.php');
exit;
