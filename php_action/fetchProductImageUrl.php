<?php 	

require_once 'core.php';

$productId = $_GET['i'];

$sql = "SELECT 'image' FROM materiel WHERE FaeTag = {$productId}";
$data = $connect->query($sql);
$result = $data->fetch_row();

$connect->close();

echo "stock/" . $result[0];
