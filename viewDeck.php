<?php

$host = "csc34400finalproject-db.cluster-ro-cctp5njo9gyq.us-east-2.rds.amazonaws.com";
$user = "admin";
$pass = "NewShield19!";
$port = 3306;

$dbName = "card";

echo "Attempting to connect to DB server: $host";

$conn = new mysqli($host, $user, $pass, $port);

if ($conn->connect_error)
    die("Could not connect: ".mysqli_connect_error());
else 
    echo " conneceted!";