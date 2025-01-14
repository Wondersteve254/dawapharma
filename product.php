<?php 
include('./constant/layout/head.php');
include('./constant/layout/header.php');
include('./constant/layout/sidebar.php');
include('./constant/connect');

// Select query with the manufacturing date included
$sql = "SELECT product_id, product_name, product_image, rate, quantity, expdate, categories_id, active, status, manufacturing_date FROM product WHERE status = 1";
$result = $connect->query($sql);
?>

<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">View Medicine</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">View Medicine</li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <a href="add-product.php"><button class="btn btn-primary">Add Medicine</button></a>
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th style="width:10%;">Photo</th>
                                <th>Medicine Name</th>
                                <th>Batch No</th>
                                <th>Quantity</th>
                                <th>Manufacturing Date</th> <!-- Changed column name -->
                                <th>Category</th>
                                <th>Expiry Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $row) {
                                $sql = "SELECT * from categories where categories_id='" . $row['categories_id'] . "'";
                                $result2 = $connect->query($sql);
                                $row2 = $result2->fetch_assoc();

                                // Compare expiry date with current date
                                $expiryDate = $row['expdate'];
                                $currentDate = date('Y-m-d');
                                $status = ($expiryDate >= $currentDate) ? '<span style="color:green">Available</span>' : '<span style="color:red">Not Available</span>';
                            ?>
                                <tr>
                                    <td class="text-center"><?php echo $row['product_id'] ?></td>
                                    <td><img src="assets/myimages/<?php echo $row['product_image']; ?>" style="width: 80px; height: 80px;"></td>
                                    <td><?php echo $row['product_name']; ?></td>
                                    <td><?php echo $row['rate'] ?></td>
                                    <td><?php echo $row['quantity'] ?></td>
                                    <td><?php echo $row['manufacturing_date'] ?></td> <!-- Display manufacturing date -->
                                    <td><?php echo $row2['categories_name'] ?></td>
                                    <td><?php echo $row['expdate'] ?></td>
                                    <td><?php echo $status; ?></td>
                                    <td>
                                        <a href="editproduct.php?id=<?php echo $row['product_id'] ?>"><button type="button" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></button></a>
                                        <a href="php_action/removeProduct.php?id=<?php echo $row['product_id'] ?>"><button type="button" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('./constant/layout/footer.php');?>
