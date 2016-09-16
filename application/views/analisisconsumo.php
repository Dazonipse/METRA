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
  <table id="tblAlvaro" style="font-size:11px;">
       <thead>
         <tr style="background-color:#253778; color:white;">
           <th>EXISTENCIAS</th>
           <th>PROMEDIO TRES MÁS ALTOS PRIVADO</th>
           <th>PROMEDIO TRES MÁS ALTOS INST. PUBLICO</th>
           <th>CONTRATO ANUAL CRUZ AZUL</th>
           <th>ENTREGA PENDIENTE CRUZ AZUL</th>
           <th>CONSUMO INST. PUBLICO 12 MESES</th>
           <th>ORDENADO CONTRATO CRUZ AZUL</th>
           <th>PENDIENTE ORDENAR CRUZ AZUL</th>
           <th>CUMPLIMIENTO CONTRATO CRUZ AZUL %</th>
           <th>CANTIDAD BAJO PEDIDO A PROVEEDOR</th>
           <th>CANTIDAD EN TRANSITO</th>
           <th>MESES DE EXISTENCIA POR PROMEDIO DE TRES MAS ALTOS</th>
           <th>INVENTARIO MINIMO (PUNTO DE RE-ORDEN)</th>
           <th>ORDENAR</th>
           <th>CLASIFICACIÓN</th>
           <th>DAÑADOS Y VENCIDOS</th>
           <th>PROMEDIO MENSUAL FARMACIA E INST.PRIVADA (ULTIMOS 12M)</th>
           <th>PROMEDIO MENSUAL INST.PUBLICO (ULTIMOS 12M)</th>
         </tr>
       </thead>

        <tbody>
          <tr>
           <td>Existencias en bodega exceptuando nacionales</td>
           <td>Promedio de los tres meses mas altos (Farmacia PRIVADO + Institucional Privado Esperanza y Mayorista. 
Aca no se toman las Ventas de Cesia</td>
           <td>Promedio de los tres meses mas altos SOLO las Ventas de Cesia, Exceptuando MINSA</td>
           <td>CONTRATO QUE CESIA INGRESA CADA 1RO DE SEPT. (LOS DATOS SON FICTICIOS)</td>
           <td>Lo ingresa Cesia hasta el momento. Es el producto ordenado y pendiente de entregar a Cruz Azul</td>
           <td>Suma 12 meses de todo lo que factura Cesia, excepto MINSA. Estas son ventas de Cesia a Cruz Azul,
            Hosp. Bertda Calderon, Hosp. Lenin, La Mascota, Conanca, etc; todos los clientes de Cesia Excepto MINSA.</td>
           <td>CANTIDAD VENDIDA A CRUZ AZUL DESDEINICIO DE CONTRATO (Ej: 1 DE SEPTIEMBRE). </td>
           <td>SE divide la cantidad de Contrato anual Cruz Azul (I) entre 12 meses, y se multipilca por el numero de meses transcurridos al momento de la corrida, esto nos da lo que deberian haber comprado a este momento. Si lo ordenado (L) es mayor a lo que deberian haber ordenado a este momento, pone la cantidad en verde del excendente comprado; pero si lo ordenado (L) hasta el momento es inferior (menor) a lo que deberia haber ordenado a este momento, pone el deficit en rojo, deficit es lo que faltaria que ordene para cumplir con el contrato a la fecha de corrida. </td>
           <td>Es el porcentaje de cumplimiento de lo que deberia haber comprado a la fecha de la corrida.
            Se divide 100% / 12 meses = 8.333%; siguiendo el ejemplo anterior, al 30 de noviembre deberia haber ordenado/comprado 25%;
             en el Escenario A) aca deberia aparecer en rojo 16.25%;  en cambio, en el escenario B) aca deberia aparecer 43.75% en verder 
             porque lleva sobrecumplimimiento. = (525/300)*25</td>
           <td>LO LLENA VIVIAN/REBECA. Ellas lo digitan cuando ya enviaron pedido a Proveedor, cuando el proveedor manda notificacion de embarque, lo cambia Transito </td>
           <td>LO LLENA VIVIAN, ya el producto salio de puerto. Permitir que Viviana escriba comentarios en un pop up, fecha de salida y fecha estimada de llegada.</td>
           <td>ES LA DIVISION DE LA EXISTENCIA ENTRE EL PROMEDIO DE LOS 3 MESES MAS ALTOS TANTO DEL MERCADO PRIVADO e INST. PRIVADO, COMO DE INST. PUBLICO Cesia (Excluyendo MINSA)

            SI NO HAY EXISTENCIA SE PONE 0</td>
           <td>(CONSUMO INST. PUBLICO 12 MESES "K" * 50%) + (PROMEDIO TRES MAS ALTOS PRIVADO "G" * X)
          X = 6 MESES SI ES AAA
          X= 4 MESES SI ES AA
          X = 2 MESES SI ES A</td>
           <td>= (INVENTARIO MINIMO (PUNTO DE RE-ORDEN) + ENTREGA PENDIENTE CRUZ AZUL) - (EXISTENCIAS+CANTIDAD BAJO PEDIDO+CANTIDAD EN TRANSITO)
Si el resultado es inferior a INVENTARIO MINIMO, la cantidad se refleja en negro; pero si el resultado es superior a INVENTARIO MINIMO, se refleja en Rojo.</td>
           <td>CLASIFICACIÓN</td>
           <td>DAÑADOS Y VENCIDOS</td>
           <td>PROMEDIO DE LOS ULTIMOS 12 MESES DE FARMACIAS E INSTITUCION PRIVADA (TODAS LAS VENTAS EXCEPTUANDO CESIA)</td>
           <td>PROMEDIO DE LOS ULTIMOS 12 MESES DE LAS VENTAS DE CESIA (EXCEPTUANDO MINSA)</td>
         </tr>
        </tbody>
      </table>
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
           <th>PROMEDIO TRES MÁS ALTOS PRIVADO</th>
           <th>PROMEDIO TRES MÁS ALTOS INST. PUBLICO</th>
           <th>CONTRATO ANUAL CRUZ AZUL</th>
           <th>ENTREGA PENDIENTE CRUZ AZUL</th>
           <th>CONSUMO INST. PUBLICO 12 MESES</th>
           <th>ORDENADO CONTRATO CRUZ AZUL</th>
           <th>PENDIENTE ORDENAR CRUZ AZUL</th>
           <th>CUMPLIMIENTO CONTRATO CRUZ AZUL %</th>
           <th>CANTIDAD BAJO PEDIDO A PROVEEDOR</th>
           <th>CANTIDAD EN TRANSITO</th>
           <th>MESES DE EXISTENCIA POR PROMEDIO DE TRES MAS ALTOS</th>
           <th>INVENTARIO MINIMO (PUNTO DE RE-ORDEN)</th>
           <th>ORDENAR</th>
           <th>CLASIFICACIÓN</th>
           <th>DAÑADOS Y VENCIDOS</th>
           <th>PROMEDIO MENSUAL FARMACIA E INST.PRIVADA (ULTIMOS 12M)</th>
           <th>PROMEDIO MENSUAL INST.PUBLICO (ULTIMOS 12M)</th>
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
        if ($key['M3_PUBLICA']=='0.00') {
          echo "<tr class='ocultar'>";
        }
        else{echo "<tr>";}
        echo "
        <td class='Ancho negra'><a href='#' onclick='Deathalles(".'"'.$key['ARTICULO'].'"'.")'>".$key['ARTICULO']." </a></td>
        <td class='Ancho negra'>".utf8_decode($key['DESCRIPCION'])."</td>
        <td>".$key['LABORATORIO']."</td>
        <td>".$key['UNIDAD']."</td>
        <td class='Ancho medium'>".$key['PROVEEDOR']."</td>
        <td>".$key['CANT_DISPONIBLE']."</td>
        <td>".$key['M3_PRIVADA']."</td>
        <td class='Ancho negra'><a style='cursor:pointer;' onclick='modalABC(".'"'.$key['ARTICULO'].'"'.")'>".$key['M3_PUBLICA']."</td>
        <td class='cesia'>".$key['CONTRATO_ANUAL']."</td>
        <td class='cesia'>".$key['PEDDCA']."</td>
        <td>".$key['CONSUMO_PUBLICO_12MESES']."</td>
        <td>".$key['ORDENADO_CONTRATO_CRUZ_AZUL']."</td>";
        if ($key['PENDIENTE_ORDENAR_CA']<0) {
          echo "<td class='red-text negra'>".$key['PENDIENTE_ORDENAR_CA']."</td>";
        }else{echo "<td class='green-text text-darken-3 negra'>".$key['PENDIENTE_ORDENAR_CA']."</td>";}
        echo "<td>".$key['CUMPLIMIENTO_CONTRATO_CA']."</td>
        <td class='vivian'>".$key['CTBP']."</td>";
        if ($key['Comnet3']=="")
          {echo "<td class='vivian'>".$key['CTTS']."</td>";}
        else{echo "<td class='vivian'><a style='color:#4D4D4D;'
        class='tooltipped' data-position='bottom' data-delay='50' data-tooltip='".$key['Comnet3']."'>".$key['CTTS']."</a></td>";}
        echo "<td>".$key['MESES_DE_EXIXTENCIA_PROMEDIO_MASALTOS']."</td>
        <td>".$key['INVENTARIO_MINIMO_PUNTO_REORDEN']."</td>";

        if ($key['ORDENAR']>$key['INVENTARIO_MINIMO_PUNTO_REORDEN']) {
          echo "<td class='red-text'>".number_format($key['ORDENAR'])."</td>";  
        }else{
          echo "<td>".number_format($key['ORDENAR'])."</td>";}

        echo"<td>".$key['CLASE_ABC']."</td>
        <td>".$key['VENCIDO']."</td>
        <td>".$key['PROMEDIO_MENSUAL_FARM_INSTPRIV']."</td>
        <td>".$key['PROMEDIO_MENSUAL_INSTPUBLICA']."</td>
        </tr>";
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
   <!-- <p class="center" style="color:red;"><u>NOTA</u>: El análisis de consumo no refleja artículos vendidos a MINSA</p>-->
  </div>
</div>
<form name="excel" id="excel" action="<?php echo base_url('index.php/ExcelConsumo')?>" target="_blank" method="post">
 <input type="hidden" name="bandera" id="bandera" name="bandera" value="0">
 <input type="hidden" name="excel_articulo" id="excel_articulo" name="excel_articulo" value="">
 <input type="hidden" name="excel_laboratorio" id="excel_laboratorio" name="excel_laboratorio" value="">
 <input type="hidden" name="excel_proveedor" id="excel_proveedor" name="excel_proveedor" value="">
</form>