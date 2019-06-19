<?php

include '../../funcs/dataBase.php';
include '../../funcs/tools.php';

useSession();
$pdo = connectPdo();

$professionalExperienceId = $_GET['id'];

if (empty($_SESSION['admin'])){
    header('Location: ../../login.php');
    exit();
}

if ($professionalExperienceId === false){
    header('Location: ../admin.php');
    exit();
}


deleteProfessionalExperience($pdo, $professionalExperienceId);
header('Location: ../professionalExperience.php');
