<?php
include "dbcon.php";

if (isset($_POST['update'])) {

    $conn = mysqli_connect('localhost', 'root', '', 'ntma_stud');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $userid = $_POST['userid'];
    $year = $_POST['year'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];
    $status = $_POST['status'];


    // Update the student information in the database
    $sql = "UPDATE students_files SET 
            year = '$year',
            name = '$name',
            email = '$email',
            address = '$address',
            age = '$age',
            birthday = '$birthday',
            gender = '$gender',
            course = '$course',
            status = '$status'
            WHERE id = $userid";

    if (mysqli_query($conn, $sql)) {
        // Database update successful
        echo '<script type="text/javascript">';
        echo 'alert("Student information updated successfully!")';
        echo '</script>';

        $existingFiles = array();
        $sql = "SELECT profile_file_data FROM students_files WHERE id = $userid";
        $result = mysqli_query($conn, $sql);
        if ($row = mysqli_fetch_assoc($result)) {
            $existingFiles = explode(",", $row['profile_file_data']);
        }

        if (isset($_POST['removed_files'])) {
            $removedFiles = explode(",", $_POST['removed_files']);

   
            foreach ($removedFiles as $file) {
                $filePath = "image/" . $file; // name of the folder directory
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            // Get the existing file names from the database
            $existingFiles = array();
            $sql = "SELECT profile_file_data FROM students_files WHERE id = $userid";
            $result = mysqli_query($conn, $sql);
            if ($row = mysqli_fetch_assoc($result)) {
                $existingFiles = explode(",", $row['profile_file_data']);
            }

            // Update the database to remove the deleted files
            $remainingFiles = array_diff($existingFiles, $removedFiles);
            $remainingFileList = implode(",", $remainingFiles);
            $updateFilesSQL = "UPDATE students_files SET profile_file_data = '$remainingFileList' WHERE id = $userid";

            if (mysqli_query($conn, $updateFilesSQL)) {
                
            } else {
                echo "Error updating files in the database: " . mysqli_error($conn);
            }
        }


        // File upload and update 
        if (isset($_FILES['files']['name'][0]) && !empty($_FILES['files']['name'][0])) {
            // Check if files were uploaded
            $fileCount = count($_FILES['files']['name']);
            $newFileList = array(); // Initialize the array to store the newly uploaded file names

            for ($i = 0; $i < $fileCount; $i++) {
                $fileName = $_FILES['files']['name'][$i];
                $fileTmpName = $_FILES['files']['tmp_name'][$i];
                $fileError = $_FILES['files']['error'][$i];

                // Check for file errors
                if ($fileError === UPLOAD_ERR_OK) {
                    // File uploaded successfully. Perform file validation and handling (you can add more validation as needed)
                    // ...

                    // Determine file type based on extension
                    $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                    // Move the uploaded file to the desired directory (e.g., 'image/')
                    $targetDirectory = 'image/';
                    $targetFile = $targetDirectory . $fileName;

                    if (move_uploaded_file($fileTmpName, $targetFile)) {
                        // File uploaded successfully. Add the file name to the array for database update.
                        $newFileList[] = $fileName;
                    } else {
                        // Error handling for file upload
                        echo '<script type="text/javascript">';
                        echo 'alert("Error uploading file: ' . $fileName . '")';
                        echo '</script>';
                    }
                } else {
                    // Error handling for file upload
                    echo '<script type="text/javascript">';
                    echo 'alert("Error uploading file: ' . $fileName . '")';
                    echo '</script>';
                }
            }

            // Merge the existing files with the newly uploaded file names
            $mergedFiles = array_merge($existingFiles, $newFileList);

            // Update the file names in the database for the student's files
            if (!empty($mergedFiles)) {
                $fileListString = implode(",", $mergedFiles);
                $updateFilesSQL = "UPDATE students_files SET profile_file_data = '$fileListString' WHERE id = $userid";

                if (mysqli_query($conn, $updateFilesSQL)) {
                    echo '<script type="text/javascript">';
                    echo 'alert("Files uploaded successfully!")';
                    echo '</script>';
                } else {
                    echo "Error updating files in the database: " . mysqli_error($conn);
                }
            }
        } else {
            // No files were uploaded
            echo '<script type="text/javascript">';
            echo 'alert("No files uploaded.")';
            echo '</script>';
        }
    } else {
        // Database update failed
        echo "Error updating student information: " . mysqli_error($conn);
    }

    mysqli_close($conn);
    header("Location: index.php");
    exit;
}
?>