<?php

include '../../funcs/dataBase.php';
include '../../funcs/tools.php';

useSession();
$pdo = connectPdo();

$hobbyId = $_GET['id'];

if (empty($_SESSION['admin'])){
    header('Location: ../../login.php');
    exit();
}

if ($hobbyId === false){
    header('Location: ../admin.php');
    exit();
}


deleteHobby($pdo, $hobbyId);
header('Location: ../hobby.php');
