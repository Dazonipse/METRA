<style></style>
<div id= "MyBar" class="progress green" style="Display:none;">
  <div class="indeterminate blue"></div>
</div>
<h5 class="center" style="font-family:'robotoblack'; color:#616161"><br>ANÁLISIS DE CONSUMO</h5>
<div class="row">
  <div class="col s12">
   <div class="row center">
    <div class="filtro">
      <table class="tableizer-table striped filtroo responsive-table" style="width:70%;">        
        <thead>
          <tr class="cabecerafiltro" style="text-align:left">                        
            <th>BUSCAR</th>       
            <th>MOSTRAR REGISTROS</th>                     
            <th>LABORATORIO</th>
            <th>PROVEEDOR</th> 
            <th>EXCEL</th>
            <th>PDF</th>
            <th>IGNORAR</th>
          </tr>
        </thead>
        <tbody>
          <tr>                      
            <td>
              <div id="DivFiltros">                                    
                <div  id="Filtro3_wrapper" class="dataTables_wrapper"></div>
              </div>
            </td>
            <td>
              <div id="DivFiltros">                                    
                <div  id="Filtro2_wrapper" class="dataTables_wrapper"></div>
              </div>
            </td>
            <td colspan="2">
              <div id="DivFiltros">
                <div  id="Filtro1_wrapper" class="dataTables_wrapper "></div>                                    
              </div>
            </td>
            <td class="center">                           
              <!--<form action="XLS" method="post" target="_blank" id="FormularioExportacion">-->
              <a href="#" class="botonExcel" onclick="generarExcel()"><i style="font-size:40px; color:#253778" class='material-icons center'>file_download</i></a>                                
              <!--<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" /></form> -->
            </td>
            <td>
              <a style="cursor:pointer"  class="modal-trigger2" href="#modal1"  ><i style=" color:#253778; font-size:40px;" class="material-icons">picture_as_pdf</i></a>
            </td>
            <td>
              <input type="checkbox" id="test5" />
              <label class="cabecerafiltro" id="test5label" for="test5">CEROS</label>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div style="overflow-x:auto;">
    <div id="DivFiltros" class="left"><br><br><br>
      <div  id="Filtro4_wrapper" class="dataTables_wrapper"></div>
    </div>
    <table id = "tbArticulos" class="tableizer-table responsive-table"  width="100%">
      <thead>
       <tr>
         <th>ARTICULO</th>
         <th>DESCRIPCION</th>
         <th>LABORATORIO</th>
         <th>UNIDAD</th>
         <th>PROVEEDOR</th>
         <th>EXISTENCIAS</th>
         <th>PROMEDIO TRES MÁS ALTOS</th>
         <th>PENDIENTE CRUZ AZUL</th>
         <th>CONSUMO CRUZ AZUL</th>
         <th>PENDIENTES INST-PUB</th>
         <th>CANT DOCE MESES CRUZ AZUL</th>
         <th>PENDIENTE ORDENAR CA</th>
         <th>CONTRATO ANUAL</th>
         <th>CUMPLIMIENTO CA %</th>
         <th>CANTIDAD BAJO PEDIDO</th>
         <th>CANTIDAD EN TRANSITO</th>             
         <th>MESES DE EXISTENCIA POR PROMEDIO DE TRES MAS ALTOS</th>
         <th>ORDENAR</th>
         <th>CLASIFICACIÓN</th>
         <th>DAÑADOS Y VENCIDOS</th>
         <th>PROMEDIO INST.PRIVADA</th>
         <th>PROMEDIO INST.PUBLICA</th>
         <th>MINIMO P.REORDEN</th>
         <th>INVENTARIO OPTIMO</th>
         <th>ORDENAR</th>
       </tr>
     </thead>
     <tfoot id="TblFiltros" >
      <tr>
        <th style="display: none;">ARTICULO</th>
        <th style="display: none;">DESCRIPCION</th>
        <th id="filtroLaboratorio">LABORATORIO</th>
        <th style="display: none;">UNIDAD</th>
        <th id="filtroProveedor">PROVEEDOR</th>
        <th style="display: none;">DISPONIBLE</th>
        <th style="display: none;">PROMEDIO TRES MAS ALTOS</th>
        <th style="display: none;">PEDIDO CRUZ AZUL</th>
        <th style="display: none;">CONSUMO CRUZ AZUL</th>
        <th style="display: none;">CANTIDAD BAJO PEDIDO</th>
        <th style="display: none;">CANTIDAD EN TRANCITO</th>
        <th style="display: none;">Ordenar</th>
      </tr>
    </tfoot>

    <tbody>
      <?php
      foreach ($AllART['Analisis'] as $key) {
        if ($key['PROMEDIO']=='0.00') {
          echo "<tr class='ocultar'>";
        }
        else{echo "<tr>";}
        echo "<td class='Ancho negra'><a href='#' onclick='Deathalles(".'"'.$key['ARTICULO'].'"'.")'>".$key['ARTICULO']." </a></td>
        <td class='Ancho medium'>".utf8_decode($key['DESCRIPCION'])."</td>
        <td>".$key['LABORATORIO']."</td>
        <td>".$key['UNIDAD']."</td>
        <td class='Ancho medium'>".$key['PROVEEDOR']."</td>
        <td>".$key['CANT_DISPONIBLE']."</td>
        <td class='Ancho negra'><a style='cursor:pointer;' onclick='modalABC(".'"'.$key['ARTICULO'].'"'.")'>".$key['PROMEDIO']."</a></td>";
        $impresion1;
        $impresion2;
        $impresion3;
        $impresion4;
        if ($key['Comnet0']=="")
          {$impresion1 = "<a style='color:#4D4D4D;'>".$key['PEDDCA']."</a>";}
        else{$impresion1 = "<a style='color:#4D4D4D;'class='tooltipped' data-position='bottom' data-delay='50' data-tooltip='".$key['Comnet0']."'>".$key['PEDDCA']."</a>";}

        if ($key['Comnet1']=="")
          {$impresion2 = "<a style='color:#4D4D4D;'>".$key['CSCA']."</a>";}
        else{$impresion2 = "<a style='color:#4D4D4D;' class='tooltipped' data-position='bottom' data-delay='50' data-tooltip='".$key['Comnet1']."'>".$key['PEDDCA']."</a>";}

        if ($key['Comnet2']=="")
          {$impresion3 = "<a style='color:#4D4D4D;'>".$key['CTBP']."</a>";}
        else{$impresion3 = "<a style='color:#4D4D4D;'
        class='tooltipped' data-position='bottom' data-delay='50' data-tooltip='".$key['Comnet2']."'>".$key['CTBP']."</a>";}

        if ($key['Comnet3']=="")
          {$impresion4 = "<a style='color:#4D4D4D;'>".$key['CTTS']."</a>";}
        else{$impresion4 = "<a style='color:#4D4D4D;'
        class='tooltipped' data-position='bottom' data-delay='50' data-tooltip='".$key['Comnet3']."'>".$key['CTTS']."</a>";}

        $CANTIDADCA = $key['CANT12CA'];
        /*CANT DOCE MESES CA 4 posicion*/ 
        echo "<td class='cesia'>".$impresion1."</td>
        <td class='cesia'>".$impresion2."</td>
        <td class='cesia'>".$key['PEDDCA']."</td> 
        <td class='cesia'><a style='color:#4D4D4D;' class='tooltipped' data-position='bottom' data-delay='20' data-tooltip='".$key['MENSAJE']. "'>
        ".$key['CANT12CA']."</a></td>";
         $CONTRATO; $color;
        if ($key['CONTRATO_ANUAL']>($key['TOTAL_ANUAL_CA']+$key['PEDDCA']))
        {
          $CONTRATO=$key['CONTRATO_ANUAL']-($key['TOTAL_ANUAL_CA']+$key['PEDDCA']);
          $color="red";
          /*echo "<td class='negra' style='color: red;!important'>".number_format($key['CONTRATO_ANUAL']-($key['TOTAL_ANUAL_CA']+$key['PEDDCA']),2)."</td>";*/
        }
        else{
          $CONTRATO=($key['TOTAL_ANUAL_CA']+$key['PEDDCA'])-$key['CONTRATO_ANUAL'];
          $color="green";
        }
        echo "<td class='negra cesia' style='color: ".$color.";!important'>".number_format($CONTRATO,2)."</td>";
        echo "<td class='negra cesia'>".number_format($key['CONTRATO_ANUAL'],2)."</td>";
        /***************************************/
        /*CUMPLIMIENTO CA%*/
        if($key['CONTRATO_ANUAL']!=0)
        {
          echo"
          <td class='cesia'>".number_format(($key['TOTAL_ANUAL_CA']+$key['PEDDCA'])*100/$key['CONTRATO_ANUAL'],1)." %</td>";
        }else{echo"
        <td class='cesia'>CONTRATO ANUAL NO DISPONIBLE</td>";}
        echo "
        <td class='vivian'>".$impresion3."</td>
        <td class='vivian'>".$impresion4."</td>";
        $promedio;
        if ($key['PROMEDIO']==0)
        {$promedio=0.00;}
        else
        {
          $promedio=number_format($key['CANT_DISPONIBLE']/$key['PROMEDIO'],2);
        }
        echo "<td>".$promedio."</td>";
        /***************************************/
        /*PENDIENTE ORDER CA*/    
       
        /********************************************************/
        /*ORDERNAR----CLASIFICACION-----DAÑADOS Y VENCIDOS*/
        $ORDENAR;
        $ORDENAR=number_format(($key['CANT_DISPONIBLE']+$key['CTBP']+$key['CTTS'])-($key['PEDDCA']+$CANTIDADCA+($key['PROMEDIO']*6)));
        echo"
        <td class='Ancho negra'>".$ORDENAR."</td>
        <td class='negra'>".$key['CLASE_ABC']."</td>
        <td>".$key['VENCIDOS']."</td>
        <td>".$key['M3_PRIVADA']."</td>
        <td>".$key['M3_PUBLICA']."</td>
        <td>".$key['MINIMO_P_REORDEN']."</td>
        <td>".$key['INVENTARIO_OPTIMO']."</td>
        <td>".$key['ORDENAR2']."</td>
        </tr>
        ";
      }
      ?>                         
    </tbody>
  </table>
</div>
</div>
</div>

<!-- Modal Structure -->
<div id="modal1" class="modal reporte">
  <div class="modal-content">
    <h5 class="center" style="font-family:'robotoblack'; color:#616161">FILTRAR REPORTE</h5>
    <div class="row">
      <form name="pdf" id="reportepdf" action="<?php echo base_url('index.php/pdf_analisisConsumo')?>" method="post" target="_blank" class="col s12">
        <div class="row">       
          <div class="input-field col s12 l2">
            <label >ARTÍCULO</label>
            <input name="articulo" id="articulo" type="text" class="validate">
          </div>
          <div class="input-field col s12 l4">
            <label>LABORATORIO</label>
            <select name="laboratorio" class="browser-default">
              <option value=""></option>
              <?php foreach($laboratorios as $key):  ?>
              <option value="<?php echo $key['LABORATORIO']; ?>"> <?php echo $key['LABORATORIO'];  ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="input-field col s12 l4">
          <label>PROVEEDOR</label>
          <select name="proveedor" class="browser-default">
            <option value="" ></option>
            <?php foreach($proveedores as $key):  ?>
            <option value="<?php echo $key['PROVEEDOR']; ?>"> <?php echo $key['PROVEEDOR'];  ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <div style="padding-top: 40px;" class=" col s12 l2">
        <input type="checkbox" id="chkPDF" />
        <label for="chkPDF"><a id="tooltipIgnorar" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="CHEQUEE PARA IGNORAR PROMEDIOS IGUALES A 0">IGNORAR 0</a></label>
        <input type="hidden" name="txtignorar" id="txtignorar" value="0">
      </div>
    </div> 
    <div class="row center">
      <label>DEJE VACIO LOS CAMPOS PARA FILTRAR TODOS LOS ARTÍCULOS </label>
    </div>     
  </form>
</div>        
</div>
<div class="modal-footer">
  <a href="#!" class="modal-action modal-close waves-effect waves-light btn-flat"><i style=" color:red; font-size:30px;" class="material-icons left">close</i>CANCELAR</a>
  <a href="#!" onclick="generarPdf()" class="waves-effect waves-light btn-flat"><i style=" color:#253778; font-size:30px;" class="material-icons left">picture_as_pdf</i>GENERAR</a>
</div>
</div>

<!-- Modal Structure -->
<div id="modalABC" class="modal">    
  <div class="row center">
    <h4 class="center negra">ANALISIS DE CONSUMO</h4>
  </div>
  <div class="modal-content">
    <table id="tableabc" class="display" cellspacing="0" width="100%">
      <thead>
        <tr style="background-color:#273778;color:white;">
          <th rowspan="2">CÓDIGO</th>
          <th rowspan="2">DESCRIPCIÓN</th>
          <?php for($i = 0; $i < count($meses); ++$i) {?>
          <th colspan="4"><?php echo $meses[$i];?></th>
          <?php }?>
          <th colspan="6"></th>
        </tr>
        <tr style="background-color:#273778;color:white;">
          <th>INST.PRIV</th>
          <th>FPRIVADO</th>
          <th>INST.PUB</th>
          <th>TOTAL</th>
          <th>INST.PRIV</th>
          <th>FPRIVADO</th>
          <th>INST.PUB</th>
          <th>TOTAL</th>
          <th>INST.PRIV</th>
          <th>FPRIVADO</th>
          <th>INST.PUB</th>
          <th>TOTAL</th>
          <th>INST.PRIV</th>
          <th>FPRIVADO</th>
          <th>INST.PUB</th>
          <th>TOTAL</th>
          <th>INST.PRIV</th>
          <th>FPRIVADO</th>
          <th>INST.PUB</th>
          <th>TOTAL</th>
          <th>INST.PRIV</th>
          <th>FPRIVADO</th>
          <th>INST.PUB</th>
          <th>TOTAL</th>
          <th>INST.PRIV</th>
          <th>FPRIVADO</th>
          <th>INST.PUB</th>
          <th>TOTAL</th>
          <th>INST.PRIV</th>
          <th>FPRIVADO</th>
          <th>INST.PUB</th>
          <th>TOTAL</th>
          <th>INST.PRIV</th>
          <th>FPRIVADO</th>
          <th>INST.PUB</th>
          <th>TOTAL</th>
          <th>INST.PRIV</th>
          <th>FPRIVADO</th>
          <th>INST.PUB</th>
          <th>TOTAL</th>
          <th>INST.PRIV</th>
          <th>FPRIVADO</th>
          <th>INST.PUB</th>
          <th>TOTAL</th>
          <th>INST.PRIV</th>
          <th>FPRIVADO</th>
          <th>INST.PUB</th>
          <th>TOTAL</th>
          <th>INST.PRIV</th>
          <th>FPRIVADO</th>
          <th>INST.PUB</th>
          <th>TOTAL</th>         
          <th>TOTAL GENERAL</th>             
        </tr>
      </thead>
      <tbody></tbody>    
    </table>
  </div>
</div>
<form name="excel" id="excel" action="<?php echo base_url('index.php/ExcelConsumo')?>" target="_blank" method="post">
 <input type="hidden" name="bandera" id="bandera" name="bandera" value="0">
 <input type="hidden" name="excel_articulo" id="excel_articulo" name="excel_articulo" value="">
 <input type="hidden" name="excel_laboratorio" id="excel_laboratorio" name="excel_laboratorio" value="">
 <input type="hidden" name="excel_proveedor" id="excel_proveedor" name="excel_proveedor" value="">
</form>