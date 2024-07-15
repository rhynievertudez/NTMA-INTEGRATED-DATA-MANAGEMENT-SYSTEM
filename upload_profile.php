<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "ntma_stud";

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST["submit"])) {
        $id = $_POST["id"];
        $year = $_POST["year"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $age = $_POST["age"];
        $birthday = $_POST["birthday"];
        $gender = $_POST["gender"];
        $course = $_POST["course"];
        $status = $_POST["status"];

        $uploads_dir = 'image';

        $uploadedFiles = array();

        foreach ($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
            $file_name = $_FILES["files"]["name"][$key];
            $file_tmp = $_FILES["files"]["tmp_name"][$key];

            $pname = rand(1000, 10000) . "-" . $file_name;

            move_uploaded_file($file_tmp, $uploads_dir . '/' . $pname);

            $uploadedFiles[] = $pname;
        }

        $file_data = implode(",", $uploadedFiles);

        $sql = "INSERT INTO students_files (id, year, name, email, address, age, birthday, gender, course, status, profile_file_data) VALUES ('$id', '$year', '$name', '$email', '$address', '$age', '$birthday', '$gender', '$course', '$status', '$file_data')";

        if (mysqli_query($conn, $sql)) {
            echo "Files Successfully uploaded";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    mysqli_close($conn);

    header("Location: settings.php");
    exit();
}
?>