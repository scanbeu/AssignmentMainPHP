<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>data_employee Portal</title>
	<meta name="description" content="data_employee Information">
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" >
  	<link rel="stylesheet" href="css/style.css">
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" ></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
</head>
<body>
  <header>
  <?php
                include("include/globalheader.php");
           ?>
  </header>
	<section class="head">
		<div>
			<h1>Employee Portal</h1>
		</div>
	</section>
  <main class="container">
	   <section class="form-row row justify-content-center">
		     <form method="post" class="form-horizontal col-md-6 col-md-offset-3" action="save-admin.php">
					 <h2>Create User</h2>
					 <div class="form-group">
						 <label for="input1" class="col-sm-2 control-label">First Name</label>
						 <div class="col-sm-10">
							 <input type="text" name="fname" class="form-control" id="input1">
						 </div>
					 </div>
					 <div class="form-group">
						 <label for="input2" class="col-sm-2 control-label">Last Name</label>
						 <div class="col-sm-10">
							 <input type="text" name="lname" class="form-control" id="input2">
						 </div>
					 </div>
					 <div class="form-group">
						 <label for="input3" class="col-sm-2 control-label">Email</label>
						 <div class="col-sm-10">
							 <input type="email" name="email" class="form-control" id="input3">
						 </div>
					 </div>
                     
					 <div class="form-group">
						 <label for="input4" class="col-sm-2 control-label">Age</label>
						 <div class="col-sm-10">
							 <select name="age" class="form-control">
								 <option>Select Your Age</option>
								 <option value="20">20</option>
								 <option value="21">21</option>
								 <option value="22">22</option>
								 <option value="23">23</option>
								 <option value="24">24</option>
								 <option value="25">25</option>
							 </select>
						 </div>
					 </div>
					 <div class="form-group">
						<label for="input7" class="col-sm-2 control-label">Employee ID</label>
						<div class="col-sm-10">
							<input type="number" name="Employee_ID" class="form-control" id="input7">
						</div>
</div>
                     <div class="form-group">
						 <label for="input5" class="col-sm-2 control-label">Hours worked</label>
						 <div class="col-sm-10">
							 <input type="number" name="hoursworked" class="form-control" id="input5">
						 </div>
					 </div>
                     <div class="form-group">
						 <label for="input6" class="col-sm-2 control-label">Department</label>
						 <div class="col-sm-10">
							 <input type="text" name="department" class="form-control" id="input6">
						 </div>
					 </div>
					<div class="form-group">
						<p><input class="form-control" name="username" type="text" placeholder="Username" required></p>
						<p><input class="form-control" name="password" type="password" placeholder="Password" required></p>
						<input class="btn btn-primary col-md-2 col-md-offset-10" type="submit" value="Register">
					</div>
</form>
					
					<form method="post" class="form-horizontal col-md-6 col-md-offset-3" action="validate.php">
					<div class="form-group">
						<fieldset>
							<legend>Already have a account</legend>
						<p><input class="form-control" name="username" type="text" placeholder="Username" required></p>
						<p><input class="form-control" name="password" type="password" placeholder="Password" required></p>
						<input class="btn btn-primary col-md-2 col-md-offset-10" type="submit" value="Login">
						</fieldset>
</form>
					</div>

</section>
      
     </main>
	 <footer>
  <?php
                include("include/globalfooter.php");
           ?>
  </footer>
   </body>
</html>