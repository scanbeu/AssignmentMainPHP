<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['name'])) {
    // Redirect to login page if not logged in
    header('Location: login.php');
    exit();
}

// Logout logic
if (isset($_POST['logout'])) {
    session_destroy(); // Destroy the session
    header('Location: index.php'); // Redirect to login page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Welcome page</title>
</head>
<body>

    <?php include 'templates/header.php'; ?>
    <!-- Welcome message and other content -->
    <h2>Welcome, <?php echo $_SESSION['name']; ?>!</h2>
    <p>This is your welcome page content.</p>

    <!-- Logout button -->
    <form method="post" action="">
        <button type="submit" name="logout">Logout</button>
    </form>
    <?php include 'templates/footer.php'; ?>
</body>
</html>
