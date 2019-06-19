<?php

include '../../funcs/dataBase.php';
include '../../funcs/tools.php';

useSession();
$pdo = connectPdo();

$professionalExperienceId = $_GET['id'];

if (empty($_SESSION['admin'])){
    header('Location: ../../login.php');
    exit();
}

if ($professionalExperienceId === false){
    header('Location: ../admin.php');
    exit();
}

$professionalExperience = getProfessionalExperience($pdo, $professionalExperienceId);

$startDate = $_POST['startDate'] ?? false;
$endDate = $_POST['endDate'] ?? false;
$company = $_POST['company'] ?? false;
$job = $_POST['job'] ?? false;
$description = $_POST['description'] ?? false;


if ($startDate && $endDate && $company && $job && $description)
{
    updateprofessionalExperience($pdo, $professionalExperienceId, $startDate, $endDate, $company, $job, $description);
    header('Location: ../professionalExperience.php');
}

?>

<?php include_once '../../incs/head.php'; ?>
<?php include_once '../../incs/header.php'; ?>

<div class="container">
    <h1 class="texte-align center">
        Admin Expérience Professionelle
    </h1>

    <form class="col s12 m3" action="" method="POST">
        <div class="row">
            <div class="input-field col s6">
                <input id="startDate" type="text" name="startDate" value= "<?php echo $professionalExperience['startDate'];?>">
                <label for="startDate">Date début</label>
            </div>
            <div class="input-field col s6">
                <input id="endDate" type="text" name="endDate" value= "<?php echo $professionalExperience['endDate'];?>">
                <label for="endDate">Date Fin</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="company" type="text" name="company" value= "<?php echo $professionalExperience['company'];?>">
                <label for="company">Nom de l'entreprise</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="job" type="text" name="job" class="validate" value= "<?php echo $professionalExperience['job'];?>">
                <label for="job">Intitulé du poste</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="description" type="text" name="description" class="validate" value= "<?php echo $professionalExperience['description'];?>">
                <label for="description">Description du travail</label>
            </div>
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="action">Modifier
            <i class="material-icons right">send</i>
        </button>
    </form>
</div>