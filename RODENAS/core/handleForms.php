<?php

require_once 'dbConfig.php';
require_once 'models.php';

if (isset($_POST['insertNewStudentBtn'])) {
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $gender = trim($_POST['gender']);
    $age = trim($_POST['age']);
    $email = trim($_POST['email']);
    $city = trim($_POST['city']);
    $regDate = trim($_POST['regDate']);

    if (!empty($firstName) && !empty($lastName) && !empty($gender) && !empty($age) && !empty($email) && !empty($city) && !empty($regDate)) {
        $query = insertIntoStudentRecords($pdo, $firstName, $lastName, $gender, $age, $email, $city, $regDate);

        if ($query) {
            header("Location: ../index.php");
        } else {
            echo "Insertion failed";
        }
    } else {
        echo "Make sure that no fields are empty";
    }

}


if (isset($_POST['editStudentBtn'])) {
    $id = intval($_POST['id']);  // Get the id from $_POST
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $gender = trim($_POST['gender']);
    $age = trim($_POST['age']);
    $email = trim($_POST['email']);
    $city = trim($_POST['city']);
    $regDate = trim($_POST['regDate']);

    if (!empty($id) && !empty($firstName) && !empty($lastName) && !empty($gender) && !empty($age) && !empty($email) && !empty($city) && !empty($regDate)) {

        $query = updateAStudent($pdo, $id, $firstName, $lastName, $gender, $age, $email, $city, $regDate);

        if ($query) {
            header("Location: ../index.php");
        } else {
            echo "Update failed";
        }

    } else {
        echo "Make sure that no fields are empty";
    }

}


if (isset($_POST['deleteStudentBtn'])) {
    $id = intval($_GET['id']); 
    $query = deleteAStudent($pdo, $id);

    if ($query) {
        header("Location: ../index.php");
    } else {
        echo "Deletion failed";
    }
}

?>