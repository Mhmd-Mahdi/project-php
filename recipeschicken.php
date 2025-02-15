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
            <h1>Food Recipes</h1>
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
            <a href="signin.php" class="btn sign-in">Sign In</a>
            <a href="login.php" class="btn log-in">Login</a>
        </div>   
    <?php } ?>
        </nav>
    </header>
    <main>
        <h1>Welcome to our Recipe Collection</h1>
        <p>Discover delicious recipes that bring flavor and joy to your kitchen</p>
    </main>
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
  <!-- crispy -->
    <div class="food-item">
    <a href="#modal-chicken" class="food-link" onclick="openModal('modal-chicken')">
        <img src="Pic/recipe1.jpg" alt="Crispy Chicken">
        <p>Crispy Chicken</p>
    </a>
    </div>

    <!-- Crispy Chicken Modal -->
    <div id="modal-chicken" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal-chicken')">&times;</span>
        <img src="Pic/recipe1.jpg" alt="Crispy Chicken" class="modal-img">
        
        <h2 class="modal-title">Crispy Chicken</h2>

        <h3 class="modal-heading">Ingredients</h3>
        <ul class="modal-list">
            <li>2 boneless, skinless chicken breasts</li>
            <li>1 cup all-purpose flour</li>
            <li>1 cup breadcrumbs</li>
            <li>1 teaspoon paprika</li>
            <li>1 teaspoon garlic powder</li>
            <li>Salt and pepper to taste</li>
            <li>2 eggs</li>
            <li>1/2 cup milk</li>
            <li>Vegetable oil for frying</li>
        </ul>

        <h3 class="modal-heading">Tips</h3>
        <ul class="modal-list">
            <li>Double coat the chicken for extra crispiness.</li>
            <li>Use a thermometer to keep the oil at 350°F (175°C).</li>
            <li>Let the fried chicken rest on a wire rack instead of paper towels.</li>
            <li>Marinate the chicken in buttermilk for a few hours for extra juiciness.</li>
        </ul>

        <textarea class="modal-feedback" placeholder="Leave your feedback here..."></textarea>
    </div>
    </div>
  <!-- Fajitas -->
       
    <div class="food-item">
    <a href="#modal-fajitas" class="food-link" onclick="openModal('modal-fajitas')">
        <img src="Pic/recipe22.jpg" alt="Fajitas">
        <p>Fajitas</p>
    </a>
    </div>

    <!-- Fajitas Modal -->
    <div id="modal-fajitas" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal-fajitas')">&times;</span>
        <img src="Pic/recipe22.jpg" alt="Fajitas" class="modal-img">
        
        <h2 class="modal-title">Fajitas</h2>

        <h3 class="modal-heading">Ingredients</h3>
        <ul class="modal-list">
            <li>2 chicken breasts, sliced</li>
            <li>1 bell pepper, sliced</li>
            <li>1 onion, sliced</li>
            <li>2 tbsp olive oil</li>
            <li>1 tsp chili powder</li>
            <li>1/2 tsp cumin</li>
            <li>1/2 tsp garlic powder</li>
            <li>Salt & pepper to taste</li>
            <li>Flour tortillas</li>
            <li>Lime wedges</li>
            <li>Sour cream (optional)</li>
        </ul>

        <h3 class="modal-heading">Tips</h3>
        <ul class="modal-list">
            <li>Marinate the chicken for at least 30 minutes for better flavor.</li>
            <li>Use a cast-iron skillet for the best sear.</li>
            <li>Warm the tortillas before serving to keep them soft.</li>
            <li>Add fresh lime juice for an extra kick.</li>
        </ul>

        <textarea class="modal-feedback" placeholder="Leave your feedback here..."></textarea>
        </div>
        </div>


  <!-- Chicken Burger -->
    <div class="food-item">
    <a href="#modal-chicken-burger" class="food-link" onclick="openModal('modal-chicken-burger')">
        <img src="Pic/recipe1.jpg" alt="Chicken Burger">
        <p>Chicken Burger</p>
    </a>
    </div>

    <!-- Chicken Burger Modal -->
    <div id="modal-chicken-burger" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal-chicken-burger')">&times;</span>
        <img src="Pic/recipe1.jpg" alt="Chicken Burger" class="modal-img">
        
        <h2 class="modal-title">Chicken Burger</h2>

        <h3 class="modal-heading">Ingredients</h3>
        <ul class="modal-list">
            <li>2 chicken breasts (ground or minced)</li>
            <li>1/2 cup breadcrumbs</li>
            <li>1 egg</li>
            <li>1/2 tsp garlic powder</li>
            <li>1/2 tsp onion powder</li>
            <li>1/2 tsp paprika</li>
            <li>Salt and pepper to taste</li>
            <li>2 burger buns</li>
            <li>Lettuce, tomato, and onion slices</li>
            <li>Cheese (optional)</li>
            <li>Mayonnaise or burger sauce</li>
        </ul>

        <h3 class="modal-heading">Tips</h3>
        <ul class="modal-list">
            <li>Chill the chicken mixture for 15 minutes before forming patties.</li>
            <li>Grill or pan-fry the patties for 4-5 minutes per side.</li>
            <li>Toast the burger buns for extra crispiness.</li>
            <li>Add your favorite toppings for a custom taste.</li>
        </ul>

        <textarea class="modal-feedback" placeholder="Leave your feedback here..."></textarea>
    </div>
    </div>




  <!-- Grilled Chicken -->
    <div class="food-item">
    <a href="#modal-grilled-chicken" class="food-link" onclick="openModal('modal-grilled-chicken')">
        <img src="Pic/recipe1.jpg" alt="Grilled Chicken">
        <p>Grilled Chicken</p>
    </a>
    </div>

    <!-- Grilled Chicken Modal -->
    <div id="modal-grilled-chicken" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal-grilled-chicken')">&times;</span>
        <img src="Pic/recipe1.jpg" alt="Grilled Chicken" class="modal-img">
        
        <h2 class="modal-title">Grilled Chicken</h2>

        <h3 class="modal-heading">Ingredients</h3>
        <ul class="modal-list">
            <li>2 boneless, skinless chicken breasts</li>
            <li>2 tbsp olive oil</li>
            <li>1 tsp garlic powder</li>
            <li>1 tsp onion powder</li>
            <li>1 tsp smoked paprika</li>
            <li>1 tsp dried oregano</li>
            <li>Salt and pepper to taste</li>
            <li>Juice of 1 lemon</li>
        </ul>

        <h3 class="modal-heading">Tips</h3>
        <ul class="modal-list">
            <li>Marinate the chicken for at least 30 minutes for better flavor.</li>
            <li>Grill over medium-high heat for 5-7 minutes per side.</li>
            <li>Let the chicken rest for a few minutes before slicing.</li>
            <li>Baste with extra marinade while grilling for juicier chicken.</li>
        </ul>

        <textarea class="modal-feedback" placeholder="Leave your feedback here..."></textarea>
    </div>
    </div>

        
        

  <!-- Chicken Curry -->
    <div class="food-item">
    <a href="#modal-chicken-curry" class="food-link" onclick="openModal('modal-chicken-curry')">
        <img src="Pic/recipe1.jpg" alt="Chicken Curry">
        <p>Chicken Curry</p>
    </a>
    </div>

    <!-- Chicken Curry Modal -->
    <div id="modal-chicken-curry" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal-chicken-curry')">&times;</span>
        <img src="Pic/recipe1.jpg" alt="Chicken Curry" class="modal-img">
        
        <h2 class="modal-title">Chicken Curry</h2>

        <h3 class="modal-heading">Ingredients</h3>
        <ul class="modal-list">
            <li>2 boneless, skinless chicken breasts (cubed)</li>
            <li>2 tbsp vegetable oil</li>
            <li>1 onion (chopped)</li>
            <li>3 cloves garlic (minced)</li>
            <li>1 tbsp ginger (grated)</li>
            <li>2 tsp curry powder</li>
            <li>1 tsp turmeric</li>
            <li>1 tsp cumin</li>
            <li>1 tsp garam masala</li>
            <li>1 can (14 oz) diced tomatoes</li>
            <li>1 cup coconut milk</li>
            <li>Salt and pepper to taste</li>
            <li>Fresh cilantro for garnish</li>
        </ul>

        <h3 class="modal-heading">Tips</h3>
        <ul class="modal-list">
            <li>Sauté onions until golden brown for deeper flavor.</li>
            <li>Toast the spices in oil for a richer taste.</li>
            <li>Simmer for at least 20 minutes to let the flavors blend.</li>
            <li>Serve with basmati rice or naan for a complete meal.</li>
        </ul>

        <textarea class="modal-feedback" placeholder="Leave your feedback here..."></textarea>
    </div>
    </div>


        
  <!-- Chicken Alfredo -->
    <div class="food-item">
    <a href="#modal-chicken-alfredo" class="food-link" onclick="openModal('modal-chicken-alfredo')">
        <img src="Pic/recipe1.jpg" alt="Chicken Alfredo">
        <p>Chicken Alfredo</p>
    </a>
    </div>

    <!-- Chicken Alfredo Modal -->
    <div id="modal-chicken-alfredo" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal-chicken-alfredo')">&times;</span>
        <img src="Pic/recipe1.jpg" alt="Chicken Alfredo" class="modal-img">
        
        <h2 class="modal-title">Chicken Alfredo</h2>

        <h3 class="modal-heading">Ingredients</h3>
        <ul class="modal-list">
            <li>2 boneless, skinless chicken breasts (sliced)</li>
            <li>8 oz fettuccine pasta</li>
            <li>1 cup heavy cream</li>
            <li>1/2 cup grated Parmesan cheese</li>
            <li>2 tbsp butter</li>
            <li>2 cloves garlic (minced)</li>
            <li>Salt and pepper to taste</li>
            <li>Fresh parsley for garnish</li>
            <li>Olive oil for cooking</li>
        </ul>

        <h3 class="modal-heading">Tips</h3>
        <ul class="modal-list">
            <li>Cook the pasta al dente for the best texture.</li>
            <li>For a richer sauce, use half-and-half instead of heavy cream.</li>
            <li>Don’t let the sauce boil, as it can separate.</li>
            <li>Add cooked spinach or mushrooms for extra flavor and nutrition.</li>
        </ul>

        <textarea class="modal-feedback" placeholder="Leave your feedback here..."></textarea>
    </div>
    </div>


  <!-- Chicken Wings -->
    <div class="food-item">
    <a href="#modal-chicken-wings" class="food-link" onclick="openModal('modal-chicken-wings')">
        <img src="Pic/recipe1.jpg" alt="Chicken Wings">
        <p>Chicken Wings</p>
    </a>
    </div>

    <!-- Chicken Wings Modal -->
    <div id="modal-chicken-wings" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal-chicken-wings')">&times;</span>
        <img src="Pic/recipe1.jpg" alt="Chicken Wings" class="modal-img">
        
        <h2 class="modal-title">Chicken Wings</h2>

        <h3 class="modal-heading">Ingredients</h3>
        <ul class="modal-list">
            <li>12 chicken wings (drumettes and flats)</li>
            <li>1/4 cup olive oil</li>
            <li>2 tbsp soy sauce</li>
            <li>1 tbsp honey</li>
            <li>2 cloves garlic (minced)</li>
            <li>1 tbsp smoked paprika</li>
            <li>1/2 tsp cayenne pepper (optional)</li>
            <li>Salt and pepper to taste</li>
            <li>Fresh parsley for garnish (optional)</li>
        </ul>

        <h3 class="modal-heading">Tips</h3>
        <ul class="modal-list">
            <li>For extra crispy wings, bake at a higher temperature and flip halfway through.</li>
            <li>Marinate the wings for at least 30 minutes to let the flavors soak in.</li>
            <li>Try adding buffalo sauce or BBQ sauce after cooking for extra flavor.</li>
            <li>Use a cooling rack to prevent the wings from getting soggy as they bake.</li>
        </ul>

        <textarea class="modal-feedback" placeholder="Leave your feedback here..."></textarea>
    </div>
    </div>

  <!-- Roast Chicken -->
    <div class="food-item">
    <a href="#modal-roast-chicken" class="food-link" onclick="openModal('modal-roast-chicken')">
        <img src="Pic/recipe1.jpg" alt="Roast Chicken">
        <p>Roast Chicken</p>
    </a>
    </div>

    <!-- Roast Chicken Modal -->
    <div id="modal-roast-chicken" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal-roast-chicken')">&times;</span>
        <img src="Pic/recipe1.jpg" alt="Roast Chicken" class="modal-img">
        
        <h2 class="modal-title">Roast Chicken</h2>

        <h3 class="modal-heading">Ingredients</h3>
        <ul class="modal-list">
            <li>1 whole chicken (about 4-5 lbs)</li>
            <li>2 tbsp olive oil</li>
            <li>1 lemon (halved)</li>
            <li>4 cloves garlic (smashed)</li>
            <li>1 onion (quartered)</li>
            <li>1 tbsp fresh rosemary (chopped)</li>
            <li>1 tbsp fresh thyme (chopped)</li>
            <li>Salt and pepper to taste</li>
            <li>1 cup chicken broth</li>
        </ul>

        <h3 class="modal-heading">Tips</h3>
        <ul class="modal-list">
            <li>Let the chicken rest for 15-20 minutes after roasting to ensure juicy meat.</li>
            <li>Roast at 450°F for a crispy skin, then reduce the temperature to 350°F.</li>
            <li>Add vegetables like carrots and potatoes to the roasting pan for a complete meal.</li>
            <li>For extra flavor, rub the chicken with butter and seasonings before roasting.</li>
        </ul>

        <textarea class="modal-feedback" placeholder="Leave your feedback here..."></textarea>
    </div>
    </div>
</div>