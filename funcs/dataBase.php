<?php

    function connectPdo ()
    {
        $database_host = 'localhost';
        $database_port = '3306';
        $database_dbname = 'cv';
        $database_user = 'root';
        $database_password = 'root';
        $database_charset = 'UTF8';
        $database_options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];
        $pdo = new PDO(
            'mysql:host=' . $database_host .
            ';port=' . $database_port .
            ';dbname=' . $database_dbname .
            ';charset=' . $database_charset,
            $database_user,
            $database_password,
            $database_options
        );
        return $pdo;
    }

    function getAdmin ($pdo, $id)
{
    $query = 'SELECT lastName, firstName, birthDate, drivingLicense, phoneNumber, address, mail, gitHubLink, linkedInLink, password FROM administrator WHERE id = :id';
    $query = $pdo->prepare($query);
    $query->execute(['id' => $id]);
    return $query->fetch();
}

function getAllAdmin ($pdo)
{
    $query = 'SELECT lastName, firstName, birthDate, drivingLicense, phoneNumber, address, mail, gitHubLink, linkedInLink, password FROM administrator';
    $query = $pdo->prepare($query);
    $query->execute();
    return $query->fetchAll();
}

function updateAdmin($pdo, $administratorId, $lastName, $firstName, $birthDate, $drivingLicense, $phoneNumber, $address, $mail, $gitHubLink, $linkedInLink, $password)
{
    $query = '
                UPDATE administrator
                SET lastName = :lastName, 
                    firstName = :firstName,
                    birthDate = :birthDate, 
                    drivingLicense = :drivingLicense, 
                    phoneNumber = :phoneNumber, 
                    address = :address, 
                    mail = :mail,
                    gitHubLink = :gitHubLink, 
                    linkedInLink = :linkedInLink
                    password = :password
                WHERE id = :administratorId
            ';
    $query = $pdo->prepare($query);
    $query->execute(['administratorId' => $administratorId,
        'lastName' => $lastName,
        'firstName' => $firstName,
        'birthDate' => $birthDate,
        'drivingLicense' => $drivingLicense,
        'phoneNumber' => $phoneNumber,
        'address' => $address,
        'mail' => $mail,
        'gitHubLink' => $gitHubLink,
        'linkedInLink' => $linkedInLink,
        'password' => $password]);
}

function deleteAdmin ($pdo, $user_id)
{
    $query = '
                DELETE FROM user
                WHERE id = :user_id
            ';
    $query = $pdo->prepare($query);
    $query->execute(['user_id' => $user_id]);
}

function getProfessionalExperience ($pdo, $id)
{
    $query = 'SELECT startDate, endDate, company, job, description FROM professionnalexperience WHERE id = :id';
    $query = $pdo->prepare($query);
    $query->execute(['id' => $id]);
    return $query->fetch();
}

function getAllProfessionalExperience  ($pdo)
{
    $query = 'SELECT startDate, endDate, company, job, description FROM professionnalexperience';
    $query = $pdo->prepare($query);
    $query->execute();
    return $query->fetchAll();
}

function updateProfessionalExperience($pdo, $professionalExperienceId, $startDate, $endDate, $company, $job, $description)
{
    $query = '
                UPDATE professionnalexperience
                SET startDate = :startDate, 
                    endDate = :endDate,
                    company = :company, 
                    job = :job, 
                    description = :description, 
                WHERE id = :professionalExperienceId
            ';
    $query = $pdo->prepare($query);
    $query->execute(['professionalExperienceId' => $professionalExperienceId,
        'startDate' => $startDate,
        'endDate' => $endDate,
        'company' => $company,
        'job' => $job,
        'description' => $description]);
}

function deleteProfessionalExperience ($pdo, $professionalExperienceId)
{
    $query = '
                DELETE FROM professionalexperience
                WHERE id = :professionalExperienceId
            ';
    $query = $pdo->prepare($query);
    $query->execute(['professionalExperienceId' => $professionalExperienceId]);
}

function getProject ($pdo, $id)
{
    $query = 'SELECT startDate, endDate, name, description, isSchool FROM project WHERE id = :id';
    $query = $pdo->prepare($query);
    $query->execute(['id' => $id]);
    return $query->fetch();
}

function getAllProject  ($pdo)
{
    $query = 'SELECT startDate, endDate, name, description, isSchool FROM project';
    $query = $pdo->prepare($query);
    $query->execute();
    return $query->fetchAll();
}

function updateProject($pdo, $projectId, $startDate, $endDate, $name, $description, $isSchool)
{
    $query = '
                UPDATE project
                SET startDate = :startDate, 
                    endDate = :endDate,
                    name = :name, 
                    description = :description, 
                    isSchool = :isSchool, 
                WHERE id = :projectId
            ';
    $query = $pdo->prepare($query);
    $query->execute(['projectId' => $projectId,
        'startDate' => $startDate,
        'endDate' => $endDate,
        'name' => $name,
        'description' => $description,
        'isSchool' => $isSchool]);
}

function deleteProject ($pdo, $projectId)
{
    $query = '
                DELETE FROM project
                WHERE id = :projectId
            ';
    $query = $pdo->prepare($query);
    $query->execute(['projectId' => $projectId]);
}

function getProjectType ($pdo, $id)
{
    $query = 'SELECT name FROM projecttype WHERE id = :id';
    $query = $pdo->prepare($query);
    $query->execute(['id' => $id]);
    return $query->fetch();
}

function getAllProjectType  ($pdo)
{
    $query = 'SELECT name FROM projecttype';
    $query = $pdo->prepare($query);
    $query->execute();
    return $query->fetchAll();
}

function updateProjectType($pdo, $projectTypeId, $name)
{
    $query = '
                UPDATE project
                SET name = :name,                     
                WHERE id = :projectId
            ';
    $query = $pdo->prepare($query);
    $query->execute(['projectTypeId' => $projectTypeId,
        'name' => $name]);
}

function deleteProjectType ($pdo, $projectTypeId)
{
    $query = '
                DELETE FROM project
                WHERE id = :projectTypeId
            ';
    $query = $pdo->prepare($query);
    $query->execute(['projectTypeId' => $projectTypeId]);
}

function getStudy ($pdo, $id)
{
    $query = 'SELECT startDate, endDate, name, type, description FROM schoolexperience WHERE id = :id';
    $query = $pdo->prepare($query);
    $query->execute(['id' => $id]);
    return $query->fetch();
}

function getAllStudies  ($pdo)
{
    $query = 'SELECT startDate, endDate, name, type, description FROM schoolexperience';
    $query = $pdo->prepare($query);
    $query->execute();
    return $query->fetchAll();
}

function updateStudy($pdo, $schoolExperienceId, $startDate, $endDate, $name, $type, $description)
{
    $query = '
                UPDATE schoolexperience
                SET startDate = :startDate, 
                    endDate = :endDate,
                    name = :name, 
                    type = :type, 
                    description = :description, 
                WHERE id = :schoolExperienceId
            ';
    $query = $pdo->prepare($query);
    $query->execute(['schoolExperienceId' => $schoolExperienceId,
        'startDate' => $startDate,
        'endDate' => $endDate,
        'name' => $name,
        'type' => $type,
        'description' => $description]);
}

function deleteStudy ($pdo, $schoolExperienceId)
{
    $query = '
                DELETE FROM schoolexperience
                WHERE id = :schoolExperienceId
            ';
    $query = $pdo->prepare($query);
    $query->execute(['schoolExperienceId' => $schoolExperienceId]);
}

function getSkill ($pdo, $id)
{
    $query = 'SELECT name, level FROM skills WHERE id = :id';
    $query = $pdo->prepare($query);
    $query->execute(['id' => $id]);
    return $query->fetch();
}

function getAllSkills  ($pdo)
{
    $query = 'SELECT name, level FROM skills';
    $query = $pdo->prepare($query);
    $query->execute();
    return $query->fetchAll();
}

function updateSkill($pdo, $skillId, $name, $level)
{
    $query = '  UPDATE skills
                SET name = :name,
                    level = :level,                   
                WHERE id = :skillId
            ';
    $query = $pdo->prepare($query);
    $query->execute(['skillId' => $skillId,
        'name' => $name,
        'level' => $level]);
}

function deleteSkill ($pdo, $skillId)
{
    $query = '
                DELETE FROM project
                WHERE id = :skillId
            ';
    $query = $pdo->prepare($query);
    $query->execute(['skillId' => $skillId]);
}

