<?php

include '../../funcs/dataBase.php';
include '../../funcs/tools.php';

useSession();
$pdo = connectPdo();

$mailId = $_GET['id'];

if (empty($_SESSION['admin'])){
    header('Location: ../../login.php');
    exit();
}

if ($mailId === false){
    header('Location: ../admin.php');
    exit();
}


deleteMail($pdo, $mailId);
header('Location: ../mail.php');
