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
                <li class="active"><a href="./projects.php">Projets</a></li>
                <li><a href="./professionalExperience.php">Experience Professionnelle</a></li>
                <li><a href="studies.php">Etudes</a></li>
                <li><a href="skills.php">Compétences</a></li>
                <li><a href="hobbies.php">Loisirs</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>
    </nav>

    <div class="text-align center">
        <h1>Projets</h1>
    </div>

    <div class="container">
        <div class="row s12">
            <?php
            $projects = getAllProject($pdo);
            foreach ($projects as $project)
            {
                ?>
            <div class="col s3">
                <div class="card sticky-action small s3">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="images/testdummy.jpeg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4"><?php echo $project['name']?><i class="material-icons right">more_vert</i></span>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4"><?php echo $project['name']?><i class="material-icons right">close</i></span>
                        <p><?php echo $project['description']?></p>
                    </div>

                </div>
            </div>
            <?php } ?>
        </div>


    </div>


<?php include_once"incs/footer.php" ?>