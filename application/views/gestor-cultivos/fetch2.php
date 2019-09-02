<?php

//fetch.php  
$connect = mysqli_connect("localhost", "root", "", "agroscan_app");
if (isset($_POST["id_cliente"])) {
    $query = "Select cl.nombre_cliente,cl.apellido_cliente,cl.AppID ,cu.nombre_cult,cl.id_cliente From tb_cliente as cl , tb_cultivo as cu where cl.id_cliente=cu.id_cliente and cl.id_cliente = '" . $_POST["id_cliente"] . "'";
    $result = mysqli_query($connect, $query) or die(mysqli_error()); 
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}
?>
 