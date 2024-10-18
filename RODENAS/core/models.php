<!-- Functions for interacting with the database -->

<?php 

require_once 'dbConfig.php';

function insertIntoStudentRecords($pdo,$first_name, $last_name, $gender, $age, $email, $city, $regDate) {

	$sql = "INSERT INTO user_records (first_name,last_name,gender,age,email,city,regDate) VALUES (?,?,?,?,?,?,?)";

	$stmt = $pdo->prepare($sql);

	$executeQuery = $stmt->execute([$first_name, $last_name, $gender, $age, 
		$email, $city, $regDate]);

	if ($executeQuery) {
		return true;	
	}
}

function seeAllStudentRecords($pdo) {
	$sql = "SELECT * FROM user_records";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getStudentByID($pdo, $id) {
	$sql = "SELECT * FROM user_records WHERE id = ?";
	$stmt = $pdo->prepare($sql);
	if ($stmt->execute([$id])) {
		return $stmt->fetch();
	}
}

function updateAStudent($pdo, $id, $first_name, $last_name, 
	$gender, $age, $email, $city, $regDate) {

	$sql = "UPDATE user_records 
				SET first_name = ?, 
					last_name = ?, 
					gender = ?, 
					age = ?, 
					email = ?, 
					city = ?, 
					regDate = ? 
			WHERE id = ?";
	$stmt = $pdo->prepare($sql);
	
	$executeQuery = $stmt->execute([$first_name, $last_name, $gender, 
		$age, $email, $city, $regDate, $id]);

	if ($executeQuery) {
		return true;
	}
}



function deleteAStudent($pdo, $id) {

	$sql = "DELETE FROM user_records WHERE id = ?";
	$stmt = $pdo->prepare($sql);

	$executeQuery = $stmt->execute([$id]);

	if ($executeQuery) {
		return true;
	}

}




?>