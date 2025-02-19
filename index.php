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
                <li><a href="recipes.php">Recipes</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        <div class="login">
            <?php 
                session_start();
                if(isset($_SESSION['login'])){
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
            <a href="recipes.php" class="btn">Explore Recipes</a>
        </section>
    </main>
    <img src="Pic/plate1.jpg" alt="Rotating Circle" class="circular-image">
</body>
</html>
