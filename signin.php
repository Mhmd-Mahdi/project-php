<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "users";
$conn = null;

try {
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
} catch (mysqli_sql_exception) {
    die("Can't Connect!");
}

$message_pass=" ";
$message_uasername=" ";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $first_name = trim($_POST['first_name']);
    $first_name = ucwords($first_name);
    $last_name = trim($_POST['last_name']);
    $last_name = ucfirst($last_name);
    $user_full_name = $first_name . " " . $last_name;
    $email = filter_var(trim($_POST['useremail']), FILTER_SANITIZE_EMAIL);
    $user_input = trim($_POST['username']);
    $password = trim($_POST['userpassword']);
    $message_pass=" ";
    $message_uasername=" ";
    function check_space($str){
        return strpos($str," ") === false;
    }
    function check_substr($str1,$str2){
        return stripos($str1,$str2) === false;
    }
    $len_pass=strlen($password);

    if(!($len_pass >= 8 && check_space(($password)) && check_substr($user_input,$password))){
        $message_pass="Password must be at least 8 characters long, contain no spaces, and must not be part of the username.";
    }
    if (!(strlen($user_input) > 8) && preg_match('/[^a-zA-Z0-9]/', $user_input)) {
        $message_username="Username must be at least 8 characters and contain only letters and numbers.";

    }
    $sql = "SELECT username FROM user_info WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user_input);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<script>alert('Username already taken.');</script>";
        $stmt->close();
        exit;
    }
    $stmt->close();

    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO user_info (full_name,username, user_password, email) VALUES (? ,? , ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "<script>alert('Some thing went fullet');</script>";
    }

    $stmt->bind_param("ssss",$user_full_name, $user_input, $hash_password, $email);

    if ($stmt->execute()) {
        session_start();
        $_SESSION['user'] = $user_input;
        $_SESSION['user_full_name'] = $user_full_name; 
        $_SESSION['login']=true;
        header("Location: index.php");
        exit();
    } else {
        echo "<script>alert('Error: " . addslashes($stmt->error) . "');</script>";
    }

    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin</title>
    <link rel="stylesheet" href="signin.css">
</head>
<body>

    <nav>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input type="text" id="first_name" name="first_name" placeholder="First Name" required title="Please enter your first name">
            <input type="text" name="last_name" id="last_name" placeholder="Last Name" required title="Please enter your last name"><br>
            <label for="email">Email</label><br>
            <input type="email" name="useremail" id="email" placeholder="example@gmail.com" required title="Please enter your email"><br>
            <label for="user_name">Username</label><br>
            <input type="text" name="username" id="user_name" placeholder="Username" required title="Please Enter Username"><br>
            <?php echo "<p>". $message_uasername ."</p>"; ?>
            <label for="password">Password</label><br>
            <input type="password" name="userpassword" id="password" placeholder="Password" required title="Please enter your password"><br>
            <?php echo "<p>". $message_pass ."</p>"; ?>
            <input type="submit" name="submit" value="SIGN UP">
        </form>
    </nav>

    <div class="form-header">
        <h2>🍴 <span class="enter">Join </span> Our <span class="enter">Food</span>Community</h2>
        <h3>Start sharing your favorite recipes today!</h3>
    </div>

    <div class="login-link">
        <p>Already have an account? <a href="login.php">LOGIN here.</a></p>
    </div>

</body>
</html>