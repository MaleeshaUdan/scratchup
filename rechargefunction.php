<?php
session_start();

require_once('dbconfig.php');
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$smtp_host = "server199.web-hosting.com";
$smtp_port = 465;
$smtp_username = "bank@vannivogue.com";
$smtp_password = "unipassword@1234ABC";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pin = $_POST["pin"];
    if (!preg_match("/^\d+$/", $pin)) {
        echo '<script>alert("Please enter only digits for PIN."); window.location.href = "recharge.php";</script>';
        exit;
    }
    $userAccountNumber = $_SESSION['user'];
    $checkCardQuery = "SELECT * FROM newlycreatedcards WHERE cardnumber = '$pin'";
    $result = $conn->query($checkCardQuery);
    if ($result->num_rows == 0) {
        echo '<script>alert("Invalid Card Number."); window.location.href = "recharge.php";</script>';
        exit;
    }
    $checkUsedQuery = "SELECT * FROM newlycreatedcards WHERE cardnumber = '$pin' AND usedby IS NOT NULL";
    $result = $conn->query($checkUsedQuery);
    if ($result->num_rows > 0) {
        echo '<script>alert("This scratch card is already used."); window.location.href = "recharge.php";</script>';
        exit;
    }
    $getValueQuery = "SELECT value FROM newlycreatedcards WHERE cardnumber = '$pin'";
    $result = $conn->query($getValueQuery);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $cardValue = $row['value'];
    } else {
        echo '<script>alert("Error retrieving scratch card value."); window.location.href = "recharge.php";</script>';
        exit;
    }
    $updateUsedQuery = "UPDATE newlycreatedcards SET usedby = '$userAccountNumber' WHERE cardnumber = '$pin'";
    $conn->query($updateUsedQuery);
    $getUserBalanceQuery = "SELECT balance FROM user WHERE accountNumber = '$userAccountNumber'";
    $result = $conn->query($getUserBalanceQuery);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userBalance = $row['balance'];
    } else {
        echo '<script>alert("Error retrieving user balance."); window.location.href = "recharge.php";</script>';
        exit;
    }
    $newBalance = $userBalance + $cardValue;
    $updateUserBalanceQuery = "UPDATE user SET balance = $newBalance WHERE accountNumber = '$userAccountNumber'";
    $conn->query($updateUserBalanceQuery);

    $useremailQuery = "SELECT email FROM user WHERE accountNumber = '$userAccountNumber'";
    $getValueQuery = "SELECT value FROM newlycreatedcards WHERE cardnumber = '$pin'";
    $result = $conn->query($getValueQuery);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $getcardvalue = $row['value'];
    } else {
        echo '<script>alert("Error retrieving scratch card value."); window.location.href = "recharge.php";</script>';
        exit;
    }
    $getuseremail= $conn->query($useremailQuery);
    $userData = $getuseremail->fetch_assoc();
    $userEmail = $userData['email'];
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = $smtp_host;
    $mail->Port = $smtp_port;
    $mail->SMTPAuth = true;
    $mail->Username = $smtp_username;
    $mail->Password = $smtp_password;
    $mail->SMTPSecure = 'ssl';

    $mail->setFrom($smtp_username, 'Account Top Up');
    $mail->addAddress($userEmail);

    $mail->Subject = 'You Have Succesfully Recharge your bank account';
    $mail->isHTML(true);
    $mail->Body = '<html>
    <head>
        <title></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <style>
            /* Define your styles here */
            body {
                background-color: #f7f7f7;
                color: #333333;
                font-family: Arial, sans-serif;
            }
            
            .container {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                background-color: #ffffff;
                border-radius: 5px;
                box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
            }
            
            h1 {
                color: #5555ff;
            }
            
            p {
                margin-bottom: 20px;
            }
            
            .button {
                display: inline-block;
                padding: 15px 30px;
                background-color: #5555ff;
                color: #ffffff;
                text-decoration: none;
                border-radius: 5px;
                font-size: 18px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Deposit Successful</h1>
            <p>Dear Customer,</p>
            <p>You have successfully deposited LKR'.$getcardvalue.' to your bank account '.$userAccountNumber.'.</p>
            <p>Thank you for choosing our services.</p>
            <p>Best regards,<br>The Bank Team</p>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>';
/*$mail->SMTPDebug = SMTP::DEBUG_SERVER; // Set to `SMTP::DEBUG_OFF` for production
$mail->Debugoutput = function ($str, $level) {
    echo "debug level $level; message: $str";
};*/

    $mail->send();
    session_unset();
    session_destroy();
    echo '<script>alert("Recharge successful."); window.location.href = "index.php";</script>';
    exit;
}
$conn->close();
?>
