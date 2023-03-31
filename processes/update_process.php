<?php 
    //Database Connection
    include('db.php');
    if(isset($_POST['submit'])){
    $eid=$_POST['id'];
    //Getting Post Values
    $receipt_number=$_POST['receipt_number'];
    $customer_name=$_POST['customer_name'];
    $purchase_details=$_POST['purchase_details'];
    $total=$_POST['total'];
    
    //Query for data updation
    $query=mysqli_query($conn, "update receipts set receiptNumber='$receipt_number',customerName='$customer_name', purchaseDescription='$purchase_details', totalAmount='$total' where ID='$eid'");
    
    if ($query) {
        echo "<script>alert('You have successfully update the data');</script>";
        echo "<script type='text/javascript'> document.location ='http://localhost/Receipts/index.php'; </script>";
    }
    else{
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
?>