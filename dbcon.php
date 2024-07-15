<?php
$conn = new mysqli('localhost','root','','ntma_stud');
if ($conn->connect_error) {
    die('Error : ('. $conn->connect_errno .') '. $conn->connect_error);
}
?>