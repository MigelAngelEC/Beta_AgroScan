<?php

if (isset($_POST["id_cliente"])) {
    $output = '';
    $connect = mysqli_connect("localhost", "root", "", "agroscan_app");
    $query = "Select cl.nombre_cliente,cl.apellido_cliente,cl.AppID ,cu.nombre_cult,cl.id_cliente From tb_cliente as cl , tb_cultivo as cu where cl.id_cliente=cu.id_cliente and cl.id_cliente = '" . $_POST["id_cliente"] . "'";
    $result = mysqli_query($connect, $query);
    $output .= '  
      <div class="table-responsive">  
           <table class="table table-striped table-bordered table-sm"  cellspacing="0" width="100%" id="dtBasicExample2">
           <thead>
            <tr><th>Nombre del Cliente</th>
            <th>Nombre del Cultivo</th>
            <th>Application ID</th></tr>
           </thead>
           <tbody>
';
    while ($row = mysqli_fetch_array($result)) {
        $output .= '  
                <tr>  
                     <td width="70%">' . $row["nombre_cliente"] . $row["apellido_cliente"] . '</td>  
                 
                     <td width="70%">' . $row["nombre_cult"] . '</td>  
                 
                     <td width="70%">' . $row["AppID"] . '</td>  
                </tr>   
           ';
    }
    $output .= ' 
           <tfoot>
           <tr><th>Nombre del Cliente</th>
            <th>Nombre del Cultivo</th>
            <th>Application ID</th></tr>
           </tfoot>
           </tbody>
           </table>  
      </div>
      <script>
                $(document).ready(function () {
                $("#dtBasicExample2").DataTable({
                "pagingType": "simple",
                retrieve: true
                });
                $(".dataTables_length").addClass("bs-select");
                });
      </script>
      ';
    echo $output;
}
?>