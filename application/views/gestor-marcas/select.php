 <?php  
 if(isset($_POST["id_marcas"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "agroscan_app");  
      $query = "Select popup_marcas ,App_ID_Mark ,Polygon_ID , area from tb_marcas WHERE id_marcas =  '".$_POST["id_marcas"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label>Nombre de la Marca</label></td>  
                     <td width="70%">'.$row["popup_marcas"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Aplication ID</label></td>  
                     <td width="70%">'.$row["App_ID_Mark"].'</td>  
                </tr>   
                <tr>  
                     <td width="30%"><label>Polygono ID</label></td>  
                     <td width="70%">'.$row["Polygon_ID"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Area</label></td>  
                     <td width="70%">'.$row["area"].' Heactareas </td>  
                </tr>  
           ';  
      }  
      $output .= '  
           </table>  
      </div>  
      ';  
      echo $output;  
 }  
 ?>
 