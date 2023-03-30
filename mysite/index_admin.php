<!-- index_admin.php is the main admin page which shows 
all the practice tests and allows to :
* delete practice tests
* move to add_admin.php file to add tests  -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href=" styles/index_admin_style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php include 'database.php';?>
    <?php
    $query = "SELECT * FROM practice_test";
	$info = mysqli_query($con, $query);
?>
    <header>
        <div class="logo_container">
            <img src="images/logo.svg ">
        </div>

    </header>

    <main>
        <div class="main_container">
            <div class="add_button_container">
                <a href="add_admin.php" class="btn" class="add-new">Add new +</a>
            </div>
            <p id="intro-text">All Reading Practice</p>
            <div class="inner_container">
                <?php foreach($info as $item): ?>
                <div class="element_container">
                    <div class="status_image">
                        <img src="images/status.svg ">
                    </div>
                    <p id="practice_test_name">Practice Test <?php echo $item["practice_test_number"]?></p>
                    <a href="delete.php?number=<?php echo $item["practice_test_number"]?>" class="btn">Delete</a>
                </div>
                <?php endforeach ;?>

            </div>


</body>

</html>