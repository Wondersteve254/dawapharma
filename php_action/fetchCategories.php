<?php
require_once 'core.php';

$sql = "SELECT categories_id, categories_name FROM categories";
$result = $connect->query($sql);

$output = array('data' => array());

if ($result->num_rows > 0) {
    while ($row = $result->fetch_array()) {
        $categoriesId = $row[0];

        $button = '
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Action <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a type="button" data-toggle="modal" id="editCategoriesModalBtn" data-target="#editCategoriesModal" onclick="editCategories(' . $categoriesId . ')"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
                <li><a type="button" data-toggle="modal" data-target="#removeCategoriesModal" id="removeCategoriesModalBtn" onclick="removeCategories(' . $categoriesId . ')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>       
            </ul>
        </div>';

        $output['data'][] = array(
            $row[1],
            $button
        );
    } // /while
} // if num_rows

header('location:../categories.php');
$connect->close();

echo json_encode($output);
?>
