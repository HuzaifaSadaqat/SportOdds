<?php

include("db/dbs.php");
session_start();

$name = "";
$email = "";
$password = "";
$role = "";
$error = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];
    $username = $_POST["username"];
    $role = $_POST["role"];

    
    if (empty($email) || empty($password)) {
        $error = "Please fill in both email and password fields.";
    } else {
        
        $query = "INSERT INTO Users (Email, Password, username, role) VALUES ('$email', '$password', '$username', '$role')";
        $result = mysqli_query($conn, $query);
        
        if ($result) {
            $error = "SUCCESSFULLY CREATED! NOW YOU CAN LOGIN! ";
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['name'] = $name;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;
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
    <title>Sign Up</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <div class="loginPage">
        <img src="images/login.jpg" alt="LOGIN IMG">
        <div class="form">
            <h1>WELCOME TO SIGNUP</h1>
            <form method="POST" class="inputs">
                <label for="email">Name</label>
                <input type="text" name="name" class="email" value="<?php echo htmlspecialchars($name); ?>" placeholder="Enter your Name"></input></br>

                <label for="email">UserName</label>
                <input type="text" name="username" class="email" value="<?php echo htmlspecialchars($username); ?>" placeholder="Enter your UserName"></input></br>

                <label for="email">Email</label>
                <input type="text" name="email" class="email" value="<?php echo htmlspecialchars($email); ?>" placeholder="Enter your Email"></input></br>

                <label for="password">Password</label>
                <input type="password" name="password" class="email" value="<?php echo htmlspecialchars($password); ?>" placeholder="Enter your Password"></input></br>

                <label for="role">Role</label>
                <input type="role" name="role" class="email" value="<?php echo htmlspecialchars($role); ?>" placeholder="Enter your role"></input></br>

                <button class="submit" type="submit">SIGN UP</button>


            </form>
            <br />
            OR
            <button class="submit" id="loginButton">LOGIN</button>
            <?php if (!empty($error)) : ?>
                <p class="error"><?php echo $error; ?></p>
            <?php endif; ?>
        </div>
    </div>
    <script>
        document.getElementById("loginButton").addEventListener("click", function() {
            window.location.href = "index.php";
        });
    </script>
</body>

</html>