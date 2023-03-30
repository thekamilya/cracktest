<!-- process.php is the file which will count the number  of correct answers and
show the visual representation correspondingly -->
<?php

if (isset ($_POST["question_1"])){
    $choice1 = $_POST["question_1"];
    echo $choice1;
}
if (isset ($_POST["question_2"])){
    $choice2 = $_POST["question_2"];
    echo $choice2;
}
if (isset ($_POST["question_3"])){
    $choice3 = $_POST["question_3"];
    echo $choice3;
}