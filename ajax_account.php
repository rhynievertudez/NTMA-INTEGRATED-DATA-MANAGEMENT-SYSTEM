<?php
include "dbcon_admin.php";

if (isset($_POST['userid'])) {
    $userid = $_POST['userid'];

    $sql = "SELECT * FROM admin WHERE id=" . $userid;
    $result = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
        ?>
<form id="edit-form" action="update_account.php" method="post" enctype="multipart/form-data">
    <input type="hidden" id="userid" name="userid" value="<?php echo $row['id']; ?>">
    <label for="name">Name</label>
    <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>">
    <label for="email">Email</label>
    <input type="text" id="email" name="email" value="<?php echo $row['email']; ?>">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" value="<?php echo $row['username']; ?>">
    <label for="password">Password</label>
    <input type="text" id="password" name="password" value="<?php echo $row['password']; ?>">
    <label for="user_account_type">Account Type</label>
    <input type="text" id="address" name="user_account_type" value="<?php echo $row['user_account_type']; ?>">

    <input type="submit" name="update" value="Update">
    </div>
</form>
<?php
    } else {
        echo "No data found.";
    }
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

    input[type="submit"] {
        position: absolute;
        margin-top: 20px;
        top: 0px;
        left: 88%;
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