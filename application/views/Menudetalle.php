    <center>
      <br>
      <p><h4 style="color:#253778;" class="medium"><?php echo $Bodega['BodegaReal'][0]['NAME']; ?></h4></p>
      <p><h5 style="color:#253778;" class="negra"><?php echo $Bodega['BodegaReal'][0]['ARTICULO']; ?></h5></p>
    </center>
    <div class="col s12"> 
      <div class="center" > 
        <h4 class="negra" style="color:#4D4D4D">EXISTENCIAS</h4>
      </div>
    </div>
    <div class="row">
      <div class="col s12 l11"> 
        <div class="right" > 
         <a style="cursor:pointer" onclick="generarPdf()" ><i style=" color:#253778; font-size:50px;" class="material-icons">picture_as_pdf</i></a>
       </div>
     </div>
   </div>
   <div class="row">  
    <div class="col s12 m6 l12">                
      <table id="pdf" class="responsive-table">
        <thead>
          <tr>
            <th data-field="id">Bodega</th>
            <th data-field="name">Cant. Disp.</th>                            
          </tr>
        </thead>
        <tbody>
          <?php

          foreach ($Bodega['BodegaReal'] as $age) {
            echo "
            <tr>
            <td>".$age['BODEGA']."</td>
            <td>".$age['CANT_DISPONIBLE']."</td>                            
            </tr>                          
            ";
          }
          ?>                          
        </tbody>
      </table>
    </div>

<!--
        <div class="col s12 m6 l12">
                    <h5 style="color:#4D4D4D;">PRODUCTO BONIFICADO</h5>
                     <table id="pdf" class="responsive-table">
                        <thead>
                          <tr>
                              <th data-field="id">Bodega</th>
                              <th data-field="name">Cant. Disp.</th>                            
                          </tr>
                        </thead>

                        <tbody>
                         <?php
                            foreach ($Bodega['BodegaBoni'] as $Boniage) {
                                echo "
                                    <tr>
                                        <td>".$Boniage['BODEGA']."</td>
                                        <td>".$Boniage['CANT_DISPONIBLE']."</td>                            
                                    </tr>                          
                                ";
                            }
                        ?>                       
                        </tbody>
                      </table>
        </div>

        FIN DE COMENTARIO PRODUCTO BONIFICADO -->
        <div class="row ">     
          <div class="col s12"> 
            <div class="center" > 
              <h4 class="negra" style="color:#4D4D4D">LOTES</h4>
            </div>
          </div>
          <div class="col s12 m6 l12">

            <table id="pdf" class="responsive-table">
              <thead>
                <tr>
                  <th>Lote</th>
                  <th>Fecha Vencimiento</th>                            
                  <th>Cant. Disp</th>
                  <th>Bodega</th>
                  <th>Fecha Entrada</th>
                  <th>Cantidad Entrada</th>
                </tr>
              </thead>

              <tbody>                               
               <?php
               foreach ($Bodega['ExiLote'] as $eXIL) {
                echo "
                <tr>
                <td>".$eXIL['LOTE']."</td>
                <td>".$eXIL['FECHA_VENCIMIENTO']."</td>                            
                <td>".$eXIL['CANT_DISPONIBLE']."</td>
                <td>".$eXIL['BODEGA']."</td>                            
                <td>".$eXIL['FI']."</td>
                <td>".$eXIL['CI']."</td>                            
                </tr>                          
                ";
              }
              ?>              
            </tbody>
          </table>
        </div>


<!--
        <div class="col s12 m6 l12">        
                     <h5 style="color:#4D4D4D;">PRODUCTO BONIFICADO</h5>
                     <table id="pdf" class="responsive-table">
                        <thead>
                          <tr>
                              <th>Lote</th>
                              <th>Fecha Vencimiento</th>                            
                              <th>Cant. Disp</th>
                              <th>Bodega</th>                              
                          </tr>
                        </thead>

                        <tbody>
                         <?php
                            foreach ($Bodega['ExiLoteboni'] as $eXILbONI) {
                                echo "
                                    <tr>
                                        <td>".$eXILbONI['LOTE']."</td>
                                        <td>".$eXILbONI['FECHA_VENCIMIENTO']."</td>                            
                                        <td>".$eXILbONI['CANT_DISPONIBLE']."</td>
                                        <td>".$eXILbONI['BODEGA']."</td>                                                                    
                                    </tr>                          
                                ";
                            }
                        ?>                            
                        </tbody>
                      </table>
        </div>
        FIN PRODUCTO MODIFICADO -->
        <div class="row ">     
          <div class="col s12"> 
            <div class="center" > 
              <h4 class="negra" style="color:#4D4D4D">DAÑADOS Y VENCIDOS</h4>
            </div>
          </div>
          <div class="col s12 l12">

            <span class="card-title"></span>
            <table id="pdf" class="responsive-table">                       
              <thead>
                <tr>
                  <th>LOTE</th>
                  <th>FECHA_VENCIMIENTO</th>
                  <th>CANT_DISPONIBLE</th>
                  <th>FECHA_ENTRADA</th>
                  <th>CANT_INGRESADA</th>
                </tr>
              </thead>
              <tbody>
               <?php
               if (!($Bodega['LotesVenci'])) {}
                else{
               foreach ($Bodega['LotesVenci'] as $RowV) {
                echo "
                <tr>
                <td>".$RowV['LOTE']."</td>
                <td>".$RowV['FECHA_VENCIMIENTO']."</td>                            
                <td>".$RowV['CANT_DISPONIBLE']."</td>
                <td>".$RowV['FECHA_ENTRADA']."</td>    
                <td>".$RowV['CANTIDAD_INGRESADA']."</td>   
                </tr>                          
                ";
              }
            }
              ?>   
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <form name="pdf" id="reportepdf" action="<?php echo base_url('index.php/pdf_detalles')?>" method="post" target="_blank">
     <input type="hidden" name="idreporte" id="idreporte" name="idreporte" value="<?php echo $Bodega['BodegaReal'][0]['ARTICULO']; ?>">
   </form>
   <script>
   function generarPdf()
   {
     document.getElementById('reportepdf').submit();
   }

   function generarExcel()
   {
     document.getElementById('excel').submit();
   }
   </script>