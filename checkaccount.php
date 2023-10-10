<?php
require_once('dbconfig.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accountNumber = $_POST["account_number"];
    $reenterAccountNumber = $_POST["reenter_account_number"];

    if ($accountNumber !== $reenterAccountNumber) {
        echo '<script>alert("Account numbers do not match."); window.location.href = "index.php";</script>';
        exit;
    }
    $sql = "SELECT * FROM user WHERE accountNumber = '$accountNumber'";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
        echo '<script>alert("Account number does not exist."); window.location.href = "index.php";</script>';
        exit;
    }
    session_start();
    $_SESSION['user'] = $accountNumber;
    header("Location: recharge.php");
    exit;
}
?>

