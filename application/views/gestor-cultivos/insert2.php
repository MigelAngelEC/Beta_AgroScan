<?php

$connect = mysqli_connect("localhost", "root", "", "agroscan_app");
if (!empty($_POST)) {
    $output = '';
    $message = '';
    $nombre_cliente = mysqli_real_escape_string($connect, $_POST["nombre_cliente"]);
    $nombre_cult = mysqli_real_escape_string($connect, $_POST["nombre_cult"]);
    $AppID = mysqli_real_escape_string($connect, $_POST["AppID"]);

    if ($_POST["id_cliente"] != '') {
        $query = "  
           UPDATE tb_cliente  
           SET AppID='$AppID' 
           WHERE id_cliente='" . $_POST["id_cliente"] . "'";
        $message = 'Data Updated';
    } else {
        $query = "  
           INSERT INTO tb_socio  
           VALUES(0,0,0,0,0,0);  
           ";
        $message = 'Data Inserted';
    }
    if (mysqli_query($connect, $query)) {
        $output .= '<label class="text-success">' . $message . '</label>';
        $query2 = "UPDATE tb_cultivo SET App_ID='$AppID' WHERE id_cliente='" . $_POST["id_cliente"] . "'";
        if (mysqli_query($connect, $query2)) {
            $message =  'DataUpdated2';
        } else {
            $message =  'No UPDATED';
        }
        $query3 = "SELECT DISTINCT mar.id_marcas FROM tb_marcas as mar, tb_cliente as cli, tb_cultivo as cul where cul.id_cultivo=mar.id_cultivo and cul.id_cliente='" . $_POST["id_cliente"] . "' order BY id_marcas";
        $result3 = mysqli_query($connect, $query3);
        while ($row2 = mysqli_fetch_array($result3)) {
            $varMark = $row2["id_marcas"];
            $query4 = "UPDATE tb_marcas  as mark
                       SET mark.App_ID_Mark='$AppID', mark.Polygon_ID='Default_Polygon_ID'
                       WHERE mark.id_marcas='$varMark'";
            mysqli_query($connect, $query4);
        }
        $select_query = "Select cl.nombre_cliente,cl.apellido_cliente,cl.AppID ,cu.nombre_cult,cl.id_cliente From tb_cliente as cl , tb_cultivo as cu where cl.id_cliente=cu.id_cliente";

        $result = mysqli_query($connect, $select_query);
        $output .= '  
                <table class="table table-striped table-bordered table-sm"  cellspacing="0" width="100%" id="dtBasicExample4">  
                <thead>
                     <tr>  
                          <th width="23%">Nombre del Cliente</th>  
                          <th width="23%">Nombre del Cultivo</th>  
                          <th width="23%">Application ID</th>  
                          <th width="15%">Edit</th>  
                          <th width="15%">View</th>  
                     </tr>  
                </thead>
                <tbody>
           ';
        while ($row = mysqli_fetch_array($result)) {
            $output .= '  
                     <tr>  
                          <td>' . $row["nombre_cliente"] . $row["apellido_cliente"] . '</td>  
                          <td>' . $row["nombre_cult"] . '</td>
                          <td>' . $row["AppID"] . '</td>
                          <td><input type="button" name="edit" value="Edit" id="' . $row["id_cliente"] . '" class="btn btn-info edit_data" /></td>  
                          <td><input type="button" name="view" value="view" id="' . $row["id_cliente"] . '" class="btn btn-info view_data" /></td>  
                     </tr>  
                ';
        }
        $output .= '  
                
        <tfoot>
        <th width="23%">Nombre del Cliente</th>  
                          <th width="23%">Nombre del Cultivo</th>  
                          <th width="23%">Application ID</th>  
                          <th width="15%">Edit</th>  
                          <th width="15%">View</th>
        </tfoot>
        </tbody>
</table>
            <script>
                $(document).ready(function () {
                $("#dtBasicExample4").DataTable({
                "pagingType": "full_numbers",
                retrieve: true
                });
                $(".dataTables_length").addClass("bs-select");
                });
            </script>

';
    }
    echo $output;
}
?>