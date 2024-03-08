<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sportodds Login</title>
    <link rel="stylesheet" href="login.css" />
</head>

<body>
    <?php
    require('db.php');
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];


        $stmt = $con->prepare("SELECT `username`, `password` FROM `user` WHERE `username` = ? AND `password` = ?");
        $stmt->bind_param("ss", $username, $password);

        $stmt->execute();

        $stmt->bind_result($resultUsername, $resultPassword);

        if ($stmt->fetch()) {
            $_SESSION["username"] = $resultUsername;
            $_SESSION["password"] = $resultPassword;

            if ($_SESSION["username"] == "admin" && $_SESSION["password"] = "admin") {
                header("Location: /Huzaifa/SportOdds/admin.php");
            } else {
                header("Location: /Huzaifa/SportOdds/index.php");
            }
        } else {
            echo "<div class='form'>
                        <h3>Incorrect Username/password.</h3><br/>
                        <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                      </div>";
        }
    } else {
    ?>
        <form class="form" method="post" name="login">
            <h1 class="login-title">Login</h1>
            <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true" />
            <input type="password" class="login-input" name="password" placeholder="Password" />
            <input type="submit" value="Login" name="submit" class="login-button" />
            <!-- <button type="submit" value="Login" name="submit" class="login-button">Login</button> -->
            <p class="link"><a href="registration.php">New Registration</a></p>
        </form>
    <?php
    }
    ?>
</body>

</html>