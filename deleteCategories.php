<?php include_once('inc/header.php'); ?>

<?php include_once('classes/Catagory.php') ?>

<?php

if(isset($_GET['id']))
{
    $id = $_GET['id'];
}

$catagory = new Catagory();

$deletedCategory = $catagory->deleteCatagory($id);

if($deletedCategory)
{
    echo "Data Deleted Successfully";
}
else
{
    echo "Failed to delete";
}

?>

