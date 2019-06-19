<?php

    function connectPdo ()
    {
        $database_host = 'localhost';
        $database_port = '3306';
        $database_dbname = 'cv';
        $database_user = 'root';
        $database_password = 'root';
        $database_charset = 'UTF8';
        $pdo = new PDO(
            'mysql:host=' . $database_host .
            ';port=' . $database_port .
            ';dbname=' . $database_dbname .
            ';charset=' . $database_charset,
            $database_user,
            $database_password
        );
        return $pdo;
    }

    /* Admin */
    function getAdmin ($pdo, $id)
{
    $query = 'SELECT lastName, firstName, birthDate, drivingLicense, phoneNumber, address, mail, gitHubLink, linkedInLink, password FROM administrator WHERE id = :id';
    $query = $pdo->prepare($query);
    $query->execute(['id' => $id]);
    return $query->fetch();
}

function verifyAdmin ($pdo, $mail, $password)
{
    $query = 'SELECT id, mail FROM administrator WHERE mail = :mail AND password = :password';
    $query = $pdo->prepare($query);
    $query->execute([
        'mail' => $mail,
        'password' => $password,
    ]);
    return (bool) $query->fetch();
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


/* Professional Experience */


function getProfessionalExperience ($pdo, $id)
{
    $query = 'SELECT startDate, endDate, company, job, description FROM professional_experience
WHERE id = :id';
    $query = $pdo->prepare($query);
    $query->execute(['id' => $id]);
    return $query->fetch();
}

function getAllProfessionalExperience  ($pdo)
{
    $query = 'SELECT id, startDate, endDate, company, job, description FROM professional_experience';
    $query = $pdo->prepare($query);
    $query->execute();
    return $query->fetchAll();
}

function addProfessionalExperience($pdo, $startDate, $endDate, $company, $job, $description)
{
    $query = 'INSERT INTO professional_experience(startDate, endDate, company, job, description) VALUES(:startDate, :endDate, :company, :job, :description)';
    $query = $pdo->prepare($query);
    $query->execute([
        'startDate' => $startDate,
        'endDate' => $endDate,
        'company' => $company,
        'job' => $job,
        'description' => $description
    ]);
}

function updateProfessionalExperience($pdo, $professionalExperienceId, $startDate, $endDate, $company, $job, $description)
{
    $query = '
                UPDATE professional_experience
            
                SET startDate = :startDate, 
                    endDate = :endDate,
                    company = :company, 
                    job = :job, 
                    description = :description
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
                DELETE FROM professional_experience
                WHERE id = :professionalExperienceId
            ';
    $query = $pdo->prepare($query);
    $query->execute(['professionalExperienceId' => $professionalExperienceId]);
}


/* Projects */


function getProject ($pdo, $id)
{
    $query = 'SELECT startDate, endDate, name, description, isSchool FROM project WHERE id = :id';
    $query = $pdo->prepare($query);
    $query->execute(['id' => $id]);
    return $query->fetch();
}

function getAllProject  ($pdo)
{
    $query = 'SELECT id, startDate, endDate, name, description, isSchool FROM project';
    $query = $pdo->prepare($query);
    $query->execute();
    return $query->fetchAll();
}


function addProject($pdo, $startDate, $endDate, $name, $description, $isSchool)
{
    $query = 'INSERT INTO project(startDate, endDate, name, description, isSchool) VALUES(:startDate, :endDate, :name, :description, :isSchool)';
    $query = $pdo->prepare($query);
    $query->execute([
        'startDate' => $startDate,
        'endDate' => $endDate,
        'name' => $name,
        'description' => $description,
        'isSchool' => $isSchool
    ]);
}

function updateProject($pdo, $projectId, $startDate, $endDate, $name, $description, $isSchool)
{
    $query = '
                UPDATE project
                SET startDate = :startDate, 
                    endDate = :endDate,
                    name = :name, 
                    description = :description, 
                    isSchool = :isSchool
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
    $query = 'DELETE FROM project
WHERE id = :projectId';
    $query = $pdo->prepare($query);
    $query->execute(['projectId' => $projectId]);
}


/* Project Type */



function getProjectType ($pdo, $id)
{
    $query = 'SELECT name FROM project_type WHERE id = :id';
    $query = $pdo->prepare($query);
    $query->execute(['id' => $id]);
    return $query->fetch();
}

function getAllProjectType  ($pdo)
{
    $query = 'SELECT id, name FROM project_type';
    $query = $pdo->prepare($query);
    $query->execute();
    return $query->fetchAll();
}

function addProjectType($pdo, $name)
{
    $query = 'INSERT INTO project_type(name) VALUES(:name)';
    $query = $pdo->prepare($query);
    $query->execute([
        'name' => $name
    ]);
}

function updateProjectType($pdo, $projectTypeId, $name)
{
    $query = '
                UPDATE project_type
                SET name = :name                    
                WHERE id = :projectTypeId
            ';
    $query = $pdo->prepare($query);
    $query->execute(['projectTypeId' => $projectTypeId,
        'name' => $name]);
}

function deleteProjectType ($pdo, $projectTypeId)
{
    $query = '
                DELETE FROM project_type
                WHERE id = :projectTypeId
            ';
    $query = $pdo->prepare($query);
    $query->execute(['projectTypeId' => $projectTypeId]);
}


/* Study */



function getStudy ($pdo, $id)
{
    $query = 'SELECT startDate, endDate, name, type, description FROM study WHERE id = :id';
    $query = $pdo->prepare($query);
    $query->execute(['id' => $id]);
    return $query->fetch();
}

function getAllStudies  ($pdo)
{
    $query = 'SELECT id ,startDate, endDate, name, type, description FROM study';
    $query = $pdo->prepare($query);
    $query->execute();
    return $query->fetchAll();
}

function addStudy($pdo, $startDate, $endDate, $name, $type, $description)
{
    $query = 'INSERT INTO study(startDate, endDate, name, type, description) VALUES(:startDate, :endDate, :name, :type, :description)';
    $query = $pdo->prepare($query);
    $query->execute([
        'startDate' => $startDate,
        'endDate' => $endDate,
        'name' => $name,
        'type' => $type,
        'description' => $description
    ]);
}



function updateStudy($pdo, $studyId, $startDate, $endDate, $name, $type, $description)
{
    $query = '
                UPDATE study
                SET startDate = :startDate, 
                    endDate = :endDate,
                    name = :name, 
                    type = :type, 
                    description = :description
                WHERE id = :studyId
            ';
    $query = $pdo->prepare($query);
    $query->execute(['studyId' => $studyId,
        'startDate' => $startDate,
        'endDate' => $endDate,
        'name' => $name,
        'type' => $type,
        'description' => $description]);
}

function deleteStudy ($pdo, $studyId)
{
    $query = '
                DELETE FROM study
                WHERE id = :studyId
            ';
    $query = $pdo->prepare($query);
    $query->execute(['studyId' => $studyId]);
}


/* Skill */



function getSkill ($pdo, $id)
{
    $query = 'SELECT name, level FROM skill WHERE id = :id';
    $query = $pdo->prepare($query);
    $query->execute(['id' => $id]);
    return $query->fetch();
}

function getAllSkills  ($pdo)
{
    $query = 'SELECT id, name, level FROM skill';
    $query = $pdo->prepare($query);
    $query->execute();
    return $query->fetchAll();
}


function addSkill($pdo, $name, $level)
{
    $query = 'INSERT INTO skill(name, level) VALUES(:name, :level)';
    $query = $pdo->prepare($query);
    $query->execute([
        'name' => $name,
        'level' => $level
    ]);
}


function updateSkill($pdo, $skillId, $name, $level)
{
    $query = '  UPDATE skill
                SET name = :name,
                    level = :level                   
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
                DELETE FROM skill
                WHERE id = :skillId
            ';
    $query = $pdo->prepare($query);
    $query->execute(['skillId' => $skillId]);
}


/* Skill Type */


function getSkillType ($pdo, $id)
{
    $query = 'SELECT id, name FROM skill_type WHERE id = :id';
    $query = $pdo->prepare($query);
    $query->execute(['id' => $id]);
    return $query->fetch();
}

function getAllSkillTypes  ($pdo)
{
    $query = 'SELECT id, name FROM skill_type';
    $query = $pdo->prepare($query);
    $query->execute();
    return $query->fetchAll();
}

function addSkillType ($pdo, $name)
{
    $query = 'INSERT INTO skill_type(name) VALUES(:name)';
    $query = $pdo->prepare($query);
    $query->execute([
        'name' => $name
    ]);
}


function updateSkillType($pdo, $skillTypeId, $name)
{
    $query = '  UPDATE skill_type
                SET name = :name                  
                WHERE id = :skillTypeId
            ';
    $query = $pdo->prepare($query);
    $query->execute(['skillTypeId' => $skillTypeId,
        'name' => $name]);
}

function deleteSkillType ($pdo, $skillTypeId)
{
    $query = '
                DELETE FROM skill_type
                WHERE id = :skillTypeId
            ';
    $query = $pdo->prepare($query);
    $query->execute(['skillTypeId' => $skillTypeId]);
}


/* Hobby */

function getHobby ($pdo, $id)
{
    $query = 'SELECT name FROM hobbies WHERE id = :id';
    $query = $pdo->prepare($query);
    $query->execute(['id' => $id]);
    return $query->fetch();
}

function getAllHobbies  ($pdo)
{
    $query = 'SELECT id, name FROM hobbies';
    $query = $pdo->prepare($query);
    $query->execute();
    return $query->fetchAll();
}

function addHobby ($pdo, $name)
{
    $query = 'INSERT INTO hobbies(name) VALUES(:name)';
    $query = $pdo->prepare($query);
    $query->execute([
        'name' => $name
    ]);
}


function updateHobbies($pdo, $hobbyId, $name)
{
    $query = '  UPDATE hobbies
                SET name = :name                  
                WHERE id = :hobbyId
            ';
    $query = $pdo->prepare($query);
    $query->execute(['hobbyId' => $hobbyId,
        'name' => $name]);
}

function deleteHobby ($pdo, $hobbyId)
{
    $query = '
                DELETE FROM hobbies
                WHERE id = :hobbyId
            ';
    $query = $pdo->prepare($query);
    $query->execute(['hobbyId' => $hobbyId]);
}

/* Mail */


function getMail ($pdo, $id)
{
    $query = 'SELECT email, content, firstName, lastName, sendDate, object FROM mail WHERE id = :id';
    $query = $pdo->prepare($query);
    $query->execute(['id' => $id]);
    return $query->fetch();
}

function getAllMails ($pdo)
{
    $query = 'SELECT id, email, content, firstName, lastName, sendDate, object FROM mail';
    $query = $pdo->prepare($query);
    $query->execute();
    return $query->fetchAll();
}


function addMail ($pdo, $email, $content, $firstName, $lastName, $sendDate, $object)
{
    $query = 'INSERT INTO mail(email, content, firstName, lastName, sendDate, object) VALUES(:email, :content, :firstName, :lastName, :sendDate, :object)';
    $query = $pdo->prepare($query);
    $query->execute([
        'email' => $email,
        'content' => $content,
        'firstName' => $firstName,
        'lastName' => $lastName,
        'sendDate' => $sendDate,
        'object' => $object
    ]);
}


function deleteMail ($pdo, $mailId)
{
    $query = '
                DELETE FROM mail
                WHERE id = :mailId
            ';
    $query = $pdo->prepare($query);
    $query->execute(['mailId' => $mailId]);
}

