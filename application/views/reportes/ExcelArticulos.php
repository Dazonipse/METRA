<?php 
header("Content-type: application/octect-stream");
header("Content-Disposition: attachment; filename=Analisis_de_consumo.xls");
header("pragma: no-cache");
header("Expires: 0");
?>
 <div id= "MyBar" class="progress green" style="Display:none;">
  <div class="indeterminate blue"></div>
</div>
<h5 class="center" style="font-family:'robotoblack'; color:#616161"><br>ANÁLISIS DE CONSUMO</h5>
<div class="row">
  <div class="col s12">
  <div style="overflow-x:auto;">
    <table id = "tbArticulos" class="tableizer-table responsive-table"  width="100%">
    <thead>
      <tr>
          <th>ARTICULO</th>
           <th>DESCRIPCION</th>
           <th>LABORATORIO</th>
           <th>UNIDAD</th>
           <th>PROVEEDOR</th>
           <th>DISPONIBLE</th>
           <?php 
              switch ($this->session->userdata('Permiso')) {
                case '2':
                  $head = "<th>CANTIDAD BAJO PEDIDO A PROVEEDOR</th>
                           <th>COMENTARIO</th>
                           <th>CANTIDAD EN TRANSITO</th>
                           <th>COMENTARIO</th>";
                  break;
                case '3':
                  $head = "<th>CANTIDAD BAJO PEDIDO A PROVEEDOR</th>
                           <th>COMENTARIO</th>
                           <th>CANTIDAD EN TRANSITO</th>
                           <th>COMENTARIO</th>";
                  break;
                default:
                  $head = "NO TIENE PERMISOS";
                  break;
              }
            echo $head;
            ?>           
      </tr>
    </thead>
    <tbody>
      <?php
      if (!$articulos) {
        echo "NO HAY DATOS";
      }else{
      foreach ($articulos as $key) {
        echo "
          <tr>
            <td class='Ancho negra'>".$key['ARTICULO']."</td>
            <td class='Ancho negra'>".utf8_decode($key['DESCRIPCION'])."</td>
            <td>".$key['LABORATORIO']."</td>
            <td>".$key['UNIDAD']."</td>
            <td class='Ancho medium'>".$key['PROVEEDOR']."</td>
            <td>".$key['CANT_DISPONIBLE']."</td>";
            switch ($this->session->userdata('Permiso')) {
              case '2':
                $body = "<td>".$key['CTBP']."</td>
                        <td>".utf8_decode($key['Comnet2'])."</td>
                        <td>".utf8_decode($key['CTTS'])."</td>
                        <td>".utf8_decode($key['Comnet3'])."</td>";
                break;
              case '3':
                $body = "<td>".$key['CTBP']."</td>
                        <td>".utf8_decode($key['Comnet2'])."</td>
                        <td>".utf8_decode($key['CTTS'])."</td>
                        <td>".utf8_decode($key['Comnet3'])."</td>";
                break;
              default:
                $body = "NO TIENE PERMISOS";
                break;
            }
            echo $body."</tr>";
        }
      }
      ?>                         
    </tbody>
  </table>
</div>
</div>
</div>