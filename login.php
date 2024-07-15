<?php
$host = "localhost";  
$user = "root";  
$password = '';  
$db_name = "ntma_admin";  

$con = mysqli_connect($host, $user, $password, $db_name);  
if(mysqli_connect_errno()) {  
    die("Failed to connect with MySQL: " . mysqli_connect_error());  
}  

if (isset($_POST['user']) && isset($_POST['pass'])) {
    $username = $_POST['user'];
    $password = $_POST['pass'];

    // To prevent from mysqli injection  
    $username = stripcslashes($username);  
    $password = stripcslashes($password);  
    $username = mysqli_real_escape_string($con, $username);  
    $password = mysqli_real_escape_string($con, $password);  

    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";  
    $result = mysqli_query($con, $sql);  
    $count = mysqli_num_rows($result);  

    if ($count == 1) {  

        header("Location: index.php"); 
        exit();
    } else {  
        echo "Login failed. Please try again.";  
    }
}
?>