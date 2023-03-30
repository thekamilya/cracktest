<!-- 
*delete.php receives info from index_admin.php 
*deletes the corresponding file 
*sends user back to index_admin.php
 -->
<?php 
include 'database.php';
if (isset($_GET['number'])){
    $n = $_GET['number']; 
}

    $query = " DELETE FROM practice_test WHERE practice_test_number='$n';";
	$info = mysqli_query($con, $query);
    $query = " DELETE FROM questions WHERE practice_test_number='$n';";
	$info = mysqli_query($con, $query);
    $query = " DELETE FROM choices WHERE practice_test_number='$n';";
	$info = mysqli_query($con, $query);


    header("Location: index_admin.php");
?>
!