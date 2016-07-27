<?php

$response = array();

$con = mysqli_connect("127.0.0.1","root","","med");
$db = mysqli_select_db($con, "med") or die(mysql_error()) or die(mysql_error());
   	
$result = mysqli_query($con, "SELECT * FROM diabetic_results_table") or die(mysql_error());

if (mysqli_num_rows($result) > 0) {

    $response["diabetic_results_table"] = array();
 
    while ($row = mysqli_fetch_array($result)) {
     
		$data = array();
        $data["pesel"] = $row["pesel"];
        $data["result"] = $row["result"];
        $data["date_time"] = $row["date_time"];
		$data["before_food"] = $row["before_food"];
		$data["comment"] = $row["comment"];
 
        array_push($response["diabetic_results_table"], $data);
    }
    $response["success"] = 1;
 
    echo json_encode($response);
} else {
    $response["success"] = 0;
    $response["message"] = "No products found";
 
    echo json_encode($response);
}
?>