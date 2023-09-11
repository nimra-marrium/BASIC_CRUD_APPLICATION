<?php
namespace App;
class Database
{
    private $conn;
    public function __construct() 
    {
        $this->conn = mysqli_connect("localhost", "root", "", "crud");
    }
    //Read Data
    public function getData()
    {
        $qry = "SELECT * FROM user_data";
        $rslt = mysqli_query($this->conn, $qry);
        $all_data = mysqli_fetch_all($rslt, MYSQLI_ASSOC);
        return $all_data;
    }

    //Create Data
    public function addData($name,$flavour, $price)
    {
        $qry = "INSERT INTO user_data(name, flavour,ingredients, price) VALUES
        ('$name', '$flavour','$ingredients', '$price')";
        mysqli_query($this->conn, $qry);
    }

    //Update Data
    //Step-1 Getting data for ID

    public function getID($id)
    {
        $qry = "SELECT * FROM user_data WHERE id=$id";
        $rslt = mysqli_query($this->conn, $qry);
        $id_data = mysqli_fetch_assoc($rslt);
        return $id_data;
    }

    //Step-2 Update data 
    public function updateData($id, $name, $flavour,$ingredients, $price)
    {
        $qry = "UPDATE user_data
                SET name = '$name',
                    flavour = '$flavour',
                    ingredients = '$ingredients',
                    price = '$price'
                    WHERE id=$id;";
        mysqli_query($this->conn,$qry);
    }

    //Delete Data
    public function delData($id)
    {
        $qry="DELETE FROM user_data WHERE id=$id";
        mysqli_query($this->conn,$qry);
    }
}
?>