<link rel="stylesheet" href="css/style.css" type="text/css">

<?php
echo '<header>';
    require 'include/globalheader.php';
    echo '</header>';
    session_start();
    require 'database.php';

    // Check if Employee_ID is passed in the URL
    if (isset($_GET['id'])) {
        $Employee_ID = $_GET['id'];

        // Fetch employee data based on Employee_ID
        $sql = "SELECT * FROM employee_data WHERE Employee_ID = :Employee_ID";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':Employee_ID', $Employee_ID);
        $stmt->execute();

        $employee = $stmt->fetch(PDO::FETCH_ASSOC);

        // Display the form with employee data for editing
        if ($employee) {
            // Display the form with fetched data for editing
?>
            <section class="edit-form">
                <h2>Edit Employee Details</h2>
                <form method="post" action="update.php">
                    <!-- Display fetched data in input fields -->
                    <!-- Use $employee['fieldname'] to populate respective fields -->
                    <input type="hidden" name="Employee_ID" value="<?php echo $employee['Employee_ID']; ?>">                                       
                    <div class="form-group">
                        <label for="input1" class="col-sm-2 control-label">First Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="fname" class="form-control" id="input1" value="<?php echo $employee['fname']; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input2" class="col-sm-2 control-label">Last Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="lname" class="form-control" id="input2" value="<?php echo $employee['lname']; ?>" >
                        </div>
                    </div>
					<div class="form-group">
						<label for="input3" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="email" name="email" class="form-control" id="input3" value="<?php echo $employee['email']; ?>" required>
						</div>
					</div>
                     
					 
					<div class="form-group">
						<label for="input7" class="col-sm-2 control-label">Employee ID</label>
						<div class="col-sm-10">
							<input type="number" name="Employee_ID" class="form-control" id="input7" value="<?php echo $employee['Employee_ID']; ?>" required>
						</div>
                    </div>
                    <div class="form-group">
                        <label for="input5" class="col-sm-2 control-label">Hours worked</label>
                        <div class="col-sm-10">
                            <input type="number" name="hoursworked" class="form-control" id="input5" value="<?php echo $employee['hoursworked']; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input6" class="col-sm-2 control-label">Department</label>
                        <div class="col-sm-10">
                            <input type="text" name="department" class="form-control" id="input6" value="<?php echo $employee['department']; ?>" required>
                        </div>
                    </div>
					<div class="form-group">
                        <label for="username" class="col-sm-2 control-label">Username</label>
						<p><input class="form-control" name="username" type="text" placeholder="Username" value="<?php echo $employee['username']; ?>" required></p>
					</div>
              

                    <input type="submit" value="Update">
                </form>
            </section>
<?php
        } else {
            echo "Employee not found";
        }
    } 
    else {
        echo "Employee ID not provided";
    }
echo '<footer>';
    require 'include/globalfooter.php';
    echo '</footer>';
?>