<?php
	try{
		$conn = new PDO('mysql:host=localhost;dbname=data_employee','root','');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
	}
?>