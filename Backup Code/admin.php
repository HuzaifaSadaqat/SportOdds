<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportOdds Admin Panel</title>
    <!--Shortcut Icon-->
    <link rel="icon" href="assets/img/logo/favicon.png">
    <!--Bootstrap Min Css-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!--Main custom Css-->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- My css  -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <!--Header Here-->
    <!-- <header class="header-section">
        <div class="container-fluid p-0">
            <div class="header-wrapper">
                <div class="menu__left__wrap">
                    <div class="logo-menu px-2">
                        <a href="index.html" class="logo">
                            <img src="assets/img/logo/logo.png" alt="logo">
                        </a>
                    </div>
                    <div class="lang d-flex align-items-center px-2">
                        <div class="language__wrap">
                            <div class="flag">
                                <img src="assets/img/header/uk.png" alt="flag">
                            </div>
                            <select name="flag" id="flag-img1">
                                <option value="1">
                                    En
                                </option>
                                <option value="1">
                                    Cy
                                </option>
                                <option value="1">
                                    Et
                                </option>
                            </select>
                        </div>
                        <div class="header-bar d-lg-none">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <ul class="main-menu">
                        <li>
                            <a href="lives.html">
                                <span>Live</span>
                            </a>
                        </li>

                        <li>
                            <a href="#lucky">
                            </a>
                        </li>
                        <li>
                            <a href="promotions.html">
                            </a>
                        </li>
                        <li class="cmn-grp">
                            <span class="cmn--btn" data-bs-toggle="modal" data-bs-target="#signup">
                                <span class="rela">Sign In</span>
                            </span>
                            <span class="cmn--btn2" data-bs-toggle="modal" data-bs-target="#signup">
                                <span class="rela">Sign Up</span>
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="mneu-btn-grp">
                    <div class="language__wrap">
                        <!-- <div class="flag">
                            <img src="assets/img/header/uk.png" alt="flag">
                        </div>
                        <select name="flag" id="flag-img2">
                            <option value="1">
                                En
                            </option>
                            <option value="1">
                                Cy
                            </option>
                            <option value="1">
                                Et
                            </option>
                        </select> 
                    </div>
                        <span>Sign In</span>
                    </a> 
                    <a href="#0" class="cmn--btn2" data-bs-toggle="modal" data-bs-target="#signupin">
                        <span class="rela">Admin</span>
                    </a>
                </div>
            </div>
        </div>
    </header> -->
    <?php
    // if (isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_SESSION['username']) != "" && isset($_SESSION['username']) != "") {
    ?>
        <header>
            <img src="assets/img/logo/logo.png" alt="logo">
            <nav>
                <ul>
                    <!-- <li><a href="#">Home</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li> -->
                </ul>

            </nav>

            <div class="btn">
                <button class="button">Login</button>
                <button class="button signup">Admin</button>
            </div>
        </header>

        <!--Header End-->

        <!-- Left navbar -->
        <div class="left_navbar_container">
            <div class="left_navbar">
                <ul>
                    <li>
                        <a href="admin.php">Dashboard..</a>
                    </li>
                    <li>
                        <a href="createTeams.php">Create Teams</a>
                    </li>
                    <li>
                        <a href="addPlayers.php">Add Players</a>
                    </li>
                    <li>
                        <a href="createUmpire.php">Create Umpire</a>
                    </li>
                    <li>
                        <a href="createMatch.php">Create Match</a>
                    </li>
                    <li>
                        <a href="matchToss.php">Play Match</a>
                    </li>
                </ul>
            </div>
        </div>

        <section>
            <div class="rightsection">
                Section
            </div>
        </section>




        <!-- <footer class="footer">
        <div class="fcontainer">
            <div class="row">
                <div class="footer-col">
                    <h4 >Company</h4>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Our Services</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Affiliate Programs</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Get Help </h4>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Shipping</a></li>
                        <li><a href="#">Returns</a></li>
                        <li><a href="#">Order Status</a></li>
                        <li><a href="#">Payement Options</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Online Shop </h4>
                    <ul>
                        <li><a href="#">Watch</a></li>
                        <li><a href="#">Bag</a></li>
                        <li><a href="#">Shoes</a></li>
                        <li><a href="#">Dress</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Follow Us </h4>
                    <div class="social-links">
                        <a href="#" class="fa fa-facebook"></a>
                        <a href="#" class="fa fa-instagram"></a>
                        <a href="#" class="fa fa-twitter"></a>
                    </div>
                </div>
            </div>
        </div>
 
    </footer> -->
    <?php
    // } else {
    //     die("Logged Out");
    // }
    ?>

</body>

</html>