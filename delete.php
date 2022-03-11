<?php
    session_start();
	
  $servername = "localhost";
$username = "root";
$password = "";
$database = "quiz";

	$con = mysqli_connect($servername, $username, $password,$database);
        if (!$con) {
            die(" Connection Error ");
        }


    $id = $_GET['id'];
    $sql = "DELETE FROM quiz WHERE quizid = $id";
    if (mysqli_query($con, $sql)) {
        echo "<script type='text/javascript'>alert('Quiz Deleted Successfully');
        window.location='quizlist.php';</script>";
        die;
    } 
    mysqli_close($con);
?>