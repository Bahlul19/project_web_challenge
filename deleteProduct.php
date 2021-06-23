<?php include_once('inc/header.php'); ?>

<?php include_once('classes/Product.php') ?>

<?php

if(isset($_GET['id']))
{
    $id = $_GET['id'];
}

$product = new Product();

$deletedProduct = $product->deleteProduct($id);

if($deletedProduct)
{
    echo "Data Deleted Successfully";
    header("Location: productList.php");
}
else
{
    echo "Failed to delete";
}

?>