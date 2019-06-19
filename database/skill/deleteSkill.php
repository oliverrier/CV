<?php

include '../../funcs/dataBase.php';
include '../../funcs/tools.php';

useSession();
$pdo = connectPdo();

$skillId = $_GET['id'];

if (empty($_SESSION['admin'])){
    header('Location: ../../login.php');
    exit();
}

if ($skillId === false){
    header('Location: ../admin.php');
    exit();
}


deleteSkill($pdo, $skillId);
header('Location: ../skill.php');
