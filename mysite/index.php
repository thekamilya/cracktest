<!-- index.php is the file which shows 
all the available practice test to user  -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="styles/index_style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php include 'database.php'; // database connection
    $query = "SELECT * FROM practice_test"; // query to practice_test table
	$info = mysqli_query($con, $query); //object containing data from practice_test table
    ?>
    <header>
        <div class="logo_container">
            <img src="images/logo.svg ">
        </div>

    </header>

    <main>
        <div class="main_container">
            <p id="intro-text">All Reading Practice</p>
            <div class="inner_container">
                <?php foreach($info as $item): ?>
                <div class="element_container">
                    <div class="status_image">
                        <img src="images/status.svg ">
                    </div>
                    <p id="practice_test_name">Practice Test <?php echo $item["practice_test_number"]?></p>
                    <!-- Link to practice.php ,sending the n (practice test number) via get method-->
                    <a href="practice.php?number=<?php echo $item["practice_test_number"]?>" class="btn">Practice</a>
                </div>
                <?php endforeach ;?>

            </div>


</body>

</html>