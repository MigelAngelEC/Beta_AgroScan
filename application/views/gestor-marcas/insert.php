 <?php  
 $connect = mysqli_connect("localhost", "root", "", "agroscan_app");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $popup_marcas = mysqli_real_escape_string($connect, $_POST["popup_marcas"]);  
      $App_ID_Mark = mysqli_real_escape_string($connect, $_POST["App_ID_Mark"]);  
      $Polygon_ID = mysqli_real_escape_string($connect, $_POST["Polygon_ID"]);  
      $area = mysqli_real_escape_string($connect, $_POST["area"]);    
      if($_POST["id_marcas"] != '')  
      {  
           $query = "  
           UPDATE tb_marcas
           set popup_marcas='$popup_marcas',
           App_ID_Mark='$App_ID_Mark',
           Polygon_ID='$Polygon_ID',
           area='$area'
           WHERE id_marcas='".$_POST["id_marcas"]."'";  
           $message = 'Data Updated';  
      }  
      else  
      {  
           $query = "  
           Insert into tb_marcas (popup_marcas,App_ID_Mark,Polygon_ID,area)
           VALUES (2,2,0,'','$popup_marcas','$App_ID_Mark','$Polygon_ID','$area'); 
           ";
           $message = 'Data Inserted';    
      }  
      if(mysqli_query($connect, $query))  
      { 
           $select_query = "Select popup_marcas ,App_ID_Mark ,Polygon_ID , area,id_marcas from tb_marcas";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table class="table table-bordered" id="dtBasicExample_2"> 
                    <thead>
                     <tr>  
                          <th width="70%">Nombre de la Marca</th>  
                          <th width="15%">Edit</th>  
                          <th width="15%">View</th>  
                     </tr> 
                     </thead> 
                     <tbody>
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>' . $row["popup_marcas"] . '</td>  
                          <td><input type="button" name="edit" value="Edit" id="'.$row["id_marcas"] .'" class="btn btn-info btn edit_data" /></td>  
                          <td><input type="button" name="view" value="view" id="' . $row["id_marcas"] . '" class="btn btn-info btn view_data" /></td>  
                     </tr>  
                ';  
           }  
           $output .= '
           <tfoot>
           <th width="70%">Nombre de la Marca</th>  
           <th width="15%">Edit</th>  
           <th width="15%">View</th>  
           </tfoot>
           </tbody>
           </table>
           <script>
           $(document).ready(function () {
           $("#dtBasicExample_2").DataTable({
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