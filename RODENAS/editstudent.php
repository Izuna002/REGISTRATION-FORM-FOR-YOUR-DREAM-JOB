<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		body {
			font-family: "Arial";
		}
		input {
			font-size: 1.5em;
			height: 50px;
			width: 200px;
		}
		table, th, td {
		  border:1px solid black;
		}
	</style>
</head>
<body>
	<?php $getStudentById = getStudentById($pdo, $_GET['id']); ?>
	<form action="core/handleForms.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">  <p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstName" value="<?php echo $getStudentById['first_name']; ?>">
		</p>
		<p>
			<label for="lastName">Last Name</label> 
			<input type="text" name="lastName" value="<?php echo $getStudentById['last_name']; ?>">
		</p>
		<p>
			<label for="gender">Gender</label>
			<input type="text" name="gender" value="<?php echo $getStudentById['gender']; ?>">
		</p>
		<p>
			<label for="age">Age</label>
			<input type="text" name="age" value="<?php echo $getStudentById['age']; ?>">
		</p>
		<p>
			<label for="email">Email</label>
			<input type="text" name="email" value="<?php echo $getStudentById['email']; ?>">
		</p>
		<p>
			<label for="city">City</label>
			<input type="text" name="city" value="<?php echo $getStudentById['city']; ?>"></p>
		<p>
			<label for="regDate">Registration Date</label>
			<input type="text" name="regDate" value="<?php echo $getStudentById['regDate']; ?>">
			<input type="submit" name="editStudentBtn">
		</p>
	</form>
</body>
</html>