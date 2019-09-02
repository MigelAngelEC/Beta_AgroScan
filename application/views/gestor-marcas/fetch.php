<?php

//fetch.php  
$connect = mysqli_connect("localhost", "root", "", "agroscan_app");
if (isset($_POST["id_marcas"])) {
    $query = "Select popup_marcas ,App_ID_Mark ,Polygon_ID , area,id_marcas from tb_marcas WHERE id_marcas= '" . $_POST["id_marcas"] . "'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}
?>
 