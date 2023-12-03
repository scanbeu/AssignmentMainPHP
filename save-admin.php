<?php
	// connection
	require 'database.php';
	// variables
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$Employee_ID = $_POST['Employee_ID'];
	$age = $_POST['age'];
	$email = $_POST['email'];
	$department = $_POST['department'];
	$hoursworked = $_POST['hoursworked'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	// validate inputs
	$ok = true;
	require 'include/globalheader.php';
		if (empty($fname)) {
			echo '<p>First name required</p>';
			$ok = false;
		}
		if (empty($lname)) {
			echo '<p>Last name required</p>';
			$ok = false;
		}
		if (empty($username)) {
			echo '<p>Username required</p>';
			$ok = false;
		}
		if (empty($password)) {
			echo '<p>Invalid passwords</p>';
			$ok = false;
		}
	// decide if we are saving or not
	if ($ok){

		$hashed_password = hash('sha512', $password);
        $sql = "INSERT INTO employee_data (fname, lname, Employee_ID, age, hoursworked, department, email, username, password) 
        VALUES (:fname, :lname, :Employee_ID, :age, :hoursworked, :department, :email, :username, :password)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname', $lname);
		$stmt->bindParam(':Employee_ID', $Employee_ID);
		$stmt->bindParam(':age', $age);
		$stmt->bindParam(':hoursworked', $hoursworked);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':department', $department);
		$stmt->bindParam(':username', $username);
		
        // ... bind other parameters
        
        $stmt->bindParam(':password', $hashed_password);
        $stmt->execute();


        echo '<section class="success-row">';
        echo '<div>';
        echo '<h3>Admin Saved</h3>';
        echo '</div>';
        echo '</section>';
        header("Location: signin.php");
    }
    ?>
    <?php require 'include/globalfooter.php'; ?>
