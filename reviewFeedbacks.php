<?php
session_start();
// Database connection
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "users";

try {
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
} catch (mysqli_sql_exception) {
    echo "<div class='error-message'>Can't Connect!</div>";
}
$recipe_id = $_GET['recipe'];

$stmt = $conn->prepare("SELECT * FROM recipes where recipe_id = ?");// get recipe 
$stmt->bind_param("i",$recipe_id);
$stmt->execute();
$res = $stmt->get_result();
$row = $res->fetch_assoc();


// get feedbacks of said recipe 

    $feedbackstmt  = $conn->prepare("SELECT user_info.username, feedbacks.description
                                     FROM feedbacks 
                                     JOIN user_info ON user_info.username = feedbacks.username
                                     WHERE feedbacks.recipe_id = ?");
    $feedbackstmt->bind_param("i", $recipe_id);
    $feedbackstmt->execute();
    $feedbackres = $feedbackstmt->get_result();
    


    // Submit Feedback
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['feedBackssub'])) {
    if (!isset($_SESSION['username'])) {
        die("You need to log in first.");
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
    <title>Feedbacks</title>
</head>

<style>

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background: url('Pic/recipe222.jpg') no-repeat center center/cover;
    height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
.feedback-box {
    background-color: #e0e0e0; /* Light gray background */
    padding: 20px;
    border-radius: 10px; /* Rounded corners */
    max-width: 500px; /* Limit width */
    margin: 20px auto; /* Center on page */
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); /* Soft shadow */
}

.feedback-box h3 {
    text-align: center;
    color: #333;
}

.feedback-box ul {
    list-style: none;
    padding: 0;
}

.feedback-box li {
    background: #fff; /* White background for individual feedback */
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 10px;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
}
.food-item {
    background: rgba(24, 2, 2, 0.378);
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(12, 11, 11, 0.2);
    width: 350px;
}


/* Modal Content */
.modal-content {
    background-color: gray;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    width: 80%;
    max-width: 600px;
    padding: 20px;
    border-radius: 20px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    position: absolute; /* or fixed */
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%); /* Centering */
}
img {
    border-radius: 15px;
}

/* Close button */
.close {
    color: #aaa;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover {
    color: black;
}
.title {
    color: yellowgreen;
}
.position {
    position: relative;
    left: -50px;
    right: 40px;
}

</style>

<body align = "center">
<h1 class="title">Click to Review and Add Feedbacks</h1>
<div class="food-item">
    <a href="#" class="food-link" onclick="openModal('<?php echo $row['recipe_id']; ?>', event)">
        <img src="<?php echo htmlspecialchars($row['image_path']); ?>" alt="Recipe" >
        <p><?php echo htmlspecialchars($row['recipe_name']); ?></p>
    </a>
</div>

<!-- Recipe Modal -->
<div id="modal-<?php echo $recipe_id; ?>" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('<?php echo $row['recipe_id']; ?>')">&times;</span>
        <div class="modal-img-container">
            <img src="<?php echo htmlspecialchars($row['image_path']); ?>" alt="Recipe" class="modal-img">
        </div>
        <h2><?php echo htmlspecialchars($row['recipe_name']); ?></h2>

        <h3>Ingredients</h3>
        <ul>
            <?php 
            $stmt2 = $conn->prepare("SELECT `description` FROM ingredients WHERE recipe_id = ?");
            $stmt2->bind_param("i", $row['recipe_id']);
            $stmt2->execute();
            $res2 = $stmt2->get_result();
            echo "<ul class='position' type='disc'>";
            while ($row2 = $res2->fetch_assoc()) {
                echo "<li >" . htmlspecialchars($row2['description']) . "</li>";
            }
            echo "</ul>";

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

        <!-- Feedback Form -->
        <form action="recipes.php" method="post">
            <p>Give us your thoughts!</p>
            <textarea name="feed_back" required></textarea>
            <input type="hidden" name="recipe_id" value="<?php echo $row['recipe_id']; ?>"/>
            <input type="submit" name="feedBackssub" value="Submit Feedback"/>
        </form>
    
        <div class="feedback-box">
            <?php if ($feedbackres->num_rows > 0) { ?>
                <ul>
                    <?php while ($feedbackRow = $feedbackres->fetch_assoc()) { ?>
                        <li>
                            <strong><?php echo htmlspecialchars($feedbackRow['username']); ?>:</strong> 
                            <?php echo htmlspecialchars($feedbackRow['description']); ?>
                        </li>
                    <?php } ?>
                </ul>
            <?php } else { ?>
                <p>No feedback yet. Be the first to leave a review!</p>
            <?php } ?>
        </div>

        <?php $feedbackstmt->close(); ?>
            </div>
        </div>


<script src="feedback.js"></script> 
</body>

</html>



