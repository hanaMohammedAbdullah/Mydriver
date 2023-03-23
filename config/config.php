<?php

$host =  "localhost"; // define("host", "localhost");
$dbname ="storage"; // define("dbnm", "example_system_db");
$user = "root"; // define("user", "root");
$pass = ""; // define("pass", "password");


   $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass,
   [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ]);
 