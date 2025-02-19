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
$user_input = $_SESSION["username"]; 
$sql = "SELECT user_id FROM user_info WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user_input);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    $stmt->bind_result($user_id);
    $stmt->fetch();
}
if (isset($user_id)) {
    $query = "DELETE FROM user_info WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
        session_unset();
        session_destroy();
        header("Location: signin.php"); 
        exit();
    }
} else {
    echo "<script>alter('No user logged in.')</script>";
}
?>
