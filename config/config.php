<?php

define("Host", "localhost");
define("dbname", "storage");
define("user", "root");
define("pass", "");
$db = null;

     try{
        $db = new PDO("mysql:host=". Host .";dbname=". dbname .";charset=utf8", user, pass,
        [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ]);
        return $db;
   }
   catch (PDOException $e) {
      echo "Error!: " . $e->getMessage() . "<br/>";
  }


// $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$user, $pass);
