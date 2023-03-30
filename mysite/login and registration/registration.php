<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration form</title>
</head>

<body>
    <?php
	if (isset($_GET["submit"])) {
	$name = $_GET["fullname"];
	$email = $_GET["email"];
	$password = $_GET["password"];

	// Database connection
	$con = mysqli_connect ("localhost", "root", "","test1" );
	mysqli_set_charset($con , "utf8");
	if(mysqli_connect_errno()) {
		echo("Failed to connect").mysqli_connect_errno();
	}

	$query = "INSERT INTO registration VALUES(NULL, '$name', '$email' , '$password');";
	$exist = "SELECT * FROM registration WHERE email='$email';";
	$info = mysqli_query($con, $exist);
	$count = mysqli_num_rows($info);

	if ($count > 0) {
		echo("this account already exist");
	} else {
		if (empty($name) || empty($email) || empty ($password)) {
			echo("Please fill all the fields!");
		} else {
			$info = mysqli_query($con , $query);
			echo("registered successfully");
		}
	}
	} ?>
    <p1>Registration</p1>
    <div class="container">
        <form action="registration.php" method="get">
            <div class="form-group">
                <input type="text" name="fullname" placeholder="Full name">
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Submit">
            </div>
            <a href="login.php">Log in</a>
        </form>
    </div>
</body>

</html>