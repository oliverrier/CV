<?php

include '../../funcs/dataBase.php';
include '../../funcs/tools.php';

useSession();
$pdo = connectPdo();

$studyId = $_GET['id'];

if (empty($_SESSION['admin'])){
    header('Location: ../../login.php');
    exit();
}

if ($studyId === false){
    header('Location: ../admin.php');
    exit();
}

$study = getStudy($pdo, $studyId);

$startDate = $_POST['startDate'] ?? false;
$endDate = $_POST['endDate'] ?? false;
$name = $_POST['name'] ?? false;
$type = $_POST['type'] ?? false;
$description = $_POST['description'] ?? false;


if ($startDate && $endDate && $name && $type && $description)
{
    updateStudy($pdo, $studyId, $startDate, $endDate, $name, $type, $description);
    header('Location: ../study.php');
}

?>

<?php include_once '../../incs/head.php'; ?>
<?php include_once '../../incs/header.php'; ?>

<div class="container">
    <h1 class="texte-align center">
        Admin Etudes
    </h1>

    <form class="col s12 m3" action="" method="POST">
        <div class="row">
            <div class="input-field col s6">
                <input id="startDate" type="text" name="startDate" value= "<?php echo $study['startDate']?>">
                <label for="startDate">Date début</label>
            </div>
            <div class="input-field col s6">
                <input id="endDate" type="text" name="endDate" value= "<?php echo $study['endDate']?>">
                <label for="endDate">Date Fin</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="name" type="text" name="name" value= "<?php echo $study['name']?>">
                <label for="name">Nom de l'étude</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="type" type="text" name="type" class="validate" value= "<?php echo $study['type']?>">
                <label for="type">Type d'étude</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="description" type="text" name="description" class="validate" value= "<?php echo $study['description']?>">
                <label for="description">Description</label>
            </div>
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="action">Modifier
            <i class="material-icons right">send</i>
        </button>
    </form>
</div>