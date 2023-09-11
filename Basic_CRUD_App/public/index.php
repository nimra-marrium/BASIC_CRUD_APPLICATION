<?php 
require_once "../app/database.php";
use App\Database;

$db = new Database();

$title = "CAKE SWIRL CAF'E";

$all_data = $db->getdata();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title?></title>

    <style>
    #bar1
    {
        background-color: #e75480;
        width: 106.75%;
        height: 50px;
    }

    #mainhead
    {
        color: #e75480;
        font-size: 40px;
        margin: 50px;
    }

    #bar2
    {
        background-color: #e75480;
        width: 200%;
        height: 407px;
        transform: rotate(-90deg);
        transform-origin: left bottom;
    }

    .table
    {
        margin: 30px;
    }

    .hero-btn
    {
        display: inline-block;
        text-decoration: none;
        color: #e75480;
        border: 3px solid  #e75480;
        padding: 5px 7px;
        font-size: 16px;
        background: transparent;
        position: relative;
        cursor: pointer;
        margin-left: 30px;
        border-radius: 8px;
    }
    .hero-btn:hover
    {
        border: 1px solid #fc8eac;
        background: #fc8eac;
        transition: 1s;
    }

    #modbtn
    {
        background-color: #fa86c4;
        color: white;
    }

    #trashbtn
    {
        background-color: #e75480;
        color: white;
    }

    .header::after
    {
        content: '';
        width: 0%;
        height: 2px;
        background: #e75480;
        display: block;
        margin: auto;
        transition:0.5s;
    }

    .header:hover::after
    {
    width: 30%;
    }
    </style>

    <!-- CSS CDN Link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body class="container"> 
<div class = "row" id = "bar1">
        <div class="col-10"></div>
        <div class="col-2"></div> 
    </div>

    <h2 class="text-center header" id = "mainhead"> <?php echo $title?> </h2>

    <table class="table">
        <head>
            <tr>
                <th>Item Name</th>
                <th>Flavour</th>
                <th>Ingredients</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </head>
        <tbody>
        <?php foreach($all_data as $data):?>
            <tr>
                <td><?php echo $data['name']?></</td>
                <td><?php echo $data['flavour']?></td>
                <td><?php echo $data['ingredients']?></td>
                <td><?php echo $data['price']?></td>
                <td>
                <a href="add_edit.php?id=<?php echo $data['id']?>" class="btn" id = "modbtn" >Modify</a>
                <a href="delete.php?id=<?php echo $data['id']?>"  class="btn" id = "trashbtn" >Trash</a>
                </td>
                <?php endforeach; ?>
        </tbody>
    </table>

    <a href="add_edit.php" class="hero-btn">Add Items</a>

    <div class = "horizontal-bar" id = "bar2"></div>

</body>
</html>