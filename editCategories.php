
<?php include_once('inc/header.php') ?>

<?php include_once('classes/Catagory.php') ?>

<div class="col-md-4"></div>
<div class="col-md-4">

    <h3>Update Categoty Name</h3>

    <?php 
                
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
            }

            $catagory = new Catagory();
            //Create intanse or object of database
            
            if(isset($_POST['update']))
            {
                $name = $_POST['name'];
                $updateCatagory = $catagory->updateCatagory($name,$id);
            }
            
            ?>
                
        <form action="" method="POST" class="form_class">
            <?php

            $getCatagory = $catagory->getCatagoryByID($id);

            while($value = $getCatagory->fetch_assoc())
            {
            ?>
            
            <label for="name">Name: </label><br/>
            <input class="form-control" type="text" name="name" value="<?= $value['name'] ?>"><br/><br/>
            <button type="submit" name="update" class="btn btn-success">Update</button>

            <?php } ?>
            
        </form>

</div>
<div class="col-md-4">

<a class="btn btn-primary" href="categoriesList.php">Category List</a>

</div>
