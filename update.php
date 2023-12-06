<?php

include 'connect.php'; 

$id = $_GET['updateid'];
$sql = "Select *from `account` where id=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$name = $row['name'];
$email = $row['email'];
$mobile = $row['mobile'];
$password = $row['password'];

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $sql="update `account` set id='$id', name='$name', email= '$email', password='$password'
    where id=$id";
    $result = mysqli_query($con, $sql);

    if($result) {
        echo "Updated succesfully";
    }else{
        die(mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <title>User Registration Form</title>
</head>
<body>
    <?php

    include 'templates/header.php'; 

    ?>

    <div class="form-container">
        <h2>User Registration Form</h2>

        <form method="POST">
           
            <!-- Name -->
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value=<?php echo $name;?> required><br>

            <!-- Email -->
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value=<?php echo $email;?> required><br>

            <!-- Mobile -->
            <label for="mobile">Mobile:</label>
            <input type="tel" id="mobile" name="mobile" value=<?php echo $mobile;?> required><br>

            <!-- Password -->
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value=<?php echo $password;?>  required><br>
            
            <!-- Image -->
            <label for="image">Image:</label>
            <input type="file" id="image" name="image"><br>


            <!-- Submit Button -->
            <input type="submit" name="submit" href="display.php" value="Update">
        </form>
    </div>

    <?php

    include 'templates/footer.php'; 

    ?>

</body>
</html>
