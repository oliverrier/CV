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

$hobby = getHobby($pdo, $hobbyId);

$name = $_POST['name'] ?? false;


if ($name)
{
    updateHobbies($pdo, $hobbyId, $name);
    header('Location: ../hobby.php');
}

?>

<?php include_once '../../incs/head.php'; ?>
<?php include_once '../../incs/header.php'; ?>

<div class="container">
    <h1 class="texte-align center">
        Admin Loisirs
    </h1>

    <form class="col s12 m3" action="" method="POST">
        <div class="row">
            <div class="input-field col s12">
                <input id="name" type="text" name="name" value= "<?php echo $hobby['name']?>">
                <label for="name">Nom du Loisir</label>
            </div>
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="action">Modifier
            <i class="material-icons right">send</i>
        </button>
    </form>
</div>