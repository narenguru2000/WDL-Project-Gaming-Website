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
    echo "<br>";
    $user_query = "SELECT name,username FROM users WHERE email = '$email'";
    $query_result = mysqli_query($db,$user_query);
    $user_query_result = mysqli_fetch_assoc($query_result);
    $_SESSION['username'] = $user_query_result['username'];
    $_SESSION['name'] = $user_query_result['name'];
    //echo "username=>";
   // echo $_SESSION['username'];
    //echo "<br>";
    //echo "name=>";
    //echo $_SESSION['name'];
    //echo '<br /><a href="json.php">page 2</a>';
    header('Location: http://localhost/WDL-Project-Gaming-Website/Gaming%20Website/php/json.php');
    exit();
}
else{

    echo "email or password incorect";
}

?>
