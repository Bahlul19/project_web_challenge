<?php

class Product
{
    private $db;
    
    public function __construct()
    {
        $this->db = new Database();
    }

    //Add Product Method

    public function addProduct($categoryId,$product_name,$fileName,$price)
    {
        $categoryId = mysqli_real_escape_string($this->db->link, $categoryId);
        $product_name = mysqli_real_escape_string($this->db->link,$product_name);
        $price = mysqli_real_escape_string($this->db->link, $price);
        $fileName = mysqli_real_escape_string($this->db->link, $fileName);
        
        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileTemp = $_FILES['image']['tmp_name'];

        $div = explode('.', $fileName);
        $fileExt = strtolower(end($div));
        $uniqueImage = substr(md5(time()), 0, 10).'.'.$fileExt;
        $uploadedImage = "images/".$uniqueImage;

        if($product_name == '' ||  $price == '')
        {
                echo "Please Fill up the form";
        }

        else
        {
        move_uploaded_file($fileTemp, $uploadedImage);
        $insertProductQuery = "INSERT INTO products(category_id,product_name,image,price) 
        VALUES('$categoryId', '$product_name','$uploadedImage','$price')";
        $insertProductRow = $this->db->insert($insertProductQuery);

        if($insertProductRow)
        {
            echo "Data Inserted Successfully";
        }
        else 
        {
            echo "Failed to insert";
        }
        }
    }

    public function showProductAll()
    {
        $selectProductQuery = "SELECT id,product_name,image,price,category_id  FROM products";
        $result = $this->db->select($selectProductQuery);
        return $result;
    }
    
    //Get Product ID
    public function getProductByID($id)
    {
        global $id;
        $getProductIdQuery = "SELECT id,product_name,image,price,category_id FROM products WHERE id=$id";
        $getProductID = $this->db->select($getProductIdQuery);
        return $getProductID;
    }
      
    //Update Product Method
    public function updateProduct($id,$categoryID,$productName,$productPrice,$fileName)  
    {
        $categoryID = mysqli_real_escape_string($this->db->link,$categoryID);
        $productName = mysqli_real_escape_string($this->db->link,$productName);
        $productPrice = mysqli_real_escape_string($this->db->link,$productPrice);
        $fileName = mysqli_real_escape_string($this->db->link, $fileName);
        $id =  mysqli_real_escape_string($this->db->link,$id);
        
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileTemp = $_FILES['image']['tmp_name'];
        
        $div = explode('.', $fileName);
        $fileExt = strtolower(end($div));
        $uniqueImage = substr(md5(time()), 0, 10).'.'.$fileExt;
        $uploadedImage = "images/".$uniqueImage;

    if($productName == "" || $productPrice == "")
    {
        echo "<span class='error'>Field must be not be empty</span>";
    }

    else
    {

    if(!empty($fileName))
    {
    
    //The file might not be empty
    
    if ($fileSize >1048567)
    {
     echo "<span class='error'>Image Size should be less then 1MB!
     </span>"; 
    } 
    elseif (in_array($fileExt, $permited) === false) 
    {
     echo "<span class='error'>You can upload only:-"
     .implode(', ', $permited)."</span>";
    } 
    
    else
    {  
            move_uploaded_file($fileTemp, $uploadedImage);
            $updateProductQuery = "UPDATE products
            SET
            product_name = '$productName',
            price = '$productPrice',
            image = '$uploadedImage',
            category_id = '$categoryID',
            WHERE id = $id
            ";
            $updateProductRow = $this->db->update($updateProductQuery);       
    }
    
    }

     else
    {
            $updateProductQuery = "UPDATE products
            SET
            product_name = '$productName',
            price = '$productPrice',
            image = '$uploadedImage',
            category_id = '$categoryID',
            WHERE id = $id
            ";
            $updateProductRow = $this->db->update($updateProductQuery);

    }
} 

}

//Delete Product Method
    public function deleteProduct($id)
    {
        $deleteProductQuery = "DELETE FROM products WHERE id = $id";
        $deleteProductRow = $this->db->delete($deleteProductQuery);
        return $deleteProductRow;
    }

}
?>
