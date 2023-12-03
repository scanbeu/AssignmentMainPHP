<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" >
  	<link rel="stylesheet" href="css/style.css">
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" ></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
	<?php
    echo '<header>';
    require 'include/globalheader.php';
    echo '</header>';
    session_start();
    if (!isset($_SESSION['Employee_ID'])) {
        header('location:signin.php');
        exit();
    } else {
        require 'database.php';
        $sql = "SELECT * FROM employee_data";
        $result = $conn->query($sql);
        
        echo '<section class="person-row">';
        echo '<table class="table table-striped">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Age</th>
                        <th>Email</th>
                        <th>Employee ID</th>
                        <th>Department</th>
                        <th>Hours Worked</th>
						<th>Username</th>
                        <th colspan="2"></th>
                    </tr>';

        foreach ($result as $row) {
            echo '<tr>
                        <td>' . $row['fname']  . '</td>
                        <td>' . $row['lname']  . '</td>
                        <td>' . $row['age']    . '</td>
                        <td>' . $row['email']  . '</td>
                        <td>' . $row['Employee_ID']  . '</td>
                        <td>' . $row['department']  . '</td>
                        <td>' . $row['hoursworked']    . '</td>
						<td>' . $row['username'] . '</td>
                        <td><a class="btn btn-primary" href="edit.php?id=' . $row['Employee_ID'] . '">Edit</a></td>
                        <td><a class="btn btn-danger" href="delete.php?id=' . $row['Employee_ID'] . '">Delete</a></td>
                    </tr>';
        }
        
        echo '</table>';
        echo '<a class="btn btn-warning" href="logout.php">Logout</a>';
        echo '</section>';
        $conn = null;
    }
    echo '<footer>';
    require 'include/globalfooter.php';
    echo '</footer>';
?>

