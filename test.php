<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "users";
$conn ="";

try {
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
} catch (mysqli_sql_exception) {
    die("Can't Connect!");
}
$user_input = $_SESSION["user"]; 
$sql = "SELECT user_id FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user_input);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    $stmt->bind_result($user_id);
    $stmt->fetch();
    $_SESSION['user_id'] = $user_id;
}
$stmt->close();
$conn->close();
?>
