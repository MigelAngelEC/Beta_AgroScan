<?php
//$connect = mysqli_connect("localhost", "root", "", "agroscan_app");
//$query = "Select cl.nombre_cliente,cl.apellido_cliente,cl.AppID ,cu.nombre_cult,cl.id_cliente From tb_cliente as cl , tb_cultivo as cu where cl.id_cliente=cu.id_cliente";
//$result = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>window.jQuery || document.write(decodeURIComponent('%3Cscript src="js/jquery.min.js"%3E%3C/script%3E'))</script>
    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/19.1.5/css/dx.common.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/19.1.5/css/dx.light.css" />
    <script src="https://cdn3.devexpress.com/jslib/19.1.5/js/dx.all.js"></script>
    <script src="https://cdn3.devexpress.com/jslib/19.1.5/js/vectormap-data/world.js"></script>
    <script src="https://cdn3.devexpress.com/jslib/19.1.5/js/vectormap-data/africa.js"></script>
    <script src="https://cdn3.devexpress.com/jslib/19.1.5/js/vectormap-data/canada.js"></script>
    <script src="https://cdn3.devexpress.com/jslib/19.1.5/js/vectormap-data/eurasia.js"></script>
    <script src="https://cdn3.devexpress.com/jslib/19.1.5/js/vectormap-data/europe.js"></script>
    <script src="https://cdn3.devexpress.com/jslib/19.1.5/js/vectormap-data/usa.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>_assets/js/_vectormap_js/data.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>_assets/js/_vectormap_js/index.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>_assets/js/_vectormap_js/obtener_datos.js"></script>
    <link href="<?php echo base_url();?>_assets/css/_vectormap_css/styles.css" rel="stylesheet" type="text/css" media="screen"/>
</head>

<body>
<img id='loading' style="display:none";/>
<?php
echo "</br>";
echo "</br>";
echo "</br>";
?>
<div class="container">
  <div class="row">
    <div class="col-sm">
    <form class="form-inline md-form form-sm mt-0">
  <i class="fas fa-search" aria-hidden="true"></i>
  <input  id="myInputs" class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search " onkeyup="myFunction()"
    aria-label="Search">
</form>
    <table id="dtVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0"
  width="100%">
  <thead>
    
    <tr>
    <th scope="col">#</th>
    <th scope="col">Hacienda</th>
    <th scope="col">Pais</th>
    <th scope="col">Ciudad</th>
    <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody id="myTable">
      <?php
      $numeroc =0;
      $query  =$this->db->query ( 'SELECT id_cultivo,nombre_cult,descripcion_cult,pais_cult,ciudad_cult FROM tb_cultivo' );
     
      while ($row = $query->unbuffered_row('array'))
{
//         echo $row->title;
//         echo $row->name;
//         echo $row->body;
// }
//       foreach ($query->result_array() as $row)
//       {
              $numeroc = $numeroc + 1;
              echo '<tr class="boton">';
              echo '<td scope="row">';
              echo $row['id_cultivo'];
              echo '</td>';  
              echo '<td>';
              echo $row['nombre_cult'];
              echo '</td>';
              echo '<td>';
              echo $row['pais_cult'];
              echo '</td>';
              echo '<td>';   
              echo $row['ciudad_cult'];
              echo '</td>';
              echo '<td>';
              echo'<a class="btn btn-success btn-small" onclick="showTableData()"><i class="material-icons left"></i>cliente</a>';
              echo '</td>';
              echo '<td style="display:none;">';
              echo $row ['bouns_cult'];
              echo '</td>';
              echo '<td style="display:none;">';
              echo $row ['id_cultivo'];
              echo '</td>';
              echo '</tr>';
      }
    


    ?>
     <!-- <?php
  $numeroc = 0;
  $sql = "SELECT * FROM `tb_cultivo`";
  $result = mysqli_query($conn, $sql);
  $resultcheck = mysqli_num_rows($result);
  if ($resultcheck > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
          $numeroc = $numeroc + 1;
          echo'<tr class= boton>';
          echo '<td scope="row">';
          echo $row ['id_cultivo'];
          echo '</td>';
          echo'<td>';
          echo $row ['nombre_cult'];
          echo'</td>';
          echo'<td>';
          echo $row ['descripcion_cult'];
          echo'</td>';
          echo'<td>';
          echo $row ['ciudad_cult'];
          echo'</td>';
          echo'<td>';
          echo'<a class="waves-effect waves-light btn-small light-green darken-1"onclick="showTableData()"><i class="fas fa-map-marker-alt" color="dark"></i>Cliente</a>';
          echo'</td>';
          echo'</tr>';
      }
     
  }
  ?> -->
    <tbody>
</table>
    </div>
    <div id="vector-map" class="col-sm"></div>
  </div>
</div>


</body>
</html>
<!-- SCRIPTS -->
<script>
            function myFunction() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("myInputs");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[1];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
    </script>
<script>
//Script for Button Search
        var wage = document.getElementById("myInputs");
        wage.addEventListener("keydown", function (e) {
            if (e.keyCode === 13) {
                showTableData();
                e.preventDefault();
            }
        }, false);
</script>


<!-- JQuery -->
<!-- <script type="text/javascript" src="<?php echo base_url();?>_assets/js/jquery-3.4.1.min.js"></script> -->
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="<?php echo base_url();?>_assets/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="<?php echo base_url();?>_assets/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="<?php echo base_url();?>_assets/js/mdb.min.js"></script>
<!-- MDBootstrap Datatables  -->
<script type="text/javascript" src="<?php echo base_url();?>_assets/js/addons/datatables.min.js"></script>

