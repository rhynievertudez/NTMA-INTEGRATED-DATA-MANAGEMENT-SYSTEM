<?php
include "dbcon.php";

if (isset($_POST['userid'])) {
    $userid = $_POST['userid'];
    $action = $_POST['action'];

    if ($action === 'view') {
        $sql = "SELECT * FROM students_files WHERE id=" . $userid;
        $result = mysqli_query($conn, $sql);
        if ($row = mysqli_fetch_assoc($result)) {
            ?>
</button>
</div>
    <table class="table">
        <tr>
            <th>Year</th>
            <td>
                <?php echo $row['year']; ?>
            </td>
        </tr>
        <tr>
            <th>Name</th>
            <td>
                <?php echo $row['name']; ?>
            </td>
        </tr>
        <tr>
            <th>Email</th>
            <td>
                <?php echo $row['email']; ?>
            </td>
        </tr>
        <tr>
            <th>Address</th>
            <td>
                <?php echo $row['address']; ?>
            </td>
        </tr>
        <tr>
            <th>Age</th>
            <td>
                <?php echo $row['age']; ?>
            </td>
        </tr>
        <tr>
            <th>Birthday</th>
            <td>
                <?php echo $row['birthday']; ?>
            </td>
        </tr>
        <tr>
        <tr>
            <th>Gender</th>
            <td>
                <?php echo $row['gender']; ?>
            </td>
        </tr>
        <tr>
            <th>Course</th>
            <td>
                <?php echo $row['course']; ?>
            </td>
        </tr>
        <tr>
            <th>Status</th>
            <td>
                <?php echo $row['status']; ?>
            </td>
        </tr>
        <tr>
            <th>Student Files</th>
            <td>

                <div class="studfiles-container">
                    <div class="file-container">
                        <?php
                            $fileList = explode(",", $row['profile_file_data']);

                            foreach ($fileList as $file) {
                                $fileUrl = "image/$file"; 
                                $fileType = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                                $iconSrc = ($fileType === 'pdf') ? 'pdf-icon.png' : 'image-icon.png';
                                $altText = ($fileType === 'pdf') ? 'PDF' : 'Image';

                               echo "<div class='file-item'>";
                                    echo "<div class='file-box'>";
                                    echo "<div class='file-title'>$file</div>"; 
                                    echo "<a href='$fileUrl' target='_blank'><img src='$iconSrc' alt='$altText'></a>";
                                    echo "<p><a href='$fileUrl' target='_blank'>$file</a></p>";
                                    echo "</div>";
                                    echo "</div>";
                            }
                            ?>
            </td>
        </tr>
    </table>
</div>
</div>
<?php
        } else {
            echo "No data found.";
        }
    } elseif ($action === 'edit') {
        // Edit functionality
        $year = $_POST['year'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
         $age = $_POST['age'];
        $birthday = $_POST['birthday'];
        $gender = $_POST['gender'];
         $course = $_POST['course'];
        $year = $_POST['year'];
        $status = $_POST['status'];

        // Perform the update operation in the database
        $sql = "UPDATE students_files SET year = '$year', name = '$name', email = '$email', address = '$address', age = '$age', birthday = '$birthday', gender = '$gender', course = '$course', year = '$year', status = '$status' WHERE id = $userid";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "Successfully updated the student details.";
        } else {
            echo "Error: Unable to update the student details.";
        }
    } else {
        echo "Invalid action.";
    }
} else {
    echo "Invalid request.";
}
?>

<style>
    input {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-bottom: 10px;
        width: 100%;
        box-sizing: border-box;
    }

    label {
        font-weight: bold;
        display: block;
    }

    .file-container {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        /* Three columns */
        grid-gap: 20px;
        overflow-y: auto;
    }

    .file-item {
        text-align: center;
    }

    .file-title {
        background-color: #007bff;
        /* Add the desired color */
        color: #fff;
        /* Text color for the title */
        font-family: "Kartika";
        padding: 8px;
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
    }

    .file-box {
        border: 1px solid #ccc;
        padding: 10px;
        border-radius: 4px;
    }

    .file-box {
        border: 1px solid #ccc;
        padding: 10px;
        border-radius: 4px;
        height: 120px;
        overflow: hidden;
    }

    .studfiles-container {
        border: 1px solid #ccc;
        padding: 20px;
        border-radius: 4px;
    }

    input[type="submit"] {
        padding: 8px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        width: 10%;
        margin-left: 90%;
        margin-top: 20%;



    }
</style>