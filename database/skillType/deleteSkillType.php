<?php

include '../../funcs/dataBase.php';
include '../../funcs/tools.php';

useSession();
$pdo = connectPdo();

$SkillTypeId = $_GET['id'];

if (empty($_SESSION['admin'])){
    header('Location: ../../login.php');
    exit();
}

if ($SkillTypeId === false){
    header('Location: ../admin.php');
    exit();
}


deleteSkillType($pdo, $SkillTypeId);
header('Location: ../skillType.php');
