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
        <title>Receipt Master - Receipt Management System</title>
    </head>
    <body>
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="mt-5 mb-3 clearfix">
                            <i class="bi bi-file-earmark-check mb-5" style="font-size: 100px; color: #0d6efd;"></i>
                            <h2 class="text-center">Master Receipts</h2>
                            <p class="text-center">A simple receipt management system built using PHP, html & bootstrap</p>
                        </div>
                        <div class="py-5">
                            <button type="button" class="btn btn-primary" style="float: right;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fa fa-plus"></i> Add A Receipt
                            </button>
                        </div>
                        <?php
                            // Include config file
                            require_once "processes/db.php";
                            
                            // Attempt select query execution
                            $sql = "SELECT * FROM receipts";
                            if($result = mysqli_query($conn, $sql)){
                                if(mysqli_num_rows($result) > 0){
                                    echo '<table class="table table-bordered table-striped">';
                                        echo "<thead>";
                                            echo "<tr>";
                                                echo "<th>#</th>";
                                                echo "<th>Receipt No.</th>";
                                                echo "<th>Customer Name</th>";
                                                echo "<th>Details</th>";
                                                echo "<th>Total</th>";
                                                echo "<th>Date</th>";
                                                echo "<th>Actions</th>";
                                            echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody>";
                                        while($row = mysqli_fetch_array($result)){
                                            echo "<tr>";
                                                echo "<td>" . $row['id'] . "</td>";
                                                echo "<td>" . $row['receiptNumber'] . "</td>";
                                                echo "<td>" . $row['customerName'] . "</td>";
                                                echo "<td>" . $row['purchaseDescription'] . "</td>";
                                                echo "<td>" . $row['totalAmount'] . "</td>";
                                                echo "<td>" . $row['dateOfPurchase'] . "</td>";
                                                echo "<td>";
                                                    echo '<a href="read.php?id='. $row['id'] .'" class="mr-3" style="margin-right:10px;" title="Update Record" data-toggle="tooltip"><i class="bi bi-eye"></i></a>';
                                                    echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" style="margin-right:10px;" title="Update Record" data-toggle="tooltip"><i class="bi bi-pencil-square"></i></a>';
                                                    echo '<a href="delete.php?id='. $row['id'] .'" style="margin-right:10px;" data-toggle="tooltip"><i class="bi bi-trash"></i></a>';
                                                echo "</td>";
                                            echo "</tr>";
                                        }
                                        echo "</tbody>";                            
                                    echo "</table>";
                                    // Free result set
                                    mysqli_free_result($result);
                                } else{
                                    echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                                }
                            } else{
                                echo "Oops! Something went wrong. Please try again later.";
                            }
        
                            // Close connection
                            mysqli_close($conn);
                        ?>
                    </div>
                </div>        
            </div>
        </div>

        <!-- ADD POP UP FORM -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Receipt Info</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="processes/add_process.php">
                            <div class="mb-3">
                                <input type="text" name="receipt_number" class="form-control" id="receipt_number" aria-describedby="emailHelp" placeholder="Receipt No." required>
                            </div>
                            <div class="mb-3">
                                <input type="text" name="customer_name" class="form-control" id="customer_name" aria-describedby="emailHelp" placeholder="Customer Name" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" name="purchase_details" class="form-control" id="purchase_details" aria-describedby="emailHelp" placeholder="Purchase Details" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" name="total" class="form-control" id="total" aria-describedby="emailHelp" placeholder="Total" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary btn-lg" type="submit">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
    </body>
</html>