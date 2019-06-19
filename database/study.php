<?php

include '../funcs/dataBase.php';
include '../funcs/tools.php';

useSession();

if (empty($_SESSION['admin'])){
    header('Location: ../login.php');
    exit();
}

$pdo = connectPdo();

$startDate = $_POST['startDate'] ?? false;
$endDate = $_POST['endDate'] ?? false;
$name = $_POST['name'] ?? false;
$type = $_POST['type'] ?? false;
$description = $_POST['description'] ?? false;


if ($startDate && $endDate && $name && $type && $description)
{
    addStudy($pdo, $startDate, $endDate, $name, $type, $description);
    header('Location: study.php');
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
        Admin Etude
    </h1>




    <table>
        <thead>
        <tr>
            <th>Date Début</th>
            <th>Date Fin</th>
            <th>Nom</th>
            <th>Type</th>
            <th>Description</th>
        </tr>
        </thead>

        <?php
        $studies = getAllStudies($pdo);
        foreach ($studies as $study)
        {
        ?>
        <tbody>
        <tr>
            <td><?php echo $study['startDate']?></td>
            <td><?php echo $study['endDate']?></td>
            <td><?php echo $study['name']?></td>
            <td><?php echo $study['type']?></td>
            <td><?php echo $study['description']?></td>
            <td>
                <a href="study/editStudy.php?id=<?php echo $study['id']; ?>">
                    <button class="btn waves-effect waves-light orange darken-3" type="submit" name="action">Editer
                    <i class="material-icons right">create</i>
                    </button>
                </a>
            </td>
            <td>
                <a href="study/deleteStudy.php?id=<?php echo $study['id']; ?>"><button class="btn waves-effect waves-light orange darken-3" type="submit" name="action">Supprimer
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
            <div class="input-field col s6">
                <input id="startDate" type="text" name="startDate">
                <label for="startDate">Date début</label>
            </div>
            <div class="input-field col s6">
                <input id="endDate" type="text" name="endDate">
                <label for="endDate">Date Fin</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="name" type="text" name="name">
                <label for="name">Nom du projet</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="type" type="text" name="type" class="validate">
                <label for="type">Type d'études</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="description" type="text" name="description" class="validate">
                <label for="description">Description</label>
            </div>
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="action">Ajouter
            <i class="material-icons right">send</i>
        </button>
    </form>
</div>
</div>