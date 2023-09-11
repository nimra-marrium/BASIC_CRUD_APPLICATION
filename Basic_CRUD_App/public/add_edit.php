<?php 
require_once "../app/database.php";
use App\Database;
$db=new Database();
$title="ADD OR EDIT ANY ITEM";
if($_POST)
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $flavour= $_POST['flavour'];
    $ingredients= $_POST['ingredients'];
    $price = $_POST['price'];
    
    if($id)
    {
        $db->updateData($id, $name, $flavour, $ingredients, $price);
    }
    else
    {
        $db->addData($name, $flavour, $ingredients, $price);
    }

    header("Location: index.php");
}

$id = $_GET['id'] ?? null;

if($id)
{
    $id_data = $db->getID($id);
} else {
    $id_data = array();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title?></title>

    <!-- CSS CDN Link--><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

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
    }

    #bar2
    {
        background-color: #e75480;
        width: 200%;
        height: 407px;
        transform: rotate(-90deg);
        transform-origin: left bottom;
    }

    .form-container
    {
        position: absolute;
        top: 50%;
        left: 54%;
        transform: translate(-50%, -50%); 
    }

    form
    {
        width: 50%;
    }

    .form-label
    {
        color: #e0115f;
        font-size: large;
    }

    .form-input
    {
        background-color: #ffc1cc;
        border: #e75480 solid;
    }

    #cake1
    {
        width: 70px;
        height: 70px;
        position: absolute;
        top: 27%;
        left: 32%;
    }
    #cake2
    {
        width: 70px;
        height: 70px;
        position: absolute;
        top: 42%;
        left: 32%;
    }
    #cake3
    {
        width: 70px;
        height: 70px;
        position: absolute;
        top: 57%;
        left: 32%;
    }

    #cake4
    {
        width: 70px;
        height: 70px;
        position: absolute;
        top: 72%;
        left: 32%;
    }

    #savebtn
    {
        background-color: #fa86c4;
        color: white;
    }

    #cancelbtn
    {
        background-color: #e75480;
        color: white;
    }
    </style>
</head>

<body class="container">
    <div class = "row" id = "bar1">
        <div class="col-10"></div>
        <div class="col-2"></div> 
    </div>

    <h2 class="my-5 text-center" id = "mainhead">  ADD OR EDIT ANY ITEM  </h2>

    <img src = "cake2.png" id = "cake1" alt = "cake1">
    <img src = "cake2.png" id = "cake2" alt = "cake2">
    <img src = "cake2.png" id = "cake3" alt = "cake3">
    <img src = "cake2.png" id = "cake4" alt = "cake4">

    <div class = "form-container">
    <form method="post">
    <div class="mb-3">
    <br><br><br><br>
    <label for="name" class="form-label">Item Name</label>
    <input type="text" id="name" name="name" size = "47" placeholder="Enter Item Name" class="form-control"
    value="<?php echo $id_data['name'] ?? null; ?>" required>
    </div>

    <div class="mb-3">
    <label for="flavour" class="form-label">Flavour</label>
    <input type="text" id="flavour" name="flavour" size = "47" placeholder="Enter Flavour" class="form-control"
    value="<?php echo $id_data['flavour'] ?? null; ?>" required>
    </div>

    <div class="mb-3">
    <label for="ingredients" class="form-label">Ingredients</label>
    <input type="text" id="ingredients" name="ingredients" size = "47" placeholder="Enter Ingredients" class="form-control"
    value="<?php echo $id_data['ingredients'] ?? null; ?>" required>
    </div>

    <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="text" id="price" name="price" size = "47" placeholder="Enter Price" class="form-control"
    value="<?php echo $id_data['price'] ?? null; ?>" required>
    </div>

    <input type="hidden" name="id" value="<?php echo $id ?>" >

    <div>
        <button type = "submit" class="btn" id = "savebtn" >Save</button>
        <button type = "submit" class="btn" id = "cancelbtn" >Cancel</button>
    </div>
    </form>
    </div>

    <div class = "horizontal-bar" id = "bar2"></div>
    
</body>
</html>