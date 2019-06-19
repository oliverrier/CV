<?php

include '../../funcs/dataBase.php';
include '../../funcs/tools.php';

useSession();
$pdo = connectPdo();

$projectId = $_GET['id'];

if (empty($_SESSION['admin'])){
    header('Location: ../../login.php');
    exit();
}

if ($projectId === false){
    header('Location: ../admin.php');
    exit();
}

$project = getProject($pdo, $projectId);

$startDate = $_POST['startDate'] ?? false;
$endDate = $_POST['endDate'] ?? false;
$name = $_POST['name'] ?? false;
$description = $_POST['description'] ?? false;
$isSchool = $_POST['isSchool'] ?? false;


if ($startDate && $endDate && $name && $description && $isSchool)
{
    updateProject($pdo, $projectId, $startDate, $endDate, $name, $description, $isSchool);
    header('Location: ../projects.php');
}

?>

<?php include_once '../../incs/head.php'; ?>
<?php include_once '../../incs/header.php'; ?>

<div class="container">
    <h1 class="texte-align center">
        Admin Projet
    </h1>

<form class="col s12 m3" action="" method="POST">
        <div class="row">
            <div class="input-field col s6">
                <input id="startDate" type="text" name="startDate" value= "<?php echo $project['startDate']?>">
                <label for="startDate">Date début</label>
            </div>
            <div class="input-field col s6">
                <input id="endDate" type="text" name="endDate" value= "<?php echo $project['endDate']?>">
                <label for="endDate">Date Fin</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="name" type="text" name="name" value= "<?php echo $project['name']?>">
                <label for="name">Nom du projet</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="description" type="text" name="description" class="validate" value= "<?php echo $project['description']?>">
                <label for="description">Description du projet</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="isSchool" type="text" name="isSchool" class="validate" value= "<?php echo $project['isSchool']?>">
                <label for="isSchool">Scolaire ?</label>
            </div>
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="action">Modifier
            <i class="material-icons right">send</i>
        </button>
    </form>
</div>