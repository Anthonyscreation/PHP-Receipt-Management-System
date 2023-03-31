<?php
$mysqli = require __DIR__ . "/db.php";

$receipt_number = $_POST["receipt_number"];
$customer_name = $_POST["customer_name"];
$purchase_details = $_POST["purchase_details"];
$total = $_POST["total"];

$sql = "INSERT INTO receipts (receiptNumber, customerName, purchaseDescription, totalAmount) 
VALUES (?,?,?,?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param(
    "ssss", 
    $_POST["receipt_number"], 
    $_POST["customer_name"], 
    $_POST["purchase_details"], 
    $_POST["total"], 
);

$stmt->execute();
echo '<script>alert("Receipt Added Successfully!")</script>';
header('location: http://localhost/Receipts/index.php');
?>