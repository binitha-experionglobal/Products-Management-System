<?php
session_start();

//var_dump($_POST);

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

$sql = "SELECT * FROM Login
        WHERE username=\"$username_\"&& password=\"$password_\"";
//echo $sql;

if ($conn->query($sql) == TRUE) {

    $result1 = $conn->query($sql);
$file = $result1->fetch_assoc();

$id=$file["userId"];
$_SESSION["Name"] = $file["name"];

if($id>0){
    $_SESSION["UserId"] = $id;
    $msg="Redirecting..";
    //session_start();
    echo json_encode(array('code'=>$id, 'msg'=>$msg));
    //echo $file["userId"];
}
else{
    $msg="Incorrect Username or Password";
    echo json_encode(array('code'=>0, 'msg'=>$msg));
    
    //echo "Incorrect Username or Password";
}

    
}
else{
    $msg="Error!! Try again later";
    echo json_encode(array('code'=>-1, 'msg'=>$msg));
    //echo "Error!! Try again later";
}



?>


