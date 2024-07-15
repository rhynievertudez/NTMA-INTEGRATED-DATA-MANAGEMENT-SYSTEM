<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <title>NTMA</title>

    <link href="assets/images/logos.png" rel="icon">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-tale-seo-agency.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <style>
        .popupContainer {
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 9999;
        }

        .modalContent {
            background: #fff;
            max-width: 400px;
            width: 80%;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 10000;
            color: #333;

        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .title {
            font-size: 24px;
            color: #333;
            margin: 0;
        }

        .modal_close {
            font-size: 24px;
            cursor: pointer;
            color: #666;
        }

        .formGroup {
            margin-bottom: 20px;
        }

        .formGroup label {
            display: block;
            font-size: 14px;
            color: #666;
            margin-bottom: 5px;
        }

        .formGroup input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .rememberMe label {
            font-size: 14px;
            color: #666;
        }

        .action_btns {
            text-align: center;
            margin-top: 20px;
        }

        #btn {
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
            position: relative;
            overflow: hidden;
        }

        .forgot_password {
            font-size: 14px;
            color: #007bff;
            text-decoration: none;
            display: block;
            text-align: center;
            margin-top: 10px;
        }

        .social_login {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .social_box {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #fff;
            background-color: #333;
            padding: 10px 20px;
            border-radius: 5px;
            margin-right: 10px;
            transition: background-color 0.3s ease;
        }

        .social_box:hover {
            background-color: #444;
        }

        .social_box .icon {
            margin-right: 10px;
        }

        .social_box.google {
            background-color: #dd4b39;
        }

        .social_box.google:hover {
            background-color: #e74b37;/
        }

        .header-area {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }

        .modalContent .header .title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            background: linear-gradient(to right, rgba(129, 197, 237, 1), rgba(13, 110, 253, 1)100%);
            -webkit-background-clip: text;
            color: transparent;
            margin-bottom: 20px;
        }

        /* Style for the close button */
        .modalContent .header .modal_close {
            position: absolute;
            top: 5px;
            right: 5px;
            font-size: 24px;
            cursor: pointer;
            color: #888;
        }

        .user_login {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }

        .user_login form {
            display: flex;
            flex-direction: column;
        }

        .user_login label {
            font-weight: bold;
        }

        .user_login input[type="text"],
        .user_login input[type="password"] {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .user_login .checkbox {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .user_login .checkbox label {
            margin-left: 5px;
        }

        .user_login .action_btns {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .user_login #btn {
            padding: 10px 20px;
            color: #fff;
            background: linear-gradient(to right, rgba(129, 197, 237, 1), rgba(13, 110, 253, 1)100%);
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        .user_login #btn:hover {
            background-color: #45a049;
        }

        .user_login .forgot_password {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #ff0000;
            text-decoration: none;
        }

        .user_login .forgot_password:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                        </ul>
                        </li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div class="main-banner" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="caption header-text">
                        <h6>NYK-TDG MARITIME ACADEMY</h6>
                        <div class="line-dec"></div>
                        <h4>Integrated Data <em>Management</em> System <span></span></h4>
                        <p> </p>
                        <div class="second-button"><a href="modal">Sign In</a></div>
                    </div>
                </div>
            </div>
            <div id="modal" class="popupContainer" style="display: none;">
                <div class="modalContent">
                    <div class="header">
                        <h2 class="title">Sign In</h2>
                        <span class="modal_close">&times;</span>
                    </div>
                    <div class="formContainer">
                        <form name="f1" action="index.php" onsubmit="return validation()" method="POST">
                            <div class="formGroup">
                                <input class="form-control" type="text" id="username" name="username"
                                    placeholder="Username" required>
                            </div>
                            <div class="formGroup">
                                <input type="password" id="pass" name="password" placeholder="Password" required>
                            </div>
                            <div class="rememberMe">
                                <input id="remember" type="checkbox">
                                <label for="remember">Remember me on this computer</label>
                            </div>
                            <div class="action_btns">
                                <input type="submit" id="btn" value="Login" />
                            </div>
                        </form>
                        <a href="#" class="forgot_password">Forgot password?</a>
                    </div>
                </div>
            </div>

        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

        <script src="assets/js/isotope.min.js"></script>
        <script src="assets/js/owl-carousel.js"></script>
        <script src="assets/js/tabs.js"></script>
        <script src="assets/js/popup.js"></script>
        <script src="assets/js/custom.js"></script>

        <script>
            function validation() {
                var id = document.f1.user.value;
                var ps = document.f1.pass.value;
                if (id.length === 0 && ps.length === 0) {
                    alert("User Name and Password fields are empty");
                    return false;
                } else {
                    if (id.length === 0) {
                        alert("User Name is empty");
                        return false;
                    }
                    if (ps.length === 0) {
                        alert("Password field is empty");
                        return false;
                    }
                }
            }
        </script>
</body>

</html>
<script>
    $(document).ready(function () {
        // Function to show the modal when "Sign In" link is clicked
        $(".second-button a").on("click", function (event) {
            event.preventDefault();
            $("#modal").fadeIn();
        });

        // Function to close the modal when the close button is clicked
        $(".modal_close").on("click", function () {
            $("#modal").fadeOut();
        });
    });
</script>
</body>

</html>