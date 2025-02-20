-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2025 at 06:39 AM
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
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `username` varchar(50) NOT NULL,
  `recipe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`username`, `recipe_id`) VALUES
('mhmdrstm', 2002);

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `ing_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`ing_id`, `recipe_id`, `description`) VALUES
(1000, 2000, '1 lb steak (ribeye or sirloin)'),
(1001, 2000, 'Salt and black pepper to taste'),
(1002, 2000, '1 tbsp butter'),
(1003, 2001, '1 lb ground beef'),
(1004, 2001, '1 packet taco seasoning'),
(1005, 2001, '8 taco shells'),
(1006, 2002, '1 lb ground beef'),
(1007, 2002, '1/2 cup breadcrumbs'),
(1008, 2002, '1 egg'),
(1009, 2003, '1 lb beef sirloin, sliced thin'),
(1010, 2003, '1 cup sour cream'),
(1011, 2003, '1/2 cup beef broth'),
(1012, 2004, '1 lb beef chuck, cubed'),
(1013, 2004, '2 cups beef broth'),
(1014, 2004, '3 potatoes, diced'),
(1015, 2005, '3 lb beef roast'),
(1016, 2005, '2 cloves garlic, minced'),
(1017, 2005, '1 tbsp olive oil'),
(1018, 2006, '1 lb beef sirloin, cubed'),
(1019, 2006, '1 red bell pepper, chopped'),
(1020, 2006, '1 onion, chopped'),
(1021, 2007, '2 boneless, skinless chicken breasts'),
(1022, 2007, '1 cup all-purpose flour'),
(1023, 2007, '1 cup breadcrumbs'),
(1024, 2007, '1 teaspoon paprika'),
(1025, 2007, '1 teaspoon garlic powder'),
(1026, 2007, 'Salt and pepper to taste'),
(1027, 2007, '2 eggs'),
(1028, 2007, '1/2 cup milk'),
(1029, 2007, 'Vegetable oil for frying'),
(1030, 2008, '2 chicken breasts, sliced'),
(1031, 2008, '1 bell pepper, sliced'),
(1032, 2008, '1 onion, sliced'),
(1033, 2008, '2 tbsp olive oil'),
(1034, 2008, '1 tsp chili powder'),
(1035, 2008, '1/2 tsp cumin'),
(1036, 2008, '1/2 tsp garlic powder'),
(1037, 2008, 'Salt & pepper to taste'),
(1038, 2008, 'Flour tortillas'),
(1039, 2008, 'Lime wedges'),
(1040, 2008, 'Sour cream (optional)'),
(1041, 2009, '2 chicken breasts (ground or minced)'),
(1042, 2009, '1/2 cup breadcrumbs'),
(1043, 2009, '1 egg'),
(1044, 2009, '1/2 tsp garlic powder'),
(1045, 2009, '1/2 tsp onion powder'),
(1046, 2009, '1/2 tsp paprika'),
(1047, 2009, 'Salt and pepper to taste'),
(1048, 2009, '2 burger buns'),
(1049, 2009, 'Lettuce, tomato, and onion slices'),
(1050, 2009, 'Cheese (optional)'),
(1051, 2009, 'Mayonnaise or burger sauce'),
(1052, 2010, '2 boneless, skinless chicken breasts'),
(1053, 2010, '2 tbsp olive oil'),
(1054, 2010, '1 tsp garlic powder'),
(1055, 2010, '1 tsp onion powder'),
(1056, 2010, '1 tsp smoked paprika'),
(1057, 2010, '1 tsp dried oregano'),
(1058, 2010, 'Salt and pepper to taste'),
(1059, 2010, 'Juice of 1 lemon'),
(1060, 2011, '2 boneless, skinless chicken breasts (cubed)'),
(1061, 2011, '2 tbsp vegetable oil'),
(1062, 2011, '1 onion (chopped)'),
(1063, 2011, '3 cloves garlic (minced)'),
(1064, 2011, '1 tbsp ginger (grated)'),
(1065, 2011, '2 tsp curry powder'),
(1066, 2011, '1 tsp turmeric'),
(1067, 2011, '1 tsp cumin'),
(1068, 2011, '1 tsp garam masala'),
(1069, 2011, '1 can (14 oz) diced tomatoes'),
(1070, 2011, '1 cup coconut milk'),
(1071, 2011, 'Salt and pepper to taste'),
(1072, 2011, 'Fresh cilantro for garnish'),
(1073, 2012, '2 boneless, skinless chicken breasts (sliced)'),
(1074, 2012, '8 oz fettuccine pasta'),
(1075, 2012, '1 cup heavy cream'),
(1076, 2012, '1/2 cup grated Parmesan cheese'),
(1077, 2012, '2 tbsp butter'),
(1078, 2012, '2 cloves garlic (minced)'),
(1079, 2012, 'Salt and pepper to taste'),
(1080, 2012, 'Fresh parsley for garnish'),
(1081, 2012, 'Olive oil for cooking'),
(1082, 2013, '12 chicken wings (drumettes and flats)'),
(1083, 2013, '1/4 cup olive oil'),
(1084, 2013, '2 tbsp soy sauce'),
(1085, 2013, '1 tbsp honey'),
(1086, 2013, '2 cloves garlic (minced)'),
(1087, 2013, '1 tbsp smoked paprika'),
(1088, 2013, '1/2 tsp cayenne pepper (optional)'),
(1089, 2013, 'Salt and pepper to taste'),
(1090, 2013, 'Fresh parsley for garnish (optional)'),
(1091, 2014, '1 whole chicken (about 4-5 lbs)'),
(1092, 2014, '2 tbsp olive oil'),
(1093, 2014, '1 lemon (halved)'),
(1094, 2014, '4 cloves garlic (smashed)'),
(1095, 2014, '1 onion (quartered)'),
(1096, 2014, '1 tbsp fresh rosemary (chopped)'),
(1097, 2014, '1 tbsp fresh thyme (chopped)'),
(1098, 2014, 'Salt and pepper to taste'),
(1099, 2014, '1 cup chicken broth'),
(1100, 2015, '2 salmon fillets'),
(1101, 2015, '2 tablespoons olive oil'),
(1102, 2015, '1 tablespoon lemon juice'),
(1103, 2015, '1 teaspoon garlic powder'),
(1104, 2015, '1 teaspoon dried dill'),
(1105, 2015, 'Salt and pepper to taste'),
(1106, 2015, 'Lemon slices for garnish'),
(1107, 2015, 'Fresh herbs for garnish (optional)'),
(1108, 2016, '4 small fish fillets (such as cod or tilapia)'),
(1109, 2016, '1 tablespoon olive oil'),
(1110, 2016, '1 teaspoon cumin'),
(1111, 2016, '1 teaspoon paprika'),
(1112, 2016, '1/2 teaspoon garlic powder'),
(1113, 2016, '1/4 teaspoon chili powder'),
(1114, 2016, 'Salt and pepper to taste'),
(1115, 2016, '8 small corn tortillas'),
(1116, 2016, 'Shredded cabbage for topping'),
(1117, 2016, 'Fresh cilantro for garnish'),
(1118, 2016, '1 lime (cut into wedges)'),
(1119, 2016, 'Crema or sour cream for drizzling'),
(1120, 2017, '4 large white fish fillets (cod or haddock recommended)'),
(1121, 2017, '1 cup all-purpose flour'),
(1122, 2017, '1 teaspoon baking powder'),
(1123, 2017, '1 teaspoon salt'),
(1124, 2017, '1 teaspoon black pepper'),
(1125, 2017, '1 cup cold beer (or sparkling water)'),
(1126, 2017, 'Vegetable oil for frying'),
(1127, 2017, '4 large potatoes (cut into thick fries)'),
(1128, 2017, 'Salt for seasoning'),
(1129, 2017, 'Lemon wedges (for serving)'),
(1130, 2017, 'Fresh parsley (for garnish)'),
(1131, 2018, '2 cups sushi rice'),
(1132, 2018, '2 1/2 cups water'),
(1133, 2018, '1/3 cup rice vinegar'),
(1134, 2018, '1 tablespoon sugar'),
(1135, 2018, '1/2 teaspoon salt'),
(1136, 2018, '10 sheets nori (seaweed)'),
(1137, 2018, '1/2 pound sushi-grade fish (salmon, tuna, or shrimp)'),
(1138, 2018, '1 cucumber, julienned'),
(1139, 2018, '1 avocado, sliced'),
(1140, 2018, 'Soy sauce (for dipping)'),
(1141, 2018, 'Wasabi (optional)'),
(1142, 2018, 'Pickled ginger (optional)'),
(1143, 2019, '1 lb fresh fish (such as tilapia or sea bass), cut into small cubes'),
(1144, 2019, '1/2 cup freshly squeezed lime juice'),
(1145, 2019, '1/4 cup freshly squeezed lemon juice'),
(1146, 2019, '1/2 red onion, finely chopped'),
(1147, 2019, '1 medium tomato, chopped'),
(1148, 2019, '1 cucumber, peeled and diced'),
(1149, 2019, '1 jalapeño, finely chopped (optional for heat)'),
(1150, 2019, 'Salt and pepper to taste'),
(1151, 2019, 'Fresh cilantro, chopped'),
(1152, 2019, 'Avocado slices (optional)'),
(1153, 2019, 'Tortilla chips or tostadas for serving'),
(1154, 2020, '1 lb white fish (tilapia, cod, or haddock), cut into pieces'),
(1155, 2020, '1 onion, finely chopped'),
(1156, 2020, '2 tomatoes, chopped'),
(1157, 2020, '2 tablespoons curry powder'),
(1158, 2020, '1 teaspoon turmeric powder'),
(1159, 2020, '1 teaspoon ground cumin'),
(1160, 2020, '1 teaspoon ground coriander'),
(1161, 2020, '1 can (14 oz) coconut milk'),
(1162, 2020, '1 cup fish stock or water'),
(1163, 2020, '2 tablespoons vegetable oil'),
(1164, 2020, '2 cloves garlic, minced'),
(1165, 2020, '1-inch piece ginger, minced'),
(1166, 2020, 'Salt and pepper to taste'),
(1167, 2020, 'Fresh cilantro for garnish'),
(1168, 2020, 'Steamed rice for serving'),
(1169, 2021, '1 lb smoked salmon'),
(1170, 2021, '1 tablespoon olive oil'),
(1171, 2021, '1 tablespoon lemon juice'),
(1172, 2021, '1 teaspoon Dijon mustard'),
(1173, 2021, '2 teaspoons capers, chopped'),
(1174, 2021, '1 tablespoon fresh dill, chopped'),
(1175, 2021, '1 tablespoon red onion, finely chopped'),
(1176, 2021, '1 tablespoon fresh parsley, chopped'),
(1177, 2021, '2 slices of toasted bread or bagel'),
(1178, 2021, 'Salt and pepper to taste'),
(1179, 2022, '4 tilapia fillets'),
(1180, 2022, '1 tablespoon olive oil'),
(1181, 2022, '1 teaspoon paprika'),
(1182, 2022, '1 teaspoon garlic powder'),
(1183, 2022, '1 teaspoon lemon juice'),
(1184, 2022, '1/2 teaspoon dried thyme'),
(1185, 2022, 'Salt and pepper to taste'),
(1186, 2022, '1 lemon, sliced'),
(1187, 2022, 'Fresh parsley for garnish'),
(1188, 2023, '2 cups all-purpose flour'),
(1189, 2023, '1 and 3/4 cups granulated sugar'),
(1190, 2023, '3/4 cup unsweetened cocoa powder'),
(1191, 2023, '2 teaspoons baking powder'),
(1192, 2023, '1/2 teaspoon baking soda'),
(1193, 2023, '1 teaspoon salt'),
(1194, 2023, '1 cup milk'),
(1195, 2023, '1/2 cup vegetable oil'),
(1196, 2023, '2 large eggs'),
(1197, 2023, '2 teaspoons vanilla extract'),
(1198, 2023, '1 cup boiling water'),
(1199, 2024, '2 cups heavy cream'),
(1200, 2024, '1 cup whole milk'),
(1201, 2024, '3/4 cup granulated sugar'),
(1202, 2024, '1 tablespoon vanilla extract'),
(1203, 2024, 'Pinch of salt'),
(1204, 2025, '6 egg yolks'),
(1205, 2025, '3/4 cup granulated sugar'),
(1206, 2025, '2/3 cup milk'),
(1207, 2025, '1 1/4 cups heavy cream'),
(1208, 2025, '8 ounces mascarpone cheese'),
(1209, 2025, '1 cup strong brewed coffee, cooled'),
(1210, 2025, '2 tablespoons coffee liqueur (optional)'),
(1211, 2025, '24 ladyfinger cookies'),
(1212, 2025, 'Cocoa powder for dusting'),
(1213, 2026, '1 1/2 cups graham cracker crumbs'),
(1214, 2026, '1/2 cup melted butter'),
(1215, 2026, '2 tablespoons sugar'),
(1216, 2026, '2 (8-ounce) packages cream cheese, softened'),
(1217, 2026, '3/4 cup granulated sugar'),
(1218, 2026, '2 eggs'),
(1219, 2026, '1 teaspoon vanilla extract'),
(1220, 2026, '1/2 cup sour cream'),
(1221, 2026, '1/4 teaspoon salt'),
(1222, 2027, '1/2 cup butter, melted'),
(1223, 2027, '1 cup granulated sugar'),
(1224, 2027, '2 eggs'),
(1225, 2027, '1 teaspoon vanilla extract'),
(1226, 2027, '1/3 cup unsweetened cocoa powder'),
(1227, 2027, '1/2 cup all-purpose flour'),
(1228, 2027, '1/4 teaspoon salt'),
(1229, 2027, '1/4 teaspoon baking powder'),
(1230, 2027, '1/2 cup chocolate chips (optional)'),
(1231, 2028, '2 1/2 cups all-purpose flour'),
(1232, 2028, '1 cup unsalted butter, cold and diced'),
(1233, 2028, '6 to 7 tablespoons ice water'),
(1234, 2028, '6 apples, peeled, cored, and sliced'),
(1235, 2028, '3/4 cup sugar'),
(1236, 2028, '1 teaspoon cinnamon'),
(1237, 2028, '1/4 teaspoon nutmeg'),
(1238, 2028, '1 tablespoon lemon juice'),
(1239, 2028, '1 tablespoon cornstarch'),
(1240, 2028, '1 egg (for egg wash)');

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

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `time_join` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `full_name`, `username`, `user_password`, `email`, `time_join`) VALUES
(4773, 'Mohammad Mahdi', 'mhmd', '$2y$10$sOeJous8Tj5yb3ed9zf7G.In1wp.l0CPu0gPyx3Ec/B236Mt9emyO', 'mhmdmahdi@gmaill.com', '2025-02-20'),
(4774, 'Mohammad Restom', 'mhmdrstm', '$2y$10$IGtY/Df21EnnLxudIMbcke3FqmlJA9EvtdQ5LrS278MptHd6PC3eK', 'mohammadrestom@gmail.com', '2025-02-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`username`,`recipe_id`),
  ADD KEY `recipe_id` (`recipe_id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`ing_id`),
  ADD KEY `recipe_id` (`recipe_id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`recipe_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `ing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1241;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `recipe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2031;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4775;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favourite`
--
ALTER TABLE `favourite`
  ADD CONSTRAINT `favourite_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user_info` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favourite_ibfk_2` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`recipe_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredients_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`recipe_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
