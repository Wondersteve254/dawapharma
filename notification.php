<?php
include('./constant/check.php');
require_once('./constant/connect.php');

// Select query with the manufacturing date included
$sql = "SELECT product_id, product_name, product_image, rate, quantity, brand_id, expdate, categories_id, active, status, manufacturing_date FROM product WHERE status = 1";
$result = $connect->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <h2>Notifications</h2>

        <?php foreach ($result as $row) {
            // Compare expiry date with current date
            $expiryDate = $row['expdate'];
            $currentDate = date('Y-m-d');

            // Calculate one week prior to expiry
            $oneWeekPrior = date('Y-m-d', strtotime('-1 week', strtotime($expiryDate)));
            // Calculate 30 days prior to expiry
            $thirtyDaysPrior = date('Y-m-d', strtotime('-30 days', strtotime($expiryDate)));

            // Check if medicine is one week or 30 days prior to expiry
            $isOneWeekPrior = ($currentDate >= $oneWeekPrior && $currentDate < $expiryDate);
            $isThirtyDaysPrior = ($currentDate >= $thirtyDaysPrior && $currentDate < $expiryDate);

            // Generate notifications
            if ($isOneWeekPrior) {
                echo '<div class="alert alert-warning" role="alert">
                        Medicine "' . $row['product_name'] . '" is one week away from expiry.
                    </div>';
            }
            if ($isThirtyDaysPrior) {
                echo '<div class="alert alert-danger" role="alert">
                        Medicine "' . $row['product_name'] . '" is 30 days away from expiry.
                    </div>';
            }
        }
        ?>

        <p><a href="dashboard.php" class="btn btn-primary">Back to Home</a></p>
    </div>

</body>

</html>
