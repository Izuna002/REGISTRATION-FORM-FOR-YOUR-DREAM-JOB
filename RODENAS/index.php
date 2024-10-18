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
	<h3>Welcome to the Job Application Form. Input your details here to register</h3>
	<form action="core/handleForms.php" method="POST">
		<p><label for="firstName">First Name</label> <input type="text" name="firstName"></p>
		<p><label for="lastName">Last Name</label> <input type="text" name="lastName"></p>
		<p><label for="gender">Gender</label> <input type="text" name="gender"></p>
		<p><label for="age">Age</label> <input type="text" name="age"></p>
		<p><label for="email">Email</label> <input type="text" name="email"></p>
		<p><label for="city">City</label> <input type="text" name="city"></p>
		<p><label for="regDate">Registration Date</label> <input type="text" name="regDate">
			<input type="submit" name="insertNewStudentBtn">
		</p>
	</form>

	<table style="width:50%; margin-top: 50px;">
	  <tr>
	    <th>ID</th>
	    <th>First Name</th>
	    <th>Last Name</th>
	    <th>Gender</th>
	    <th>Age</th>
	    <th>Email</th>
	    <th>City</th>
	    <th>Registration Date</th>
	  </tr>

	  <?php $seeAllStudentRecords = seeAllStudentRecords($pdo); ?>
	  <?php foreach ($seeAllStudentRecords as $row) { ?>
	  <tr>
	  	<td><?php echo $row['id']; ?></td>
	  	<td><?php echo $row['first_name']; ?></td>
	  	<td><?php echo $row['last_name']; ?></td>
	  	<td><?php echo $row['gender']; ?></td>
	  	<td><?php echo $row['age']; ?></td>
	  	<td><?php echo $row['email']; ?></td>
	  	<td><?php echo $row['city']; ?></td>
	  	<td><?php echo $row['regDate']; ?></td>
	  	<td>
	  		<a href="editstudent.php?id=<?php echo $row['id'];?>">Edit</a>
	  		<a href="deletestudent.php?id=<?php echo $row['id'];?>">Delete</a>
	  	</td>
	  </tr>
	  <?php } ?>
	</table>



</body>
</html>