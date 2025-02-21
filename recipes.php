<?php
session_start();
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "users";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
    $conn = new mysqli($db_server, $db_user, $db_pass, $db_name);
} catch (Exception $e) {
    error_log("Database Connection Error: " . $e->getMessage());
    die("An error occurred. Please try again later.");
}

// Food category filter
$food_type = "";
if (isset($_GET['beef'])) {
    $food_type = "Beef";
} elseif (isset($_GET['chicken'])) {
    $food_type = "Chicken";
} elseif (isset($_GET['fish'])) {
    $food_type = "Fish";
} elseif (isset($_GET['dessert'])) {
    $food_type = "Dessert";
}

if ($food_type) {
    $stmt = $conn->prepare("SELECT * FROM recipes WHERE LOWER(food_type) = LOWER(?)");
    $stmt->bind_param("s", $food_type);
} else {
    $stmt = $conn->prepare("SELECT * FROM recipes");
}

$stmt->execute();
$res = $stmt->get_result();

// Add to Favorites
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_fav']) && isset($_POST['recipe_id'])) {
    if (!isset($_SESSION['username'])) {
        $message="You must be login to add an recipes to Favorite";
        $_SESSION['message']=$message;
        header("location: login.php");
        exit();
    }
    $recipe_id = $_POST['recipe_id'];
    $stmt4 = $conn->prepare("INSERT INTO favourite (recipe_id, username) VALUES (?, ?)");
    $stmt4->bind_param("is", $recipe_id, $_SESSION['username']);
    $stmt4->execute();
    $stmt4->close();
}

// Submit Feedback
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['feedBackssub'])) {
    if (!isset($_SESSION['username'])) {
        $message="You must be login to add an Feedback";
        $_SESSION['message']=$message;
        header("location: login.php");
        exit();
    }
    $user = $_SESSION['username'];
    $desc = $_POST['feed_back'];
    $recipe_id = $_POST['recipe_id'];

    $stmtt = $conn->prepare("INSERT INTO feedbacks (username, `description`, recipe_id) VALUES (?, ?, ?)");
    $stmtt->bind_param("ssi", $user, $desc, $recipe_id);
    $stmtt->execute();
    $stmtt->close();

    echo "<script>window.onload = function() { openModal('{$recipe_id}', event); }</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="recipes.css">
    <title>Recipes</title>
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
            <li><a href="recipes.php?all=1" class="active1">Recipes</a></li>
            <li><a href="favorite.php">Favorite</a></li>
        </ul>
        <?php if (isset($_SESSION["in"]) && $_SESSION["in"] == true) { ?>
            <h3>WELCOME <?php echo htmlspecialchars($_SESSION['user_full_name']); ?></h3>
        <?php } else { ?>
            <div class="login">
                <?php if (isset($_SESSION['login'])): ?>
                    <div class="user-box" onclick="toggleDropdown()">
                        <?php echo htmlspecialchars($_SESSION["full_name"]); ?>
                        <div class="user-dropdown" id="userDropdown">
                            <a href="user_info.php">User Info</a>
                            <a href="delete_account.php" onclick="return confirm('Are you sure?');">Delete Account</a>
                            <a href="logout.php">Logout</a>
                        </div>
                    </div>
                <?php else: ?>
                    <a href="signin.php" class="btn sign-in">Sign Up</a>
                    <a href="login.php" class="btn log-in">LogIn</a>
                <?php endif; ?>
            </div>  
        <?php } ?>
    </nav>
</header>

<main>
    <h1>Welcome to our Recipe Collection</h1>
</main>

<div id="recipeModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('recipeModal')">&times;</span>
        <h2>Recipe Details</h2>
        <p>Recipe content goes here...</p>
    </div>
</div>

<div class="categories">
<a href="recipes.php?all=1">
<div class="category" style="<?php if(isset($_GET['all'])) { echo 'background-color: orangered; color: white;'; } ?>" onclick="filterCategory('all')">All</div>
    </a>
    <a href="recipes.php?chicken=1">
    <div class="category" style="<?php if(isset($_GET['chicken'])) { echo 'background-color: orangered; color: white;'; } ?>" onclick="filterCategory('all')">Chicken</div>
    </a>
    <a href="recipes.php?beef=1">
    <div class="category" style="<?php if(isset($_GET['beef'])) { echo 'background-color: orangered; color: white;'; } ?>" onclick="filterCategory('all')">Beef</div>
    </a>
    <a href="recipes.php?fish=1">
    <div class="category" style="<?php if(isset($_GET['fish'])) { echo 'background-color: orangered; color: white;'; } ?>" onclick="filterCategory('all')">Fish</div>
    </a>
    <a href="recipes.php?dessert=1">
    <div class="category" style="<?php if(isset($_GET['dessert'])) { echo 'background-color: orangered; color: white;'; } ?>" onclick="filterCategory('all')">Dessert</div>
    </a>
</div>
</div>



<div class="food-grid">
    <?php while ($row = $res->fetch_assoc()) { ?>
        <div class="food-item">
            <a href="#" class="food-link" onclick="openModal('<?php echo $row['recipe_id']; ?>', event)">
                <img src="<?php echo htmlspecialchars($row['image_path']); ?>" alt="Recipe">
                <p><?php echo htmlspecialchars($row['recipe_name']); ?></p>
            </a>
        </div>

        <!-- Recipe Modal -->
        <div id="modal-<?php echo $row['recipe_id']; ?>" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal('<?php echo $row['recipe_id']; ?>')">&times;</span>
                <img src="<?php echo htmlspecialchars($row['image_path']); ?>" alt="Recipe" class="modal-img">
                <h2><?php echo htmlspecialchars($row['recipe_name']); ?></h2>

                <h3>Ingredients</h3>
                <ul class="position" >
                    <?php 
                    $stmt2 = $conn->prepare("SELECT `description` FROM ingredients WHERE recipe_id = ?");
                    $stmt2->bind_param("i", $row['recipe_id']);
                    $stmt2->execute();
                    $res2 = $stmt2->get_result();
                    
                    while ($row2 = $res2->fetch_assoc()) {
                        echo "<li>" . htmlspecialchars($row2['description']) . "</li>";
                    }
                    $stmt2->close();
                    ?>
                </ul>
                <h3 class="modal-heading">Tips</h3>
                <p class="tips"><?php echo $row['tips']; ?></p>
                <!-- Add to Favorites Button -->
                <form action="recipes.php" method="post">
                    <input type="hidden" name="recipe_id" value="<?php echo $row['recipe_id']; ?>"/>
                    <input type="submit" name="add_fav" value="❤️ Add to Favorites"/>
                </form>

                <span class="feedback_link"><a href="reviewFeedbacks.php?recipe=<?php echo $row['recipe_id']; ?>">Review Feedbacks</a></span> 

            </div>
        </div>
    <?php } $stmt->close(); ?>
</div>
You need to log in first.
<script src="recipes.js"></script>
</body>
</html>
