<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "root", "sports");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$player_number = mysqli_real_escape_string($link, $_GET['playernumber']);
$first_name = mysqli_real_escape_string($link, $_GET['firstname']);
$last_name = mysqli_real_escape_string($link, $_GET['lastname']);
$gender = mysqli_real_escape_string($link, $_GET['gender']);
 
// attempt insert query execution
$sql = "INSERT INTO athletes (player_number, first_name, last_name, gender) VALUES ('$player_number', '$first_name', '$last_name', '$gender')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>