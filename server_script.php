<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "ntma_stud";

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM students_files WHERE id = $id";
    $result = $connection->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<p><strong>Year:</strong> " . $row['year'] . "</p>";
        echo "<p><strong>Name:</strong> " . $row['name'] . "</p>";
        echo "<p><strong>Course:</strong> " . $row['course'] . "</p>";
        echo "<p><strong>Status:</strong> " . $row['status'] . "</p>";
    } else {
        echo "No data found.";
    }
} else {
    echo "Invalid request.";
}

$connection->close();
?>
