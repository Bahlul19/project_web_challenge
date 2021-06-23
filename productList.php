
<?php include_once('inc/header.php') ?>

<?php include_once('classes/Catagory.php') ?>

<?php include_once('classes/Product.php') ?>


<div class="col-md-2"></div>
<div class="col-md-8">

    <h3>Categoty List</h3>


    <table class="table table-bordered table-striped">
        <thead>
         <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Image</th>
            <th>Category Name</th>
            <th>Actions</th>
        </tr>

        </thead>

        <tbody>
            
            <?php
            
            $sql = "SELECT products.*, category.name FROM products INNER JOIN category
            ON products.category_id  = category.id ORDER By products.product_name DESC";
        
            $productList = $db->select($sql);   

            if($productList)

            {
                while($value =$productList->fetch_assoc())
                {
                ?>
                <tr>
                    
                <td><?=$value['id']?></td>
                <td><?=$value['product_name']?></td>
                <td><?=$value['price']?></td>
                <td><img src="<?= $value['image'];?>" height="40px" width="60px"></td>  
                <td><?=$value['name']?></td>
                <td> <a href="editProduct.php?id=<?=$value['id']?>">Edit</a></td>
                <td><a onclick="return confirm('Are you sure to delete')" href="deleteProduct.php?id=<?=$value['id']?>">Delete</a></td>
                </tr>

            <?php } ?>
            <?php } ?>
      
        </tbody>
        </table>

</div>
<div class="col-md-2">

</div>
