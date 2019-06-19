<?php

include 'funcs/dataBase.php';
include 'funcs/tools.php';

useSession();

$pdo = connectPdo();

?>


<?php include_once"incs/head.php" ?>
<?php include_once"incs/header.php" ?>

    <nav class="orange darken-3">
        <div class="nav-wrapper">
            <a href="index.php" class="brand-logo">Olivier Verrier</a>
            <ul class="right hide-on-med-and-down ">
                <li><a href="./projects.php">Projets</a></li>
                <li><a href="./professionalExperience.php">Experience Professionnelle</a></li>
                <li class="active"><a href="./studies.php">Etudes</a></li>
                <li><a href="skills.php">Compétences</a></li>
                <li><a href="hobbies.php">Loisirs</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1 class="text-align center">
            Etudes
        </h1>

        <div class="row">
            <div class="col s12 m6 ">
            <?php
            $studies = getAllStudies($pdo);
            foreach ($studies as $study)
            {
                ?>
                <div class="card grey darken-4">
                    <div class="card-content white-text">
                        <span class="card-title"><?php echo $study['name']?></span>
                        <p><?php echo $study['description']?></p>
                    </div>
                    <div class="card-action">
                        <a href="#">This is a link</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

    </div>


<?php include_once"incs/footer.php" ?>