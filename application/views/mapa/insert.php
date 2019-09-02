<?php
$connect = mysqli_connect("localhost", "root", "", "agroscan_app"); 
$id_marcas = mysqli_real_escape_string($connect, $_POST["id_marcas"]);    
$newPolygonID = mysqli_real_escape_string($connect, $_POST["newPolygonID"]);  
$area = mysqli_real_escape_string($connect, $_POST["area"]); 
echo $id_marcas."-->".$newPolygonID."<----".$area;
$query = "  
UPDATE tb_marcas
set 
Polygon_ID='$newPolygonID',
area='$area'
WHERE id_marcas='+$id_marcas+'";  
$result = mysqli_query($connect, $query);  
$message='Updated Success';
?>