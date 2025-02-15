<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start the session
session_start();

// Database connection details
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "users"; 
$conn = "";

try {
    // Establish a connection to the database
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
    if (!$conn) {
        throw new Exception("Connection failed: " . mysqli_connect_error());
    }
} catch (Exception $e) {
    die("Can't Connect: " . $e->getMessage());
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
            <input type="password" name="login_password" placeholder="PASSWORD" required><br>
            <input type="submit" name="login_submit" value="Login">
        </form>
    </div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["login_username"]) && !empty($_POST["login_password"])) {
        $username = $_POST["login_username"];
        $user_password = $_POST["login_password"];

        // Query to fetch user details
        $query = "SELECT username, full_name, user_password FROM user_info WHERE username = ?";
        
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                // Bind the result to variables
                $stmt->bind_result($db_username, $user_full_name, $hashed_password);
                $stmt->fetch();

                // Verify the password
                if (password_verify($user_password, $hashed_password)) {
                    // Store user details in the session
                    $_SESSION["user_full_name"] = $user_full_name;
                    $_SESSION["login"] = true;

                    // Redirect to the main page
                    header("location: index.php");
                    exit();
                } else {
                    echo "<script>alert('Incorrect password. Please try again.');</script>";
                }
            } else {
                echo "<script>alert('Username not found. Please register.');</script>";
            }
            $stmt->close();
        } else {
            echo "<script>alert('Error preparing statement.');</script>";
        }
    } else {
        echo "<script>alert('Please fill in the username and password.');</script>";
    }
}
?>