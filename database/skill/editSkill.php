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

$skill = getSkill($pdo, $skillId);


$name = $_POST['name'] ?? false;
$level = $_POST['level'] ?? false;



if ($name && $level )
{
    updateSkill($pdo, $skillId, $name, $description);
    header('Location: ../skill.php');
}

?>

<?php include_once '../../incs/head.php'; ?>
<?php include_once '../../incs/header.php'; ?>

<div class="container">
    <h1 class="texte-align center">
        Admin Compétences
    </h1>

    <form class="col s12 m3" action="" method="POST">

        <div class="row">
            <div class="input-field col s12">
                <input id="name" type="text" name="name" value= "<?php echo $skill['name']?>">
                <label for="name">Nom de la compétence</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="level" type="text" name="level" class="validate" value= "<?php echo $skill['level']?>">
                <label for="level">Niveau de compétence</label>
            </div>
        </div>

        <button class="btn waves-effect waves-light" type="submit" name="action">Modifier
            <i class="material-icons right">send</i>
        </button>
    </form>
</div>