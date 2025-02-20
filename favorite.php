<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="recipes.css">
    <link rel="stylesheet" href="favorite.css">
    <title>Favorite recipes</title>

</head>
</head>
<body>
<header>
        <div class="logo">
        <pre><h2> Quick & Tasty 
    Recipes</h2></pre>           
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="recipes.php" class="active1">Recipes</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="favorite.php">Favorite</a></li>
            </ul>
            </nav>
            </header>
    <h4>My <span class="fav">Favorite</span>  Recipes</h4>
    <ul>
    <?php
        if (!empty($_SESSION["favorites"])) {
            foreach ($_SESSION["favorites"] as $favorite) {
                // Make sure $favorite is an array before accessing its keys
                if (is_array($favorite)) {
                    echo "<li>";
                    echo "<h5>" . htmlspecialchars($favorite['name']) . "</h5>";
                    echo "<img src='" . htmlspecialchars($favorite['image']) . "' alt='" . htmlspecialchars($favorite['name']) . "'>";
                    echo "<h3>Ingredients</h3><p>" . htmlspecialchars($favorite['ingredients']) . "</p>";
                    echo "<h3>Tips</h3><p>" . htmlspecialchars($favorite['tips']) . "</p>";
                    echo "</li>";
                }
            }
        } else {
            echo "<p>No favorite recipes yet.</p>";
        }
        ?>
    </ul>
</body>
</html>
