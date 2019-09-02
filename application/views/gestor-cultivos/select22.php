<?php

if (isset($_POST["id_cliente"])) {
    $output = '';
    $connect = mysqli_connect("localhost", "root", "", "agroscan_app");
    $query2 = "SELECT MARK.popup_marcas,MARK.area , CLI.nombre_cliente,CLI.apellido_cliente FROM tb_cultivo as CULT , tb_marcas as MARK, tb_cliente as CLI where CULT.id_cultivo=MARK.id_cultivo AND CULT.id_cliente= CLI.id_cliente and CLI.id_cliente= '" . $_POST["id_cliente"] . "'";
    $result2 = mysqli_query($connect, $query2);
    $row3 = mysqli_fetch_array($result2);
    $output.=' <br><center> <h4>Marcas Del Cliente  ' . $row3["nombre_cliente"] . $row3["apellido_cliente"] . '</h4> '
            . '<table class="table table-striped table-bordered table-sm" id="dtBasicExample2" cellspacing="0" width="100%" >'
            . '<thead>'
            . '<tr> '
            . '<th class="th-sm"> Nombre Marca</th>'
            . '<th class="th-sm"> Hectareas </th> '
            . '</tr>'
            . '</thead>'
            . '<tbody>';
    while ($row2 = mysqli_fetch_array($result2)) {
        $output .= ' 
                      <tr><td>' . $row2["popup_marcas"] . '</td><td>' . $row2["area"] . '</td></tr>
                          ';
    }
    $output .= '        
            <tfoot>
            <tr>
            <th class="th-sm"> Nombre Marca</th>
            <th class="th-sm"> Hectareas </th>  
            </tr>
            </tfoot>
             </tbody>
            </table>
            </center>
            
            <script>
                $(document).ready(function () {
                $("#dtBasicExample2").DataTable({
                "pagingType": "numbers",
                retrieve: true
                });
                $(".dataTables_length").addClass("bs-select");
                });
            </script>
            ';
    echo $output;
}
?>
 