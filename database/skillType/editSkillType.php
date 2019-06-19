<?php

include '../../funcs/dataBase.php';
include '../../funcs/tools.php';

useSession();
$pdo = connectPdo();

$skillTypeId = $_GET['id'];

if (empty($_SESSION['admin'])){
    header('Location: ../../login.php');
    exit();
}

if ($skillTypeId === false){
    header('Location: ../admin.php');
    exit();
}

$skillType = getSkillType($pdo, $skillTypeId);


$name = $_POST['name'] ?? false;


if ($name)
{
    updateSkillType($pdo, $skillTypeId, $name);
    header('Location: ../skillType.php');
}

?>

<?php include_once '../../incs/head.php'; ?>
<?php include_once '../../incs/header.php'; ?>

<div class="container">
    <h1 class="texte-align center">
        Admin Type Compétence
    </h1>

    <form class="col s12 m3" action="" method="POST">
        <div class="row">
            <div class="input-field col s12">
                <input id="name" type="text" name="name" value= "<?php echo $skillType['name']?>">
                <label for="name">Nom du type de la compétence</label>
            </div>
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="action">Modifier
            <i class="material-icons right">send</i>
        </button>
    </form>
</div>