<?php

echo 'Data has been recorded!';
include 'database.php';

if(isset($_POST["input_practice_test_number"])){
    $input_practice_test_number =$_POST["input_practice_test_number"];
    if(isset($_POST["text"])){
        $text =$_POST["text"];
        $query = "INSERT INTO practice_test VALUES ('$input_practice_test_number' , '$text') ;";
        $info = mysqli_query($con, $query);
    }
}
$i = 1;
while ($i <100){
    if(isset($_POST["question_number_".$i])){
        $question_number =$i;
        $text = $_POST["question_number_".$i];
        $query = "INSERT INTO questions VALUES (NULL ,'$question_number','$input_practice_test_number','$text') ;";
        $info = mysqli_query($con, $query);
    }else{
        break;
    }
    $j = 1;
    while ($j < 100){
        $value ='question_'.$i.'_choice_'.$j;
        if (isset($_POST["$value"])){
        $choice= $_POST["$value"];
        } else{
            break;
        }
        $value2= 'question_'.$i.'_choice_'.$j.'_cow';
    
        if (isset($_POST["$value2"])){
            echo $_POST["$value2"];
            if($_POST["$value2"] == "Correct"){
                $cow = 1;
                // echo $value2;
                // echo $cow;
            }else{
                $cow = 0;
                // echo $cow;
            }
        }else{
            $cow =0;
        }
        $query = "INSERT INTO choices VALUES (NULL ,'$question_number','$input_practice_test_number','$cow' ,'$choice') ;";
        $info = mysqli_query($con, $query);
        $j++;
    }
    $i++;
}
// $i = 1;
// while ($i <100){
//     if(isset($_POST["question_number_".$i])){
//         $question_number =$i;
//         $text = $_POST["question_number_".$i];
//         $query = "INSERT INTO questions VALUES (NULL ,'$question_number','$input_practice_test_number','$text') ;";
// 	    $info = mysqli_query($con, $query);
//         $i++;
//     }else{
//         break;
//     }

// $j = 1;
//     while ($j < 100){
//         $value ='question_'.$i.'_choice_'.$j;
//         if (isset($_POST["$value"])){
//         $choice= $_POST["$value"];
//         }
//         else{
//             break;
//         }
//         $value2= 'question_'.$i.'_choice_'.$j.'_cow';
//         if (isset($_POST["$value2"])){
//             if($_POST["$value2"] == "Correct"){
//                 $cow = 1;
//             }else{
//                 $cow = 0;
//             }
//         }
//         $query = "INSERT INTO choices VALUES (NULL ,'$question_number','$input_practice_test_number','$cow' ,'$choice') ;";
//         $info = mysqli_query($con, $query);
//         $j++;
//     }

// }