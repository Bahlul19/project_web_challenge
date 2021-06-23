
<?php include_once('inc/header.php') ?>

<?php include_once('classes/Catagory.php') ?>

<div class="col-md-4"></div>
<div class="col-md-4">

    <h3>Please Add Categoty Name</h3>

    <?php
               //Create intanse or object of database
                
                $catagory = new Catagory();

                if(isset($_POST['submit']))
                {
                    $name = $_POST['name'];
                    $insertCatagory = $catagory->addCatagory($name);
                    
                    if($insertCatagory)
                    {
                        echo "Data inserted successfully";
                    }
                    else
                    {
                        echo "Failed";
                    }
                }
                
    ?>

    <form action="" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            Category Name <input type="text" name="name" class="form-control">
        </div>

        <button type="submit" name="submit" class="btn btn-success">Submit</button>

    </form>

</div>
<div class="col-md-4">

<a class="btn btn-primary" href="categoriesList.php">Category List</a>

</div>
