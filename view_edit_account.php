<?php
include "dbcon_admin.php";

if (isset($_POST['userid'])) {
    $userid = $_POST['userid'];
    $action = $_POST['action'];

    if ($action === 'view') {
        // View functionality
        $sql = "SELECT * FROM admin WHERE id=" . $userid;
        $result = mysqli_query($conn, $sql);
        if ($row = mysqli_fetch_assoc($result)) {
            ?>
            </button>
            </div>
            <table class="table">
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
                    <th>Username</th>
                    <td>
                        <?php echo $row['username']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td>
                        <?php echo $row['password']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Account Type</th>
                    <td>
                        <?php echo $row['user_account_type']; ?>
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
        $name = $_POST['name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user_account_type = $_POST['user_account_type'];

        // Perform the update operation in the database
        $sql = "UPDATE admin SET name = '$name', email = '$email', username = '$username', password = '$password',user_account_type = '$user_account_type' WHERE id = $userid";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "Successfully updated the account details.";
        } else {
            echo "Error: Unable to update the account details.";
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
        grid-gap: 20px;
        overflow-y: auto;
    }

    .file-item {
        text-align: center;
    }

    .file-title {
        background-color: #007bff;/ color: #fff;
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