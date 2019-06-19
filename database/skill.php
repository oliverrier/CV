<?php

include '../funcs/dataBase.php';
include '../funcs/tools.php';

useSession();

if (empty($_SESSION['admin'])){
    header('Location: ../login.php');
    exit();
}

$pdo = connectPdo();


$name = $_POST['name'] ?? false;
$level = $_POST['level'] ?? false;


if ($name && $level)
{
    addSkill($pdo, $name, $level);
    header('Location: skill.php');
}



?>
<?php include_once '../incs/head.php'; ?>
<?php include_once '../incs/header.php'; ?>

<nav class="orange darken-3">
    <div class="nav-wrapper">
        <a href="index.php" class="brand-logo">Admin</a>
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
        Admin Compétences
    </h1>




    <table>
        <thead>
        <tr>
            <th>Nom</th>
            <th>Niveau</th>
        </tr>
        </thead>

        <?php
        $skills = getAllSkills($pdo);
        foreach ($skills as $skill)
        {
        ?>
        <tbody>
        <tr>
            <td><?php echo $skill['name']?></td>
            <td><?php echo $skill['level']?></td>
            <td>
                <a href="skill/editSkill.php?id=<?php echo $skill['id']; ?>">
                    <button class="btn waves-effect waves-light orange darken-3" type="submit" name="action">Editer
                    <i class="material-icons right">create</i>
                    </button>
                </a>
            </td>
            <td>
                <a href="skill/deleteSkill.php?id=<?php echo $skill['id']; ?>"><button class="btn waves-effect waves-light orange darken-3" type="submit" name="action">Supprimer
                    <i class="material-icons right">clear</i>
                </button></a>
            </td>
        </tr>

        </tbody>
        <?php } ?>
    </table>




    <div class="row">
    <form class="col s12 m3" action="" method="POST">
        <div class="row">
            <div class="input-field col s12">
                <input id="name" type="text" name="name">
                <label for="name">Nom de la compétence</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="level" type="text" name="level" class="validate">
                <label for="level">Niveau de compétence</label>
            </div>
        </div>

        <button class="btn waves-effect waves-light" type="submit" name="action">Ajouter
            <i class="material-icons right">send</i>
        </button>
    </form>
</div>
</div>