<?php

include '../funcs/dataBase.php';
include '../funcs/tools.php';

useSession();



if (empty($_SESSION['admin'])){
    header('Location: ../login.php');
    exit();
}

$pdo = connectPdo();

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
        Admin Mail
    </h1>




    <table>
        <thead>
        <tr>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Objet</th>
            <th>Contenu</th>
            <th>Date d'envoi</th>
        </tr>
        </thead>

        <?php
        $mails = getAllMails($pdo);
        foreach ($mails as $mail)
        {
        ?>
        <tbody>
        <tr>
            <td><?php echo $mail['firstName']?></td>
            <td><?php echo $mail['lastName']?></td>
            <td><?php echo $mail['email']?></td>
            <td><?php echo $mail['object']?></td>
            <td><?php echo $mail['content']?></td>
            <td><?php echo $mail['sendDate']?></td>

            <td>
                <a href="mail/deleteMail.php?id=<?php echo $mail['id']; ?>"><button class="btn waves-effect waves-light orange darken-3" type="submit" name="action">Supprimer
                    <i class="material-icons right">clear</i>
                </button></a>
            </td>
        </tr>

        </tbody>
        <?php } ?>
    </table>

</div>