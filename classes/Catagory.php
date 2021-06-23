<?php

class Catagory
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

 //Insert Catagory Method
    public function addCatagory($name)
    {
        $name = mysqli_real_escape_string($this->db->link,$name);

        if($name == '')
        {
            echo "Please Fill up the form";
        }
        else
        {
            $insertCategoryQuery = "INSERT INTO category (name) VALUES('$name')";
            $insertRowStatus = $this->db->insert($insertCategoryQuery);
            return $insertRowStatus;
        }
    }


//Show catagory method
    public function showCatagory()
    {

        $selectCategoryQuery = "SELECT id,name category";
        $selectCategoryStatus = $this->db->select($selectCategoryQuery);
        return $selectCategoryStatus;
    }

//Get Catagory id method
    public function getCatagoryByID($id)
    {
        $editCategoryQuery = "SELECT id,name FROM category WHERE id=$id";
        $editCatagoryById = $this->db->select($editCategoryQuery);
        return $editCatagoryById;
    }

//Update Catagory Method
  public function updateCatagory($name,$id)
  {
      $name = mysqli_real_escape_string($this->db->link, $name);
      $id =  mysqli_real_escape_string($this->db->link,$id);

      if($name == '')
      {
          echo "Please Fill up the form";
      }
      else
      {

          $updateCategoryQuery = "UPDATE category SET name = '$name'
                            WHERE id=$id";
          $updateRowStatus = $this->db->update($updateCategoryQuery);
          return $updateRowStatus;
      }
  }


 //Delete Catagory Method
    public function deleteCatagory($id)
    {
        $deleteCategoryQuery = "DELETE FROM category WHERE id = $id";
        $deletedRowStatus = $this->db->delete($deleteCategoryQuery);
        return $deletedRowStatus;
    }
}

?>