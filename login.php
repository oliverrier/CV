<?php
include 'funcs/dataBase.php';
include 'funcs/tools.php';

useSession();



$email = $_POST['email'] ?? false;
$password = $_POST['password'] ?? false;

if ($email && $password)
{
    $pdo = connectPdo();
    $userExist = verifyAdmin($pdo, $email, $password);
    var_dump($userExist);
    if ($userExist)
    {
        $_SESSION['admin'] = true;
        var_dump($_SESSION['admin']);
    }
}

if (!empty($_SESSION['admin']))
{
    header('Location: database/admin.php');
}
?>

<?php include_once 'incs/head.php'; ?>
<?php include_once 'incs/header.php'; ?>


<nav class="orange darken-3">
    <div class="nav-wrapper">
        <a href="index.php" class="brand-logo">Olivier Verrier</a>
        <ul class="right hide-on-med-and-down ">
            <li><a href="./projects.php">Projets</a></li>
            <li><a href="./professionalExperience.php">Experience Professionnelle</a></li>
            <li><a href="studies.php">Etudes</a></li>
            <li><a href="skills.php">Compétences</a></li>
            <li><a href="hobbies.php">Loisirs</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <h1 class="texte-align center">
        Connexion
    </h1>

<div class="row">
    <form class="col s12 m3" action="" method="POST">
        <div class="row">
            <div class="input-field col s12">
                <input id="email" type="email" name="email" class="validate">
                <label for="email">Email</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="password" type="password" name="password" class="validate">
                <label for="password">Password</label>
            </div>
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="action">Connexion
            <i class="material-icons right">send</i>
        </button>
    </form>
</div>
</div>

<?php include_once 'incs/footer.php'; ?>

