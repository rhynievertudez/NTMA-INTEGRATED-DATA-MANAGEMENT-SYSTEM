<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/logos.png" type="image/x-icon" />
    <title>Create Profile | PlainAdmin Demo</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/lineicons.css" />
    <link rel="stylesheet" href="assets/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="assets/css/main.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" />

    <style>
        .content-wrapper {
            margin-top: 20px;
        }

        .card {
            border: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .nav-tabs-primary .nav-link.active {
            background-color: transparent;
            color: #000000;
        }

        .form-group {
            margin-bottom: 20px;
            background-color: transparent !important;
        }

        .form-control {
            background-color: transparent !important;
            border: none;
            border-bottom: 1px solid #ccc;
            color: #000;
            padding: 8px 0;
        }

        .form-control::placeholder {
            color: #999;
        }

        input[type="submit"] {
            background: linear-gradient(to right, rgba(129, 197, 237, 1), rgba(13, 110, 253, 1));
            color: #ffffff;
            padding: 10px 20px;
            /* Adjust padding as needed */
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: linear-gradient(to right, rgba(13, 110, 253, 1), rgba(129, 197, 237, 1));
        }

        .nav-tabs-primary {
            background: linear-gradient(to left, rgba(129, 197, 237, 1), rgba(13, 110, 253, 1));
            border-radius: 5px;
            color: #fff;
        }

        .student-profile-text {
            color: #ffffff;
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

        <!-- ========== section start ========== -->
        <section class="section">
            <div class="container-fluid">
                <!-- ========== title-wrapper start ========== -->
                <div class="title-wrapper pt-30">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="titlemb-30">
                                <h2>Create Profiles</h2>
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
                                            Create Profiles
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

                <div class="clearfix"></div>
                <div class="content-wrapper">
                    <div class="container-fluid">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                                        <li class="nav-item">
                                            <a href="javascript:void();" data-target="#profile" data-toggle="pill"
                                                class="nav-link active"><i class="icon-user"></i> <span
                                                    class="hidden-xs student-profile-text">Student Profile</span></a>
                                        </li>
                                    </ul>
                                    <br />
                                    <div class="col-lg-11" id="profile">
                                        <form id="action" method="POST" action="upload_profile.php"
                                            enctype="multipart/form-data">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label">Student
                                                    ID</label>
                                                <div class="col-lg-9">
                                                    <input class="form-control" type="text" id="id" name="id"
                                                        placeholder="Student ID" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label">Student
                                                    Year</label>
                                                <div class="col-lg-9">
                                                    <input class="form-control" type="text" id="year" name="year"
                                                        placeholder="Student Year" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label">Student
                                                    Name</label>
                                                <div class="col-lg-9">
                                                    <input class="form-control" type="text" id="name" name="name"
                                                        placeholder="Name" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                                <div class="col-lg-9">
                                                    <input class="form-control" type="email" id="email" name="email"
                                                        placeholder="E-mail Address" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 col-form-label form-control-label">Address</label>
                                                <div class="col-lg-9">
                                                    <input class="form-control" type="text" id="address" name="address"
                                                        placeholder="Address" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label">Age</label>
                                                <div class="col-lg-9">
                                                    <input class="form-control" type="number" id="age" name="age"
                                                        placeholder="Age" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 col-form-label form-control-label">Birthday</label>
                                                <div class="col-lg-9">
                                                    <input class="form-control" type="date" id="birthday"
                                                        name="birthday" placeholder="Date of Birth" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label">Gender</label>
                                                <div class="col-lg-9">
                                                    <input class="form-control" type="text" id="gender" name="gender"
                                                        placeholder="Gender" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label">Course</label>
                                                <div class="col-lg-9">
                                                    <input class="form-control" type="text" id="course" name="course"
                                                        placeholder="Course" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label">Status</label>
                                                <div class="col-lg-9">
                                                    <input class="form-control" type="text" id="status" name="status"
                                                        placeholder="Status" required>
                                                </div>
                                            </div>
                                            <div id="previews"></div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label">Student
                                                    Files</label>
                                                <div class="col-lg-9">
                                                    <input class="form-control" type="file" id="profileFiles"
                                                        name="files[]" accept=".pdf, .doc, .docx, .jpg, .png" multiple>
                                                    <ul id="file-list" class="list-unstyled"></ul>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label"></label>
                                                <div class="col-lg-9">
                                                    <input type="submit" name="submit" value="Submit">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <script>
                                        // JavaScript to show the list of files selected for upload
                                        const fileInput = document.getElementById("profileFiles");
                                        const fileList = document.getElementById("file-list");

                                        fileInput.addEventListener("change", function (event) {
                                            const files = event.target.files;
                                            fileList.innerHTML = ""; // Clear the existing list

                                            for (let i = 0; i < files.length; i++) {
                                                const listItem = document.createElement("li");
                                                listItem.textContent = files[i].name;
                                                fileList.appendChild(listItem);
                                            }
                                        });
                                    </script>
                                    <script>
                                        function signOut() {

                                            $.post("logout.php", function (data) {
                                                window.location.href = "login_index.php";
                                            });


                                            window.location.href = "login_index.php";
                                        }
                                    </script>
    </main>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- simplebar js -->
    <script src="assets/plugins/simplebar/js/simplebar.js"></script>
    <!-- sidebar-menu js -->
    <script src="assets/js/sidebar-menu.js"></script>
    <!-- Custom scripts -->
    <script src="assets/js/app-script.js"></script>


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