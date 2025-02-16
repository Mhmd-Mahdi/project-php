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

  <!-- Chocolate Cake -->
    <div class="food-item">
    <a href="#modal-chocolate-cake" class="food-link" onclick="openModal('modal-chocolate-cake')">
        <img src="Pic/recipe1.jpg" alt="Chocolate Cake">
        <p>Chocolate Cake</p>
    </a>
    </div>

    <!-- Chocolate Cake Modal -->
    <div id="modal-chocolate-cake" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal-chocolate-cake')">&times;</span>
        <img src="Pic/recipe1.jpg" alt="Chocolate Cake" class="modal-img">
        
        <h2 class="modal-title">Chocolate Cake</h2>

        <h3 class="modal-heading">Ingredients</h3>
        <ul class="modal-list">
            <li>2 cups all-purpose flour</li>
            <li>1 and 3/4 cups granulated sugar</li>
            <li>3/4 cup unsweetened cocoa powder</li>
            <li>2 teaspoons baking powder</li>
            <li>1/2 teaspoon baking soda</li>
            <li>1 teaspoon salt</li>
            <li>1 cup milk</li>
            <li>1/2 cup vegetable oil</li>
            <li>2 large eggs</li>
            <li>2 teaspoons vanilla extract</li>
            <li>1 cup boiling water</li>
        </ul>

        <h3 class="modal-heading">Tips</h3>
        <ul class="modal-list">
            <li>For a richer taste, use dark cocoa powder.</li>
            <li>Let the cake cool completely before frosting to prevent melting.</li>
            <li>Add a pinch of espresso powder to enhance the chocolate flavor.</li>
            <li>Use buttermilk instead of regular milk for a moist cake.</li>
        </ul>

        <textarea class="modal-feedback" placeholder="Leave your feedback here..."></textarea>
    </div>
    </div>

  <!-- Ice Cream -->
    <div class="food-item">
    <a href="#modal-ice-cream" class="food-link" onclick="openModal('modal-ice-cream')">
        <img src="Pic/recipe1.jpg" alt="Ice Cream">
        <p>Ice Cream</p>
    </a>
    </div>

    <!-- Ice Cream Modal -->
    <div id="modal-ice-cream" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal-ice-cream')">&times;</span>
        <img src="Pic/recipe1.jpg" alt="Ice Cream" class="modal-img">
        
        <h2 class="modal-title">Ice Cream</h2>

        <h3 class="modal-heading">Ingredients</h3>
        <ul class="modal-list">
            <li>2 cups heavy cream</li>
            <li>1 cup whole milk</li>
            <li>3/4 cup granulated sugar</li>
            <li>1 tablespoon vanilla extract</li>
            <li>Pinch of salt</li>
        </ul>

        <h3 class="modal-heading">Tips</h3>
        <ul class="modal-list">
            <li>Chill the mixture before churning for a smoother texture.</li>
            <li>Add mix-ins like chocolate chips or fruit at the end of churning.</li>
            <li>Use an airtight container to prevent ice crystals from forming.</li>
            <li>For extra creaminess, substitute some milk with condensed milk.</li>
        </ul>

        <textarea class="modal-feedback" placeholder="Leave your feedback here..."></textarea>
    </div>
    </div>

  <!-- Tiramisu -->
    <div class="food-item">
    <a href="#modal-tiramisu" class="food-link" onclick="openModal('modal-tiramisu')">
        <img src="Pic/recipe1.jpg" alt="Tiramisu">
        <p>Tiramisu</p>
    </a>
    </div>

    <!-- Tiramisu Modal -->
    <div id="modal-tiramisu" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal-tiramisu')">&times;</span>
        <img src="Pic/recipe1.jpg" alt="Tiramisu" class="modal-img">
        
        <h2 class="modal-title">Tiramisu</h2>

        <h3 class="modal-heading">Ingredients</h3>
        <ul class="modal-list">
            <li>6 egg yolks</li>
            <li>3/4 cup granulated sugar</li>
            <li>2/3 cup milk</li>
            <li>1 1/4 cups heavy cream</li>
            <li>8 ounces mascarpone cheese</li>
            <li>1 cup strong brewed coffee, cooled</li>
            <li>2 tablespoons coffee liqueur (optional)</li>
            <li>24 ladyfinger cookies</li>
            <li>Cocoa powder for dusting</li>
        </ul>

        <h3 class="modal-heading">Tips</h3>
        <ul class="modal-list">
            <li>Chill the tiramisu for at least 4 hours for the best texture.</li>
            <li>Dip the ladyfingers quickly in coffee to avoid sogginess.</li>
            <li>Use mascarpone cheese at room temperature for easy mixing.</li>
            <li>Dust cocoa powder just before serving for the freshest look.</li>
        </ul>

        <textarea class="modal-feedback" placeholder="Leave your feedback here..."></textarea>
    </div>
    </div>

  <!-- Cheesecake -->
    <div class="food-item">
    <a href="#modal-cheesecake" class="food-link" onclick="openModal('modal-cheesecake')">
        <img src="Pic/recipe1.jpg" alt="Cheesecake">
        <p>Cheesecake</p>
    </a>
    </div>

    <!-- Cheesecake Modal -->
    <div id="modal-cheesecake" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal-cheesecake')">&times;</span>
        <img src="Pic/recipe1.jpg" alt="Cheesecake" class="modal-img">
        
        <h2 class="modal-title">Cheesecake</h2>

        <h3 class="modal-heading">Ingredients</h3>
        <ul class="modal-list">
            <li>1 1/2 cups graham cracker crumbs</li>
            <li>1/2 cup melted butter</li>
            <li>2 tablespoons sugar</li>
            <li>2 (8-ounce) packages cream cheese, softened</li>
            <li>3/4 cup granulated sugar</li>
            <li>2 eggs</li>
            <li>1 teaspoon vanilla extract</li>
            <li>1/2 cup sour cream</li>
            <li>1/4 teaspoon salt</li>
        </ul>

        <h3 class="modal-heading">Tips</h3>
        <ul class="modal-list">
            <li>Bake in a water bath to prevent cracks.</li>
            <li>Let the cheesecake cool gradually in the oven with the door slightly open.</li>
            <li>Chill for at least 4 hours before serving for the best texture.</li>
            <li>Use full-fat cream cheese for a rich and creamy result.</li>
        </ul>

        <textarea class="modal-feedback" placeholder="Leave your feedback here..."></textarea>
    </div>
    </div>

  <!-- Brownies -->
    <div class="food-item">
    <a href="#modal-brownies" class="food-link" onclick="openModal('modal-brownies')">
        <img src="Pic/recipe1.jpg" alt="Brownies">
        <p>Brownies</p>
    </a>
    </div>

    <!-- Brownies Modal -->
    <div id="modal-brownies" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal-brownies')">&times;</span>
        <img src="Pic/recipe1.jpg" alt="Brownies" class="modal-img">
        
        <h2 class="modal-title">Brownies</h2>

        <h3 class="modal-heading">Ingredients</h3>
        <ul class="modal-list">
            <li>1/2 cup butter, melted</li>
            <li>1 cup granulated sugar</li>
            <li>2 eggs</li>
            <li>1 teaspoon vanilla extract</li>
            <li>1/3 cup unsweetened cocoa powder</li>
            <li>1/2 cup all-purpose flour</li>
            <li>1/4 teaspoon salt</li>
            <li>1/4 teaspoon baking powder</li>
            <li>1/2 cup chocolate chips (optional)</li>
        </ul>

        <h3 class="modal-heading">Tips</h3>
        <ul class="modal-list">
            <li>Use high-quality cocoa powder for a richer taste.</li>
            <li>Do not overmix the batter; this keeps brownies fudgy.</li>
            <li>Bake until the center is just set for gooey brownies.</li>
            <li>Let the brownies cool completely before cutting for cleaner slices.</li>
        </ul>

        <textarea class="modal-feedback" placeholder="Leave your feedback here..."></textarea>
    </div>
    </div>

  <!-- Apple Pie -->
    <div class="food-item">
    <a href="#modal-applepie" class="food-link" onclick="openModal('modal-applepie')">
        <img src="Pic/recipe1.jpg" alt="Apple Pie">
        <p>Apple Pie</p>
    </a>
    </div>

    <!-- Apple Pie Modal -->
    <div id="modal-applepie" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal-applepie')">&times;</span>
        <img src="Pic/recipe1.jpg" alt="Apple Pie" class="modal-img">
        
        <h2 class="modal-title">Apple Pie</h2>

        <h3 class="modal-heading">Ingredients</h3>
        <ul class="modal-list">
            <li>2 1/2 cups all-purpose flour</li>
            <li>1 cup unsalted butter, cold and diced</li>
            <li>6 to 7 tablespoons ice water</li>
            <li>6 apples, peeled, cored, and sliced</li>
            <li>3/4 cup sugar</li>
            <li>1 teaspoon cinnamon</li>
            <li>1/4 teaspoon nutmeg</li>
            <li>1 tablespoon lemon juice</li>
            <li>1 tablespoon cornstarch</li>
            <li>1 egg (for egg wash)</li>
        </ul>

        <h3 class="modal-heading">Tips</h3>
        <ul class="modal-list">
            <li>Use a mix of tart and sweet apples for the best flavor.</li>
            <li>Chill the dough before rolling for a flakier crust.</li>
            <li>Brush the top crust with egg wash for a golden-brown finish.</li>
            <li>Let the pie cool before slicing to allow the filling to set.</li>
        </ul>

        <textarea class="modal-feedback" placeholder="Leave your feedback here..."></textarea>
    </div>
    </div>

 
  <!-- Donuts -->
    <div class="food-item">
    <a href="#modal-donuts" class="food-link" onclick="openModal('modal-donuts')">
        <img src="Pic/recipe1.jpg" alt="Donuts">
        <p>Donuts</p>
    </a>
    </div>

    <!-- Donuts Modal -->
    <div id="modal-donuts" class="modal">
        <div class="modal-content">
        <span class="close" onclick="closeModal('modal-donuts')">&times;</span>
        <img src="Pic/recipe1.jpg" alt="Donuts" class="modal-img">
        
        <h2 class="modal-title">Donuts</h2>

        <h3 class="modal-heading">Ingredients</h3>
        <ul class="modal-list">
            <li>2 1/4 teaspoons active dry yeast</li>
            <li>3/4 cup warm milk</li>
            <li>1/4 cup granulated sugar</li>
            <li>1/4 teaspoon salt</li>
            <li>1/4 cup unsalted butter, melted</li>
            <li>1 egg</li>
            <li>2 1/2 cups all-purpose flour</li>
            <li>Vegetable oil for frying</li>
            <li>1 cup powdered sugar (for glaze)</li>
            <li>2 tablespoons milk (for glaze)</li>
            <li>1/2 teaspoon vanilla extract</li>
        </ul>

        <h3 class="modal-heading">Tips</h3>
        <ul class="modal-list">
            <li>Let the dough rise until it doubles in size for soft, fluffy donuts.</li>
            <li>Use a thermometer to keep the oil at 350°F (175°C) while frying.</li>
            <li>Fry in small batches to maintain consistent oil temperature.</li>
            <li>Glaze the donuts while they are slightly warm for better absorption.</li>
        </ul>

        <textarea class="modal-feedback" placeholder="Leave your feedback here..."></textarea>
    </div>
    </div>


  <!-- Crème Brûlée -->
    <div class="food-item">
    <a href="#modal-creme-brulee" class="food-link" onclick="openModal('modal-creme-brulee')">
        <img src="Pic/recipe1.jpg" alt="Crème Brûlée">
        <p>Crème Brûlée</p>
    </a>
    </div>

    <!-- Crème Brûlée Modal -->
    <div id="modal-creme-brulee" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal-creme-brulee')">&times;</span>
        <img src="Pic/recipe1.jpg" alt="Crème Brûlée" class="modal-img">
        
        <h2 class="modal-title">Crème Brûlée</h2>

        <h3 class="modal-heading">Ingredients</h3>
        <ul class="modal-list">
            <li>2 cups heavy cream</li>
            <li>1 vanilla bean (or 1 tsp vanilla extract)</li>
            <li>4 egg yolks</li>
            <li>1/2 cup granulated sugar</li>
            <li>2 tablespoons brown sugar (for caramelized topping)</li>
        </ul>

        <h3 class="modal-heading">Tips</h3>
        <ul class="modal-list">
            <li>Gently heat the cream with the vanilla to infuse the flavor.</li>
            <li>Temper the egg yolks by adding warm cream slowly to prevent scrambling.</li>
            <li>Bake in a water bath to ensure even cooking.</li>
            <li>Use a kitchen torch to caramelize the sugar for a crispy top.</li>
        </ul>

        <textarea class="modal-feedback" placeholder="Leave your feedback here..."></textarea>
    </div>
    </div>

</div>
</body>
</html>
