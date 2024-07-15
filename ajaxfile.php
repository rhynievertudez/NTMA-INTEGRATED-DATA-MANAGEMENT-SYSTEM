<?php
include "dbcon.php";

if (isset($_POST['userid'])) {
    $userid = $_POST['userid'];

    $sql = "SELECT * FROM students_files WHERE id=" . $userid;
    $result = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
        ?>
<form id="edit-form" action="update_student.php" method="post" enctype="multipart/form-data">
    <input type="hidden" id="userid" name="userid" value="<?php echo $row['id']; ?>">
    <label for="year">Year</label>
    <input type="text" id="year" name="year" value="<?php echo $row['year']; ?>">
    <label for="name">Name</label>
    <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>">
    <label for="email">Email</label>
    <input type="text" id="email" name="email" value="<?php echo $row['email']; ?>">
    <label for="address">Address</label>
    <input type="text" id="address" name="address" value="<?php echo $row['address']; ?>">
    <label for="age">Age</label>
    <input type="text" id="age" name="age" value="<?php echo $row['age']; ?>">
    <label for="birthday">Birthday</label>
    <input type="text" id="birthday" name="birthday" value="<?php echo $row['birthday']; ?>">
    <label for="gender">Gender</label>
    <input type="text" id="gender" name="gender" value="<?php echo $row['gender']; ?>">
    <label for="course">Course</label>
    <input type="text" id="course" name="course" value="<?php echo $row['course']; ?>">
    <label for="status">Status</label>
    <input type="text" id="status" name="status" value="<?php echo $row['status']; ?>">

    <div class="studfiles-container">
        <label for="fileUpload">Student Files</label>
        <input type="file" id="fileUpload" name="files[]" multiple>
        <div class="file-list">
            <div class="file-list">
                <p>Selected Files:</p>
                <ul id="selectedFilesList">
                    <!-- Selected file names will be added here dynamically using JavaScript -->
                </ul>
            </div>
            <div class="file-container">
                <?php

            $fileList = explode(",", $row['profile_file_data']);

            foreach ($fileList as $file) {
                $fileUrl = "image/$file"; 
                $fileType = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                $iconSrc = ($fileType === 'pdf') ? '<i class="fas fa-file-pdf" style="color: #ff0000;"></i>' : '<i class="fas fa-file-pdf" style="color: #ff0000;"></i>';
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
            </div>
            <!-- Update button -->
            <input type="submit" name="update" value="Update">
        </div>
</form>
<?php
    } else {
        echo "No data found.";
    }
}
?>

<script>
    // Function to display the selected file names and update the hidden input
    function displaySelectedFiles() {
        const fileInput = document.getElementById('fileUpload');
        const fileList = fileInput.files;
        const selectedFilesList = document.getElementById('selectedFilesList');

        selectedFilesList.innerHTML = ''; // Clear the list first

        for (let i = 0; i < fileList.length; i++) {
            const fileName = fileList[i].name;

            // Create a list item with an input field to make it editable
            const listItem = document.createElement('li');
            const inputField = document.createElement('input');
            inputField.type = 'text';
            inputField.value = fileName;
            inputField.addEventListener('input', updateFileName);
            listItem.appendChild(inputField);

            // Create the remove button for each file
            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.className = 'remove-file-button';
            removeButton.innerHTML = '&times;';
            removeButton.addEventListener('click', removeFile);
            listItem.appendChild(removeButton);

            selectedFilesList.appendChild(listItem);
        }
    }

    // Function to update the file name in the hidden input
    function updateFileName(event) {
        const listItem = event.target.parentNode;
        const index = Array.from(listItem.parentNode.children).indexOf(listItem);
        const fileName = event.target.value;

        // Update the value of the hidden input
        const removedFilesInput = document.getElementById('removed-files');
        const removedFiles = removedFilesInput.value.split(',');
        removedFiles[index] = fileName;
        removedFilesInput.value = removedFiles.join(',');
    }

    function removeFile(event) {
        const listItem = event.target.parentNode;
        const index = Array.from(listItem.parentNode.children).indexOf(listItem);

        const removedFilesInput = document.getElementById('removed-files');
        const removedFiles = removedFilesInput.value.split(',');
        removedFiles.splice(index, 1); // Remove the file name at the specified index
        removedFilesInput.value = removedFiles.join(',');

        listItem.remove();
    }

    // Event listener to update the file list when a file is selected
    document.getElementById('fileUpload').addEventListener('change', displaySelectedFiles);

    // Event delegation to handle the remove button click event
    document.getElementById('selectedFilesList').addEventListener('click', function (event) {
        if (event.target.classList.contains('remove-file-button')) {
            removeFile(event);
        }
    });
</script>

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
        grid-gap: 20px;
        overflow-y: auto;
    }

    .file-item {
        text-align: center;
    }

    .file-title {
        background-color: #007bff;
        color: #fff;
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
        position: relative;
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
        position: absolute;
        margin-top: 90px;
        top: 7px;
        left: 89%;
        background: linear-gradient(to right, rgba(129, 197, 237, 1), rgba(13, 110, 253, 1));
        color: #ffffff;
        padding: 10px 20px;
        /* Adjust padding as needed */
        border: none;
        border-radius: 5px;
        cursor: pointer;
        display: inline-block;
        font-family: "Amazon Ember", sans-serif;
        font-size: 13px;
        line-height: 29px;
        padding: 0 10px 0 11px;
        position: relative;
        text-align: center;
        text-decoration: none;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        vertical-align: middle;
        height: 35px;
        width: 95px;
    }

    input[type="submit"]:hover {
        background: linear-gradient(to right, rgba(129, 197, 237, 1), rgba(13, 110, 253, 1));
    }

    input[type="submit"]:focus {
        border-color: #008296;
        box-shadow: rgba(213, 217, 217, .5) 0 2px 5px 0;
        outline: 0;
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }
</style>