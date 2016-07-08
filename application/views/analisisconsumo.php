<div id= "MyBar" class="progress green" style="Display:none;">
    <div class="indeterminate blue"></div>
</div>

<h5 class="center" style="font-family:'robotoblack'; color:#616161"><br>ANALISIS DE CONSUMO</h5>

<div class="row">
    <div class="col s12">

       <div class="row center">
          <div class="filtro">
            <table class="tableizer-table striped filtroo responsive-table" style="width:70%;">        
                <thead>
                    <tr class="cabecerafiltro" style="text-align:left">
                        <th>Buscar</th>       
                        <th>Mostrar Registro</th>                     
                        <th>Laboratorio</th>       
                        <th>Proveedor</th> 
                        <th>Exportar</th>
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
                            <form action="XLS" method="post" target="_blank" id="FormularioExportacion">                                
                                <a href="#" class="botonExcel"><i style="font-size:40px; color:#253778" class='material-icons center'>file_download</i></a>                                
                                <input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />                                           
                            </form> 

                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
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
             <th>PEDIDO CRUZ AZUL</th>
             <th>CONSUMO CRUZ AZUL</th>
             <th>CANTIDAD BAJO PEDIDO</th>
             <th>CANTIDAD EN TRANSITO</th>             
             <th>MESES DE EXISTENCIA POR PROMEDIO DE TRES MAS ALTOS</th>
             <th>MESES DE EXISTENCIA POR CONSUMO HISTORICO</th>
             <th>PENDIENTES INST-PUB</th>
             <th>CANT SEIS MESES CRUZ AZUL</th>
             <th>CUMPLIMIENTO CA %</th>
             <th>PENDIENTE ORDER CA</th>
             <th>CANTIDAD BAJO PEDIDO</th>
             <th>TRANSITO</th>
             <th>ORDENAR</th>
         </tr>
     </thead>
     <tfoot id="TblFiltros" >
        <tr>
            <th style="display: none;">ARTICULO</th>
            <th style="display: none;">DESCRIPCION</th>
            <th>LABORATORIO</th>
            <th style="display: none;">UNIDAD</th>
            <th>PROVEEDOR</th>
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
            echo "<tr>
            <td class='Ancho negra'><a href='#' onclick='Deathalles(".'"'.$key['ARTICULO'].'"'.")'>".$key['ARTICULO']."</a></td>
            <td class='Ancho medium'>".utf8_decode($key['DESCRIPCION'])."</td>
            <td>".$key['LABORATORIO']."</td>
            <td>".$key['UNIDAD']."</td>
            <td class='Ancho medium'>".$key['PROVEEDOR']."</td>
            <td>".number_format($key['CANT_DISPONIBLE'], 2)."</td>
            <td class='Ancho negra'><a style='cursor:pointer;' onclick='modalABC(".'"'.$key['ARTICULO'].'"'.")'>".number_format($key['PROMEDIO'],2)."</a></td>";
            
            if ($key['Comnet0']=="")
                {echo "<td><a style='color:#4D4D4D;'>".number_format($key['PEDDCA'], 2)."</a></td>";}
            else{echo "<td><a style='color:#4D4D4D;'class='tooltipped' data-position='bottom' data-delay='50' data-tooltip='".$key['Comnet0']."'>".number_format($key['PEDDCA'], 2)."</a></td>";}
            if ($key['Comnet1']=="")
                {echo "<td><a style='color:#4D4D4D;'>".number_format($key['PEDDCA'], 2)."</a></td>";}
            else{echo "<td><a style='color:#4D4D4D;' class='tooltipped' data-position='bottom' data-delay='50' data-tooltip='".$key['Comnet0']."'>".number_format($key['PEDDCA'], 2)."</a></td>";}
            if ($key['Comnet2']=="")
                {echo "<td><a style='color:#4D4D4D;'>".$key['CTBP']."</a></td>";}
            else{echo "<td><a style='color:#4D4D4D;'
            class='tooltipped' data-position='bottom' data-delay='50' data-tooltip='".$key['Comnet2']."'>".$key['CTBP']."</a></td>";}
            if ($key['Comnet3']=="")
                {echo "<td><a style='color:#4D4D4D;'>".$key['CTTS']."</a></td>";}
            else{echo "<td><a style='color:#4D4D4D;' 
            class='tooltipped' data-position='bottom' data-delay='50' data-tooltip='".$key['Comnet3']."'>".$key['CTTS']."</a></td>";}
            if ($key['PROMEDIO']==0)
            {
            echo "<td>0.00</td>";   
            }
            else
            {
            echo "<td>".number_format($key['CANT_DISPONIBLE']/$key['PROMEDIO'],2)."</td>";
            }
            echo "   
            <td>PENDIENTE</td>        
            <td>".number_format($key['PEDDCA'],2)."</td>
            <td>PENDIENTE</td>
            <td>PENDIENTE</td>
            <td>PENDIENTE</td>
            <td>".$key['CTBP']."</td>
            <td>".$key['CTTS']."</td>
            <td>".number_format($key['ORDENAR'], 2)."</td>
            </tr>
            ";                       
        }
        ?>                         
    </tbody>

</table>
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
                <th rowspan="2">PRESENTACIÓN</th>
                <th rowspan="2">LABORATORIO</th>

                <?php for($i = 0; $i < count($meses); ++$i) {?>
                     <th colspan="4"><?php echo $meses[$i];?></th>
                  <?php }?>
                <th colspan="6"></th>
            </tr>
            <tr style="background-color:#273778;color:white;">
                <th>INST.PUB</th>
                <th>INST.PRIV</th>
                <th>FPRIVADO</th>
                <th>TOTAL</th>
                <th>INST.PUB</th>
                <th>INST.PRIV</th>
                <th>FPRIVADO</th>
                <th>TOTAL</th>
                <th>INST.PUB</th>
                <th>INST.PRIV</th>
                <th>FPRIVADO</th>
                <th>TOTAL</th>
                <th>INST.PUB</th>
                <th>INST.PRIV</th>
                <th>FPRIVADO</th>
                <th>TOTAL</th>
                <th>INST.PUB</th>
                <th>INST.PRIV</th>
                <th>FPRIVADO</th>
                <th>TOTAL</th>
                <th>INST.PUB</th>
                <th>INST.PRIV</th>
                <th>FPRIVADO</th>
                <th>TOTAL</th>
                <th>INST.PUB</th>
                <th>INST.PRIV</th>
                <th>FPRIVADO</th>
                <th>TOTAL</th>
                <th>INST.PUB</th>
                <th>INST.PRIV</th>
                <th>FPRIVADO</th>
                <th>TOTAL</th>
                <th>INST.PUB</th>
                <th>INST.PRIV</th>
                <th>FPRIVADO</th>
                <th>TOTAL</th>
                <th>INST.PUB</th>
                <th>INST.PRIV</th>
                <th>FPRIVADO</th>
                <th>TOTAL</th>
                <th>INST.PUB</th>
                <th>INST.PRIV</th>
                <th>FPRIVADO</th>
                <th>TOTAL</th>
                <th>INST.PUB</th>
                <th>INST.PRIV</th>
                <th>FPRIVADO</th>
                <th>TOTAL</th>
                <th>INST.PUB</th>
                <th>INST.PRIV</th>
                <th>FPRIVADO</th>
                <th>TOTAL</th>         
                <th>TOTAL GENERAL</th>
                <!--<th>EXISTENCIAS</th>
                <th>PROMEDIO TRES MAS ALTOS</th>
                <th>MESES DE EXISTENCIA- POR PROMEDIO DE TRES MAS ALTOS</th>
                <th>PENDIENTES INST.PUBLICA</th>
                <th>CANT. BAJO PEDIDO</th>-->
            </tr>
        </thead>
        <tbody>
            
        </tbody>    
    </table>
    </div>
  </div>

<!-- Modal Structure -->
<div id="modal1" class="modal modal-fixed-footer modalcontrato">
    <div class="modal-content">
    <div class="row center">  
    <h5 class="center" style="font-family:'robotoblack'; color:#616161"><br>CONTRATO ANUAL DE CANTIDADES</h5>  
    </div>
       <div class="row">
        <div class="col s12 l12">
            <table id="tblcontrato" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr style="background-color:#273778;color:white;">
                        <th>CAT</th>
                        <th>ARTICULO</th>
                        <th>PRESENTACION</th>
                        <th>CLASIFICACIÓN</th>
                        <th>NÓMBRE</th>
                       <?php for($i = 0; $i < count($fechas); ++$i) {?>
                        <th><?php 
                         $transf = strtotime($fechas[$i]);   
                         $mes = date("F", $transf);
                         $anio = date("Y", $transf);
                        if ($mes=="January") $mes="Enero";
                        if ($mes=="February") $mes="Febrero";
                        if ($mes=="March") $mes="Marzo";
                        if ($mes=="April") $mes="Abril";
                        if ($mes=="May") $mes="Mayo";
                        if ($mes=="June") $mes="Junio";
                        if ($mes=="July") $mes="Julio";
                        if ($mes=="August") $mes="Agosto";
                        if ($mes=="September") $mes="Septiembre";
                        if ($mes=="October") $mes="Octubre";
                        if ($mes=="November") $mes="Noviembre";
                        if ($mes=="December") $mes="Diciembre";
                        echo $mes.' '.$anio;?>
                        </th>
                        <?php }?>                       
                        <th>EXISTENCIA</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal-footer">
  <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">ACEPTAR</a>
</div>
</div>

