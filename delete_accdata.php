<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "ntma_admin";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["id"])) {
        $id = $_POST["id"];

        $sql = "DELETE FROM admin WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "error";
        }

        $stmt->close();

        header("Location: {$_SERVER['PHP_SELF']}");
        exit; 
    }
}

$conn->close();
?>
