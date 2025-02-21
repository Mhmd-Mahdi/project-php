<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "users"; 
$conn = "";

try {
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
} catch (mysqli_sql_exception) {
    echo "<div class='error-message'>Can't Connect!</div>";
}
if (isset($_SESSION['message'])) {
    echo "<script>alert('" . $_SESSION['message'] . "');</script>";
    unset($_SESSION['message']);
}
$message_username =" ";
$message_password =" ";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message_username =" ";
    $message_password =" ";
    if (!empty($_POST["login_username"]) && !empty($_POST["login_password"])) {
        $username = $_POST["login_username"];
        $user_password = $_POST["login_password"];
        $query = "SELECT user_id,username, full_name, user_password FROM user_info WHERE username = ?";
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($user_id,$db_username, $user_full_name, $hashed_password);
                $stmt->fetch();
                // Verify the password
                if (password_verify($user_password, $hashed_password)) {
                    $query = "SELECT user_id FROM user_info WHERE username = ?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("s", $username);
                    $stmt->execute();
                    $stmt->store_result();

                    if ($stmt->num_rows > 0) {
                        $stmt->bind_result($user_id);
                        $stmt->fetch();
                        $_SESSION['user_id'] = $user_id;
                    }
                    $_SESSION['full_name'] = $user_full_name;
                    $_SESSION['login'] = true;
                    $_SESSION['username'] = $db_username;
                    header("location: index.php");
                    exit();
                } else {
                   $message_password="! Incorrect password. Please try again.";
                }
            } else {
               $message_username = "! Username not found. Please register .";
            }   
            $stmt->close();
        } else {
            echo "<script>alert('Error preparing statement.');</script>";
        }
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="log-in" align="center">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="text" name="login_username" placeholder="USERNAME" required><br>
            <span class="message"><?php echo $message_username ; ?></span>
            <input type="password" name="login_password" placeholder="PASSWORD" required><br>
            <span class="message"><?php echo $message_password ; ?></span>
            <input type="submit" name="login_submit" value="Login">
        </form>
    </div>
    <div class="sign-up-link">
        <p class="first">Don't have an account</p>
        <a href="signin.php">SIGN UP</a>
        <p class="second">Here</p>
    </div>
</body>
</html>