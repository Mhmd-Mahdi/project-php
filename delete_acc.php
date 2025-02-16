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

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    $query = "DELETE FROM user_info WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userId);

    if ($stmt->execute()) {
        session_unset();
        session_destroy();
        header("Location: login.php"); 
        exit();
    } else {
        echo "Error deleting account.";
    }
} else {
    echo "No user logged in.";
}
?>
