<!-- practice.php is the page of the test itself -->

<?php include 'database.php';// database connection
if (isset($_GET['number'])){ // Here we receive the number of Practice test to show
    $n = $_GET['number']; 
}

    $query = "SELECT * FROM questions WHERE practice_test_number='$n';";
	$info = mysqli_query($con, $query); //$info-mysqli object which contains the info from "questions" table
    $query2 = "SELECT * FROM practice_test WHERE practice_test_number='$n';";
    $info2 = mysqli_query($con, $query2);//$info2 -mysqli object which contains the info from "practice_test" table

    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href=" styles/practice_style.css" rel="stylesheet" type="text/css">

</head>

<body>

    <header>
        <div class="header_container">
            <p id="practice_name">Practice Test <?php echo $n?></p>
            <img src="images/small_logo.svg ">
            <a href="index.php" id="exit_button">Exit this practice</a>

        </div>

    </header>
    <main>
        <div class="text-container">
            <div class="numbering-container">
            </div>
            <div class="inner_txt_container">
                <p> <?php foreach($info2 as $item): 
                    echo $item['text'];
                    endforeach ;
                    ?></p>
            </div>
        </div>

        <div class="questions-container">
            <form method="post" action="process.php">
                <?php foreach($info as $item): ?>
                <div class="question-container">
                    <?php $question_number = $item['question_number']; // We put the query3 here bc we need to access different 'practice_test_number'
                        $query3 = "SELECT * FROM choices WHERE practice_test_number='$n'&& question_number = '$question_number'";
                        $info3 = mysqli_query($con, $query3);
                    ?>

                    <p class="question-number">QUESTION NUMBER <?php echo $question_number?></p>
                    </p>
                    <ul class="choices">
                        <?php $question_number = 'question_'.$item['question_number'];?>
                        <p><?php echo $item['text']?></p>
                        <?php foreach ($info3 as $item2):?>
                        <li><input type="radio" name="<?php echo $question_number?>" value="A">
                            <?php echo $item2["text"];?>
                            </input></li>
                        <?php endforeach ;?>
                    </ul>
                </div>
                <?php endforeach ;?>
                <input id="submit_button" type="submit" value="Submit"> </input>
            </form>
        </div>

    </main>


</body>

</html>