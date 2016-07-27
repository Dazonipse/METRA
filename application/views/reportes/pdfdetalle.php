<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>UNIMARK - Mercaderia en Transito</title>
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/materialize.css"  media="screen,projection"/>

  <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/media/css/jquery.dataTables.min.css" />
  <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/index.css"  media="screen,projection"/> 

<style type="text/css" media="screen">
  select{
    display: block;
    height: auto;
    width: 190px;
  }
  .dataTables_wrapper .dataTables_filter{
    text-align: left;
  }
  .dataTables_wrapper .dataTables_filter input{
    width: auto;
  }
  .Ancho {    
    width: 5%;                
  }
</style>
</head>
<body>
  <div style="text-align:center;">
    <h5 style="color:#253778; font-size:30px;" class="negra">REPORTE DE ARTICULO</h5>
    <h4 style="color:#253778; font-size:20px;" class="medium"><?php echo $Bodega['BodegaReal'][0]['NAME']; ?></h4>
    <h5 style="color:#253778; font-size:15PX;" class="negra">ARTICULO: <?php echo $Bodega['BodegaReal'][0]['ARTICULO']; ?></h5>
  </div>

  <div class="col s12"> 
    <div style="text-align:center;" class="center" > 
      <h4 class="negra" style="color:#4D4D4D">EXISTENCIAS</h4>
    </div>
  </div>
  <div class="row" style="width:100%;">  
    <div class="col s12 m6 l12">                
      <table id="pdf" style=" border-collapse: collapse; border: 1px solid #28B1E7!important;width:100%; text-align:center" >
        <thead>
          <tr style="background-color:#253778;">
            <th style='color:white; padding: 1px; border-collapse: collapse; border: 1px solid #28B1E7!important;' data-field="id">Bodega</th>
            <th style=' color:white; padding: 1px;border-collapse: collapse; border: 1px solid #28B1E7!important;' data-field="name">Cant. Disp.</th>                            
          </tr>
        </thead>

        <tbody>
          <?php
          foreach ($Bodega['BodegaReal'] as $age) {
            echo "
            <tr >
            <td style='padding: 1px;border-collapse: collapse; border: 1px solid #28B1E7!important;'>".$age['BODEGA']."</td>
            <td style='padding: 1px;  border-collapse: collapse; border: 1px solid #28B1E7!important;'>".$age['CANT_DISPONIBLE']."</td>                            
            </tr>                          
            ";
          }
          ?>

        </tbody>
      </table>
    </div>

    <div class="row" style="width:100%;">
      <div class="col s12 m6 l12">
        <h5 style="color:#4D4D4D;">PRODUCTO BONIFICADO</h5>
        <table id="pdf" style=" border-collapse: collapse; border: 1px solid #28B1E7!important;width:100%; text-align:center">
          <thead>
            <tr style="background-color:#253778;">
              <th style='color:white; padding: 1px; border-collapse: collapse; border: 1px solid #28B1E7!important;' >Bodega</th>
              <th style='color:white; padding: 1px; border-collapse: collapse; border: 1px solid #28B1E7!important;' >Cant. Disp.</th>                            
            </tr>
          </thead>

          <tbody>
           <?php
           foreach ($Bodega['BodegaBoni'] as $Boniage) {
            echo "
            <tr>
            <td style='padding: 1px;border-collapse: collapse; border: 1px solid #28B1E7!important;'>".$Boniage['BODEGA']."</td>
            <td style='padding: 1px;border-collapse: collapse; border: 1px solid #28B1E7!important;'>".$Boniage['CANT_DISPONIBLE']."</td>                            
            </tr>                          
            ";
          }
          ?>                       
        </tbody>
      </table>
    </div>
  </div>

  <div class="row" style="width:100%;">  
   <div class="col s12"> 
    <div style="text-align:center;" class="center" > 
      <h4 class="negra" style="color:#4D4D4D">LOTES</h4>
    </div>
  </div>
  <div class="col s12 m6 l12">
   <table id="pdf" style=" border-collapse: collapse; border: 1px solid #28B1E7!important;width:100%; text-align:center">
    <thead>
      <tr style="background-color:#253778;">
        <th style='color:white; padding: 1px; border-collapse: collapse; border: 1px solid #28B1E7!important;'>Lote</th>
        <th style='color:white; padding: 1px; border-collapse: collapse; border: 1px solid #28B1E7!important;'>Fecha Vencimiento</th>                            
        <th style='color:white; padding: 1px; border-collapse: collapse; border: 1px solid #28B1E7!important;'>Cant. Disp</th>
        <th style='color:white; padding: 1px; border-collapse: collapse; border: 1px solid #28B1E7!important;'>Bodega</th>
        <th style='color:white; padding: 1px; border-collapse: collapse; border: 1px solid #28B1E7!important;'>Fecha Entrada</th>
        <th style='color:white; padding: 1px; border-collapse: collapse; border: 1px solid #28B1E7!important;'>Cantidad Entrada</th>
      </tr>
    </thead>

    <tbody>                               
     <?php
     foreach ($Bodega['ExiLote'] as $eXIL) {
      echo "
      <tr>
      <td style='padding: 1px;border-collapse: collapse; border: 1px solid #28B1E7!important;'>".$eXIL['LOTE']."</td>
      <td style='padding: 1px;border-collapse: collapse; border: 1px solid #28B1E7!important;'>".$eXIL['FECHA_VENCIMIENTO']."</td>                            
      <td style='padding: 1px;border-collapse: collapse; border: 1px solid #28B1E7!important;'>".$eXIL['CANT_DISPONIBLE']."</td>
      <td style='padding: 1px;border-collapse: collapse; border: 1px solid #28B1E7!important;'>".$eXIL['BODEGA']."</td>                            
      <td style='padding: 1px;border-collapse: collapse; border: 1px solid #28B1E7!important;'>".$eXIL['FI']."</td>
      <td style='padding: 1px;border-collapse: collapse; border: 1px solid #28B1E7!important;'>".$eXIL['CI']."</td>                            
      </tr>                          
      ";
    }
    ?>              
  </tbody>
</table>
</div>
<div class="row" style="width:100%;">
  <div class="col s12 m6 l12">        
   <h5 style="color:#4D4D4D;">PRODUCTO BONIFICADO</h5>
   <table id="pdf"  style=" border-collapse: collapse; border: 1px solid #28B1E7!important;width:100%; text-align:center">
    <thead>
      <tr style="background-color:#253778;">
        <th style='color:white; padding: 1px; border-collapse: collapse; border: 1px solid #28B1E7!important;'>Lote</th>
        <th style='color:white; padding: 1px; border-collapse: collapse; border: 1px solid #28B1E7!important;'>Fecha Vencimiento</th>                            
        <th style='color:white; padding: 1px; border-collapse: collapse; border: 1px solid #28B1E7!important;'>Cant. Disp</th>
        <th style='color:white; padding: 1px; border-collapse: collapse; border: 1px solid #28B1E7!important;'>Bodega</th>                              
      </tr>
    </thead>

    <tbody>
     <?php
     foreach ($Bodega['ExiLoteboni'] as $eXILbONI) {
      echo "
      <tr>
      <td style='padding: 1px;border-collapse: collapse; border: 1px solid #28B1E7!important;'>".$eXILbONI['LOTE']."</td>
      <td style='padding: 1px;border-collapse: collapse; border: 1px solid #28B1E7!important;'>".$eXILbONI['FECHA_VENCIMIENTO']."</td>                            
      <td style='padding: 1px;border-collapse: collapse; border: 1px solid #28B1E7!important;'>".$eXILbONI['CANT_DISPONIBLE']."</td>
      <td style='padding: 1px;border-collapse: collapse; border: 1px solid #28B1E7!important;'>".$eXILbONI['BODEGA']."</td>                                                                    
      </tr>                          
      ";
    }
    ?>                            
  </tbody>
</table>
</div>
</div>
<div class="row" style="width:100%;">   
  <div class="col s12"> 
    <div style="text-align:center;" class="center" > 
      <h4 class="negra" style="color:#4D4D4D">DAÑADOS Y VENCIDOS</h4>
    </div>
  </div>
  <div class="col s12 l12">

    <span class="card-title"></span>
    <table id="pdf" style=" border-collapse: collapse; border: 1px solid #28B1E7!important;width:100%; text-align:center">                       
      <thead>
        <tr style="background-color:#253778;">
          <th style='color:white; padding: 1px; border-collapse: collapse; border: 1px solid #28B1E7!important;'>LOTE</th>
          <th style='color:white; padding: 1px; border-collapse: collapse; border: 1px solid #28B1E7!important;'>FECHA_VENCIMIENTO</th>
          <th style='color:white; padding: 1px; border-collapse: collapse; border: 1px solid #28B1E7!important;'>CANT_DISPONIBLE</th>
          <th style='color:white; padding: 1px; border-collapse: collapse; border: 1px solid #28B1E7!important;'>FECHA_ENTRADA</th>
          <th style='color:white; padding: 1px; border-collapse: collapse; border: 1px solid #28B1E7!important;'>CANT_INGRESADA</th>
        </tr>
      </thead>
      <tbody>
       <?php
       foreach ($Bodega['LotesVenci'] as $RowV) {
        echo "
        <tr>
        <td style='padding: 1px;border-collapse: collapse; border: 1px solid #28B1E7!important;'>".$RowV['LOTE']."</td>
        <td style='padding: 1px;border-collapse: collapse; border: 1px solid #28B1E7!important;'>".$RowV['FECHA_VENCIMIENTO']."</td>                            
        <td style='padding: 1px;border-collapse: collapse; border: 1px solid #28B1E7!important;'>".$RowV['CANT_DISPONIBLE']."</td>
        <td style='padding: 1px;border-collapse: collapse; border: 1px solid #28B1E7!important;'>".$RowV['FECHA_ENTRADA']."</td>    
        <td style='padding: 1px;border-collapse: collapse; border: 1px solid #28B1E7!important;'>".$RowV['CANTIDAD_INGRESADA']."</td>    

        </tr>                          
        ";
      }      ?>   
    </tbody>
  </table>
</div>
</div>
</div>

</body>
</html>