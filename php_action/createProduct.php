<?php 	
require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

    $productName = $_POST['productName'];
    $productImage = $_POST['productImage'];
    $quantity = $_POST['quantity'];
    $rate = $_POST['rate'];
    $brandName = $_POST['brandName'];
    $categoryName = $_POST['categoryName'];
    $mrp = $_POST['mrp'];
    $bno = $_POST['bno'];
    $expdate = $_POST['expdate'];
    $manufacturing_date = $_POST['manufacturing_date']; // Added manufacturing date
    $productStatus = $_POST['productStatus'];

    $image = $_FILES['Medicine']['name'];
    $target = "../assets/myimages/".basename($image);
    $upload = move_uploaded_file($_FILES['Medicine']['tmp_name'], $target);
    
    if ($upload) {
        $msg = "Image uploaded successfully";
    } else {
        $msg = "Failed to upload image";
        echo $msg;
        exit;
    }

    $orderDate = date('Y-m-d');
    $sql = "INSERT INTO product (product_name, product_image, brand_id, categories_id, quantity, rate, mrp, bno, expdate, manufacturing_date, added_date, active, status) 
            VALUES ('$productName', '$image', '$brandName', '$categoryName', '$quantity', '$rate', '$mrp', '$bno', '$expdate', '$manufacturing_date', '$orderDate', '$productStatus', 1)";
    
    if($connect->query($sql) === TRUE) {
        $valid['success'] = true;
        $valid['messages'] = "Successfully Added";
        header('location:../product.php');
    } else {
        $valid['success'] = false;
        $valid['messages'] = "Error: " . $sql . "<br>" . $connect->error;
    }

    $connect->close();

    echo json_encode($valid);
} 
?>
