<?php 
    session_start();
    $db_server="localhost";
    $db_user="root";
    $db_pass="";
    $db_name="users";
    $conn="";

    try {
        $conn=mysqli_connect($db_server,$db_user,$db_pass,$db_name);
    }catch(mysqli_sql_exception){
        die("Can't Connect!.");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="recipes.css">
    <title>Document</title>
    <script src="recipes.js"></script>
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
                <li><a href="contact.php">Contact</a></li>
            </ul>
    <?php if (isset($_SESSION["in"]) && $_SESSION["in"] == true) { ?>
    <h3>WELCOME <?php echo htmlspecialchars($_SESSION['user_full_name']); ?></h3>
    <?php }else{ ?>
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
    <?php } ?>
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

<div class="categories">
<a href="recipes.php">
    <div class="category" onclick="filterCategory('all')">All</div>
    </a>
    <a href="recipeschicken.php">
    <div class="category" onclick="filterCategory('chicken')">Chicken</div>
    </a>
    <a href="recipesbeef.php">
    <div class="category active" onclick="filterCategory('beef')">Beef</div>
    </a>
    <a href="recipesfish.php">
    <div class="category" onclick="filterCategory('fish')">Fish</div>
    </a>
    <a href="recipesdessert.php">
    <div class="category" onclick="filterCategory('dessert')">Dessert</div>
    </a>
</div>
</div>


<!--  Food Grid -->
     <div class="food-grid">
  <!-- Beef Burger -->
    <div class="food-item">
    <a href="#modal-beef-burger" class="food-link" onclick="openModal('modal-beef-burger')">
        <img src="Pic/recipe1.jpg" alt="Beef Burger">
        <p>Beef Burger</p>
    </a>
    </div>

    <!-- Beef Burger Modal -->
    <div id="modal-beef-burger" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal-beef-burger')">&times;</span>
        <img src="Pic/recipe1.jpg" alt="Beef Burger" class="modal-img">
        
        <h2 class="modal-title">Beef Burger</h2>

        <h3 class="modal-heading">Ingredients</h3>
        <ul class="modal-list">
            <li>1 lb ground beef (80% lean)</li>
            <li>4 hamburger buns</li>
            <li>Salt and pepper to taste</li>
            <li>1 onion (sliced)</li>
            <li>4 slices cheddar cheese</li>
            <li>1 tomato (sliced)</li>
            <li>Pickles (optional)</li>
            <li>Lettuce leaves</li>
            <li>Ketchup and mustard (optional)</li>
        </ul>

        <h3 class="modal-heading">Tips</h3>
        <ul class="modal-list">
            <li>Grill the burgers on medium-high heat for 4-5 minutes per side for medium doneness.</li>
            <li>For juicier burgers, avoid pressing the patties while cooking.</li>
            <li>Let the beef rest for a few minutes after grilling to preserve its juices.</li>
            <li>Top with fresh toppings like lettuce, tomato, and pickles to enhance flavor.</li>
        </ul>

        <textarea class="modal-feedback" placeholder="Leave your feedback here..."></textarea>
    </div>
    </div>

  <!-- Steak -->
    <div class="food-item">
    <a href="#modal-steak" class="food-link" onclick="openModal('modal-steak')">
        <img src="Pic/recipe1.jpg" alt="Steak">
        <p>Steak</p>
    </a>
    </div>

    <!-- Steak Modal -->
    <div id="modal-steak" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal-steak')">&times;</span>
        <img src="Pic/recipe1.jpg" alt="Steak" class="modal-img">
        
        <h2 class="modal-title">Steak</h2>

        <h3 class="modal-heading">Ingredients</h3>
        <ul class="modal-list">
            <li>2 steaks (Ribeye, Sirloin, or your preferred cut)</li>
            <li>2 tablespoons olive oil</li>
            <li>Salt and pepper to taste</li>
            <li>2 cloves garlic (crushed)</li>
            <li>1 tablespoon fresh rosemary (optional)</li>
            <li>1 tablespoon butter</li>
            <li>1 tablespoon fresh parsley (for garnish)</li>
        </ul>

        <h3 class="modal-heading">Tips</h3>
        <ul class="modal-list">
            <li>Rest the steak for a few minutes before cooking for a more even cook.</li>
            <li>For perfect sear, make sure the steak is at room temperature before cooking.</li>
            <li>Use a meat thermometer to achieve your desired doneness (e.g., 130°F for medium-rare).</li>
            <li>Let the steak rest for 5-10 minutes after cooking for better flavor and tenderness.</li>
        </ul>

        <textarea class="modal-feedback" placeholder="Leave your feedback here..."></textarea>
    </div>
    </div>   

  <!-- Beef Tacos -->
    <div class="food-item">
    <a href="#modal-beef-tacos" class="food-link" onclick="openModal('modal-beef-tacos')">
        <img src="Pic/recipe1.jpg" alt="Beef Tacos">
        <p>Beef Tacos</p>
    </a>
    </div>

    <!-- Beef Tacos Modal -->
    <div id="modal-beef-tacos" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal-beef-tacos')">&times;</span>
        <img src="Pic/recipe1.jpg" alt="Beef Tacos" class="modal-img">
        
        <h2 class="modal-title">Beef Tacos</h2>

        <h3 class="modal-heading">Ingredients</h3>
        <ul class="modal-list">
            <li>500g ground beef</li>
            <li>1 onion, finely chopped</li>
            <li>2 cloves garlic, minced</li>
            <li>1 tablespoon olive oil</li>
            <li>1 packet taco seasoning</li>
            <li>12 taco shells</li>
            <li>Shredded lettuce</li>
            <li>Shredded cheddar cheese</li>
            <li>Chopped tomatoes</li>
            <li>Sour cream</li>
            <li>Chopped cilantro (optional)</li>
        </ul>

        <h3 class="modal-heading">Tips</h3>
        <ul class="modal-list">
            <li>For added flavor, brown the beef with the onion and garlic before adding the seasoning.</li>
            <li>Try using hard or soft taco shells depending on your preference.</li>
            <li>Top with a squeeze of lime for extra zest.</li>
            <li>For extra heat, add some sliced jalapeños or a hot salsa.</li>
        </ul>

        <textarea class="modal-feedback" placeholder="Leave your feedback here..."></textarea>
    </div>
    </div>

  <!-- Meatballs -->
    <div class="food-item">
    <a href="#modal-meatballs" class="food-link" onclick="openModal('modal-meatballs')">
        <img src="Pic/recipe1.jpg" alt="Meatballs">
        <p>Meatballs</p>
    </a>
    </div>

    <!-- Meatballs Modal -->
    <div id="modal-meatballs" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal-meatballs')">&times;</span>
        <img src="Pic/recipe1.jpg" alt="Meatballs" class="modal-img">
        
        <h2 class="modal-title">Meatballs</h2>

        <h3 class="modal-heading">Ingredients</h3>
        <ul class="modal-list">
            <li>500g ground beef</li>
            <li>1/4 cup breadcrumbs</li>
            <li>1/4 cup grated Parmesan cheese</li>
            <li>1 egg</li>
            <li>2 cloves garlic, minced</li>
            <li>1/4 cup chopped parsley</li>
            <li>1 teaspoon salt</li>
            <li>1/2 teaspoon black pepper</li>
            <li>2 tablespoons olive oil (for frying)</li>
            <li>1 cup marinara sauce</li>
        </ul>

        <h3 class="modal-heading">Tips</h3>
        <ul class="modal-list">
            <li>For extra flavor, add a pinch of red pepper flakes to the meatball mix.</li>
            <li>Be careful not to overmix the meat mixture to keep the meatballs tender.</li>
            <li>Serve with spaghetti for a classic pairing.</li>
            <li>If you want to make them ahead, freeze the uncooked meatballs and cook them when needed.</li>
        </ul>

        <textarea class="modal-feedback" placeholder="Leave your feedback here..."></textarea>
    </div>
    </div>

  <!-- Beef Stroganoff -->
    <div class="food-item">
    <a href="#modal-beef-stroganoff" class="food-link" onclick="openModal('modal-beef-stroganoff')">
        <img src="Pic/recipe1.jpg" alt="Beef Stroganoff">
        <p>Beef Stroganoff</p>
    </a>
    </div>

    <!-- Beef Stroganoff Modal -->
    <div id="modal-beef-stroganoff" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal-beef-stroganoff')">&times;</span>
        <img src="Pic/recipe1.jpg" alt="Beef Stroganoff" class="modal-img">
        
        <h2 class="modal-title">Beef Stroganoff</h2>

        <h3 class="modal-heading">Ingredients</h3>
        <ul class="modal-list">
            <li>500g beef sirloin, sliced into thin strips</li>
            <li>1 tablespoon vegetable oil</li>
            <li>1 medium onion, finely chopped</li>
            <li>2 cloves garlic, minced</li>
            <li>1 cup beef broth</li>
            <li>1 cup sour cream</li>
            <li>1 teaspoon Dijon mustard</li>
            <li>1/2 teaspoon paprika</li>
            <li>Salt and pepper to taste</li>
            <li>2 tablespoons butter</li>
            <li>2 tablespoons flour</li>
            <li>Fresh parsley, chopped (for garnish)</li>
            <li>Egg noodles, to serve</li>
        </ul>

        <h3 class="modal-heading">Tips</h3>
        <ul class="modal-list">
            <li>For extra richness, use heavy cream instead of sour cream.</li>
            <li>If you prefer a thicker sauce, add a bit more flour when making the roux.</li>
            <li>Pair it with a light salad for a well-balanced meal.</li>
            <li>If you're using a slow cooker, cook on low for 6 hours for tender beef.</li>
        </ul>

        <textarea class="modal-feedback" placeholder="Leave your feedback here..."></textarea>
    </div>
    </div>
    

  <!-- Beef Stew -->
    <div class="food-item">
    <a href="#modal-beef-stew" class="food-link" onclick="openModal('modal-beef-stew')">
        <img src="Pic/recipe1.jpg" alt="Beef Stew">
        <p>Beef Stew</p>
    </a>
    </div>

    <!-- Beef Stew Modal -->
    <div id="modal-beef-stew" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal-beef-stew')">&times;</span>
        <img src="Pic/recipe1.jpg" alt="Beef Stew" class="modal-img">
        
        <h2 class="modal-title">Beef Stew</h2>

        <h3 class="modal-heading">Ingredients</h3>
        <ul class="modal-list">
            <li>1 kg beef chuck, cut into cubes</li>
            <li>2 tablespoons vegetable oil</li>
            <li>1 medium onion, chopped</li>
            <li>2 carrots, peeled and chopped</li>
            <li>3 cloves garlic, minced</li>
            <li>3 potatoes, peeled and diced</li>
            <li>3 cups beef broth</li>
            <li>1 cup red wine (optional)</li>
            <li>1 teaspoon dried thyme</li>
            <li>2 bay leaves</li>
            <li>Salt and pepper to taste</li>
            <li>Fresh parsley, chopped (for garnish)</li>
        </ul>

        <h3 class="modal-heading">Tips</h3>
        <ul class="modal-list">
            <li>For extra flavor, sear the beef cubes before adding them to the stew.</li>
            <li>If you prefer a thicker stew, mash a portion of the potatoes and stir them back in.</li>
            <li>Let the stew simmer for at least 2 hours for the most tender beef.</li>
            <li>Serve with crusty bread to soak up the flavorful broth.</li>
        </ul>

        <textarea class="modal-feedback" placeholder="Leave your feedback here..."></textarea>
    </div>
    </div>

  <!-- Roast Beef -->
    <div class="food-item">
    <a href="#modal-roast-beef" class="food-link" onclick="openModal('modal-roast-beef')">
        <img src="Pic/recipe1.jpg" alt="Roast Beef">
        <p>Roast Beef</p>
    </a>
    </div>

    <!-- Roast Beef Modal -->
    <div id="modal-roast-beef" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal-roast-beef')">&times;</span>
        <img src="Pic/recipe1.jpg" alt="Roast Beef" class="modal-img">
        
        <h2 class="modal-title">Roast Beef</h2>

        <h3 class="modal-heading">Ingredients</h3>
        <ul class="modal-list">
            <li>1.5 kg beef roast (sirloin or rib-eye)</li>
            <li>3 tablespoons olive oil</li>
            <li>4 cloves garlic, minced</li>
            <li>2 tablespoons rosemary, fresh or dried</li>
            <li>1 tablespoon thyme, fresh or dried</li>
            <li>Salt and freshly ground black pepper to taste</li>
            <li>1 tablespoon Dijon mustard</li>
            <li>1 cup beef broth</li>
            <li>1/2 cup red wine (optional)</li>
        </ul>

        <h3 class="modal-heading">Tips</h3>
        <ul class="modal-list">
            <li>Let the roast sit at room temperature for 30 minutes before roasting for even cooking.</li>
            <li>For crispy edges, sear the roast in a hot pan for 2-3 minutes before placing it in the oven.</li>
            <li>Rest the beef for 10-15 minutes after roasting for juicy results.</li>
            <li>If you prefer rare or medium-rare, use a meat thermometer and cook to 120-130°F (49-54°C).</li>
        </ul>

        <textarea class="modal-feedback" placeholder="Leave your feedback here..."></textarea>
    </div>
    </div>

  <!-- Beef Kebab -->
    <div class="food-item">
    <a href="#modal-beef-kebab" class="food-link" onclick="openModal('modal-beef-kebab')">
        <img src="Pic/recipe1.jpg" alt="Beef Kebab">
        <p>Beef Kebab</p>
    </a>
    </div>

    <!-- Beef Kebab Modal -->
    <div id="modal-beef-kebab" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal-beef-kebab')">&times;</span>
        <img src="Pic/recipe1.jpg" alt="Beef Kebab" class="modal-img">
        
        <h2 class="modal-title">Beef Kebab</h2>

        <h3 class="modal-heading">Ingredients</h3>
        <ul class="modal-list">
            <li>500g ground beef (80% lean)</li>
            <li>1 onion, finely chopped</li>
            <li>2 cloves garlic, minced</li>
            <li>2 tablespoons parsley, finely chopped</li>
            <li>1 teaspoon cumin powder</li>
            <li>1 teaspoon smoked paprika</li>
            <li>1/2 teaspoon ground cinnamon</li>
            <li>1 tablespoon olive oil</li>
            <li>Salt and pepper to taste</li>
            <li>Skewers (wooden or metal)</li>
        </ul>

        <h3 class="modal-heading">Tips</h3>
        <ul class="modal-list">
            <li>Soak wooden skewers in water for 30 minutes before use to prevent burning.</li>
            <li>Mix the meat gently to avoid overworking it, which can result in tough kebabs.</li>
            <li>Grill over medium-high heat to get the perfect char without overcooking the beef.</li>
            <li>Serve with a side of flatbread and a yogurt-based dipping sauce for a complete meal.</li>
        </ul>

        <textarea class="modal-feedback" placeholder="Leave your feedback here..."></textarea>
    </div>
    </div>
</div>