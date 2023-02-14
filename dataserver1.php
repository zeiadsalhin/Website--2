<?php
$email = filter_input(INPUT_POST, 'email');
if (!empty($email)){

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "email";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);


if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO emails (email)
values ('$email')";
if ($conn->query($sql)){
echo "New record is inserted sucessfully";
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}


?>