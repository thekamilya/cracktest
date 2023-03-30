<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
	if (isset($_GET["submit"])){
		$email = $_GET["email"];
		$password = $_GET["password"];

		// Database connection
		$con = mysqli_connect ("localhost", "root", "","test1" );
		mysqli_set_charset($con , "utf8");
		if(mysqli_connect_errno()){
			echo("Failed to connect").mysqli_connect_errno();
		}

		$exist = "SELECT * FROM registration WHERE email='$email' && password = '$password';";
		$info = mysqli_query($con, $exist);
		$count = mysqli_num_rows($info);


		if ($count == 0){
			echo("The username or password is incorrect");
		} else {
			header("Location: index.php");
		}

	}
	?>
    <p1>Log in </p1>
    <div class="container">
        <form action="login.php" method="get">
            <div class="form-group">
                <input type="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Submit">
            </div>
            <a href="regisration.php">Registration</a>
        </form>
    </div>
</body>

</html>