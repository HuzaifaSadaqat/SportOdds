<?php
//conn db        
$servername = "localhost";
$username = "root";
$password = "";
$database = "sportodds";

//create conncetion
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Sorry Connection unsuccessful" . mysqli_connect_error());
} else {
    // echo'Connection was successful<br>'; 
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportOdds</title>
    <!--Shortcut Icon-->
    <link rel="icon" href="assets/img/logo/favicon.png">
    <!--Bootstrap Min Css-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!--Macnific Popup Css-->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!--Owl Carousel min Css-->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <!--Owl theme Default Css-->
    <link rel="stylesheet" href="assets/css/owl.theme.default.css">
    <!--nice select Css-->
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <!--Glyphter Css-->
    <link rel="stylesheet" href="assets/glyphter-font/css/Glyphter.css">
    <!--animation Css-->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!--Fontawsome all min Css-->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!--Main custom Css-->
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
    <!--Mian Body Area Start-->
    <!--Mian Body Area Start-->

    <!--Header Here-->
    <header class="header-section">
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
                                <span>Lucky&nbsp;Drops</span>
                            </a>
                        </li>
                        <li>
                            <a href="promotions.html">
                                <span>Promotions</span>
                            </a>
                        </li>
                        <li class="cmn-grp">
                            <span class="cmn--btn" data-bs-toggle="modal" data-bs-target="#signin">
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
                        </select> -->
                    </div>
                    <a href="login.php" class="cmn--btn" data-bs-toggle="" data-bs-target="">
                        <span>Sign In</span>
                    </a>
                    <a href="#0" class="cmn--btn2" data-bs-toggle="modal" data-bs-target="#signupin">
                        <span class="rela">Sign Up</span>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <!--Header End-->

    <!--Sub-Header Tabs Here-->
    <section class="main__tab__slide">
        <ul class="nav nav-tabs" id="myTabmain" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="main-tab" data-bs-toggle="tab" data-bs-target="#mainTab"
                    type="button" role="tab" aria-selected="true">
                    <span class="icons"><i class="icon-home"></i></span>
                    <span>Home</span>
                </button>
            </li>

            <li class="nav-item">
                <div class="search-button">
                    <button class="nav-link" id="search">
                        <span class="icons"><i class="icon-search"></i></span>
                        <span>Search</span>
                    </button>
                    <div class="search-popup">
                        <div class="search-bg"></div>
                        <div class="search-form">
                            <form action="#">
                                <div class="form">
                                    <input type="text" id="searchs" placeholder="Search Your Fovatires Game">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="main-tab14" data-bs-toggle="tab" data-bs-target="#mainTab14" type="button"
                    role="tab" aria-selected="false">
                    <span class="icons"><i class="icon-star"></i></span>
                    <span>Favourites</span>
                </button>
            </li>
        </ul>
    </section>
    <!--Sub-Header Tabs Here-->

    <!--Global Main Body-->
    <section class="main__body__area">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-xs-12">
                    <div class="left__site__section">
                        <div class="tab-content" id="myTabContentmain">
                            <!--Global Main Body-->
                            <div class="popular__events__body">
                                <div class="container-fluid p-0">
                                    <div class="row">

                                        <div class="col-xs-12">
                                            <!--Home Page Tabs Here-->
                                            <div class="tab-pane text-white fade show active" id="mainTab"
                                                role="tabpanel" tabindex="0">

                                                <!--Match Fixing Slider-->
                                                <div class="match__fixing__wrap top__bottom__space left__right__space owl-theme owl-carousel">
                                                <?php
                                                    // $host = "127.0.0.1";
                                                    // $port = "857";
                                                    // $socket = socket_create(AF_INET, SOCK_STREAM, 0) ;
                                                    // $result = socket_bind($socket, $host, $port) ;
                                                    // $result = socket_listen($socket, 3) ;
                                                    
                                                    // // do {
                                                    //     $accept = socket_accept($socket) or die('Not accept');
                                                    //     $msg = socket_read($accept, 1024);
                                                    //     $msg = trim($msg);
                                                    //     echo $msg . "\n";
                                                        
                                                    //     // Close the accepted socket inside the loop, not outside
                                                    //     // socket_close($accept);
                                                    
                                                    // // } while (true);
                                                    
                                                    // socket_close($accept);
                                                    // socket_close($socket);
                                                    
                                                
                                                    $sql = "SELECT m.*, t.team_name AS teamA_name, t2.team_name AS teamB_name
                                                    FROM m_atch m
                                                    JOIN team t ON m.match_teamA = t.team_id
                                                    JOIN team t2 ON m.match_teamB = t2.team_id";

                                                    $result = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_assoc($result)) {?>
                                                    <a href="#0" class="match__fixing__items">
                                                        <div class="match__head">
                                                            <div class="match__head__left">
                                                                <span class="icons">
                                                                    <i class="icon-cricket"></i>
                                                                </span>
                                                                <span>
                                                                    World Cup 2022
                                                                </span>
                                                            </div>
                                                            <span class="today">
                                                                <!-- Today / 22:00 -->
                                                            </span>
                                                        </div>
                                                        <div class="match__vs">
                                                            <div class="match__vs__left">
                                                                <span>
                                                                    <?php
                                                                    echo $row['teamA_name'];
                                                                    ?>
                                                                </span>
                                                                <span class="flag">
                                                                    <img src="assets/img/matchfixing/arjentina.png"
                                                                        alt="flag">
                                                                </span>
                                                            </div>
                                                            <span class="vs">
                                                                Vs
                                                            </span>
                                                            <div class="match__vs__left">
                                                                <span class="flag">
                                                                    <img src="assets/img/matchfixing/france.png" 
                                                                        alt="flag">
                                                                </span>
                                                                <span>
                                                                    <?php
                                                                    echo $row['teamB_name'];
                                                                    ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="match__result">
                                                            <span class="matchborder"></span>
                                                            <span class="match__text">
                                                            <!-- Match Insights -->
                                                            <?php
                                                                $sql1 = "SELECT t.*, tm.team_name AS team_toss_won1
                                                                FROM toss t
                                                                JOIN team tm ON t.team_toss_won = tm.team_id
                                                                WHERE t.match_id = " . $row['match_id'];

                                                                $result1 = mysqli_query($conn, $sql1);
                                                                $row1 = mysqli_fetch_assoc($result1);

                                                                echo $row1['team_toss_won1'] . " Elected to " . $row1['team_decision'];
                                                            ?>
                                                            </span>
                                                        </div>
                                                        <ul class="match__point">
                                                            <li>
                                                                <?php
                                                                $sql2 = "SELECT * FROM match_details WHERE match_id = " . $row['match_id'] . " ORDER BY match_details_id DESC";
                                                                $result2 = mysqli_query($conn, $sql2);
                                                                $row2 = mysqli_fetch_assoc($result2);
                                                                if ($row2) {
                                                                ?>
                                                                <span><?php 
                                                                echo $row2['total_score']; 

                                                                $sql3 = "SELECT SUM(wickets) AS wickets FROM match_details WHERE match_id = " . $row['match_id'] . " ORDER BY match_details_id DESC";
                                                                $result3 = mysqli_query($conn, $sql3);
                                                                $row3 = mysqli_fetch_assoc($result3);
                                                                if($row3){
                                                                    echo " / ". $row3['wickets'];
                                                                }

                                                                } else { echo "0";
                                                                }?></span>
                                                                <span></span>
                                                            </li>
                                                            <li>
                                                                <span>X</span>
                                                                <span>6.50</span>
                                                            </li>
                                                            <li>
                                                                <span>2</span>
                                                                <span>3.20</span>
                                                            </li>
                                                        </ul>
                                                    </a>
                                                    <?php
                                                        }
                                                    ?>
                                                </div>
                                                <!--Match Fixing Slider-->

                                                <!--Main body-->
                                                <div class="main__body__wrap left__right__space">

                                                    <!--Live__heightlight Here-->
                                                    <div class="live__heightlight mb__30">
                                                        <div class="section__title">
                                                            <h4>
                                                                Live Highlights
                                                            </h4>
                                                        </div>
                                                        <div class="heightlight__tab">
                                                            <div class="nav b__bottom" id="nav-tabheight"
                                                                role="tablist">
                                                                <button class="nav-link active" id="lightlighttab"
                                                                    data-bs-toggle="tab" data-bs-target="#cricket_tab"
                                                                    type="button" role="tab" aria-selected="true">
                                                                    <span class="icons">
                                                                    <i class="icon-cricket"></i>
                                                                    </span>
                                                                    <span>
                                                                        Cricket
                                                                    </span>
                                                                </button>
                                                                <button class="nav-link " id="lightlighttab2tennis"
                                                                    data-bs-toggle="tab" data-bs-target="#height2tennis"
                                                                    type="button" role="tab" aria-selected="false">
                                                                    <span class="icons">
                                                                        <i class="icon-tennis"></i>
                                                                    </span>
                                                                    <span>
                                                                        Tennis
                                                                    </span>
                                                                </button>
                                                                <button class="nav-link " id="lightlighttab5cricket"
                                                                    data-bs-toggle="tab" data-bs-target="#footballtab"
                                                                    type="button" role="tab" aria-selected="false">
                                                                    <span class="icons">
                                                                        <i class="icon-football"></i>
                                                                    </span>
                                                                    <span>
                                                                        Football
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="height__table">
                                                            <div class="tab-content" id="nav-tabContentheight">
                                                                <!--Cricket-->
                                                                <div class="tab-pane fade text-white show active"
                                                                    id="cricket_tab" role="tabpanel"
                                                                    aria-labelledby="nav-home-tabpre" tabindex="0">
                                                                    <div class="main__table">
                                                                        <div class="section__head b__bottom">
                                                                            <div class="left__head">
                                                                                <span class="icons">
                                                                                    <i class="icon-cricket"></i>
                                                                                </span>
                                                                                <span>
                                                                                    Cricket
                                                                                </span>
                                                                            </div>
                                                                            <div class="right__catagoris">
                                                                                <div class="right__cate__items">
                                                                                    <select name="cate1"
                                                                                        id="categoris74">
                                                                                        <option value="1">
                                                                                            Result 1X2
                                                                                        </option>
                                                                                        <option value="1">
                                                                                            Result 1X3
                                                                                        </option>
                                                                                        <option value="1">
                                                                                            Result 1X4
                                                                                        </option>
                                                                                        <option value="1">
                                                                                            Result 1X5
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="right__cate__items">
                                                                                    <select name="cate1"
                                                                                        id="categoris2">
                                                                                        <option value="1">
                                                                                            Over/Under
                                                                                        </option>
                                                                                        <option value="1">
                                                                                            ....
                                                                                        </option>
                                                                                        <option value="1">
                                                                                            ....
                                                                                        </option>
                                                                                        <option value="1">
                                                                                            ....
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="right__cate__items">
                                                                                    <select name="cate1"
                                                                                        id="categoris3">
                                                                                        <option value="1">
                                                                                            Both teams to score?
                                                                                        </option>
                                                                                        <option value="1">
                                                                                            ...
                                                                                        </option>
                                                                                        <option value="1">
                                                                                            ....
                                                                                        </option>
                                                                                        <option value="1">
                                                                                            ...
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="table__wrap">
                                                                            <div
                                                                                class="table__items table__pointnone__items">
                                                                                <div class="t__items">
                                                                                    <div class="t__items__left">

                                                                                    </div>
                                                                                </div>
                                                                                <div class="cart__point">

                                                                                </div>
                                                                                <div class="mart__point__items">
                                                                                    <a href="#0"
                                                                                        class="twing opo twing__right">
                                                                                        <i class="icon-twer"></i>
                                                                                    </a>
                                                                                    <a href="#0" class="mart opo">
                                                                                        <i class="icon-pmart"></i>
                                                                                    </a>
                                                                                    <a href="#0box"
                                                                                        class="point__box bg__none">
                                                                                        1
                                                                                    </a>
                                                                                    <a href="#0box"
                                                                                        class="point__box bg__none">
                                                                                        X
                                                                                    </a>
                                                                                    <a href="#0box"
                                                                                        class="point__box bg__none">
                                                                                        2
                                                                                    </a>
                                                                                </div>
                                                                                <div
                                                                                    class="cart__point cart__point__two">
                                                                                    Goals
                                                                                </div>
                                                                                <div class="mart__point__two">
                                                                                    <div class="mart__point__left">
                                                                                        <a href="#box"
                                                                                            class="point__box bg__none">
                                                                                            Over
                                                                                        </a>
                                                                                        <a href="#box"
                                                                                            class="point__box bg__none">
                                                                                            Under
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="mart__point__right">
                                                                                        <a href="#0"
                                                                                            class="point__box bg__none">
                                                                                            Yes
                                                                                        </a>
                                                                                        <a href="#0"
                                                                                            class="point__box bg__none">
                                                                                            No
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="table__items b__bottom">
                                                                                <div class="t__items">
                                                                                    <div class="t__items__left">
                                                                                        <h6>
                                                                                            FK Septemvri Sofia
                                                                                        </h6>
                                                                                        <span class="text">
                                                                                            PFC CteSKA Sofia
                                                                                        </span>
                                                                                        <p>
                                                                                            <a href="#0">
                                                                                                Live
                                                                                            </a>
                                                                                            <span>
                                                                                                2H 45:34
                                                                                            </span>
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="cart__point">
                                                                                    <span>
                                                                                        0
                                                                                    </span>
                                                                                    <span>
                                                                                        0
                                                                                    </span>
                                                                                </div>
                                                                                <div class="mart__point__items">
                                                                                    <a href="#0"
                                                                                        class="twing twing__right">
                                                                                        <i class="icon-twer"></i>
                                                                                    </a>
                                                                                    <a href="#0" class="mart">
                                                                                        <i class="icon-pmart"></i>
                                                                                    </a>
                                                                                    <a href="#0box" class="point__box">
                                                                                        8.55
                                                                                    </a>
                                                                                    <a href="#0box" class="point__box">
                                                                                        2.70
                                                                                    </a>
                                                                                    <a href="#0box" class="point__box">
                                                                                        8.50
                                                                                    </a>
                                                                                </div>
                                                                                <div
                                                                                    class="cart__point cart__point__two">
                                                                                    2,6
                                                                                </div>
                                                                                <div class="mart__point__two">
                                                                                    <div class="mart__point__left">
                                                                                        <a href="#box"
                                                                                            class="point__box">
                                                                                            8.55
                                                                                        </a>
                                                                                        <a href="#box"
                                                                                            class="point__box">
                                                                                            2.70
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="mart__point__right">
                                                                                        <a href="#0"
                                                                                            class="point__box bg__none">
                                                                                            <i class="icon-lock"></i>
                                                                                        </a>
                                                                                        <a href="#0"
                                                                                            class="point__box bg__none">
                                                                                            <i
                                                                                                class="icon-star star"></i>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="table__items b__bottom">
                                                                                <div class="t__items">
                                                                                    <div class="t__items__left">
                                                                                        <h6>
                                                                                            Lampun Warrior FC
                                                                                        </h6>
                                                                                        <span class="text">
                                                                                            Prachuap FC
                                                                                        </span>
                                                                                        <p>
                                                                                            <a href="#0">
                                                                                                Live
                                                                                            </a>
                                                                                            <span>
                                                                                                1H 05:34
                                                                                            </span>
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="cart__point">
                                                                                    <span>
                                                                                        2
                                                                                    </span>
                                                                                    <span>
                                                                                        1
                                                                                    </span>
                                                                                </div>
                                                                                <div class="mart__point__items">
                                                                                    <a href="#0"
                                                                                        class="twing twing__right">
                                                                                        <i class="icon-twer"></i>
                                                                                    </a>
                                                                                    <a href="#0" class="mart">
                                                                                        <i class="icon-pmart"></i>
                                                                                    </a>
                                                                                    <a href="#0box" class="point__box">
                                                                                        8.55
                                                                                    </a>
                                                                                    <a href="#0box" class="point__box">
                                                                                        2.70
                                                                                    </a>
                                                                                    <a href="#0box" class="point__box">
                                                                                        8.50
                                                                                    </a>
                                                                                </div>
                                                                                <div
                                                                                    class="cart__point cart__point__two">
                                                                                    2,6
                                                                                </div>
                                                                                <div class="mart__point__two">
                                                                                    <div class="mart__point__left">
                                                                                        <a href="#box"
                                                                                            class="point__box">
                                                                                            7.05
                                                                                        </a>
                                                                                        <a href="#box"
                                                                                            class="point__box">
                                                                                            5.50
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="mart__point__right">
                                                                                        <a href="#0" class="point__box">
                                                                                            5.05
                                                                                        </a>
                                                                                        <a href="#0" class="point__box">
                                                                                            5.50
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--Cricket-->

                                                                <!--Tennis-->
                                                                <div class="tab-pane fade text-white "
                                                                    id="height2tennis" role="tabpanel" tabindex="0">
                                                                    <div class="main__table main__table__tennis">
                                                                        <div class="section__head b__bottom">
                                                                            <div class="left__head">
                                                                                <span class="icons">
                                                                                    <i class="icon-tennis"></i>
                                                                                </span>
                                                                                <span>
                                                                                    Tennis
                                                                                </span>
                                                                            </div>
                                                                            <div class="right__catagoris">
                                                                                <div class="right__cate__items">
                                                                                    <select name="cate1"
                                                                                        id="categoris4">
                                                                                        <option value="1">
                                                                                            Result 1X2
                                                                                        </option>
                                                                                        <option value="1">
                                                                                            Result 1X3
                                                                                        </option>
                                                                                        <option value="1">
                                                                                            Result 1X4
                                                                                        </option>
                                                                                        <option value="1">
                                                                                            Result 1X5
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="right__cate__items">
                                                                                    <select name="cate1"
                                                                                        id="categoris5">
                                                                                        <option value="1">
                                                                                            Over/Under
                                                                                        </option>
                                                                                        <option value="1">
                                                                                            ....
                                                                                        </option>
                                                                                        <option value="1">
                                                                                            ....
                                                                                        </option>
                                                                                        <option value="1">
                                                                                            ....
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="right__cate__items">
                                                                                    <select name="cate1"
                                                                                        id="categoris6">
                                                                                        <option value="1">
                                                                                            Both teams to score?
                                                                                        </option>
                                                                                        <option value="1">
                                                                                            ...
                                                                                        </option>
                                                                                        <option value="1">
                                                                                            ....
                                                                                        </option>
                                                                                        <option value="1">
                                                                                            ...
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="table__wrap">
                                                                            <div
                                                                                class="table__items table__pointnone__items">
                                                                                <div class="t__items">
                                                                                    <div class="t__items__left">

                                                                                    </div>
                                                                                </div>
                                                                                <div class="tennis__cart__wrap">

                                                                                </div>
                                                                                <div class="tennis__right">
                                                                                    <div class="mart__point__items">
                                                                                        <a href="#0"
                                                                                            class="twing twing__right opo">
                                                                                            <i class="icon-twer"></i>
                                                                                        </a>
                                                                                        <a href="#0" class="mart opo">
                                                                                            <i class="icon-pmart"></i>
                                                                                        </a>
                                                                                        <a href="#0box"
                                                                                            class="point__box bg__none">
                                                                                            1
                                                                                        </a>
                                                                                        <a href="#0box"
                                                                                            class="point__box bg__none">
                                                                                            2
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="mart__point__two">
                                                                                        <div class="mart__point__left">
                                                                                            <a href="#box"
                                                                                                class="point__box bg__none">
                                                                                                1
                                                                                            </a>
                                                                                            <a href="#box"
                                                                                                class="point__box bg__none">
                                                                                                2
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="mart__point__two">
                                                                                        <div class="mart__point__left">
                                                                                            <a href="#box"
                                                                                                class="point__box bg__none">
                                                                                                1
                                                                                            </a>
                                                                                            <a href="#box"
                                                                                                class="point__box bg__none">
                                                                                                2
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="mart__point__right">
                                                                                            <a href="#0"
                                                                                                class="point__box opo">
                                                                                                <i
                                                                                                    class="icon-star star"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="table__items b__bottom">
                                                                                <div class="t__items">
                                                                                    <div class="t__items__left">
                                                                                        <h6>
                                                                                            Ilya Snitari MDA
                                                                                        </h6>
                                                                                        <span class="text">
                                                                                            Alex Marti Pujolras ESP
                                                                                        </span>
                                                                                        <p>
                                                                                            <a href="#0">
                                                                                                Live
                                                                                            </a>
                                                                                            <span>
                                                                                                3rd Set
                                                                                            </span>
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="tennis__cart__wrap">
                                                                                    <div class="cart__point">
                                                                                        <span>
                                                                                            0 4
                                                                                        </span>
                                                                                        <span>
                                                                                            0 2
                                                                                        </span>
                                                                                        <span>
                                                                                            P G
                                                                                        </span>
                                                                                    </div>
                                                                                    <div class="tennis__cart__right">
                                                                                        <span>2</span>
                                                                                        <span>2</span>
                                                                                        <span>Sets</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="tennis__right">
                                                                                    <div class="mart__point__items">
                                                                                        <a href="#0"
                                                                                            class="twing twing__right">
                                                                                            <i class="icon-twer"></i>
                                                                                        </a>
                                                                                        <a href="#0" class="mart">
                                                                                            <i class="icon-pmart"></i>
                                                                                        </a>
                                                                                        <a href="#0box"
                                                                                            class="point__box">
                                                                                            2.70
                                                                                        </a>
                                                                                        <a href="#0box"
                                                                                            class="point__box">
                                                                                            8.50
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="mart__point__two">
                                                                                        <div class="mart__point__left">
                                                                                            <a href="#box"
                                                                                                class="point__box">
                                                                                                8.55
                                                                                            </a>
                                                                                            <a href="#box"
                                                                                                class="point__box">
                                                                                                2.70
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="mart__point__two">
                                                                                        <div class="mart__point__left">
                                                                                            <a href="#box"
                                                                                                class="point__box">
                                                                                                8.55
                                                                                            </a>
                                                                                            <a href="#box"
                                                                                                class="point__box">
                                                                                                2.70
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="mart__point__right">
                                                                                            <a href="#0"
                                                                                                class="point__box bg__none">
                                                                                                <i
                                                                                                    class="icon-star star"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="table__items b__bottom">
                                                                                <div class="t__items">
                                                                                    <div class="t__items__left">
                                                                                        <h6>
                                                                                            Daniel Rincon SUI
                                                                                        </h6>
                                                                                        <span class="text">
                                                                                            Clara Vlasselaer BEL
                                                                                        </span>
                                                                                        <p>
                                                                                            <a href="#0">
                                                                                                Live
                                                                                            </a>
                                                                                            <span>
                                                                                                1st Set
                                                                                            </span>
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="tennis__cart__wrap">
                                                                                    <div class="cart__point">
                                                                                        <span>
                                                                                            0 4
                                                                                        </span>
                                                                                        <span>
                                                                                            0 2
                                                                                        </span>
                                                                                        <span>
                                                                                            P G
                                                                                        </span>
                                                                                    </div>
                                                                                    <div class="tennis__cart__right">
                                                                                        <span>2</span>
                                                                                        <span>2</span>
                                                                                        <span>Sets</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="tennis__right">
                                                                                    <div class="mart__point__items">
                                                                                        <a href="#0"
                                                                                            class="twing twing__right">
                                                                                            <i class="icon-twer"></i>
                                                                                        </a>
                                                                                        <a href="#0" class="mart">
                                                                                            <i class="icon-pmart"></i>
                                                                                        </a>
                                                                                        <a href="#0box"
                                                                                            class="point__box">
                                                                                            2.70
                                                                                        </a>
                                                                                        <a href="#0box"
                                                                                            class="point__box">
                                                                                            8.50
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="mart__point__two">
                                                                                        <div class="mart__point__left">
                                                                                            <a href="#box"
                                                                                                class="point__box">
                                                                                                8.55
                                                                                            </a>
                                                                                            <a href="#box"
                                                                                                class="point__box">
                                                                                                2.70
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="mart__point__two">
                                                                                        <div class="mart__point__left">
                                                                                            <a href="#box"
                                                                                                class="point__box">
                                                                                                8.55
                                                                                            </a>
                                                                                            <a href="#box"
                                                                                                class="point__box">
                                                                                                2.70
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="mart__point__right">
                                                                                            <a href="#0"
                                                                                                class="point__box bg__none">
                                                                                                <i
                                                                                                    class="icon-star star"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="table__items b__bottom">
                                                                                <div class="t__items">
                                                                                    <div class="t__items__left">
                                                                                        <h6>
                                                                                            Steven Diez CAN
                                                                                        </h6>
                                                                                        <span class="text">
                                                                                            Oriol Roca Batalla ESP
                                                                                        </span>
                                                                                        <p>
                                                                                            <a href="#0">
                                                                                                Live
                                                                                            </a>
                                                                                            <span>
                                                                                                2rd Set
                                                                                            </span>
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="tennis__cart__wrap">
                                                                                    <div class="cart__point">
                                                                                        <span>
                                                                                            0 4
                                                                                        </span>
                                                                                        <span>
                                                                                            0 2
                                                                                        </span>
                                                                                        <span>
                                                                                            P G
                                                                                        </span>
                                                                                    </div>
                                                                                    <div class="tennis__cart__right">
                                                                                        <span>2</span>
                                                                                        <span>2</span>
                                                                                        <span>Sets</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="tennis__right">
                                                                                    <div class="mart__point__items">
                                                                                        <a href="#0"
                                                                                            class="twing twing__right">
                                                                                            <i class="icon-twer"></i>
                                                                                        </a>
                                                                                        <a href="#0" class="mart">
                                                                                            <i class="icon-pmart"></i>
                                                                                        </a>
                                                                                        <a href="#0box"
                                                                                            class="point__box">
                                                                                            2.70
                                                                                        </a>
                                                                                        <a href="#0box"
                                                                                            class="point__box">
                                                                                            8.50
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="mart__point__two">
                                                                                        <div class="mart__point__left">
                                                                                            <a href="#box"
                                                                                                class="point__box">
                                                                                                8.55
                                                                                            </a>
                                                                                            <a href="#box"
                                                                                                class="point__box">
                                                                                                2.70
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="mart__point__two">
                                                                                        <div class="mart__point__left">
                                                                                            <a href="#box"
                                                                                                class="point__box">
                                                                                                8.55
                                                                                            </a>
                                                                                            <a href="#box"
                                                                                                class="point__box">
                                                                                                2.70
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="mart__point__right">
                                                                                            <a href="#0"
                                                                                                class="point__box bg__none">
                                                                                                <i
                                                                                                    class="icon-star star"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="table__footer">
                                                                                <a href="#0" class="lobby">
                                                                                    All <span class="text__btn">Tennis
                                                                                        Live</span>
                                                                                </a>
                                                                                <a href="#0" class="footerpoing">
                                                                                    <span>322</span>
                                                                                    <span><i
                                                                                            class="fas fa-angle-right"></i></span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--Tennis-->

                                                                <!--Basketball-->
                                                                <!--Basketball-->

                                                                <!--Vollyball-->
                                                                <!--Vollyball-->

                                                                <!--Football-->
                                                                <div class="tab-pane fade text-white " id="footballtab"
                                                                    role="tabpanel" tabindex="0">
                                                                    <div
                                                                        class="main__table main__table__tennis main__table__cricket">
                                                                        <div class="section__head b__bottom">
                                                                            <div class="left__head">
                                                                                <span class="icons">
                                                                                    <i class="icon-football"></i>
                                                                                </span>
                                                                                <span>
                                                                                    Football
                                                                                </span>
                                                                            </div>
                                                                            <div class="right__catagoris">
                                                                                <div class="right__cate__items">
                                                                                    <select name="cate1"
                                                                                        id="categoris78">
                                                                                        <option value="1">
                                                                                            Result 1X2
                                                                                        </option>
                                                                                        <option value="1">
                                                                                            Result 1X3
                                                                                        </option>
                                                                                        <option value="1">
                                                                                            Result 1X4
                                                                                        </option>
                                                                                        <option value="1">
                                                                                            Result 1X5
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="right__cate__items">
                                                                                    <select name="cate1"
                                                                                        id="categoris89">
                                                                                        <option value="1">
                                                                                            Over/Under
                                                                                        </option>
                                                                                        <option value="1">
                                                                                            ....
                                                                                        </option>
                                                                                        <option value="1">
                                                                                            ....
                                                                                        </option>
                                                                                        <option value="1">
                                                                                            ....
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="right__cate__items">
                                                                                    <select name="cate1"
                                                                                        id="categoris82">
                                                                                        <option value="1">
                                                                                            Both teams to score?
                                                                                        </option>
                                                                                        <option value="1">
                                                                                            ...
                                                                                        </option>
                                                                                        <option value="1">
                                                                                            ....
                                                                                        </option>
                                                                                        <option value="1">
                                                                                            ...
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="table__wrap">
                                                                            <div
                                                                                class="table__items table__pointnone__items">
                                                                                <div class="t__items">
                                                                                    <div class="t__items__left">

                                                                                    </div>
                                                                                    <div class="serial">

                                                                                    </div>
                                                                                </div>
                                                                                <div class="tennis__right">
                                                                                    <div class="mart__point__two">
                                                                                        <div class="mart__point__left">
                                                                                            <a href="#box"
                                                                                                class="point__box bg__none">
                                                                                                1
                                                                                            </a>
                                                                                            <a href="#box"
                                                                                                class="point__box bg__none">
                                                                                                2
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="mart__point__right">
                                                                                            <a href="#0"
                                                                                                class="point__box bg__none opo">
                                                                                                <i
                                                                                                    class="icon-star star"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="table__items b__bottom">
                                                                                <div class="t__items">
                                                                                    <div class="t__items__left">
                                                                                        <h6>
                                                                                            Tokyo Great Bears
                                                                                        </h6>
                                                                                        <span class="text">
                                                                                            JT Thunders
                                                                                        </span>
                                                                                        <p>
                                                                                            <a href="#0">
                                                                                                Live
                                                                                            </a>
                                                                                            <span>
                                                                                                3rd Set
                                                                                            </span>
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="serial">
                                                                                        264/7
                                                                                    </div>
                                                                                </div>
                                                                                <div class="tennis__right">
                                                                                    <div class="mart__point__two">
                                                                                        <div class="mart__point__left">
                                                                                            <a href="#box"
                                                                                                class="point__box">
                                                                                                3.05
                                                                                            </a>
                                                                                            <a href="#box"
                                                                                                class="point__box">
                                                                                                6.50
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="mart__point__right">
                                                                                            <a href="#0"
                                                                                                class="point__box bg__none">
                                                                                                <i
                                                                                                    class="icon-star star"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="table__footer">
                                                                                <a href="#0" class="lobby text__opa">
                                                                                    Open <span class="text__btn">
                                                                                        Volleyball Live</span> Events
                                                                                </a>
                                                                                <a href="#0" class="footerpoing">
                                                                                    <span>8</span>
                                                                                    <span><i
                                                                                            class="fas fa-angle-right"></i></span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--Football-->

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Live__heightlight End-->
                                                </div>
                                                <!--Main body-->

                                                <!--Footer Start-->
                                                <footer
                                                    class="footer__section main__footer__section media991__pb60 pt-60">
                                                    <div class="container-fluid p-0">

                                                        <!--Footer Top-->
                                                        <div class="footer__top pb-60">
                                                            <div class="row g-5">
                                                                <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-4 wow fadeInUp"
                                                                    data-wow-delay="0.9s">
                                                                    <div class="widget__items">
                                                                        <div class="footer-head">
                                                                            <h3 class="title">
                                                                                General Info
                                                                            </h3>
                                                                        </div>
                                                                        <div class="content-area">
                                                                            <ul class="quick-link">
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> About Us
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Contact Us
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Faq
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="sportsbetting.html">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Sports
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Sportsbook
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="livecasino.html">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Live Betting
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Virtuals
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-4 wow fadeInUp"
                                                                    data-wow-delay="0.7s">
                                                                    <div class="widget__items">
                                                                        <div class="footer-head">
                                                                            <h3 class="title">
                                                                                Casino
                                                                            </h3>
                                                                        </div>
                                                                        <div class="content-area">
                                                                            <ul class="quick-link">
                                                                                <li>
                                                                                    <a href="casino.html">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Top
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="casino.html">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> New
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Popular
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Slots
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Table Games
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Jackpots
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Live Casino
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> All Games
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-4 wow fadeInUp"
                                                                    data-wow-delay="0.5s">
                                                                    <div class="widget__items">
                                                                        <div class="footer-head">
                                                                            <h3 class="title">
                                                                                Live Casino
                                                                            </h3>
                                                                        </div>
                                                                        <div class="content-area">
                                                                            <ul class="quick-link">
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Top Reted
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Club Royale
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Roulette
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Blackjack
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Games Shows
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Baccarat & Dice
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Poker
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="livecasino.html">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> All Live Casino
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-4 wow fadeInUp"
                                                                    data-wow-delay="0.2s">
                                                                    <div class="widget__items">
                                                                        <div class="footer-head">
                                                                            <h3 class="title">
                                                                                Promotions
                                                                            </h3>
                                                                        </div>
                                                                        <div class="content-area">
                                                                            <ul class="quick-link">
                                                                                <li>
                                                                                    <a href="promotions.html">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Casino
                                                                                        Promotions
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="sportsbetting.html">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Sport
                                                                                        Promotions
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Tournaments
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Achevements
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="bonuses.html">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Bonus Shop
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-4 wow fadeInUp"
                                                                    data-wow-delay="0.2s">
                                                                    <div class="widget__items">
                                                                        <div class="footer-head">
                                                                            <h3 class="title">
                                                                                Help
                                                                            </h3>
                                                                        </div>
                                                                        <div class="content-area">
                                                                            <ul class="quick-link">
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Help
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="betslipcheck.html">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Bet Slip Check
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="deposit.html">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Deposites /
                                                                                        Withdrwals
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="sportsbetting.html">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Sports Results
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="sportsbetting.html">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Sports Stats
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Footer Top-->

                                                        <!--Footer Sponor Here-->
                                                        <!--Footer Sponor End-->

                                                        <!--Footer bottom-->
                                                        <div class="footer__bottom">
                                                            <p>
                                                                Copyright &copy; 2023 <a href="#0"
                                                                    class="text--base">SportOdds</a> - All Right
                                                                Reserved
                                                            </p>
                                                            <ul class="bottom__ling">
                                                                <li>
                                                                    <a href="#0">
                                                                        Affiliate program
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#0">
                                                                        Terms & conditions
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#0">
                                                                        Bonus terms & conditions
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <!--Footer bottom-->
                                                    </div>
                                                </footer>
                                                <!--Footer End-->

                                            </div>
                                            <!--Home Page Tabs Here-->

                                            <!--Live Page Tabs Here-->
                                            <!--Live Page Tabs End-->

                                            <!--Today Page Tabs Here-->
                                            <!--Today Page Tabs End-->

                                            <!--Football Page Tabs Here-->
                                            <!--Football Page Tabs End-->

                                            <!--Tennis Page Tabs Here-->
                                            <!--Tennis Page Tabs End-->

                                            <!--Basketball Page Tabs Here-->
                                            <!--Basketball Page Tabs End-->

                                            <!--IceHockey Page Tabs Here-->
                                            <!--IceHockey Page Tabs End-->

                                            <!--Handball Page Tabs Here-->
                                            <!--Handball Page Tabs End-->

                                            <!--American Page Tabs Here-->
                                            <!--American Page Tabs End-->

                                            <!--Baseball Page Tabs Here-->
                                            <!--Baseball Page Tabs End-->

                                            <!--Horse Racing Page Tabs Here-->
                                            <!--Horse Racing Page Tabs End-->

                                            <!--Virtual Page Tabs Here-->
                                            <!--Virtual Page Tabs End-->

                                            <!--Fovatires Page Tabs Here-->
                                            <div class="tab-pane mt__30 text-white fade" id="mainTab14" role="tabpanel"
                                                tabindex="0">
                                                <!--main body-->
                                                <div class="main__body__wrap left__right__space pb-60">
                                                    <div class="favorites__tabs__wrap">
                                                        <div class="favorites__head mb__20">
                                                            <span class="icons">
                                                                <i class="icon-football"></i>
                                                            </span>
                                                            <span>
                                                                Football
                                                            </span>
                                                        </div>
                                                        <div class="row g-4 mb__30">
                                                            <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6">
                                                                <a href="#0" class="match__fixing__items">
                                                                    <div class="match__head">
                                                                        <div class="match__head__left">
                                                                            <span class="icons">
                                                                                <i class="icon-football"></i>
                                                                            </span>
                                                                            <span>
                                                                                World Cup 2022
                                                                            </span>
                                                                        </div>
                                                                        <span class="today">
                                                                            <i class="fas fa-star"></i>
                                                                        </span>
                                                                    </div>
                                                                    <div class="match__vs">
                                                                        <div class="match__vs__left">
                                                                            <span>
                                                                                Argentina
                                                                            </span>
                                                                            <span class="flag">
                                                                                <img src="assets/img/matchfixing/arjentina.png"
                                                                                    alt="flag">
                                                                            </span>
                                                                        </div>
                                                                        <span class="vs">
                                                                            Vs
                                                                        </span>
                                                                        <div class="match__vs__left">
                                                                            <span class="flag">
                                                                                <img src="assets/img/matchfixing/france.png"
                                                                                    alt="flag">
                                                                            </span>
                                                                            <span>
                                                                                France
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="match__result">
                                                                        <span class="matchborder"></span>
                                                                        <span class="match__text">
                                                                            Match Reult
                                                                        </span>
                                                                    </div>
                                                                    <ul class="match__point">
                                                                        <li>
                                                                            <span>3.55</span>
                                                                        </li>
                                                                        <li>
                                                                            <span>4.50</span>
                                                                        </li>
                                                                        <li>
                                                                            <span>2.20</span>
                                                                        </li>
                                                                    </ul>
                                                                </a>
                                                            </div>
                                                            <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6">
                                                                <a href="#0" class="match__fixing__items">
                                                                    <div class="match__head">
                                                                        <div class="match__head__left">
                                                                            <span class="icons">
                                                                                <i class="icon-football"></i>
                                                                            </span>
                                                                            <span>
                                                                                World Cup 2022
                                                                            </span>
                                                                        </div>
                                                                        <span class="today">
                                                                            <i class="fas fa-star"></i>
                                                                        </span>
                                                                    </div>
                                                                    <div class="match__vs">
                                                                        <div class="match__vs__left">
                                                                            <span>
                                                                                Poland
                                                                            </span>
                                                                            <span class="flag">
                                                                                <img src="assets/img/matchfixing/poland.png"
                                                                                    alt="flag">
                                                                            </span>
                                                                        </div>
                                                                        <span class="vs">
                                                                            Vs
                                                                        </span>
                                                                        <div class="match__vs__left">
                                                                            <span class="flag">
                                                                                <img src="assets/img/matchfixing/denmark.png"
                                                                                    alt="flag">
                                                                            </span>
                                                                            <span>
                                                                                Denmark
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="match__result">
                                                                        <span class="matchborder"></span>
                                                                        <span class="match__text">
                                                                            Match Reult
                                                                        </span>
                                                                    </div>
                                                                    <ul class="match__point">
                                                                        <li>
                                                                            <span>2.55</span>
                                                                        </li>
                                                                        <li>
                                                                            <span>1.25</span>
                                                                        </li>
                                                                        <li>
                                                                            <span>1.20</span>
                                                                        </li>
                                                                    </ul>
                                                                </a>
                                                            </div>
                                                            <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6">
                                                                <a href="#0" class="match__fixing__items">
                                                                    <div class="match__head">
                                                                        <div class="match__head__left">
                                                                            <span class="icons">
                                                                                <i class="icon-football"></i>
                                                                            </span>
                                                                            <span>
                                                                                World Cup 2022
                                                                            </span>
                                                                        </div>
                                                                        <span class="today">
                                                                            <i class="fas fa-star"></i>
                                                                        </span>
                                                                    </div>
                                                                    <div class="match__vs">
                                                                        <div class="match__vs__left">
                                                                            <span>
                                                                                Mexico
                                                                            </span>
                                                                            <span class="flag">
                                                                                <img src="assets/img/matchfixing/maxico.png"
                                                                                    alt="flag">
                                                                            </span>
                                                                        </div>
                                                                        <span class="vs">
                                                                            Vs
                                                                        </span>
                                                                        <div class="match__vs__left">
                                                                            <span class="flag">
                                                                                <img src="assets/img/matchfixing/poland.png"
                                                                                    alt="flag">
                                                                            </span>
                                                                            <span>
                                                                                Poland
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="match__result">
                                                                        <span class="matchborder"></span>
                                                                        <span class="match__text">
                                                                            Match Reult
                                                                        </span>
                                                                    </div>
                                                                    <ul class="match__point">
                                                                        <li>
                                                                            <span>4.58</span>
                                                                        </li>
                                                                        <li>
                                                                            <span>3.51</span>
                                                                        </li>
                                                                        <li>
                                                                            <span>2.22</span>
                                                                        </li>
                                                                    </ul>
                                                                </a>
                                                            </div>
                                                            <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6">
                                                                <a href="#0" class="match__fixing__items">
                                                                    <div class="match__head">
                                                                        <div class="match__head__left">
                                                                            <span class="icons">
                                                                                <i class="icon-football"></i>
                                                                            </span>
                                                                            <span>
                                                                                WEFA
                                                                            </span>
                                                                        </div>
                                                                        <span class="today">
                                                                            <i class="fas fa-star"></i>
                                                                        </span>
                                                                    </div>
                                                                    <div class="match__vs">
                                                                        <div class="match__vs__left">
                                                                            <span>
                                                                                Farense
                                                                            </span>
                                                                            <span class="flag">
                                                                                <img src="assets/img/matchfixing/farense.png"
                                                                                    alt="flag">
                                                                            </span>
                                                                        </div>
                                                                        <span class="vs">
                                                                            Vs
                                                                        </span>
                                                                        <div class="match__vs__left">
                                                                            <span class="flag">
                                                                                <img src="assets/img/matchfixing/tenerif.png"
                                                                                    alt="flag">
                                                                            </span>
                                                                            <span>
                                                                                Tenerife
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="match__result">
                                                                        <span class="matchborder"></span>
                                                                        <span class="match__text">
                                                                            Match Reult
                                                                        </span>
                                                                    </div>
                                                                    <ul class="match__point">
                                                                        <li>
                                                                            <span>3.55</span>
                                                                        </li>
                                                                        <li>
                                                                            <span>4.50</span>
                                                                        </li>
                                                                        <li>
                                                                            <span>2.20</span>
                                                                        </li>
                                                                    </ul>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="favorites__head mb__20">
                                                            <span class="icons">
                                                                <i class="icon-basketball"></i>
                                                            </span>
                                                            <span>
                                                                Basketball
                                                            </span>
                                                        </div>
                                                        <div class="row g-4">
                                                            <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6">
                                                                <a href="#0" class="match__fixing__items">
                                                                    <div class="match__head">
                                                                        <div class="match__head__left">
                                                                            <span class="icons">
                                                                                <i class="icon-football"></i>
                                                                            </span>
                                                                            <span>
                                                                                World Cup 2022
                                                                            </span>
                                                                        </div>
                                                                        <span class="today">
                                                                            <i class="fas fa-star"></i>
                                                                        </span>
                                                                    </div>
                                                                    <div class="match__vs">
                                                                        <div class="match__vs__left">
                                                                            <span>
                                                                                Aris
                                                                            </span>
                                                                            <span class="flag">
                                                                                <img src="assets/img/matchfixing/aris.png"
                                                                                    alt="flag">
                                                                            </span>
                                                                        </div>
                                                                        <span class="vs">
                                                                            Vs
                                                                        </span>
                                                                        <div class="match__vs__left">
                                                                            <span class="flag">
                                                                                <img src="assets/img/matchfixing/gs.png"
                                                                                    alt="flag">
                                                                            </span>
                                                                            <span>
                                                                                GS Lavriou
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="match__result">
                                                                        <span class="matchborder"></span>
                                                                        <span class="match__text">
                                                                            Match Reult
                                                                        </span>
                                                                    </div>
                                                                    <ul class="match__point">
                                                                        <li>
                                                                            <span>3.55</span>
                                                                        </li>
                                                                        <li>
                                                                            <span>4.50</span>
                                                                        </li>
                                                                        <li>
                                                                            <span>2.20</span>
                                                                        </li>
                                                                    </ul>
                                                                </a>
                                                            </div>
                                                            <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6">
                                                                <a href="#0" class="match__fixing__items">
                                                                    <div class="match__head">
                                                                        <div class="match__head__left">
                                                                            <span class="icons">
                                                                                <i class="icon-football"></i>
                                                                            </span>
                                                                            <span>
                                                                                World Cup 2022
                                                                            </span>
                                                                        </div>
                                                                        <span class="today">
                                                                            <i class="fas fa-star"></i>
                                                                        </span>
                                                                    </div>
                                                                    <div class="match__vs">
                                                                        <div class="match__vs__left">
                                                                            <span>
                                                                                Aris
                                                                            </span>
                                                                            <span class="flag">
                                                                                <img src="assets/img/matchfixing/aris.png"
                                                                                    alt="flag">
                                                                            </span>
                                                                        </div>
                                                                        <span class="vs">
                                                                            Vs
                                                                        </span>
                                                                        <div class="match__vs__left">
                                                                            <span class="flag">
                                                                                <img src="assets/img/matchfixing/fujian.png"
                                                                                    alt="flag">
                                                                            </span>
                                                                            <span>
                                                                                Fujian
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="match__result">
                                                                        <span class="matchborder"></span>
                                                                        <span class="match__text">
                                                                            Match Reult
                                                                        </span>
                                                                    </div>
                                                                    <ul class="match__point">
                                                                        <li>
                                                                            <span>3.55</span>
                                                                        </li>
                                                                        <li>
                                                                            <span>4.50</span>
                                                                        </li>
                                                                        <li>
                                                                            <span>2.20</span>
                                                                        </li>
                                                                    </ul>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--main body-->

                                                <!--Footer Start-->
                                                <footer
                                                    class="footer__section main__footer__section media991__pb60 pt-60">
                                                    <div class="container-fluid p-0">

                                                        <!--Footer Top-->
                                                        <div class="footer__top pb-60">
                                                            <div class="row g-5">
                                                                <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-4 wow fadeInUp"
                                                                    data-wow-delay="0.9s">
                                                                    <div class="widget__items">
                                                                        <div class="footer-head">
                                                                            <h3 class="title">
                                                                                General Info
                                                                            </h3>
                                                                        </div>
                                                                        <div class="content-area">
                                                                            <ul class="quick-link">
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> About Us
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Contact Us
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Faq
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="sportsbetting.html">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Sports
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Sportsbook
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="livecasino.html">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Live Betting
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Virtuals
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-4 wow fadeInUp"
                                                                    data-wow-delay="0.7s">
                                                                    <div class="widget__items">
                                                                        <div class="footer-head">
                                                                            <h3 class="title">
                                                                                Casino
                                                                            </h3>
                                                                        </div>
                                                                        <div class="content-area">
                                                                            <ul class="quick-link">
                                                                                <li>
                                                                                    <a href="casino.html">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Top
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="casino.html">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> New
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Popular
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Slots
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Table Games
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Jackpots
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Live Casino
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> All Games
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-4 wow fadeInUp"
                                                                    data-wow-delay="0.5s">
                                                                    <div class="widget__items">
                                                                        <div class="footer-head">
                                                                            <h3 class="title">
                                                                                Live Casino
                                                                            </h3>
                                                                        </div>
                                                                        <div class="content-area">
                                                                            <ul class="quick-link">
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Top Reted
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Club Royale
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Roulette
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Blackjack
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Games Shows
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Baccarat & Dice
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Poker
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="livecasino.html">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> All Live Casino
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-4 wow fadeInUp"
                                                                    data-wow-delay="0.2s">
                                                                    <div class="widget__items">
                                                                        <div class="footer-head">
                                                                            <h3 class="title">
                                                                                Promotions
                                                                            </h3>
                                                                        </div>
                                                                        <div class="content-area">
                                                                            <ul class="quick-link">
                                                                                <li>
                                                                                    <a href="promotions.html">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Casino
                                                                                        Promotions
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="sportsbetting.html">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Sport
                                                                                        Promotions
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Tournaments
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Achevements
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="bonuses.html">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Bonus Shop
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-4 col-sm-4 wow fadeInUp"
                                                                    data-wow-delay="0.2s">
                                                                    <div class="widget__items">
                                                                        <div class="footer-head">
                                                                            <h3 class="title">
                                                                                Help
                                                                            </h3>
                                                                        </div>
                                                                        <div class="content-area">
                                                                            <ul class="quick-link">
                                                                                <li>
                                                                                    <a href="#0">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Help
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="betslipcheck.html">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Bet Slip Check
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="deposit.html">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Deposites /
                                                                                        Withdrwals
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="sportsbetting.html">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Sports Results
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="sportsbetting.html">
                                                                                        <img src="assets/img/footer/rightarrow.png"
                                                                                            alt="angle"> Sports Stats
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Footer Top-->

                                                        <!--Footer Sponor Here-->
                                                        <div class="footer__sponsor owl-theme owl-carousel">
                                                            <div class="footer__sponsor__items">
                                                                <a href="#0">
                                                                    <img src="assets/img/sponsor/s1.png" alt="simg">
                                                                </a>
                                                            </div>
                                                            <div class="footer__sponsor__items">
                                                                <a href="#0">
                                                                    <img src="assets/img/sponsor/s12.png" alt="simg">
                                                                </a>
                                                            </div>
                                                            <div class="footer__sponsor__items">
                                                                <a href="#0">
                                                                    <img src="assets/img/sponsor/s3.png" alt="simg">
                                                                </a>
                                                            </div>
                                                            <div class="footer__sponsor__items">
                                                                <a href="#0">
                                                                    <img src="assets/img/sponsor/s4.png" alt="simg">
                                                                </a>
                                                            </div>
                                                            <div class="footer__sponsor__items">
                                                                <a href="#0">
                                                                    <img src="assets/img/sponsor/s5.png" alt="simg">
                                                                </a>
                                                            </div>
                                                            <div class="footer__sponsor__items">
                                                                <a href="#0">
                                                                    <img src="assets/img/sponsor/s6.png" alt="simg">
                                                                </a>
                                                            </div>
                                                            <div class="footer__sponsor__items">
                                                                <a href="#0">
                                                                    <img src="assets/img/sponsor/s7.png" alt="simg">
                                                                </a>
                                                            </div>
                                                            <div class="footer__sponsor__items">
                                                                <a href="#0">
                                                                    <img src="assets/img/sponsor/s8.png" alt="simg">
                                                                </a>
                                                            </div>
                                                            <div class="footer__sponsor__items">
                                                                <a href="#0">
                                                                    <img src="assets/img/sponsor/s9.png" alt="simg">
                                                                </a>
                                                            </div>
                                                            <div class="footer__sponsor__items">
                                                                <a href="#0">
                                                                    <img src="assets/img/sponsor/s10.png" alt="simg">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <!--Footer Sponor End-->

                                                        <!--Footer bottom-->
                                                        <div class="footer__bottom">
                                                            <p>
                                                                Copyright &copy;2023 <a href="#0"
                                                                    class="text--base">SportOdds</a> - All Right
                                                                Reserved
                                                            </p>
                                                            <ul class="bottom__ling">
                                                                <li>
                                                                    <a href="#0">
                                                                        Affiliate program
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#0">
                                                                        Terms & conditions
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#0">
                                                                        Bonus terms & conditions
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <!--Footer bottom-->
                                                    </div>
                                                </footer>
                                                <!--Footer End-->
                                            </div>
                                            <!--Fovatires Page Tabs End-->

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Global Main Body-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--footer Bottom Menu-->
        <!--footer Bottom Menu-->
    </section>
    <!--Global Main Body-->

    <!--Mian Body Area Start-->
    <!--Mian Body Area Start-->

    <!--MyBets Start-->
    <!--MyBets End-->

    <!--MyBets Start-->
    <!--MyBets End-->

    <!--Login Modal Start-->
    <div class="modal register__modal" id="signupin" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row align-items-center g-4">
                            <div class="col-lg-6">
                                <div class="modal__left">
                                    <img src="assets/img/modal/modal.png" alt="modal">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="modal__right">
                                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <!-- <button class="nav-link " id="home-tab1" data-bs-toggle="tab"
                                                data-bs-target="#home2" type="button" role="tab"
                                                aria-selected="true">Sign Up</button> -->
                                                <a class="nav-link " id="home-tab1" data-bs-toggle="tab"
                                                data-bs-target="#home2" type="button" role="tab"
                                                aria-selected="true" href="registration.php">Sign Up</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="contact-tab3" data-bs-toggle="tab"
                                                data-bs-target="#contact2" type="button" role="tab"
                                                aria-selected="false">Sign In</button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent2">
                                        <div class="tab-pane fade " id="home2" role="tabpanel">
                                            <div class="form__tabs__wrap">
                                                <div class="focus__icon">
                                                    <p>
                                                        or registration via social media accounts
                                                    </p>
                                                    <div class="social__head">
                                                        <ul class="social">
                                                            <li>
                                                                <a href="#0">
                                                                    <i class="fa-brands fa-facebook-f"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#0">
                                                                    <i class="fab fa-twitter"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#0">
                                                                    <i class="fa-brands fa-linkedin-in"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <form action="#0">
                                                    <div class="form__grp">
                                                        <label for="emailsign">Email</label>
                                                        <input type="email" id="emailsign" placeholder="Email Your">
                                                    </div>
                                                    <div class="form__grp">
                                                        <label for="toggle-password3">Password</label>
                                                        <input id="toggle-password3" type="password"
                                                            placeholder="Your Password">
                                                        <span id="#toggle-password3"
                                                            class="fa fa-fw fa-eye field-icon toggle-password3"></span>
                                                    </div>
                                                    <div class="login__signup">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="remem">
                                                            <label class="form-check-label" for="remem">
                                                                Remember me
                                                            </label>
                                                        </div>
                                                        <a href="#0">
                                                            Forgot Password
                                                        </a>
                                                    </div>
                                                    <div class="create__btn">
                                                        <a href="#0" class="cmn--btn">
                                                            <span>Sign Up</span>
                                                        </a>
                                                    </div>
                                                    <p>
                                                        Do you have an account? <a href="#0">Registration</a>
                                                    </p>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade show active" id="contact2" role="tabpanel">
                                            <div class="form__tabs__wrap">
                                                <div class="focus__icon">
                                                    <p>
                                                        or registration via social media accounts
                                                    </p>
                                                    <div class="social__head">
                                                        <ul class="social">
                                                            <li>
                                                                <a href="#0">
                                                                    <i class="fa-brands fa-facebook-f"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#0">
                                                                    <i class="fab fa-twitter"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#0">
                                                                    <i class="fa-brands fa-linkedin-in"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <form action="#0">
                                                    <div class="form__grp">
                                                        <label for="email34">Email</label>
                                                        <input type="email" id="email34" placeholder="Email Your">
                                                    </div>
                                                    <div class="form__grp">
                                                        <label for="toggle-password10">Password</label>
                                                        <input id="toggle-password10" type="password"
                                                            placeholder="Your Password">
                                                        <span id="#toggle-password10"
                                                            class="fa fa-fw fa-eye field-icon toggle-password10"></span>
                                                    </div>
                                                    <div class="form__grp">
                                                        <label for="toggle-password9">Confrim</label>
                                                        <input id="toggle-password9" type="password"
                                                            placeholder="Password">
                                                        <span id="#toggle-password9"
                                                            class="fa fa-fw fa-eye field-icon toggle-password9"></span>
                                                    </div>
                                                    <div class="create__btn">
                                                        <a href="#0" class="cmn--btn">
                                                            <span>Sign Up</span>
                                                        </a>
                                                    </div>
                                                    <p>
                                                        Do you have an account? <a href="#0">Login</a>
                                                    </p>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Login Modal End-->

    <!--Jquery min js-->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <!--Bootstrap bundle min js-->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!--Magnific Popup js-->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!--Owl Carousel min js-->
    <script src="assets/js/owl.carousel.min.js"></script>
    <!--nice select min js-->
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <!--Wow min js-->
    <script src="assets/js/wow.min.js"></script>
    <!--jquery ui min-->
    <script src="assets/js/jquery-ui.min.js"></script>
    <!--Api min js-->
    <script src="assets/js/api.js"></script>
    <!--Main js-->
    <script src="assets/js/main.js"></script>

</body>

</html>