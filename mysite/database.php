<?php

	// Database connection
	$con = mysqli_connect ("localhost", "root", "","quizzer" );
	mysqli_set_charset($con , "utf8");
	if(mysqli_connect_errno()) {
		echo("Failed to connect").mysqli_connect_errno();
	}