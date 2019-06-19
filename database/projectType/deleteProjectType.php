<?php

include '../../funcs/dataBase.php';
include '../../funcs/tools.php';

useSession();
$pdo = connectPdo();

$projectTypeId = $_GET['id'];

if (empty($_SESSION['admin'])){
    header('Location: ../../login.php');
    exit();
}

if ($projectTypeId === false){
    header('Location: ../admin.php');
    exit();
}


deleteProjectType($pdo, $projectTypeId);
header('Location: ../projectType.php');
