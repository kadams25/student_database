<!--  
Kyle Adams
CSCI 4000-W1B
11/19/2019
-->

<?php
	$dsn = 'mysql:host=localhost;dbname=kyle_adams_student_db';
	$username = 'kyleadams1';
	$password = 'kyleisgreat';
	
	try {
		$db = new PDO($dsn, $username, $password);
		
	} catch (PDOException $e) {
		$error = $e->getMessage();
		include ('../errors/kyle_adams_database_error.php');
		exit();
	}
?>