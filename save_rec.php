<?php
session_start();

if (!isset($_SESSION["favorites"])) {
    $_SESSION["favorites"] = [];
}
var_dump($_POST);
if (isset($_POST["recipe_name"]) && isset($_POST["recipe_image"]) && isset($_POST["recipe_ingredients"]) && isset($_POST["recipe_tips"])) {
    $recipe_name = htmlspecialchars(trim($_POST["recipe_name"]));
    $recipe_image = htmlspecialchars(trim($_POST["recipe_image"]));
    $recipe_ingredients = htmlspecialchars(trim($_POST["recipe_ingredients"]));
    $recipe_tips = htmlspecialchars(trim($_POST["recipe_tips"]));
    $recipe_data = [
        'name' => $recipe_name,
        'image' => $recipe_image,
        'ingredients' => $recipe_ingredients,
        'tips' => $recipe_tips
    ];
    if (is_array($_SESSION["favorites"])) {
        // Check 
        $is_duplicate = false;

        // Iterate through each favorite and check if it matches the new recipe
        foreach ($_SESSION["favorites"] as $favorite) {
            if ($favorite['name'] == $recipe_name && 
                $favorite['image'] == $recipe_image && 
                $favorite['ingredients'] == $recipe_ingredients && 
                $favorite['tips'] == $recipe_tips) {
                $is_duplicate = true;
                break;
            }
        }

        // If the recipe is not a duplicate, add it to the favorites
        if (!$is_duplicate) {
            $_SESSION["favorites"][] = $recipe_data;
            echo "Recipe added to favorites!";
        } else {
            echo "This recipe is already in your favorites.";
        }
    } else {
        // If $_SESSION["favorites"] is not an array, initialize it
        $_SESSION["favorites"] = [];
        echo "Favorites list was reset.";
    }
} else {
    echo "No recipe data received.";
}
?>


Display the message in an alert before redirect
<script>
    // Wait for the page to fully load before showing the alert
    window.onload = function() {
        // Display the message from PHP session
        alert("<?php echo $_SESSION['favorite_message']; ?>");
        
        // Redirect back to the same page after showing the alert
        window.location.href = window.history.back();
    }
</script>