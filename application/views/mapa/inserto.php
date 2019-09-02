<?php

$connect = mysqli_connect("localhost", "root", "", "agroscan_app");
//if (!empty($_POST)) {
    if (isset($_POST["names"])) {
        if ($_POST["names"]) {
            $ntotal = 0;
            $fvar="";
            $names = $_POST["names"];
            $coor = $_POST["cordinates"];
            $popupmarca = $_POST["popupmarcas"];
            $ruta=$_POST["ruta"];
            for ($index = 0; $index < count($names); $index++) {
                $myArray = explode('_', $names[$index]);
                $SQL = 'SELECT id_cultivo FROM tb_cultivo WHERE id_cliente=' . $myArray[0];
                $result = mysqli_query($connect, $SQL);
                while ($row = mysqli_fetch_array($result)) {
                    $idcultiv = $row["id_cultivo"];
                    //$SQL2 = "INSERT INTO tb_marcas (id_marcas, id_cultivo, id_tipoMarcas, coor_marcas, popup_marcas, App_ID_Mark, Polygon_ID, area) VALUES (''," . $idcultiv . ",1,'" . $coor[$index] . "'," . $popupmarca[$index] . ",'Default_App_ID','Default_Polygon_ID',0)";
                    for ($index2 = 0; $index2 < count($coor); $index2++) {
                        $SQL3 = "SELECT COUNT(id_cultivo) AS ncultivos FROM tb_marcas WHERE popup_marcas='" . $popupmarca[$index2] . "';";
                        $result3 = mysqli_query($connect, $SQL3);
                        while ($row2 = mysqli_fetch_array($result3)) {
                            $ntotal = $row2['ncultivos'];
                        }
                        if ($ntotal == 0) {
                            //echo 'vacio';
                            $SQL2 = "INSERT INTO tb_marcas (id_marcas, id_cultivo, id_tipoMarcas, coor_marcas, popup_marcas, App_ID_Mark, Polygon_ID, area) VALUES ('',2,1,'" . $coor[$index2] . "','" . $popupmarca[$index2] . "','".$ruta[$index2]."','Default_Polygon_ID',0)";
                            // echo $SQL2;
                            $result2 = mysqli_query($connect, $SQL2);
                            if ($result2) {
                                echo 'true,';
                            } else {
                                echo 'Error';
                            }
                        } else {
                            echo 'false,';
                        }
                    }
                }
            }
        } else {
            echo "He recibido un campo vacio";
        }
    }
    ?>