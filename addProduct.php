<!--header section-->
<?php include_once('inc/header.php') ?>
<?php  include_once('classes/Product.php') ?>
<?php include_once('classes/Catagory.php') ?>

       
<div class="col-md-4"></div>
<div class="col-md-4">

    <h3>Please Add Product Name</h3>
                 
                <!--Php code will go here-->       
                <?php

                $product = new Product();
                 
                if(isset($_POST['submit']))
                {
                    $categoryId = $_POST['category_id'];
                    $product_name =  $_POST['product_name'];
                    $price =  $_POST['price'];
                    $fileName = $_FILES['image']['name'];
                    $insert_product = $product->addProduct($categoryId,$product_name,$fileName,$price); 
                    
                }
                
                ?>
                
                <form action="" method="POST" class="form-controll" enctype="multipart/form-data">

                    <label for="name">Name:</label><br/>
                    <input class="form-control" type="text" name="product_name" size="30" placeholder="Enter Product Name"><br/>
                    
                    <label for="image">Upload Photo:</label><br/>
                    <input class="form-control" type="file" name="image" multiple/><br/>
                    
                    <label for="price">Price:</label><br/>
                    <input class="form-control" type="text" name="price" size="30" placeholder="Enter Product Price"><br/>

                    <label>Please Select Category</label><br/>

                    <select id="select" name="category_id">
                    <option>Select Catagory</option>

                    <!--                Pull out the catagory name from the database-->

                    <?php 
                    $sql = "SELECT * FROM category";
                    $catagory = $db->select($sql);

                    if($catagory)
                    {
                    while($value = $catagory->fetch_assoc())
                    {
                    ?>
                    <option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>

                    <?php } ?>

                    <?php } ?>

                    </select>

                    <br/>
                    <br/>
                                       
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                   
                </form>
                
                    <br/>
     
            </div>

            <div class="col-md-4">
       <!--Footer Section-->
       <a class="btn btn-primary" href="productList.php">Product List</a>
       </div>