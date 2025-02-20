<?php
session_start();

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "users"; 
$conn = "";

try {
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
} catch (mysqli_sql_exception) {
    echo "<div class='error-message'>Can't Connect!</div>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Recipe Website</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <header>
        <div class="logo">
        <pre><h2> Quick & Tasty 
    Recipes</h2></pre>
        </div>
    <nav>
            <ul>
                <li><a href="index.php"  class="active">Home</a></li>
                <li><a href="recipes.php?all=1">Recipes</a></li>
                <li><a href="favorite.php">Favorite</a></li>
            </ul>
        <div class="login">
            <?php 
                if(isset($_SESSION['login'])){
                    $username=$_SESSION["username"];
                    $sql="SELECT user_id,full_name,email,time_join FROM user_info WHERE username = ?";
                    $stmt=$conn->prepare($sql);
                    $stmt->bind_param("s",$username);
                    $stmt->execute();
                    $stmt->store_result();
                    if($stmt->num_rows > 0){
                        $stmt->bind_result($id,$name,$email,$time);
                        $stmt->fetch();
                        $_SESSION["user_id"]=$id;
                        $_SESSION["full_name"]=$name;
                        $_SESSION["email"]=$email;
                        $_SESSION["time"]=$time;
                    }
                    $userFullName = $_SESSION["full_name"];
                    echo "Welcome, " . htmlspecialchars($userFullName);
                    echo "<a href='logout.php' class='btn log-out'>logout</a>";
                }else{
                    echo "<a href='signin.php' class='btn sign-in'>Sign Up</a>";
                    echo "<a href='login.php' class='btn log-in'>LogIn</a>";
                }
            ?>
        </div>    
    </nav>
    </header>
    <main>
        <section class="hero">
            <h2>Welcome to <br> Delicious Recipes</h2>
            <p>At Delicious Recipes, we believe cooking is an art that brings people together.<br>
                 Discover easy-to-follow recipes, step-by-step instructions, and tips to help you<br>
                  create mouthwatering meals whether you're a beginner or
                   a seaned chef.</p>
            <a href="recipes.php?all=1" class="btn">Explore Recipes</a>
        </section>
    </main>
    <img src="Pic/plate1.jpg" alt="Rotating Circle" class="circular-image">
</body>
</html>
