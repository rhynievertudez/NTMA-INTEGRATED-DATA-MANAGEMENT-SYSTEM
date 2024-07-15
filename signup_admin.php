<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/logos.png" type="image/x-icon" />
    <title>Create Account | NTMAAdmin Integrated Data Management System</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/lineicons.css" />
    <link rel="stylesheet" href="assets/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="assets/css/main.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <style>
        .sub-btn {
            background: linear-gradient(to right, rgba(129, 197, 237, 1), rgba(13, 110, 253, 1));
            color: #fff;
            border: none;
            cursor: pointer;
            height: 70%;
            width: 100%;
            font-size: 14px;
            color: #fff;
            background: linear-gradient(to right, rgba(129, 197, 237, 1), rgba(13, 110, 253, 1)100%);
            padding: 12px 30px;
            display: inline-block;
            border: none;
            border-radius: 25px;
            font-weight: 400;
            text-transform: capitalize;
            letter-spacing: 0.5px;
            transition: all .3s;
            overflow: hidden;
        }

        .sub-btn:hover {
            background: linear-gradient(to right, rgba(13, 110, 253, 1), rgba(129, 197, 237, 1));
        }

        .sidebar-nav-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100%;
            background-color: #fff;
            color: #fff;
            font-family: "Arial", sans-serif;
        }


        .sidebar-nav .arrow-icon svg {
            fill: #fff;
            transition: transform 0.5s;
        }

        .sidebar-nav a:hover .arrow-icon svg {
            transform: rotate(180deg);
        }

        .sidebar-nav-wrapper .nav-item.active a {
            font-weight: bold;
        }

        .sidebar-nav-wrapper .nav-item i {
            margin-right: 10px;
            font-size: 20px;
        }


        .sidebar-nav-wrapper .dropdown-nav li:hover {
            background-color: rgba(0, 123, 255, 0.9);
            border-radius: 15px;
            color: #fff;
        }


        .sidebar-nav-wrapper .dropdown-nav li:hover a {
            color: #fff;
        }

        .sidebar-nav-wrapper .nav-item:hover .arrow-icon svg {
            fill: #fff;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.3);
            z-index: 11;
            opacity: 0;
            visibility: hidden;
        }

        .sidebar-nav-wrapper .nav-item:hover,
        .sidebar-nav-wrapper .nav-item.active {
            background: #fff;
            cursor: pointer;
        }

        .sidebar-nav-wrapper .nav-item a {
            color: #1e90ff;
            text-decoration: none;
        }

        .sidebar-nav-wrapper .nav-item a:hover {
            text-decoration: underline;
        }

        .form-wrapper h6 {

            font-weight: bold;
            background: linear-gradient(to right, rgba(129, 197, 237, 1), rgba(13, 110, 253, 1)100%);
            -webkit-background-clip: text;
            color: transparent;
            font-size: 20px;

        }

        .formGroup {
            position: relative;
            width: 100%;
        }

        .formGroup select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            appearance: none;
            -webkit-appearance: none;
            background-color: transparent;
            background-image: linear-gradient(45deg, #f9f9f9 50%, transparent 50%), linear-gradient(135deg, transparent 50%, #f9f9f9 50%);
            background-position: calc(100% - 20px) 50%, calc(100% - 15px) 50%;
            background-size: 5px 5px, 5px 5px;
            background-repeat: no-repeat;
            cursor: pointer;
            outline: none;
        }

        .formGroup::after {
            content: '\f107';
            font-family: FontAwesome;
            font-size: 12px;
            font-weight: 900;
            color: #999;
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            pointer-events: none;
        }

        .form-check {
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <!-- ======== sidebar-nav start =========== -->
    <aside class="sidebar-nav-wrapper">
        <div class="navbar-logo">
            <a href="index.php">
            </a>
        </div>
        <nav class="sidebar-nav">
            <ul>
                <li class="nav-item">
                    <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_1"
                        aria-controls="ddmenu_1" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon">
                            <svg width="22" height="22" viewBox="0 0 22 22">
                                <path
                                    d="M17.4167 4.58333V6.41667H13.75V4.58333H17.4167ZM8.25 4.58333V10.0833H4.58333V4.58333H8.25ZM17.4167 11.9167V17.4167H13.75V11.9167H17.4167ZM8.25 15.5833V17.4167H4.58333V15.5833H8.25ZM19.25 2.75H11.9167V8.25H19.25V2.75ZM10.0833 2.75H2.75V11.9167H10.0833V2.75ZM19.25 10.0833H11.9167V19.25H19.25V10.0833ZM10.0833 13.75H2.75V19.25H10.0833V13.75Z" />
                            </svg>
                        </span>
                        <span class="text">Dashboard</span>
                        <span class="arrow-icon">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.8333 7.58325L11.0001 13.4166L5.16675 7.58325L4.08342 8.66659L11.0001 15.5833L17.9167 8.66659L16.8333 7.58325Z"
                                    fill="#333333" />
                            </svg>
                        </span>
                    </a>
                    <ul id="ddmenu_1" class="collapse dropdown-nav">
                        <li>
                            <a href="index.php">NTMA DASHBOARD</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_2"
                        aria-controls="ddmenu_2" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon">
                            <svg width="22" height="22" viewBox="0 0 22 22">
                                <path
                                    d="M17.4167 4.58333V6.41667H13.75V4.58333H17.4167ZM8.25 4.58333V10.0833H4.58333V4.58333H8.25ZM17.4167 11.9167V17.4167H13.75V11.9167H17.4167ZM8.25 15.5833V17.4167H4.58333V15.5833H8.25ZM19.25 2.75H11.9167V8.25H19.25V2.75ZM10.0833 2.75H2.75V11.9167H10.0833V2.75ZM19.25 10.0833H11.9167V19.25H19.25V10.0833ZM10.0833 13.75H2.75V19.25H10.0833V13.75Z" />
                            </svg>
                        </span>
                        <span class="text">Profiles</span>
                        <span class="arrow-icon">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.8333 7.58325L11.0001 13.4166L5.16675 7.58325L4.08342 8.66659L11.0001 15.5833L17.9167 8.66659L16.8333 7.58325Z"
                                    fill="#333333" />
                            </svg>
                        </span>
                    </a>
                    <ul id="ddmenu_2" class="collapse dropdown-nav">
                        <li>
                            <a href="settings.php">Create Profiles</a>
                        </li>
                    </ul>
                </li>
                <span class="divider">
                    <hr />
                </span>
                <li class="nav-item">
                    <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_3"
                        aria-controls="ddmenu_3" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon">
                            <svg width="22" height="22" viewBox="0 0 22 22">
                                <path
                                    d="M17.4167 4.58333V6.41667H13.75V4.58333H17.4167ZM8.25 4.58333V10.0833H4.58333V4.58333H8.25ZM17.4167 11.9167V17.4167H13.75V11.9167H17.4167ZM8.25 15.5833V17.4167H4.58333V15.5833H8.25ZM19.25 2.75H11.9167V8.25H19.25V2.75ZM10.0833 2.75H2.75V11.9167H10.0833V2.75ZM19.25 10.0833H11.9167V19.25H19.25V10.0833ZM10.0833 13.75H2.75V19.25H10.0833V13.75Z" />
                            </svg>
                        </span>
                        <span class="text">Admin</span>
                        <span class="arrow-icon">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.8333 7.58325L11.0001 13.4166L5.16675 7.58325L4.08342 8.66659L11.0001 15.5833L17.9167 8.66659L16.8333 7.58325Z"
                                    fill="#333333" />
                            </svg>
                        </span>
                    </a>
                    <ul id="ddmenu_3" class="collapse dropdown-nav">
                        <li>
                            <a href="account.php"> Accounts </a>
                        </li>
                        <li>
                            <a href="signup_admin.php">Create Account</a>
                        </li>
                    </ul>
        </nav>
    </aside>
    <div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
        <!-- ========== header start ========== -->
        <header class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-6">
                        <div class="header-left d-flex align-items-center">
                            <div class="menu-toggle-btn mr-20">
                                <button id="menu-toggle" class="main-btn primary-btn btn-hover">
                                    <i class="fa fa-bars fa-sm"></i>
                                </button>
                            </div>
                            <div class="header-search d-none d-md-flex">
                                <form action="#">
                                    <input type="text" placeholder="Search..." />
                                    <button><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-6">
                        <div class="header-right">
                            <!-- notification start -->
                            <div class="notification-box ml-15 d-none d-md-flex">

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notification">
                                </ul>
                            </div>
                            <div class="header-message-box ml-15 d-none d-md-flex">

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="message">
                            </div>
                            <!-- message end -->
                            <!-- filter start -->
                            <div class="filter-box ml-15 d-none d-md-flex">

                            </div>
                            <!-- filter end -->
                            <!-- profile start -->
                            <div class="profile-box ml-15">
                                <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="profile-info">
                                        <div class="info">
                                            <h6>Admin</h6>
                                            <div class="image">
                                                <img src="assets/images/profile/" alt="" />
                                                <span class="status"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <i class="fa fa-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                                    <li>
                                        <a href="#0">
                                            <i class="fa fa-bell"></i> Notifications
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#0"> <i class="fa fa-inbox"></i> Messages </a>
                                    </li>
                                    <li>
                                        <a href="#0"> <i class="fa fa-cog"></i> Settings </a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="signOut()"> <i class="fa fa-sign-out"></i> Sign Out </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- profile end -->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ========== header end ========== -->

        <!-- ========== signup-section start ========== -->
        <section class="signup-section">
            <div class="container-fluid">
                <!-- ========== title-wrapper start ========== -->
                <div class="title-wrapper pt-30">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="title mb-30">
                                <h2>Create Account</h2>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-md-6">
                            <div class="breadcrumb-wrapper mb-30">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="#0">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Create Account
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- ========== title-wrapper end ========== -->

                <div class="row g-0 auth-row">
                    <div class="col-lg-6">
                        <div class="auth-cover-wrapper bg-primary-100">
                            <div class="auth-cover">
                                <div class="title text-center">
                                    <h1 class="text-primary mb-10"></h1>
                                    <p class="text-medium">

                                        <br class="d-sm-block" />

                                    </p>
                                </div>
                                <div class="cover-image">
                                    <img src="assets/images/auth/signin-image.svg" alt="" />
                                </div>
                                <div class="shape-image">
                                    <img src="assets/images/auth/shape.svg" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-6">
                        <div class="signup-wrapper">
                            <div class="form-wrapper">
                                <h6 class="mb-15">Create Account</h6>
                                <p class="text-sm mb-25">

                                </p>
                                <form action="signup_admin.php" method="post">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="input-style-1">
                                                <label>Name</label>
                                                <input type="text" name="name" placeholder="Name" required>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                        <div class="col-12">
                                            <div class="input-style-1">
                                                <label>Email</label>
                                                <input type="email" name="email" placeholder="Email" required>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                        <div class="col-12">
                                            <div class="input-style-1">
                                                <label>Username</label>
                                                <input type="text" name="username" placeholder="Username" required>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                        <div class="col-12">
                                            <div class="input-style-1">
                                                <label>Password</label>
                                                <input type="password" name="password" placeholder="Password" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="input-style-1">
                                                <label>Confirm Password</label>
                                                <input type="confirm password" name="confirm password"
                                                    placeholder=" Confirm Password" required>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                        <div class="col-12">
                                            <div class="formGroup">
                                                <div class="select-style">
                                                    <select name="user_account_type" required>
                                                        <option value="" disabled selected>Select User Account Type
                                                        </option>
                                                        <option value="viewer">Viewer</option>
                                                        <option value="uploader">Uploader</option>
                                                        <option value="admin">Admin</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                        <div class="col-12">
                                            <div class="form-check checkbox-style mb-30">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="checkbox-not-robot" />
                                                <label class="form-check-label" for="checkbox-not-robot">
                                                    I'm not robot
                                                </label>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                        <div class="col-12">
                                            <div class="
                            button-group
                            d-flex
                            justify-content-center
                            flex-wrap
                          ">
                                                <div class="col-12">
                                                    <div class="
                            button-group
                            d-flex
                            justify-content-center
                            flex-wrap
                          ">
                                                        <button type="submit" class="sub-btn
                            ">
                                                            Sign Up
                                                        </button>
                                                    </div>
                                                    <?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $user_account_type = $_POST["user_account_type"]; // New user account type field


    if ($password !== $confirm_password) {
        die("Passwords do not match!");
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $conn = new mysqli('localhost', 'root', '', 'ntma_admin');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO admin (name, email, username, password, user_account_type) VALUES (?, ?, ?, ?, ?)"; // Include the user_account_type column in the query
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $email, $username, $hashed_password, $user_account_type); 
    // Bind the user_account_type value to the prepared statement

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>



                                                </div>
                                            </div>
                                </form>
                            </div>
                        </div>
                    </div>
        </section>
        <!-- ========== signup-section end ========== -->

        <script>
            function signOut() {

                $.post("logout.php", function (data) {
                    window.location.href = "login_index.php";
                });

                // After sign-out, you can redirect the user to the login page:
                window.location.href = "login_index.php";
            }
        </script>
    </main>
    <!-- ======== main-wrapper end =========== -->

    <!-- ========= All Javascript files linkup ======== -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/Chart.min.js"></script>
    <script src="assets/js/dynamic-pie-chart.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/fullcalendar.js"></script>
    <script src="assets/js/jvectormap.min.js"></script>
    <script src="assets/js/world-merc.js"></script>
    <script src="assets/js/polyfill.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>