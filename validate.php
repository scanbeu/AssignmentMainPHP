<link rel="stylesheet" href="css/style.css" type="text/css">
<header>
    <?php
    require 'include/globalheader.php';
    ?>
</header>
<?php
    // Retrieve input and hash the password
    $username = $_POST['username'];
    $password = hash('sha512', $_POST['password']);

    require 'database.php';

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT Employee_ID, password FROM employee_data WHERE username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    
    // Fetch the results
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {

        // Verify the hashed password
        if (hash_equals($row['password'], $password)) {
            // Start the session and set the Employee_ID
            session_start();
            $_SESSION['Employee_ID'] = $row['Employee_ID'];
            header('Location: display-person.php');
        } else {
            // If passwords don't match, display an error message
            echo '<p class="Invalid-login-msg">Invalid Password</p>';
        }
    } else {
        // If username not found, display an error message
        echo '<p class="Invalid-login-msg">Invalid Username</p>';
    }


    $conn = null;

    require 'include/globalfooter.php';
?>