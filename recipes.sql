-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2025 at 06:30 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `recipe_id` int(11) NOT NULL,
  `recipe_name` varchar(50) NOT NULL,
  `tips` varchar(500) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `food_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`recipe_id`, `recipe_name`, `tips`, `image_path`, `food_type`) VALUES
(2000, 'Steak', 'Rest the steak for a few minutes before cooking for a more even cook. For perfect sear, make sure the steak is at room temperature before cooking. Use a meat thermometer to achieve your desired doneness (e.g., 130°F for medium-rare). Let the steak rest for 5-10 minutes after cooking for better flavor and tenderness.', 'Pic/steak.jpeg', 'Beef'),
(2001, 'Beef Tacos', 'For added flavor, brown the beef with the onion and garlic before adding the seasoning. Try using hard or soft taco shells depending on your preference. Top with a squeeze of lime for extra zest. For extra heat, add some sliced jalapeños or a hot salsa.', 'Pic/tacozzzz.webp', 'Beef'),
(2002, 'Meatballs', 'For extra flavor, add a pinch of red pepper flakes to the meatball mix. Be careful not to overmix the meat mixture to keep the meatballs tender. Serve with spaghetti for a classic pairing. If you want to make them ahead, freeze the uncooked meatballs and cook them when needed.', 'Pic/meatballs.jpg', 'Beef'),
(2003, 'Beef Stroganoff', 'For extra richness, use heavy cream instead of sour cream. If you prefer a thicker sauce, add a bit more flour when making the roux. Pair it with a light salad for a well-balanced meal. If you are using a slow cooker, cook on low for 6 hours for tender beef.', 'Pic/whatizziz.jpg', 'Beef'),
(2004, 'Beef Stew', 'For extra flavor, sear the beef cubes before adding them to the stew. If you prefer a thicker stew, mash a portion of the potatoes and stir them back in. Let the stew simmer for at least 2 hours for the most tender beef. Serve with crusty bread to soak up the flavorful broth.', 'Pic/stew.jpg', 'Beef'),
(2005, 'Roast Beef', 'Let the roast sit at room temperature for 30 minutes before roasting for even cooking. For crispy edges, sear the roast in a hot pan for 2-3 minutes before placing it in the oven. Rest the beef for 10-15 minutes after roasting for juicy results. If you prefer rare or medium-rare, use a meat thermometer and cook to 120-130°F (49-54°C).', 'Pic/roastbeef.jpg', 'Beef'),
(2006, 'Beef Kebab', 'Soak wooden skewers in water for 30 minutes before use to prevent burning. Mix the meat gently to avoid overworking it, which can result in tough kebabs. Grill over medium-high heat to get the perfect char without overcooking the beef. Serve with a side of flatbread and a yogurt-based dipping sauce for a complete meal.', 'Pic/kabab.jpg', 'Beef'),
(2007, 'Crispy Chicken', 'Double coat the chicken for extra crispiness. Use a thermometer to keep the oil at 350°F (175°C). Let the fried chicken rest on a wire rack instead of paper towels. Marinate the chicken in buttermilk for a few hours for extra juiciness.', 'Pic/crispy1.jpg', 'Chicken'),
(2008, 'Fajitas', 'Marinate the chicken for at least 30 minutes for better flavor. Use a cast-iron skillet for the best sear. Warm the tortillas before serving to keep them soft. Add fresh lime juice for an extra kick.', 'Pic/fajitas1.webp', 'Chicken'),
(2009, 'Chicken Burger', 'Chill the chicken mixture for 15 minutes before forming patties. Grill or pan-fry the patties for 4-5 minutes per side. Toast the burger buns for extra crispiness. Add your favorite toppings for a custom taste.', 'Pic/OIP.jpeg', 'Chicken'),
(2010, 'Grilled Chicken', 'Marinate the chicken for at least 30 minutes for better flavor. Grill over medium-high heat for 5-7 minutes per side. Let the chicken rest for a few minutes before slicing. Baste with extra marinade while grilling for juicier chicken.', 'Pic/grl1.jpg', 'Chicken'),
(2011, 'Chicken Curry', 'Sauté onions until golden brown for deeper flavor. Toast the spices in oil for a richer taste. Simmer for at least 20 minutes to let the flavors blend. Serve with basmati rice or naan for a complete meal.', 'Pic/bhuna.jpg', 'Chicken'),
(2012, 'Chicken Alfredo', 'Cook the pasta al dente for the best texture. For a richer sauce, use half-and-half instead of heavy cream. Don’t let the sauce boil, as it can separate. Add cooked spinach or mushrooms for extra flavor and nutrition.', 'Pic/alfredooooo.jpg', 'Chicken'),
(2013, 'Chicken Wings', 'For extra crispy wings, bake at a higher temperature and flip halfway through. Marinate the wings for at least 30 minutes to let the flavors soak in. Try adding buffalo sauce or BBQ sauce after cooking for extra flavor. Use a cooling rack to prevent the wings from getting soggy as they bake.', 'Pic/wings.jpeg', 'Chicken'),
(2014, 'Roast Chicken', 'Let the chicken rest for 15-20 minutes after roasting to ensure juicy meat. Roast at 450°F for a crispy skin, then reduce the temperature to 350°F. Add vegetables like carrots and potatoes to the roasting pan for a complete meal. For extra flavor, rub the chicken with butter and seasonings before roasting.', 'Pic/roast.jpg', 'Chicken'),
(2015, 'Grilled Salmon', 'For extra flavor, marinate the salmon in olive oil, lemon, and herbs for 30 minutes before grilling. Grill the salmon skin-side down to prevent it from sticking to the grill. Use a thermometer to ensure the salmon is cooked to an internal temperature of 145°F (63°C). Garnish with fresh herbs and lemon slices for an extra burst of freshness.', 'Pic/salamon.jpg', 'Fish'),
(2016, 'Fish Tacos', 'For a lighter version, you can grill the fish instead of frying it. Top the tacos with avocado slices for an extra creamy texture. If you prefer a spicy kick, add hot sauce or jalapeños to the toppings. For crunch, use shredded cabbage or lettuce as a base topping.', 'Pic/tacosfish.jpg', 'Fish'),
(2017, 'Fish & Chips', 'For extra crispy batter, ensure your beer or water is ice-cold. Double fry the potatoes for a crispy outer layer and soft inside. Serve with tartar sauce or vinegar for extra flavor. Make sure the oil is hot enough to prevent soggy fries and fish.', 'Pic/chips.jpg', 'Fish'),
(2018, 'Sushi', 'Rinse the sushi rice well to remove excess starch for better texture. Use a bamboo mat to roll the sushi evenly and tightly. For the freshest sushi, always use high-quality fish. Experiment with different fillings like cooked shrimp, crab, or vegetables.', 'Pic/sushi.jpg', 'Fish'),
(2019, 'Ceviche', 'Use fresh, high-quality fish for the best ceviche. Let the ceviche sit in the refrigerator for at least 1 hour for flavors to meld. For extra flavor, add a splash of orange juice to the marinade. Serve with crispy tortilla chips or tostadas for a perfect pairing.', 'Pic/cev.jpg', 'Fish'),
(2020, 'Fish Curry', 'Adjust the amount of curry powder depending on your spice preference. For a richer flavor, use full-fat coconut milk. Feel free to add vegetables like bell peppers or spinach to the curry. Serve with steamed rice or naan bread for a complete meal.', 'Pic/curry.jpg', 'Fish'),
(2021, 'Smoked Salmon', 'For a classic pairing, serve smoked salmon with cream cheese on a bagel. Adding fresh dill and capers enhances the flavor of the smoked salmon. Serve with a side of mixed greens for a light, refreshing meal. Try drizzling some olive oil and lemon juice for added richness and tang.', 'Pic/smkk.jpg', 'Fish'),
(2022, 'Baked Tilapia', 'For extra flavor, marinate the tilapia in lemon juice and garlic for 15 minutes before baking. Try adding a sprinkle of parmesan cheese for a crispy topping. Serve with a side of steamed vegetables or rice for a complete meal. Ensure the tilapia is fully cooked by checking it flakes easily with a fork.', 'Pic/bakedd.jpg', 'Fish'),
(2023, 'Chocolate Cake', 'For a richer taste, use dark cocoa powder. Let the cake cool completely before frosting to prevent melting. Add a pinch of espresso powder to enhance the chocolate flavor. Use buttermilk instead of regular milk for a moist cake.', 'Pic/chockk.jpg', 'dessert'),
(2024, 'Ice Cream', 'Chill the mixture before churning for a smoother texture. Add mix-ins like chocolate chips or fruit at the end of churning. Use an airtight container to prevent ice crystals from forming. For extra creaminess, substitute some milk with condensed milk.', 'Pic/ice.jpeg', 'dessert'),
(2025, 'Tiramisu', 'Chill the tiramisu for at least 4 hours for the best texture. Dip the ladyfingers quickly in coffee to avoid sogginess. Use mascarpone cheese at room temperature for easy mixing. Dust cocoa powder just before serving for the freshest look.', 'Pic/tira.jpg', 'dessert'),
(2026, 'Cheesecake', 'Bake in a water bath to prevent cracks. Let the cheesecake cool gradually in the oven with the door slightly open. Chill for at least 4 hours before serving for the best texture. Use full-fat cream cheese for a rich and creamy result.', 'Pic/cakee.jpg', 'dessert'),
(2027, 'Brownies', 'Use high-quality cocoa powder for a richer taste. Do not overmix the batter; this keeps brownies fudgy. Bake until the center is just set for gooey brownies. Let the brownies cool completely before cutting for cleaner slices.', 'Pic/brow.jpg', 'dessert'),
(2028, 'Apple Pie', 'Use a mix of tart and sweet apples for the best flavor. Chill the dough before rolling for a flakier crust. Brush the top crust with egg wash for a golden-brown finish. Let the pie cool before slicing to allow the filling to set.', 'Pic/applee.jpg', 'dessert'),
(2029, 'Donuts', 'Let the dough rise until it doubles in size for soft, fluffy donuts. Use a thermometer to keep the oil at 350°F (175°C) while frying. Fry in small batches to maintain consistent oil temperature. Glaze the donuts while they are slightly warm for better absorption.', 'Pic/dnt.jpg', 'Chicken'),
(2030, 'Crème Brûlée', 'Gently heat the cream with the vanilla to infuse the flavor. Temper the egg yolks by adding warm cream slowly to prevent scrambling. Bake in a water bath to ensure even cooking. Use a kitchen torch to caramelize the sugar for a crispy top.', 'Pic/brule.jpg', 'Chicken');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`recipe_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `recipe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2031;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
