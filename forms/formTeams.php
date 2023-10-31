<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Shortcut Icon-->
    <link rel="icon" href="../assets/img/logo/favicon.png">
    <!--Bootstrap Min Css-->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!--Main custom Css-->
    <link rel="stylesheet" href="../assets/css/main.css">
    <!-- My css  -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Datatables  -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>


    <title>Create Teams Form</title>
</head>

<body>
    <header>
        <img src="../assets/img/logo/logo.png" alt="logo">
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
                    <a href="../admin.php">Dashboard</a>
                </li>
                <li>
                    <a class="active" href="../createTeams.php ">Add Teams..</a>
                </li>
                <li>
                    <a href="../addPlayers.php">Add Players</a>
                </li>
                <li>
                    <a href="../createUmpire.php">Add Umpire</a>
                </li>
                <li>
                    <a href="../createMatch.php">Add Match</a>
                </li>
                <li>
                    <a href="../matchToss.php">Match Toss</a>
                </li>
                <li>
                    <a href="../playMatch.php">Play Match</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Left nav bar end  -->

    <div class="rightsection rightsection_createteams">
        <h4>Create Teams</h4>

        <div class="formwrapper">
            <div class="container formcontainer text-center my-3">
                <form action="../createMatch.php" method="post">
                    <div class="mb-3">
                        <label for="team_name" name="team_name" class="form-label">Team Name</label>
                        <input type="name" class="form-control" id="team_name" name="team_name" aria-describedby="team_name" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label for="team_coach" name="team_coach" class="form-label">Team Coach</label>
                        <input type="name" class="form-control" id="team_caoch" name="team_coach" aria-describedby="team_coach" required>
                    </div>
                    <div class="mb-4">
                        <label for="team_captain" name="team_captain" class="form-label">Team Captain</label>
                        <input type="team_captain" class="form-control" id="team_captain" name="team_captain" aria-describedby="team_captain" required>
                    </div>
<hr>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>