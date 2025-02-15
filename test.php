<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
    <link rel="stylesheet" href="test.css">
</head>
<body>
<div class="login">
    <?php if(isset($_SESSION['login'])): ?>
        <div class="dropdown">
            <button class="dropbtn" onclick="toggleDropdown()">
                <?php echo htmlspecialchars($_SESSION["user_full_name"]); ?>
            </button>
            <div class="dropdown-content" id="dropdownMenu">
                <a href="profile.php">User Info</a>
                <a href="delete_account.php" onclick="return confirm('Are you sure you want to delete your account?');">Delete Account</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    <?php else: ?>
        <a href="signin.php" class="btn sign-in">Sign Up</a>
        <a href="login.php" class="btn log-in">LogIn</a>
    <?php endif; ?>
</div>


</body>
</html>