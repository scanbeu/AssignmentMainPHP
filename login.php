<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';

    $name = $_POST['name'];
    $enteredPassword = $_POST['password'];

    $sql = "SELECT * FROM `account` WHERE name='$name'";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die("Query failed: " . mysqli_error($con));
    }

    $num = mysqli_num_rows($result);

    if ($num > 0) {
        $row = mysqli_fetch_assoc($result);
        $storedHashedPassword = $row['password'];

        // Verify the entered password with the stored hashed password
        if (password_verify($enteredPassword, $storedHashedPassword)) {
            $_SESSION['name'] = $name;
            header('Location: welcome.php'); // Redirect to welcome.php
            exit(); // Ensure that no further code is executed after the header
        } else {
            echo "Invalid credentials";
        }
    } else {
        echo "User not found";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Login page</title>
</head>
<body>

    <?php include 'templates/header.php'; ?>

    <section class="section1">
        <div class="polaroid1 pop-element">
            <img src="img/polaroid2.png" alt="">
        </div>
            <div class="section1_1">
                <h1 class="pop-element">Log in back</h1><br>
                <!-- <h2>Capture your <br> Moments</h2> -->
                <div class="form-container">
                    <form action="./display.php" method="POST" enctype="multipart/form-data">
                        <!-- <h2>Sign In</h2> -->

                        <label for="name">Username:</label>
                        <input type="text" name="name" placeholder="Username" required><br>

                        <label for="password">Password:</label>
                        <input type="password" name="password" placeholder="Password" required>

                        <button type="submit">Log In</button>
                    </form>
                </div>
            </div>
    </section>

   

    <?php include 'templates/footer.php'; ?>

</body>
</html>





