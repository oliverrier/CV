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

$projectType = getProjectType($pdo, $projectTypeId);


$name = $_POST['name'] ?? false;



if ($name)
{
    updateProjectType($pdo, $projectTypeId, $name);
    header('Location: ../projectType.php');
}

?>

<?php include_once '../../incs/head.php'; ?>
<?php include_once '../../incs/header.php'; ?>

<div class="container">
    <h1 class="texte-align center">
        Admin Type Projet
    </h1>

<form class="col s12 m3" action="" method="POST">
        <div class="row">
            <div class="input-field col s12">
                <input id="name" type="text" name="name" value= "<?php echo $projectType['name']?>">
                <label for="name">Type de projet</label>
            </div>
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="action">Modifier
            <i class="material-icons right">send</i>
        </button>
    </form>
</div>