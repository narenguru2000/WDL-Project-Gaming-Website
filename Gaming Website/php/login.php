<?php
session_start();
//connection
//connection          //server    //db_user   //db_name
$db = mysqli_connect('localhost', 'root','','gamingsnap');
if (mysqli_connect_errno()) {
  printf("Connect failed: %s\n", mysqli_connect_error());
  exit();
}

//incoming variables
$email = $_POST['email'];
$password =$_POST['password'];

//encrypt password
$en_pass = sha1($password);


//authentication
$auth_query = "SELECT * FROM users WHERE email = '$email' AND password = '$en_pass' ";
$result_q = mysqli_query($db,$auth_query);
if(mysqli_num_rows($result_q)){
    echo "Login successfull";
}
else{

    echo "email or password incorect";
}

?>