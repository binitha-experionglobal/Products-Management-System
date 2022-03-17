<?php
 //var_dump($_POST);
$name=$_POST['name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$username_=$_POST['username'];
$password_=$_POST['password'];


$servername = "localhost";
$username = "binitha";
$password = "Bini@1997";
$dbname = "productDb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

//check for registered users

$check = "SELECT * FROM Login
        WHERE phone=\"$phone\"|| email=\"$email\"";


if ($conn->query($check) == TRUE) {

 $result1 = $conn->query($check);
 $file = $result1->fetch_assoc();
 $id= $file["userId"];

//check for userid

if($id>0){
    //echo "already registered. Please login";
    $msg="already registered. Please login";
    echo json_encode(array('code'=>'yes', 'msg'=>$msg));


	exit;
}
else{
    $sql = "INSERT INTO Login (name, phone, email, username,password)
    VALUES ('$name', '$phone', '$email','$username_','$password_')";

if ($conn->query($sql) === TRUE) {

$last_id = $conn->insert_id;
$msg="Successfully registered. Please login";
    echo json_encode(array('code'=>'no', 'msg'=>$msg));

}
else{
    $msg="Cannot Register. Please check details";
    echo json_encode(array('code'=>'error', 'msg'=>$msg));
}
}



    
}
else{
    $msg="Error!!Try again later";
    echo json_encode(array('code'=>'error', 'msg'=>$msg));
    
}








?>


