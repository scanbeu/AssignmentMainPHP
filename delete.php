<?php
    require 'database.php';

    if (isset($_GET['id'])) {
        $Employee_ID = $_GET['id'];

        $sql = "DELETE FROM employee_data WHERE Employee_ID = :Employee_ID";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':Employee_ID', $Employee_ID);

        if ($stmt->execute()) {
            header('Location: display-person.php');
        } else {
            echo "Deletion failed";
        }
    } else {
        echo "Employee ID not provided";
    }
?>