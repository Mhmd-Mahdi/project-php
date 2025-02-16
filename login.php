<?php


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

$message_username =" ";
$message_password =" ";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message_username =" ";
    $message_password =" ";
    if (!empty($_POST["login_username"]) && !empty($_POST["login_password"])) {
        $username = $_POST["login_username"];
        $user_password = $_POST["login_password"];

        // Query to fetch user details
        $query = "SELECT user_id,username, full_name, user_password FROM user_info WHERE username = ?";
        
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                // Bind the result to variables
                $stmt->bind_result($user_id,$db_username, $user_full_name, $hashed_password);
                $stmt->fetch();
                // Verify the password
                if (password_verify($user_password, $hashed_password)) {
                    // Store user details in the session
                    $_SESSION['user_full_name'] = $user_full_name;
                    $_SESSION['user_id']=$user_id;
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
                    $_SESSION['login'] = true;

                    // Redirect to the main page
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
</body>
</html>


<?php

?>