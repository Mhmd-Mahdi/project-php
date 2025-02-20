<?php 
session_start();
$db_server="localhost";
$db_user="root";
$db_pass="";
$db_name="users";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
    $conn = new mysqli($db_server, $db_user, $db_pass, $db_name);
} catch (Exception $e) {
    die("Connection failed: " . $e->getMessage());
}

$stmt = $conn->prepare("SELECT * FROM recipes WHERE food_type = 'beef'");
$stmt->execute();
$res = $stmt->get_result();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_fav']) && isset($_POST['recipe_id'])) {
    $recipe_id = $_POST['recipe_id'];
    $stmt4 = $conn->prepare("INSERT INTO favourite (recipe_id, username) VALUES (?, ?)");
    $stmt4->bind_param("is", $recipe_id, $_SESSION['username']);
    $stmt4->execute();
    $stmt4->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "recipes.css">

    <title>Beef Recipes</title>
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
                <li><a href="add.php">About</a></li>
                <li><a href="favorite.php">Favourite</a></li>
            </ul>
    <?php if (isset($_SESSION["in"]) && $_SESSION["in"] == true) { ?>
    <h3>WELCOME <?php echo htmlspecialchars($_SESSION['user_full_name']); ?></h3>
    <?php }else{ ?>
        <div class="login">
            <?php if (isset($_SESSION['login'])): ?>
                <div class="user-box" onclick="toggleDropdown()">
                    <?php echo htmlspecialchars($_SESSION["full_name"]); ?>
                    <div class="user-dropdown" id="userDropdown">
                        <a onclick="openInfoModal()">User Info</a>
                        <a href="delete_account.php" onclick="return confirm('Are you sure you want to delete your account?');">Delete Account</a>
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
        <p>Discover delicious recipes that bring flavor and joy to your kitchen</p>
    </main>

    <!-- User Info Modal -->
<div id="infoModal" class="modal">
    <span class="close" onclick="closeModal('infoModal')">&times;</span>
    <h2>User Info</h2>
    <p><strong>ID : </strong> <?php echo $_SESSION["user_id"] ?> </p>
    <p><strong>Full Name : </strong> <?php echo htmlspecialchars($_SESSION["full_name"]); ?></p>
    <p><strong>Email : </strong> <?php echo $_SESSION["email"] ?> </p>
    <p><strong>Joined : </strong> <?php echo $_SESSION["time"] ?> </p>
</div>
<!-- Recipe Modal-->
<div id="recipeModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('recipeModal')">&times;</span>
        <h2>Recipe Details</h2>
        <p>Recipe content goes here...</p>
    </div>
</div>

<div class="categories">
<a href="recipes.php">
    <div class="category" onclick="filterCategory('all')">All</div>
    </a>
    <a href="recipeschicken.php">
    <div class="category active" onclick="filterCategory('chicken')">Chicken</div>
    </a>
    <a href="recipesbeef.php">
    <div class="category" onclick="filterCategory('beef')">Beef</div>
    </a>
    <a href="recipesfish.php">
    <div class="category" onclick="filterCategory('fish')">Fish</div>
    </a>
    <a href="recipesdessert.php">
    <div class="category" onclick="filterCategory('dessert')">Dessert</div>
    </a>
</div>
</div>


<!-- HTML Part -->
<div class="food-grid">
  <?php while($row = $res->fetch_assoc()){ ?>
    <div class="food-item">
   <a href="#modal-<?php echo $row['recipe_id']; ?>" class="food-link" onclick="openModal('<?php echo $row['recipe_id']; ?>', event)">
    <img src="<?php echo $row['image_path']; ?>" alt="Beef Recipe">
    <p><?php echo $row['recipe_name']; ?></p>
</a>
    </div>

    <div id="modal-<?php echo $row['recipe_id']; ?>" class="modal">
        <div class="modal-content">
        <span class="close" onclick="closeModal('<?php echo $row['recipe_id']; ?>')">&times;</span>
            <img src="<?php echo $row['image_path']; ?>" alt="Beef Recipe" class="modal-img">
            <h2 class="modal-title"><?php echo $row['recipe_name']; ?></h2>

            <h3 class="modal-heading">Ingredients</h3>
            <ul class="modal-list">
                <?php 
                $stmt2 = $conn->prepare("SELECT * FROM ingredients WHERE recipe_id = ?");
                $stmt2->bind_param("i", $row['recipe_id']);
                $stmt2->execute();
                $res2 = $stmt2->get_result();
                
                while ($row2 = $res2->fetch_assoc()){
                    echo "<li>{$row2['description']}</li>";
                }
                ?>
            </ul>

            <h3 class="modal-heading">Tips</h3>
            <p><?php echo $row['tips']; ?></p>

            <!-- Add to Favorites Button -->
            <form action="recipesbeef.php" method="post">
                <input type="hidden" name="recipe_id" value="<?php echo $row['recipe_id']; ?>"/>
                <input type="submit" name="add_fav" value="❤️ Add to Favorites"/>
            </form>
        </div>
    </div>
  <?php } $stmt->close();
  $conn->close();?>
</div>
<script src="recipes.js"></script>
</body>
</html>
