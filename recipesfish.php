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
    <div class="category" onclick="filterCategory('chicken')">Chicken</div>
    </a>
    <a href="recipesbeef.php">
    <div class="category" onclick="filterCategory('beef')">Beef</div>
    </a>
    <a href="recipesfish.php">
    <div class="category active" onclick="filterCategory('fish')">Fish</div>
    </a>
    <a href="recipesdessert.php">
    <div class="category" onclick="filterCategory('dessert')">Dessert</div>
    </a>
</div>
</div>


<!--  Food Grid -->
     <div class="food-grid">
  <!-- Grilled Salmon -->
    <div class="food-item">
    <a href="#modal-grilled-salmon" class="food-link" onclick="openModal('modal-grilled-salmon')">
        <img src="Pic/salamon.jpg" alt="Grilled Salmon">
        <p>Grilled Salmon</p>
    </a>
    </div>

    <!-- Grilled Salmon Modal -->
    <div id="modal-grilled-salmon" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal-grilled-salmon')">&times;</span>
        <img src="Pic/salamon.jpg" alt="Grilled Salmon" class="modal-img">
        
        <h2 class="modal-title">Grilled Salmon</h2>

        <h3 class="modal-heading">Ingredients</h3>
        <ul class="modal-list">
            <li>2 salmon fillets</li>
            <li>2 tablespoons olive oil</li>
            <li>1 tablespoon lemon juice</li>
            <li>1 teaspoon garlic powder</li>
            <li>1 teaspoon dried dill</li>
            <li>Salt and pepper to taste</li>
            <li>Lemon slices for garnish</li>
            <li>Fresh herbs for garnish (optional)</li>
        </ul>

        <h3 class="modal-heading">Tips</h3>
        <ul class="modal-list">
            <li>For extra flavor, marinate the salmon in olive oil, lemon, and herbs for 30 minutes before grilling.</li>
            <li>Grill the salmon skin-side down to prevent it from sticking to the grill.</li>
            <li>Use a thermometer to ensure the salmon is cooked to an internal temperature of 145°F (63°C).</li>
            <li>Garnish with fresh herbs and lemon slices for an extra burst of freshness.</li>
        </ul>

        <textarea class="modal-feedback" placeholder="Leave your feedback here..."></textarea>
    </div>
    </div>       

  <!-- Fish Tacos -->
    <div class="food-item">
    <a href="#modal-fish-tacos" class="food-link" onclick="openModal('modal-fish-tacos')">
        <img src="Pic/tacosfish.jpg" alt="Fish Tacos">
        <p>Fish Tacos</p>
    </a>
    </div>

    <!-- Fish Tacos Modal -->
    <div id="modal-fish-tacos" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal-fish-tacos')">&times;</span>
        <img src="Pic/tacosfish.jpg" alt="Fish Tacos" class="modal-img">
        
        <h2 class="modal-title">Fish Tacos</h2>

        <h3 class="modal-heading">Ingredients</h3>
        <ul class="modal-list">
            <li>4 small fish fillets (such as cod or tilapia)</li>
            <li>1 tablespoon olive oil</li>
            <li>1 teaspoon cumin</li>
            <li>1 teaspoon paprika</li>
            <li>1/2 teaspoon garlic powder</li>
            <li>1/4 teaspoon chili powder</li>
            <li>Salt and pepper to taste</li>
            <li>8 small corn tortillas</li>
            <li>Shredded cabbage for topping</li>
            <li>Fresh cilantro for garnish</li>
            <li>1 lime (cut into wedges)</li>
            <li>Crema or sour cream for drizzling</li>
        </ul>

        <h3 class="modal-heading">Tips</h3>
        <ul class="modal-list">
            <li>For a lighter version, you can grill the fish instead of frying it.</li>
            <li>Top the tacos with avocado slices for an extra creamy texture.</li>
            <li>If you prefer a spicy kick, add hot sauce or jalapeños to the toppings.</li>
            <li>For crunch, use shredded cabbage or lettuce as a base topping.</li>
        </ul>

        <textarea class="modal-feedback" placeholder="Leave your feedback here..."></textarea>
    </div>
    </div>

  <!-- Fish & Chips -->
    <div class="food-item">
    <a href="#modal-fish-chips" class="food-link" onclick="openModal('modal-fish-chips')">
        <img src="Pic/chips.jpg" alt="Fish & Chips">
        <p>Fish & Chips</p>
    </a>
    </div>

    <!-- Fish & Chips Modal -->
    <div id="modal-fish-chips" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal-fish-chips')">&times;</span>
        <img src="Pic/chips.jpg" alt="Fish & Chips" class="modal-img">
        
        <h2 class="modal-title">Fish & Chips</h2>

        <h3 class="modal-heading">Ingredients</h3>
        <ul class="modal-list">
            <li>4 large white fish fillets (cod or haddock recommended)</li>
            <li>1 cup all-purpose flour</li>
            <li>1 teaspoon baking powder</li>
            <li>1 teaspoon salt</li>
            <li>1 teaspoon black pepper</li>
            <li>1 cup cold beer (or sparkling water)</li>
            <li>Vegetable oil for frying</li>
            <li>4 large potatoes (cut into thick fries)</li>
            <li>Salt for seasoning</li>
            <li>Lemon wedges (for serving)</li>
            <li>Fresh parsley (for garnish)</li>
        </ul>

        <h3 class="modal-heading">Tips</h3>
        <ul class="modal-list">
            <li>For extra crispy batter, ensure your beer or water is ice-cold.</li>
            <li>Double fry the potatoes for a crispy outer layer and soft inside.</li>
            <li>Serve with tartar sauce or vinegar for extra flavor.</li>
            <li>Make sure the oil is hot enough to prevent soggy fries and fish.</li>
        </ul>

        <textarea class="modal-feedback" placeholder="Leave your feedback here..."></textarea>
    </div>
    </div>


  <!-- Sushi -->
    <div class="food-item">
    <a href="#modal-sushi" class="food-link" onclick="openModal('modal-sushi')">
        <img src="Pic/sushi.jpg" alt="Sushi">
        <p>Sushi</p>
    </a>
    </div>

    <!-- Sushi Modal -->
    <div id="modal-sushi" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal-sushi')">&times;</span>
        <img src="Pic/sushi.jpg" alt="Sushi" class="modal-img">
        
        <h2 class="modal-title">Sushi</h2>

        <h3 class="modal-heading">Ingredients</h3>
        <ul class="modal-list">
            <li>2 cups sushi rice</li>
            <li>2 1/2 cups water</li>
            <li>1/3 cup rice vinegar</li>
            <li>1 tablespoon sugar</li>
            <li>1/2 teaspoon salt</li>
            <li>10 sheets nori (seaweed)</li>
            <li>1/2 pound sushi-grade fish (salmon, tuna, or shrimp)</li>
            <li>1 cucumber, julienned</li>
            <li>1 avocado, sliced</li>
            <li>Soy sauce (for dipping)</li>
            <li>Wasabi (optional)</li>
            <li>Pickled ginger (optional)</li>
        </ul>

        <h3 class="modal-heading">Tips</h3>
        <ul class="modal-list">
            <li>Rinse the sushi rice well to remove excess starch for better texture.</li>
            <li>Use a bamboo mat to roll the sushi evenly and tightly.</li>
            <li>For the freshest sushi, always use high-quality fish.</li>
            <li>Experiment with different fillings like cooked shrimp, crab, or vegetables.</li>
        </ul>

        <textarea class="modal-feedback" placeholder="Leave your feedback here..."></textarea>
    </div>
    </div>


  <!-- Ceviche -->
    <div class="food-item">
    <a href="#modal-ceviche" class="food-link" onclick="openModal('modal-ceviche')">
        <img src="Pic/cev.jpg" alt="Ceviche">
        <p>Ceviche</p>
    </a>
    </div>

    <!-- Ceviche Modal -->
    <div id="modal-ceviche" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal-ceviche')">&times;</span>
        <img src="Pic/cev.jpg" alt="Ceviche" class="modal-img">
        
        <h2 class="modal-title">Ceviche</h2>

        <h3 class="modal-heading">Ingredients</h3>
        <ul class="modal-list">
            <li>1 lb fresh fish (such as tilapia or sea bass), cut into small cubes</li>
            <li>1/2 cup freshly squeezed lime juice</li>
            <li>1/4 cup freshly squeezed lemon juice</li>
            <li>1/2 red onion, finely chopped</li>
            <li>1 medium tomato, chopped</li>
            <li>1 cucumber, peeled and diced</li>
            <li>1 jalapeño, finely chopped (optional for heat)</li>
            <li>Salt and pepper to taste</li>
            <li>Fresh cilantro, chopped</li>
            <li>Avocado slices (optional)</li>
            <li>Tortilla chips or tostadas for serving</li>
        </ul>

        <h3 class="modal-heading">Tips</h3>
        <ul class="modal-list">
            <li>Use fresh, high-quality fish for the best ceviche.</li>
            <li>Let the ceviche sit in the refrigerator for at least 1 hour for flavors to meld.</li>
            <li>For extra flavor, add a splash of orange juice to the marinade.</li>
            <li>Serve with crispy tortilla chips or tostadas for a perfect pairing.</li>
        </ul>

        <textarea class="modal-feedback" placeholder="Leave your feedback here..."></textarea>
    </div>
    </div>



  <!-- Fish Curry -->
    <div class="food-item">
    <a href="#modal-fish-curry" class="food-link" onclick="openModal('modal-fish-curry')">
        <img src="Pic/curry.jpg" alt="Fish Curry">
        <p>Fish Curry</p>
    </a>
    </div>

    <!-- Fish Curry Modal -->
    <div id="modal-fish-curry" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal-fish-curry')">&times;</span>
        <img src="Pic/curry.jpg" alt="Fish Curry" class="modal-img">
        
        <h2 class="modal-title">Fish Curry</h2>

        <h3 class="modal-heading">Ingredients</h3>
        <ul class="modal-list">
            <li>1 lb white fish (tilapia, cod, or haddock), cut into pieces</li>
            <li>1 onion, finely chopped</li>
            <li>2 tomatoes, chopped</li>
            <li>2 tablespoons curry powder</li>
            <li>1 teaspoon turmeric powder</li>
            <li>1 teaspoon ground cumin</li>
            <li>1 teaspoon ground coriander</li>
            <li>1 can (14 oz) coconut milk</li>
            <li>1 cup fish stock or water</li>
            <li>2 tablespoons vegetable oil</li>
            <li>2 cloves garlic, minced</li>
            <li>1-inch piece ginger, minced</li>
            <li>Salt and pepper to taste</li>
            <li>Fresh cilantro for garnish</li>
            <li>Steamed rice for serving</li>
        </ul>

        <h3 class="modal-heading">Tips</h3>
        <ul class="modal-list">
            <li>Adjust the amount of curry powder depending on your spice preference.</li>
            <li>For a richer flavor, use full-fat coconut milk.</li>
            <li>Feel free to add vegetables like bell peppers or spinach to the curry.</li>
            <li>Serve with steamed rice or naan bread for a complete meal.</li>
        </ul>

        <textarea class="modal-feedback" placeholder="Leave your feedback here..."></textarea>
    </div>
    </div>

  <!-- Smoked Salmon -->
    <div class="food-item">
    <a href="#modal-smoked-salmon" class="food-link" onclick="openModal('modal-smoked-salmon')">
        <img src="Pic/smkk.jpg" alt="Smoked Salmon">
        <p>Smoked Salmon</p>
    </a>
    </div>

    <!-- Smoked Salmon Modal -->
    <div id="modal-smoked-salmon" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal-smoked-salmon')">&times;</span>
        <img src="Pic/smkk.jpg" alt="Smoked Salmon" class="modal-img">
        
        <h2 class="modal-title">Smoked Salmon</h2>

        <h3 class="modal-heading">Ingredients</h3>
        <ul class="modal-list">
            <li>1 lb smoked salmon</li>
            <li>1 tablespoon olive oil</li>
            <li>1 tablespoon lemon juice</li>
            <li>1 teaspoon Dijon mustard</li>
            <li>2 teaspoons capers, chopped</li>
            <li>1 tablespoon fresh dill, chopped</li>
            <li>1 tablespoon red onion, finely chopped</li>
            <li>1 tablespoon fresh parsley, chopped</li>
            <li>2 slices of toasted bread or bagel</li>
            <li>Salt and pepper to taste</li>
        </ul>

        <h3 class="modal-heading">Tips</h3>
        <ul class="modal-list">
            <li>For a classic pairing, serve smoked salmon with cream cheese on a bagel.</li>
            <li>Adding fresh dill and capers enhances the flavor of the smoked salmon.</li>
            <li>Serve with a side of mixed greens for a light, refreshing meal.</li>
            <li>Try drizzling some olive oil and lemon juice for added richness and tang.</li>
        </ul>

        <textarea class="modal-feedback" placeholder="Leave your feedback here..."></textarea>
    </div>
    </div>

  <!-- Baked Tilapia -->
    <div class="food-item">
    <a href="#modal-baked-tilapia" class="food-link" onclick="openModal('modal-baked-tilapia')">
        <img src="Pic/bakedd.jpg" alt="Baked Tilapia">
        <p>Baked Tilapia</p>
    </a>
    </div>

    <!-- Baked Tilapia Modal -->
    <div id="modal-baked-tilapia" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal-baked-tilapia')">&times;</span>
        <img src="Pic/bakedd.jpg" alt="Baked Tilapia" class="modal-img">
        
        <h2 class="modal-title">Baked Tilapia</h2>

        <h3 class="modal-heading">Ingredients</h3>
        <ul class="modal-list">
            <li>4 tilapia fillets</li>
            <li>1 tablespoon olive oil</li>
            <li>1 teaspoon paprika</li>
            <li>1 teaspoon garlic powder</li>
            <li>1 teaspoon lemon juice</li>
            <li>1/2 teaspoon dried thyme</li>
            <li>Salt and pepper to taste</li>
            <li>1 lemon, sliced</li>
            <li>Fresh parsley for garnish</li>
        </ul>

        <h3 class="modal-heading">Tips</h3>
        <ul class="modal-list">
            <li>For extra flavor, marinate the tilapia in lemon juice and garlic for 15 minutes before baking.</li>
            <li>Try adding a sprinkle of parmesan cheese for a crispy topping.</li>
            <li>Serve with a side of steamed vegetables or rice for a complete meal.</li>
            <li>Ensure the tilapia is fully cooked by checking it flakes easily with a fork.</li>
        </ul>

        <textarea class="modal-feedback" placeholder="Leave your feedback here..."></textarea>
    </div>
    </div>
</div>