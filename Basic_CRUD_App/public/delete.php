<?php 
require_once "../app/database.php";
use App\Database;

$db=new Database();

$title="Delete Your Data";

$id = $_GET['id'] ?? null;

if($id)
{
    $db->delData($id);
} 

header("Location: index.php");

?>