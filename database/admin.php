<?php
include '../funcs/dataBase.php';
include '../funcs/tools.php';

useSession();
if (empty($_SESSION['admin'])){
    header('Location: ../login.php');
}

?>

<?php include_once '../incs/head.php'; ?>
<?php include_once '../incs/header.php'; ?>


<nav class="orange darken-3">
    <div class="nav-wrapper">
        <a href="index.php" class="brand-logo">Administration</a>
        <ul class="right hide-on-med-and-down ">
            <li><a href="./projects.php">Projets</a></li>
            <li><a href="./projectType.php">Type Projet</a></li>
            <li><a href="./professionalExperience.php">Experience Professionnelle</a></li>
            <li><a href="study.php">Etudes</a></li>
            <li><a href="skill.php">Compétences</a></li>
            <li><a href="skillType.php">Type Compétences</a></li>
            <li><a href="hobby.php">Loisirs</a></li>
            <li><a href="mail.php">Mail</a></li>
            <li><a href="../logout.php">Deconnexion</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <h1 class="texte-align center">
        Admin
    </h1>
</div>



<?php include_once '../incs/footer.php'; ?>


