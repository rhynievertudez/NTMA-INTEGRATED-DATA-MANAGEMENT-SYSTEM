<?php
include "dbcon_admin.php";

if (isset($_POST['update'])) {

    $conn = mysqli_connect('localhost', 'root', '', 'ntma_admin');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

   $userid = $_POST['userid'];
   $name = $_POST['name'];
   $email = $_POST['email'];
   $username = $_POST['username'];
   $password = $_POST['password'];
   $user_account_type = $_POST['user_account_type'];


    // Update the student information in the database
    $sql = "UPDATE admin SET 
        name = '$name',
        email = '$email',
        username = '$username',
        password = '$password',
        user_account_type = '$user_account_type'
        WHERE id = $userid";

    if (mysqli_query($conn, $sql)) {
        // Database update successful
        echo '<script type="text/javascript">';
        echo 'alert("Account information updated successfully!")';
        echo '</script>';

    } else {
        // Database update failed
        echo "Error updating account information: " . mysqli_error($conn);
    }

    mysqli_close($conn);
header("Location: account.php");
    exit;
}
?>