<?php
    include("db/dbs.php");
    session_start();
    if (!isset($_SESSION['user'])) {
        header("Location: index.php");
        exit();
    }

    $user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <h1>WELCOME TO HOME <?php echo $user['Name']; ?> your role is <?php echo $user['Role']; ?></h1>
    <button onclick="logout()" class="submit">LOGOUT</button>
    <script>
        function logout() {
            <?php session_destroy(); ?>
            window.location.reload();
        }
    </script>
</body>
</html>