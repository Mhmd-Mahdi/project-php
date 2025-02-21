<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <link rel="stylesheet" href="user_info.css">
</head>
<body>
    <div class="user-box">
        <a href="recipes.php?all=1">X</a>
        <h2>User Info</h2>
        <p><strong>ID : </strong> <?php echo $_SESSION["user_id"] ?> </p>
        <p><strong>Full Name : </strong> <?php echo htmlspecialchars($_SESSION["full_name"]); ?></p>
        <p><strong>Username : </strong> <?php echo $_SESSION["username"] ?> </p>
        <p><strong>Email : </strong> <?php echo $_SESSION["email"] ?> </p>
        <p><strong>Joined : </strong> <?php echo $_SESSION["time"] ?> </p>
    </div>
</div>
</div>
</body>
</html>