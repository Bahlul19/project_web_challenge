
<?php include_once('inc/header.php') ?>

<?php include_once('classes/Catagory.php') ?>

<?php include_once('classes/Product.php') ?>

<div class="col-md-4"></div>
<div class="col-md-4">

    <h3>Update Product </h3>

    <?php 
                
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
            }

            $products = new Product();
            //Create intanse or object of database
            
            if(isset($_POST['update']))
            {
                $categoryID =  $_POST['category_id '];
                $productName = $_POST['product_name'];
                $productPrice = $_POST['price'];
                $fileName = $_FILES['image']['name'];
                $updateProducts = $products->updateProduct($id,$categoryID,$productName,$productPrice,$fileName);
            }
            
            ?>
                
        <form action="" method="POST" class="form-class">
            <?php

            $editProductId = $products->getProductByID($id);

            if($editProductId)
            {

            while($value = $editProductId->fetch_assoc())
            {
            ?>

            <label>Category Name</label>
            <select id="select" name="category_id">
            <option>Select Catagory</option>
            
            <?php 
            
            $sql = "SELECT * FROM category";
            print_r($sql);
            $category = $db->select($sql);
            
            if($category)
            {
            while($categoryFetch = $category->fetch_assoc())
            {
            ?>
            <option
                
                <?php 
                
                if($value['id'] === $categoryFetch['id'])
                {
                    ?>
                
                selected="selected"
                
                <?php } ?>

                
        value="<?= $categoryFetch['id']; ?>"><?= $categoryFetch['name']; ?>
                
            </option>
                
                <?php } ?>
                
                 <?php } ?>
                
            </select>

            <br/><br/>

            <label for="name">Product Name:</label><br/>
            <input class="form-control" type="text" name="product_name" size="30" value="<?= $value['product_name'] ?>"><br/><br/>

            <label for="price">Price:</label><br/>
            <input class="form-control" type="text" name="price" size="30" value="<?= $value['price'] ?>"><br/><br/>
            
            <label for="image">Upload Photo:</label><br/>
            
            <img src="<?=$value['image'];?>" height="80px" weight="200px">
            
            <input type="file" name="image"><br/><br/>

            <button type="submit" name="update" class="btn btn-success">Update</button>

            <?php } } ?>

        </form>

</div>
<div class="col-md-4">

<a class="btn btn-primary" href="categoriesList.php">Category List</a>

</div>
