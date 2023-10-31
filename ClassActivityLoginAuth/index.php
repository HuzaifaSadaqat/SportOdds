<?php

include("db/dbs.php");


$username = "";
$password = "";
$error = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];


    if (empty($username) || empty($password)) {
        $error = "Please fill in both username and password fields.";
    } else {

        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND role = '$role'";
        $result = mysqli_query($conn, $query);

        if ($result) {

            if (mysqli_num_rows($result) == 1) {
                $user_data = mysqli_fetch_assoc($result);
                $_SESSION['user'] = $user_data;
                $_SESSION['username'] = $username;

                if ($_SESSION['role'] == "admin") {
                    // header("Location: ../admin.php");
                    echo $role;
                    echo "ksbchkw";
                    echo $username;
                } else {
                    // header("Location: ../index.html");
                    echo $role;
                }
            } else {
                $error = "Invalid username or password.";
            }
        } else {
            $error = "Database query failed: " . mysqli_error($connection);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <div class="loginPage">
        <img src="images/login.jpg" alt="LOGIN IMG">
        <div class="form">
            <h1>WELCOME TO LOGIN</h1>
            <form method="POST" class="inputs">
                <label for="username">Username</label>
                <input type="text" name="username" class="username" value="<?php echo htmlspecialchars($username); ?>" placeholder="Enter your Username"></input></br>

                <label for="Role">Role</label>
                <select name="Role" name="role" id="Role">
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                </select>
                <br>

                <label for="password">Password</label>
                <input type="password" name="password" class="username" value="<?php echo htmlspecialchars($password); ?>" placeholder="Enter your Password"></input></br>

                <button class="submit" type="submit">LOGIN</button>

            </form>
            <br />
            OR
            <button class="submit" id="signupButton">SIGN UP</button>
            <?php if (!empty($error)) : ?>
                <p class="error"><?php echo $error; ?></p>
            <?php endif; ?>
        </div>
    </div>
    <script>
        document.getElementById("signupButton").addEventListener("click", function() {
            window.location.href = "signUp.php";
        });
    </script>
</body>

</html>