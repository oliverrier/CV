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
$company = $_POST['company'] ?? false;
$job = $_POST['job'] ?? false;
$description = $_POST['description'] ?? false;

if ($startDate && $endDate && $company && $job && $description)
{
    addProfessionalExperience($pdo, $startDate, $endDate, $company, $job, $description);
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
        Admin Expérience Professionelle
    </h1>




    <table>
        <thead>
        <tr>
            <th>Date Début</th>
            <th>Date Fin</th>
            <th>Entreprise</th>
            <th>Poste</th>
            <th>Description</th>
        </tr>
        </thead>

        <?php
        $professionalExperiences = getAllProfessionalExperience($pdo);
        foreach ($professionalExperiences as $professionalExperience)
        {
        ?>
        <tbody>
        <tr>
            <td><?php echo $professionalExperience['startDate']?></td>
            <td><?php echo $professionalExperience['endDate']?></td>
            <td><?php echo $professionalExperience['company']?></td>
            <td><?php echo $professionalExperience['job']?></td>
            <td><?php echo $professionalExperience['description']?></td>
            <td>
                <a href="professionalExperience/editProfessionalExperience.php?id=<?php echo $professionalExperience['id']; ?>">
                    <button class="btn waves-effect waves-light orange darken-3" type="submit" name="action">Editer
                    <i class="material-icons right">create</i>
                    </button>
                </a>
            </td>
            <td>
                <a href="professionalExperience/deleteProfessionalExperience.php?id=<?php echo $professionalExperience['id']; ?>"><button class="btn waves-effect waves-light orange darken-3" type="submit" name="action">Supprimer
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
                <input id="company" type="text" name="company">
                <label for="company">Nom de l'entreprise</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="job" type="text" name="job" class="validate">
                <label for="job">Intitulé du poste</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="description" type="text" name="description" class="validate">
                <label for="description">Description de l'entreprise</label>
            </div>
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="action">Ajouter
            <i class="material-icons right">send</i>
        </button>
    </form>
</div>
</div>