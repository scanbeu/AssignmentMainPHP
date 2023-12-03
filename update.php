<?php
    require 'database.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $Employee_ID = $_POST['Employee_ID'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $hoursworked = $_POST['hoursworked'];
        $department = $_POST['department'];
        $username = $_POST['username'];
        // Retrieve other fields similarly

        // Update query to modify employee details
        $sql = "UPDATE employee_data SET fname = :fname, lname = :lname, email = :email, hoursworked = :hoursworked, department = :department, Employee_ID = :Employee_ID, username = :username WHERE Employee_ID = :Employee_ID";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname', $lname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':hoursworked', $hoursworked);
        $stmt->bindParam(':department', $department);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':Employee_ID', $Employee_ID);

        // Bind and execute other fields for update

        if ($stmt->execute()) {
            header('Location: display-person.php');
        } else {
            echo "Update failed";
        }
    }
?>