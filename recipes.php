<?php
    
    session_start();
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "users";
    $conn = null;

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
    <link rel="stylesheet" href="recipes.css">
    <title>Recipes</title>
</head>

<body>
<header>
    <div class="logo">
        <h1></h1>
    </div>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="recipes.php" class="active1">Recipes</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <div class="login">
            <?php if (isset($_SESSION['login'])): ?>
                <div class="user-box" onclick="toggleDropdown()">
                    <?php echo htmlspecialchars($_SESSION["user_full_name"]); ?>
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
    </nav>
</header>
<main>
    <h1>Welcome to our Recipe Collection</h1>
    <p>Discover delicious recipes that bring flavor and joy to your kitchen</p>
</main>

<!-- User Info Modal -->
<div id="infoModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <h2>User Info</h2>
    <p><strong>Full Name:</strong> <?php echo htmlspecialchars($_SESSION["user_full_name"]); ?></p>
    <p><strong>Email:</strong> <!-- INSERT EMAIL FROM DATABASE HERE --></p>
    <p><strong>Joined:</strong> <!-- INSERT JOIN DATE FROM DATABASE HERE --></p>
</div>

<script>
    function toggleDropdown() {
        let dropdown = document.getElementById("userDropdown");
        dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
    }

    function openInfoModal() {
        document.getElementById("infoModal").style.display = "block";
    }

    function closeModal() {
        document.getElementById("infoModal").style.display = "none";
    }

    // Close dropdown if clicked outside
    window.onclick = function(event) {
        if (!event.target.matches('.user-box')) {
            let dropdown = document.getElementById("userDropdown");
            if (dropdown.style.display === "block") {
                dropdown.style.display = "none";
            }
        }
    };
</script>
<!-- Search Box -->
<div class="search-container">
<form method="POST">
            <input type="text" name="search" placeholder="Type food name...">
            <button type="submit">Search</button>
        </form>
</div>

<div class="categories">
    <a href="recipes.php">
    <div class="category active" onclick="filterCategory('all')">All</div>
    </a>
    <a href="recipeschicken.php">
    <div class="category" onclick="filterCategory('chicken')">Chicken</div>
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
<hr class="separator">

<!--  Food Grid -->
     <div class="food-grid">
<!-- Chicken -->
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="Pic/recipe1.jpg" alt="Crispy Chicken">
                <p>Crispy Chicken</p>
            </a>
        </div>
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="Pic/recipe22.jpg" alt="Fajitas">
                <p>Fajitas</p>
            </a>
        </div>
        
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="Pic/recipe22.jpg" alt=" Chicken Burger">
                <p>Chicken Burger</p>
            </a>
        </div>

        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="Pic/recipe22.jpg" alt="Grilled Chicken">
                <p>Grilled Chicken</p>
            </a>
        </div>

        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="Pic/recipe22.jpg" alt="Chicken Curry">
                <p>Chicken Curry</p>
            </a>
        </div>

        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="Pic/recipe22.jpg" alt="Chicken Alfredo">
                <p>Chicken Alfredo</p>
            </a>
        </div>
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="Pic/recipe22.jpg" alt="Chicken Wings">
                <p>Chicken Wings</p>
            </a>
        </div>
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="Pic/recipe22.jpg" alt="Roast Chicken">
                <p>Roast Chicken</p>
            </a>
        </div>
   
<!-- Beef -->
     <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="Pic/recipe1.jpg" alt="Beef Burger">
                <p>Beef Burger</p>
            </a>
        </div>
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="Pic/recipe1.jpg" alt="Steak">
                <p>Steak</p>
            </a>
        </div>
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="Pic/recipe1.jpg" alt="Beef Tacos">
                <p>Beef Tacos</p>
            </a>
        </div>
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="Pic/recipe1.jpg" alt="Meatballs">
                <p>Meatballs</p>
            </a>
        </div>
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="Pic/recipe1.jpg" alt="Beef Stroganoff">
                <p>Beef Stroganoff</p>
            </a>
        </div>
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="Pic/recipe1.jpg" alt="Beef Stew">
                <p>Beef Stew</p>
            </a>
        </div>
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="Pic/recipe1.jpg" alt="Roast Beef">
                <p>Roast Beef</p>
            </a>
        </div>
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="Pic/recipe1.jpg" alt=" Beef Kebab">
                <p> Beef Kebab</p>
            </a>
        </div>     
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="Pic/recipe1.jpg" alt="Grilled Salmon">
                <p>Grilled Salmon</p>
            </a>
        </div>
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="Pic/recipe1.jpg" alt="Fish Tacos">
                <p>Fish Tacos</p>
            </a>
        </div>
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="Pic/recipe1.jpg" alt="Fish & Chips">
                <p>Fish & Chips</p>
            </a>
        </div>
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="Pic/recipe1.jpg" alt="Sushi">
                <p>Sushi</p>
            </a>
        </div>
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="Pic/recipe1.jpg" alt="Ceviche">
                <p>Ceviche</p>
            </a>
        </div>
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="Pic/recipe1.jpg" alt="Fish Curry">
                <p>Fish Curry</p>
            </a>
        </div>
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="Pic/recipe1.jpg" alt="Smoked Salmon">
                <p>Smoked Salmon</p>
            </a>
        </div>
        <div class="food-item">
            <a href="#modal" class="food-link">
                <img src="Pic/recipe1.jpg" alt="Baked Tilapia">
                <p>Baked Tilapia</p>
            </a>
        </div>

   
<!-- Dessert -->
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="Pic/recipe1.jpg" alt="Chocolate Cake">
        <p>Chocolate Cake</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="Pic/recipe1.jpg" alt="Ice Cream">
        <p>Ice Cream</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="Pic/recipe1.jpg" alt="Tiramisu">
        <p>Tiramisu</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="Pic/recipe1.jpg" alt="Cheesecake">
        <p>Cheesecake</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="Pic/recipe1.jpg" alt="Brownies">
        <p>Brownies</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="Pic/recipe1.jpg" alt="Apple Pie">
        <p>Apple Pie</p>
        </a>
    </div>
    <div class="food-item">
        <a href="#modal" class="food-link">
        <img src="Pic/recipe1.jpg" alt="Donuts">
        <p>Donuts</p>
        </a>
    </div>
    <div class="food-item">
    <a href="#modal" class="food-link">
        <img src="Pic/recipe1.jpg" alt="Crème Brûlée">
        <p>Crème Brûlée</p>
    </a>
    </div>

</div> 

</body>
</html>