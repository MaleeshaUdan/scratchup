<?php

$servername = 'hackintra.mysql.database.azure.com';
$username = 'roothackintra';
$password = 'unipassword@1234ABC';
$database = 'scratch';
$port = 3306;
$ca_cert_path = "C:/xampp/htdocs/DigiCertGlobalRootG2.crt.pem";

$conn = mysqli_init();
mysqli_ssl_set($conn, NULL, NULL, $ca_cert_path, NULL, NULL);

// Enforce TLS version 1.2
mysqli_real_connect($conn,$servername,$username,$password,$database,$port,NULL,MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT);


if (mysqli_connect_errno()) {
 die('Failed to connect to MySQL: ' . mysqli_connect_error());
}

//echo 'Connected successfully';



?>
