<?php
include "db.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$subject = trim($_POST['subject']);
$message = trim($_POST['message']);

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
 die("Invalid Email");
}

$stmt = mysqli_prepare($conn,
"INSERT INTO contact(name,email,subject,message) VALUES(?,?,?,?)");

mysqli_stmt_bind_param($stmt,"ssss",$name,$email,$subject,$message);

if(mysqli_stmt_execute($stmt)){
 echo "Message Sent Successfully";
}else{
 echo "Error: ".mysqli_error($conn);
}

mysqli_stmt_close($stmt);
}
?>
