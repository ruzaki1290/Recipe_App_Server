<?php
   // Database configuration
   $dbhost = "localhost";
   $dbUsername = "root";
   $dbpassword = " ";
   $dbName = "simple_recipe_app";

   // Create databse connection
   $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

   // check connection
   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
   }
?>