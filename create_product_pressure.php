<?php
 
$response = array();

$con = mysqli_connect("127.0.0.1","user","password","med");
$db = mysqli_select_db($con, "med") or die(mysql_error()) or die(mysql_error());

if (isset($_POST['pesel']) && isset($_POST['systolic']) && isset($_POST['diastolic']) && isset($_POST['date_time']) && isset($_POST['comment'])) {
 		
    $pesel = $_POST['pesel'];
    $systolic = $_POST['systolic'];
	$diastolic = $_POST['diastolic'];
    $date_time = $_POST['date_time'];
	$comment = $_POST['comment'];
   
    $result = mysqli_query($con, "INSERT INTO `diabetic_results_table`(`pesel`, `systolic`, `diastolic`, `date_time`, `comment`) VALUES ('$pesel', '$systolic', '$diastolic', '$date_time', '$comment')");

    if ($result) {
        $response["success"] = 1;
        $response["message"] = "Record successfully created.";
 
        echo json_encode($response);
    } else {
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
 
        echo json_encode($response);
    }
} else {
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    echo json_encode($response);
}
?>