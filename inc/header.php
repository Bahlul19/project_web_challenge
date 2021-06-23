<?php include('./config/config.php'); ?>
<?php include('./library/Database.php'); ?>

<?php
 $db = new Database();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            CRUD Formula
        </title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/bootstrap.css">
    </head>
    <body>
        
        <div class="header">
        
        <div class="container-fluid">
        
        <div class="jumbotron">
            
            <div class="col-md-8"><h3><a style="text-decoration: none;color:black" href="index.php">Welcome To Our Website</a></h3></div>
            <div class="col-md-4">
                <a class="btn btn-link" href="index.php">Home</a>  ||
                <a class="btn btn-link" href="#">login</a>  ||
                <a class="btn btn-link" href="registration.php">Register</a> ||
                <a class="btn btn-link" href="addcategories.php">Add Category</a> ||
                <a class="btn btn-link" href="addProduct.php">Add Product</a>
            </div>
            
        </div>
        
    </div>
            
<!--    </div>
        
    </body>
        -->