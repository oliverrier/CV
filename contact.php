<?php include_once"incs/head.php" ?>
<?php include_once"incs/header.php" ?>

<nav class="orange darken-3">
    <div class="nav-wrapper">
        <a href="index.php" class="brand-logo">Olivier Verrier</a>
        <ul class="right hide-on-med-and-down ">
            <li><a href="./projects.php">Projets</a></li>
            <li><a href="./professionalExperience.php">Experience Professionnelle</a></li>
            <li><a href="./studies.php">Etudes</a></li>
            <li><a href="skills.php">Compétences</a></li>
            <li><a href="hobbies.php">Loisirs</a></li>
            <li class="active"><a href="contact.php">Contact</a></li>
        </ul>
    </div>
</nav>


<div class="container">
    <h1 class="text-align center">
        Contact
    </h1>

    <div class="row">
        <form class="col s12">
            <div class="row">
                <div class="input-field col s6">
                    <input id="first_name" type="text" class="validate">
                    <label for="first_name">First Name</label>
                </div>
                <div class="input-field col s6">
                    <input id="last_name" type="text" class="validate">
                    <label for="last_name">Last Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="email" type="email" class="validate">
                    <label for="email">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="object" type="text" class="validate">
                    <label for="object">Objet</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="mail" class="materialize-textarea"></textarea>
                    <label for="mail">Mail</label>
                </div>
            </div>
        </form>
    </div>
</div>



<?php include_once"incs/footer.php" ?>
