<?php
include "dbcon_admin.php";

$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

// Default values for pagination
$records_per_page = 20; 
$pageno = isset($_GET['pageno']) ? (int)$_GET['pageno'] : 1;
$offset = ($pageno - 1) * $records_per_page;

// Get the total number of records in the table
$sql_total_records = "SELECT COUNT(*) as total FROM `admin`";
$result_total_records = mysqli_query($conn, $sql_total_records);

if ($result_total_records) {
    $total_records = mysqli_fetch_assoc($result_total_records)['total'];
} else {
    die("Error: " . mysqli_error($conn));
}

// Calculate the total number of pages
$total_pages = ceil($total_records / $records_per_page);

// Search Filter
if (!empty($searchTerm)) {
    $sql2 = "SELECT * FROM `admin` WHERE `id` LIKE '%$searchTerm%' LIMIT $offset, $records_per_page";
} else {
    $sql2 = "SELECT * FROM `admin` LIMIT $offset, $records_per_page";
}

$result2 = mysqli_query($conn, $sql2);

if (!$result2) {
    die("Error: " . mysqli_error($conn));
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/logos.png" type="image/x-icon" />
    <title>NTMA Integrated Data Management System</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/lineicons.css" />
    <link rel="stylesheet" href="assets/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="assets/css/main.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <style>
        .tables-wrapper {
            width: 100%;

        }

        .table.top-selling-table {
            width: 100%;
        }

        .filter-container {
            max-width: 140px;
            background: #FFFFFF;
            float: left;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-top: 5px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .table tbody td {
            white-space: nowrap;
        }


        .filter-container {
            margin-right: 20px;
        }

        .search-container {
            position: absolute;
            top: 5px;
            right: 20px;
        }

        .search-box {
            height: 30px;
            display: flex;
            cursor: pointer;
            padding: 10px 20px;
            background: #fff;
            border-radius: 30px;
            align-items: center;
            box-shadow: 0 2px 0px rgba(0, 0, 0, 0.3);
        }

        .search-box:hover input {
            width: 400px;

        }

        .search-box input {
            width: 0;
            outline: none;
            border: none;
            font-weight: 500;
            transition: 0.8s;
            background: transparent;
        }

        .search-box a .fas {
            color: #1daf;
            font-size: 18px;
        }

        .search-box button {
            position: absolute;
            border: none;
            background: transparent;
            top: 0;
            height: 125px;
            color: #0d6efd;
            font-weight: 700;
            right: 10px;
            top: 55%;
            transform: translateY(-50%);
        }

        /* Add custom CSS styles */
        .student-info-container {
            background-color: #f7f7f7;
            padding: 10px;
            border: 1px solid #ddd;
            margin-bottom: 20px;
        }

        .student-info-container {
            text-align: center;
            margin-bottom: 20px;
        }


        #student-details {
            height: 100%;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 4px;
            overflow-y: auto;
        }

        .student-info-container {
            margin-bottom: 20px;
            background: linear-gradient(to left, rgba(129, 197, 237, 1), rgba(13, 110, 253, 1));
            color: #ffffff;
            color: #fff;
            padding: 10px;
            border-radius: 4px;
            height: 50px;
        }

        .student-info-container h4 {
            color: #fff;
            position: relative;
            bottom: 10%;
            font-family: "Amazon Ember", sans-serif;
            font-size: 30px;
        }


        .back-button {
            position: absolute;
            margin-top: 30px;
            top: 0px;
            left: 10px;
            background: linear-gradient(to right, rgba(129, 197, 237, 1), rgba(13, 110, 253, 1));
            color: #ffffff;
            padding: 10px 20px;
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

        .back-button :hover {
            background-color: #f7fafa;
        }

        .back-button :focus {
            border-color: #008296;
            box-shadow: rgba(13, 110, 253, .5) 0 2px 5px 0;
            outline: 0;
        }

        .search-container {
            position: absolute;
            top: 1px;
            right: 0px;
        }

        .search-box {
            height: 30px;
            display: flex;
            cursor: pointer;
            padding: 10px 20px;
            background: #fff;
            border-radius: 10px;
            align-items: center;
            box-shadow: 0 0px 2px rgba(0, 0, 0, 0.3);
        }

        .search-box:hover input {
            width: 400px;

        }

        .search-box input {
            width: 0;
            border: none;
            font-weight: 500;

            background: transparent;
        }

        .search-box a .fas {
            color: #1daf;
            font-size: 18px;
        }

        .search-box button {
            position: absolute;
            border: none;
            background: transparent;
            top: 0;
            height: 125px;
            color: #0d6efd;
            font-weight: 700;
            right: 10px;
            top: 55%;
            transform: translateY(-50%);
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
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="#fff"
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

                                </button>
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

        <!-- ========== section start ========== -->
        <section class="section">
            <div class="container-fluid">
                <!-- ========== title-wrapper start ========== -->
                <div class="title-wrapper pt-30">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="title mb-30" id="title">
                                <h2>ACCOUNT</h2>
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
                                            Account
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
                <?php
include "dbcon_admin.php";

$query_admin = "SELECT COUNT(*) AS num_admin FROM admin WHERE user_account_type = 'Admin'";
$result_admin = mysqli_query($conn, $query_admin);
$row_admin = mysqli_fetch_assoc($result_admin);
$num_admin = $row_admin['num_admin'];

// Fetch the number of students with status = 'Active'
$query_viewer = "SELECT COUNT(*) AS num_viewer FROM admin WHERE user_account_type = 'Viewer'";
$result_viewer = mysqli_query($conn, $query_viewer);
$row_viewer = mysqli_fetch_assoc($result_viewer);
$num_viewer = $row_viewer['num_viewer'];

// Fetch the number of alumni with status = 'Alumni'
$query_uploader = "SELECT COUNT(*) AS num_uploader FROM admin WHERE user_account_type = 'Uploader'";
$result_uploader = mysqli_query($conn, $query_uploader);
$row_uploader = mysqli_fetch_assoc($result_uploader);
$num_uploader = $row_uploader['num_uploader'];
?>
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-3 col-lg-4 col-sm-6" id="small-content-admin">
                        <div class="icon-card mb-30">
                            <div class="icon orange">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="content">
                                <h6 class="mb-10">Admin</h6>
                                <h3 class="text-bold mb-10">
                                    <?php echo $num_admin; ?>
                                </h3>
                                <p class="text-sm text-danger">
                                    <span class="text-gray"></span>
                                </p>
                            </div>
                        </div>
                        <!-- End Icon Cart -->
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6" id="small-content-viewer">
                        <div class="icon-card mb-30">
                            <div class="icon purple">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="content">
                                <h6 class="mb-10">Viewer</h6>
                                <h3 class="text-bold mb-10">
                                    <?php echo $num_viewer; ?>
                                </h3>
                                <p class="text-sm text-success">
                                    <span class="text-gray"></span>
                                </p>
                            </div>
                        </div>
                        <!-- End Icon Cart -->
                    </div>
                    <!-- End Col -->
                    <div class="col-xl-3 col-lg-4 col-sm-6" id="small-content-uploader">
                        <div class="icon-card mb-30">
                            <div class="icon success">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="content">
                                <h6 class="mb-10">Uploader</h6>
                                <h3 class="text-bold mb-10">
                                    <?php echo $num_uploader; ?>
                                </h3>
                                <p class="text-sm text-success">
                                    <span class="text-gray"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ========== tables-wrapper start ========== -->
                <!-- ========== tables-wrapper start ========== -->
                <div class="tables-wrapper">
                    <div class="row">
                        <?php 
                include "dbcon_admin.php";
                $query = "select * from admin";
                $result = mysqli_query($conn,$query);
            ?>
                        <div class="col-lg-12">
                            <div class="list-title-container" id="title">
                                <h6 class="mb-10"></h6>
                            </div>
                            <div class="card-style mb-30">
                                <div class="search-container" id="search-box-container">
                                    <div class="search-box">
                                        <form class="form-inline" method="post" id="search-form">
                                            <input type="text" name="search_keyword" class="form-control"
                                                placeholder="Search" id="search-input">
                                            <button type="submit"><i class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>


                                <div class="table-wrapper table-responsive">
                                    <table class="table">
                                        <div class="table-responsive">
                                            <table class="table top-selling-table" id="database-table">
                                                <thead>
                                                    <tr>
                                                        <th> Id </th>
                                                        <th> Name </th>
                                                        <th> Email </th>
                                                        <th> Username </th>
                                                        <th> Account Type </th> <!-- New column for actions -->
                                                        <th> Actions </th> <!-- New column for actions -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "ntma_admin";

            $connection = new mysqli($servername, $username, $password, $database);

            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }

            $searchKeyword = isset($_POST['search_keyword']) ? $_POST['search_keyword'] : '';

            if (!empty($searchKeyword)) {
                $sql = "SELECT * FROM admin WHERE 
                        id LIKE '%$searchKeyword%' OR 
                        name LIKE '%$searchKeyword%' OR
                        email LIKE '%$searchKeyword%' OR
                        username LIKE '%$searchKeyword%' OR 
                        user_account_type LIKE '%$searchKeyword%'";
            } else {
                $sql = "SELECT * FROM admin";
            }

            $result = $connection->query($sql);

            if (!$result) {
                die("Invalid query: " . $connection->error);
            }

            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                     echo "<td>" . $row["username"] . "</td>";
                    echo "<td>" . $row["user_account_type"] . "</td>";
                    echo "<td>
                            <a href='#' class='view' data-id='" . $row["id"] . "' title='View' data-toggle='tooltip'><i class='fa fa-eye' aria-hidden='true'></i></a>
                            <a href='#' class='edit' data-id='" . $row["id"] . "' title='Edit' data-toggle='tooltip'><i class='fa fa-edit' aria-hidden='true'></i></a>
                            <a href='#' class='delete' data-id='" . $row["id"] . "' title='Delete' data-toggle='tooltip'><i class='fa fa-trash' aria-hidden='true'></i></a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr>
                          <td colspan='6'>No results found.</td>
                      </tr>";
            }
            ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="pagination" id="page">
                                            <ul class="pagination justify-content-center">
                                                <?php if ($pageno > 1): ?>
                                                <li class="page-item">
                                                    <a class="page-link"
                                                        href="?pageno=<?php echo $pageno - 1; ?><?php echo !empty($searchTerm) ? '&search=' . urlencode($searchTerm) : ''; ?>">Previous</a>
                                                </li>
                                                <?php endif; ?>

                                                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                                <li class="page-item <?php echo $i === $pageno ? 'active' : ''; ?>">
                                                    <a class="page-link"
                                                        href="?pageno=<?php echo $i; ?><?php echo !empty($searchTerm) ? '&search=' . urlencode($searchTerm) : ''; ?>">
                                                        <?php echo $i; ?>
                                                    </a>
                                                </li>
                                                <?php endfor; ?>

                                                <?php if ($pageno < $total_pages): ?>
                                                <li class="page-item">
                                                    <a class="page-link"
                                                        href="?pageno=<?php echo $pageno + 1; ?><?php echo !empty($searchTerm) ? '&search=' . urlencode($searchTerm) : ''; ?>">Next</a>
                                                </li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                        <div id="details-section" style="display: none;">
                                            <!-- Separate container for the Student Information title -->
                                            <div class="student-info-container">
                                                <h4>Account Information</h4>
                                            </div>
                                            <!-- Add the details content here -->
                                            <div id="student-details">
                                            </div>
                                            <button class="btn btn-secondary back-button"
                                                style="display: none;">Back</button>
                                        </div>

                                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                        <script>
                                            $(document).ready(function () {
                                                $('.edit').click(function () {
                                                    var userid = $(this).data('id');
                                                    $.ajax({
                                                        url: 'ajax_account.php',
                                                        type: 'post',
                                                        data: { userid: userid },
                                                        success: function (response) {
                                                            // Hide the List of Students title, search box, and show the details section
                                                            $('.list-title-container').hide();
                                                            $('#search-box-container').hide();
                                                            $('#title-tables').hide();
                                                            $('table').hide();
                                                            $('#page').hide();
                                                            $('#title').hide();
                                                            $('#small-content-admin').hide();
                                                            $('#small-content-viewer').hide();
                                                            $('#small-content-uploader').hide();
                                                            $('#student-details').html(response);
                                                            $('#details-section').show();
                                                            $('.back-button').show(); // Show the "Back" button in the details section
                                                        }
                                                    });
                                                });

                                                $('.view').click(function () {
                                                    var userid = $(this).data('id');
                                                    $.ajax({
                                                        url: 'view_edit_account.php',
                                                        type: 'post',
                                                        data: { userid: userid, action: 'view' }, // Add action parameter
                                                        success: function (response) {
                                                            // Hide the List of Students title, search box, and show the details section
                                                            $('.list-title-container').hide();
                                                            $('#search-box-container').hide();
                                                            $('#title-tables').hide();
                                                            $('table').hide();
                                                            $('#page').hide();
                                                            $('#title').hide();
                                                            $('#small-content-admin').hide();
                                                            $('#small-content-viewer').hide();
                                                            $('#small-content-uploader').hide();
                                                            $('#student-details').html(response);
                                                            $('#details-section').show();
                                                            $('.back-button').show(); // Show the "Back" button in the details section
                                                        }
                                                    });
                                                });

                                                // Back button click event to go back to the table section
                                                $('#details-section').on('click', '.back-button', function () {
                                                    $('#details-section').hide();
                                                    $('.list-title-container').show();
                                                    $('#search-box-container').show();
                                                    $('#title-tables').show();
                                                    $('table').show();
                                                    $('.back-button').hide();
                                                    $('#title').show();
                                                    $('#small-content-admin').show();
                                                    $('#small-content-viewer').show();
                                                    $('#small-content-uploader').show();
                                                    $('#page').show();// Hide the "Back" button when returning to the table section
                                                });

                                                $('#edit-submit').click(function () {
                                                    var userid = $('#userid').val();
                                                    var name = $('#name').val();
                                                    var email = $('#email').val();
                                                    var account = $('#acoount').val();

                                                    $.ajax({
                                                        url: 'view_edit_account.php',
                                                        type: 'post',
                                                        data: {
                                                            userid: userid,
                                                            action: 'edit',
                                                            name: name,
                                                            email: email
                                                        },
                                                        success: function (response) {
                                                            alert(response);
                                                            $('#details-section').hide();
                                                            $('.back-button').hide();
                                                            $('.list-title-container').show();
                                                            $('#search-box-container').show();
                                                            $('table').show();
                                                            $('#page').show();
                                                            $('#title').show();
                                                            $('#small-content-admin').show();
                                                            $('#small-content-viewer').show();
                                                            $('#small-content-uploader').show();

                                                        }
                                                    });
                                                });
                                            });
                                        </script>
                                </div>

                                <script>
                                    $(document).ready(function () {
                                        // Function to handle delete action
                                        function handleDelete(id) {
                                            // Display a confirmation message before proceeding with deletion
                                            var confirmDelete = confirm("Are you sure you want to delete this row?");
                                            if (confirmDelete) {
                                                // Perform AJAX request to delete the row from the database
                                                $.ajax({
                                                    url: 'delete_accdata.php',
                                                    type: 'POST',
                                                    data: { id: id },
                                                    success: function (response) {

                                                        if (response === 'success') {
                                                            $("#row_" + id).remove(); // Remove the row from the table
                                                        } else {
                                                            console.log('Failed to delete row with ID: ' + id);
                                                        }
                                                    },
                                                    error: function () {
                                                        console.log('Error occurred during deletion.');
                                                    }
                                                });
                                            }
                                        }


                                        $("tbody").on("click", ".delete", function (event) {
                                            event.preventDefault();
                                            var id = $(this).data("id");
                                            console.log("Clicked delete button for ID: " + id);
                                            handleDelete(id);
                                        });
                                    });
                                </script>
                            </div>
                            <script>
                                function signOut() {

                                    $.post("logout.php", function (data) {
                                        window.location.href = "login_index.php";
                                    });


                                    window.location.href = "login_index.php";
                                }
                            </script>
                            <script>
                                $(document).ready(function () {
                                    $('#database-table').DataTable();
                                });
                            </script>

                        </div>
                    </div>

    </main>


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