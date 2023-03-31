<?php include('processes/db.php') ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="Description" content="Enter your description here"/>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <title>Update Receipt</title>
    </head>
    <body>
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 py-5">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="text-center">Edit Receipt Info</h3>
                                <form method="POST" action="processes/update_process.php">
                                <?php
                                    $eid=$_GET['id'];
                                    $ret=mysqli_query($conn,"select * from receipts where ID='$eid'");
                                    while ($row=mysqli_fetch_array($ret)) {
                                    ?>
                                        <div class="mb-3">
                                            <input type="text" name="id" value="<?php  echo $row['id'];?>" class="form-control" id="id" aria-describedby="emailHelp" placeholder="Receipt ID" required>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" name="receipt_number" value="<?php  echo $row['receiptNumber'];?>" class="form-control" id="receipt_number" aria-describedby="emailHelp" placeholder="Receipt No." required>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" name="customer_name" value="<?php  echo $row['customerName'];?>" class="form-control" id="customer_name" aria-describedby="emailHelp" placeholder="Customer Name" required>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" name="purchase_details" value="<?php  echo $row['purchaseDescription'];?>" class="form-control" id="purchase_details" aria-describedby="emailHelp" placeholder="Purchase Details" required>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" name="total" value="<?php  echo $row['totalAmount'];?>" class="form-control" id="total" aria-describedby="emailHelp" placeholder="Total" required>
                                        </div>
                                        <?php 
                                    }?>
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-primary btn-lg" type="submit" name="submit">Add</button>
                                        <a href="index.php" class="btn btn-secondary btn-lg">
                                            Back
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>        
            </div>
        </div>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
    </body>
</html>