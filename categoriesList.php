
<?php include_once('inc/header.php') ?>

<?php include_once('classes/Catagory.php') ?>


<div class="col-md-2"></div>
<div class="col-md-8">

    <h3>Categoty List</h3>

    <table class="table table-bordered table-striped">
    <tr>
    <th>Name</th>
    <th>Actions</th>
   </tr>
  
    <?php
    $sql = "SELECT * FROM category";
    
    $catagoryList = $db->select($sql);

    if($catagoryList)
    {
        while($row = $catagoryList->fetch_assoc())
        {
            echo ' <tr> 
                    <td>'.$row['name'].'</td>
                    <td><a href="editCategories.php?id='.$row['id'].'" class="glyphicon glyphicon-wrench"></a></td>
                <td><a href="deleteCategories.php?id='.$row['id'].'" class="glyphicon glyphicon-remove"></a></td>    
                </tr>';
        
        }
    }   
    
    ?>

</table>



</div>
<div class="col-md-2">

</div>