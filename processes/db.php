<?php
    $servername = "localhost";
    $username = "admin";
    $password = "12345";
    $db = "receiptDB";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);

    // Check connection
    // if ($conn->connect_error) {
    //   die("Connection failed: " . $conn->connect_error);
    // }
    // echo "Connected successfully";

    // $sql= "CREATE TABLE receipts (
    //     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    //     receiptNumber VARCHAR(255) NOT NULL,
    //     customerName VARCHAR(255) NOT NULL,
    //     purchaseDescription VARCHAR(255) NOT NULL,
    //     totalAmount VARCHAR(255) NOT NULL,
    //     dateOfPurchase TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    // )";
    
    // if ($conn->query($sql) === TRUE) {
    //   echo "Table receipts created successfully";
    // } else {
    //   echo "Error creating table: " . $conn->error;
    // }
    
    return $conn;
    ?>
?>