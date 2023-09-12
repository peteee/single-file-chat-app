<?php
//// Displaying errors
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    //// Load up the DB connection
    require_once('db/db.php');

//// Setting up users -> was now done in DB...
    // $user1 = "peter";
    // $passw1 = "pizza123";
    // $user2 = "mary";
    // $passw2 = "pasta123";


//// POST check & content check via if conditional...
    if(isset($_POST["username"]) && !empty($_POST["username"]) && $_POST["username"] != " ") {
        
        /// Assigning values to variables as well as "sanitizing" the inputs
        $username = trim(strip_tags($_POST["username"]));
        $password = trim(strip_tags($_POST["password"]));

        /// DB SELECT OPERATION
        $user = $db->real_escape_string($username);
        $passw = $db->real_escape_string($password);

        $query = "SELECT * FROM zjhu5_users WHERE username = '$username'";
        $result = mysqli_query($db, $query);
        
        if(mysqli_num_rows($result) == 0) {
            echo("<p>user not found</p>");
            exit();
        }

        $user_data = mysqli_fetch_assoc($result);

        // echo("<pre>");
        // var_dump($user_data);
        // echo("</pre>");




        //echo "Form data is OK";
        //if(($username === $user1 && $passw1 === $password) || ($username === $user2 && $passw2 === $password)) {
        //if($password == $user_data['password']) -> won't work, because $password isn't hashed yet
        if(password_verify($password, $user_data['password'])) {
            session_start();
            $_SESSION["username"] = $username;
            $_SESSION["id"] = $user_data['id'];
            //Boolean switch type variable
            $_SESSION["logged_in"] = true;

            // print "Hi there, ".$_SESSION["username"];
        }
    }

    // if(isset($_GET["logout"])) {
    //     session_start();
    //     session_destroy();
    //     echo 'You have been logged out. <a href="login.php">Go back</a>';
    // }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Simple Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>


    <?php if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true) : ?>
        
        <img id="logo" src="img/Logo.svg" alt="">
        <header id="welcome-box">
            <h1>Welcome <?php print $_SESSION["username"]; ?></h1>
            <a href="logout.php">Log out</a>
        </header>

        <p id="messages">l o a d i n g</p>

        <form id="msg-box"> <!-- action="views/chat.php?post" method="post" -->
            <input type="text" placeholder="type a message" name="msg">
            <input type="submit" value=""> <!-- value="Post it!" -->
        </form>

        <script>
            window.myUserId = <?php echo($_SESSION["id"]); ?>;
        </script>
        <script src="js/actions.js" defer></script>

        
    
    <?php elseif($_SERVER['REQUEST_METHOD'] == "POST") : ?>

        <h2>oops, that didn't work... </h2>
        <a href="./index.php">Try again.</a>
        
    <?php else : ?>

        <h1>Please log in first</h1>
        <form action="./index.php" method="post">
            <input type="text" name="username" placeholder="User name please" pattern=".{3,}" required>
            <input type="password" name="password" placeholder="Password please" pattern=".{8,}" required>
            <input type="submit" value="Log me in!">
        </form>
    
    <?php endif; ?>

    

</body>
</html>