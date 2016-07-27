<?php
 
$response = array();

$con = mysqli_connect("127.0.0.1","root","","med");
$db = mysqli_select_db($con, "med") or die(mysql_error()) or die(mysql_error());


if (isset($_POST['pesel']) && isset($_POST['result']) && isset($_POST['date_time']) && isset($_POST['before_food'])) {
	
    $pesel = $_POST['pesel'];
    $result = $_POST['result'];
    $date_time = $_POST['date_time'];
	$before_food = $_POST['before_food'];
	$comment = $_POST['comment'];

    $result = mysqli_query($con, "INSERT INTO `diabetic_results_table`(`pesel`, `result`, `date_time`, `before_food`, `comment`) VALUES ('$pesel', '$result', '$date_time', '$before_food', '$comment')");

	echo "result $result";
	
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