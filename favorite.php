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
if(!isset($_SESSION["user_id"])) {
$message="You must be sigin to add and recipes to favorite";
$_SESSION['message']=$message;
header("location: login.php");
exit();
}
$stmt = $conn->prepare("SELECT recipe_id FROM favourite where username = ?");
$stmt->bind_param("s" , $_SESSION['username']);
$stmt->execute();

$res = $stmt->get_result();



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['del_fav']) && isset($_POST['recipe_id'])) {
    $recipe_id = $_POST['recipe_id'];
    $stmt4 = $conn->prepare("DELETE FROM favourite where recipe_id = ?");
    $stmt4->bind_param("i", $recipe_id);
    $stmt4->execute();
    $stmt4->close();
    header("Location:favorite.php");
    exit();
}


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
            <li><a href="recipes.php?all=1" >Recipes</a></li>
            <li><a href="favorite.php" class="active1">Favourite</a></li>
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
           <h1 style="color: green;" align="center">My Favorite Recipes</h1>
    <div class="food-grid">
    <?php while($row = $res->fetch_assoc()){?>
        <?php $stmt2 = $conn->prepare("SELECT * FROM recipes where recipe_id = ?");
            $stmt2->bind_param("i" , $row['recipe_id']);
            $stmt2->execute();
            
            $res2 = $stmt2->get_result();
            $row2 = $res2->fetch_assoc();?>
    <div class="food-item">
   <a href="#modal-<?php echo $row['recipe_id']; ?>" class="food-link" onclick="openModal('<?php echo $row['recipe_id']; ?>', event)">
    <img src="<?php echo $row2['image_path']; ?>" alt="Beef Recipe">
    <p><?php echo $row2['recipe_name']; ?></p>
   </a>
    </div>
    <div id="modal-<?php echo $row['recipe_id']; ?>" class="modal">
        <div class="modal-content">
        <span class="close" onclick="closeModal('<?php echo $row['recipe_id']; ?>')">&times;</span>
            <img src="<?php echo $row2['image_path']; ?>" alt="Beef Recipe" class="modal-img">
            <h2 class="modal-title"><?php echo $row2['recipe_name']; ?></h2>

            <h3 class="modal-heading">Ingredients</h3>
            <ul class="modal-list">
                <?php 
                $stmt3 = $conn->prepare("SELECT * FROM ingredients WHERE recipe_id = ?");
                $stmt3->bind_param("i", $row['recipe_id']);
                $stmt3->execute();
                $res3 = $stmt3->get_result();
                
                while ($row3 = $res3->fetch_assoc()){
                    echo "<li>{$row3['description']}</li>";
                }
                ?>
            </ul>

            <h3 class="modal-heading">Tips</h3>
            <p><?php 
                
                echo $row2['tips']; ?>
            </p>
            <form action="favorite.php" method="post">
                <input type="hidden" name="recipe_id" value="<?php echo $row['recipe_id']; ?>"/>
                <input type="submit" name="del_fav" value="❤️ Remove From Favorites"/>
            </form>
        </div>
    </div>
  <?php } $stmt->close();
  $conn->close();?>
</div>
<script src="recipes.js"></script>
</body>
</html>
