<?php

include 'connect.php';

if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $image = $_FILES['file'];

    // Hash the password using password_hash
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $imagefilename = $image['name'];
    $imagefileerror = $image['error'];
    $imagefiletemp = $image['tmp_name'];

    $filename_separate = explode('.', $imagefilename);
    $file_extension = strtolower(end($filename_separate));

    $extension = array('jpeg', 'jpg', 'png');

      if (in_array($file_extension, $extension)) {
            $upload_image = 'images/' . $imagefilename;
            move_uploaded_file($imagefiletemp, $upload_image);
            $sql = "INSERT INTO `account` (name, email, mobile, password, cpassword, image) VALUES ('$name','$email', '$mobile', '$hashedPassword', '$cpassword','$upload_image')";
            $result = mysqli_query($con, $sql);

            if ($result) {
                echo "Data inserted successfully";
            } else {
                die(mysqli_error($con));
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Register/title>
</head>
<body>

    <?php include 'templates/header.php'; ?>

    <div class="form-container">
        <!-- Sign Up Form -->
        <form action="signup.php" method="POST" enctype="multipart/form-data">
            <h2>Sign Up</h2>

            <!-- Name -->
            <label for="name">Username:</label>
            <input type="text" name="name" placeholder="Username" required><br>

            <!-- Email -->
            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="Email" required><br>

            <!-- Mobile -->
            <label for="mobile">Mobile:</label>
            <input type="tel" id="mobile" name="mobile" required="required" maxlength="10" minlength="10"><br>

            <!-- Password -->
            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Password" required><br>

            <!-- Confirm Password -->
            <label for="cpassword">Confirm Password:</label>
            <input type="password" name="cpassword" placeholder="Password" required>

            <!-- Image -->
            <label for="image">Image:</label>
            <input type="file" id="image" name="file"><br>

            <!-- Sign up -->
            <button type="submit" name="signup">Sign Up</button><br>
        </form>
    </div>

    <?php include 'templates/footer.php'; ?>

</body>
</html>
