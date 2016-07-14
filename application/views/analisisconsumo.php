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
             <th>CANT DOCE MESES CRUZ AZUL</th>
             <th>CUMPLIMIENTO CA %</th>
             <th>PENDIENTE ORDER CA</th>
             <th>ORDENAR</th>
             <th>CLASIFICACIÓN</th>
             <th>DAÑADOS Y VENCIDOS</th>
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
                {$impresion2 = "<a style='color:#4D4D4D;'>".$key['PEDDCA']."</a>";}
            else{$impresion2 = "<a style='color:#4D4D4D;' class='tooltipped' data-position='bottom' data-delay='50' data-tooltip='".$key['Comnet1']."'>".$key['PEDDCA']."</a>";}
            
            if ($key['Comnet2']=="")
                {$impresion3 = "<a style='color:#4D4D4D;'>".$key['CTBP']."</a>";}
            else{$impresion3 = "<a style='color:#4D4D4D;'
            class='tooltipped' data-position='bottom' data-delay='50' data-tooltip='".$key['Comnet2']."'>".$key['CTBP']."</a>";}
            
            if ($key['Comnet3']=="")
                {$impresion4 = "<a style='color:#4D4D4D;'>".$key['CTTS']."</a>";}
            else{$impresion4 = "<a style='color:#4D4D4D;' 
            class='tooltipped' data-position='bottom' data-delay='50' data-tooltip='".$key['Comnet3']."'>".$key['CTTS']."</a>";}
            
            echo "<td>".$impresion1."</td>
               <td>".$impresion2."</td> 
               <td>".$impresion3."</td>
               <td>".$impresion4."</td>
            ";
            $promedio;
            if ($key['PROMEDIO']==0)
            {$promedio=0.00;  
            }
            else
            {$promedio=number_format($key['CANT_DISPONIBLE']/$key['PROMEDIO'],2);
            }
            echo "<td>".$promedio."</td>";
            echo "   
            <td>PENDIENTE</td>        
            <td>".$key['PEDDCA']."</td>";


            /*CANT DOCE MESES CA*/
          $CANTIDADCA = $key['CANT12CA'];
                   echo"<td><a style='color:#4D4D4D;' class='tooltipped' data-position='bottom' data-delay='20' data-tooltip='".$key['MENSAJE']. "'>
            ".$key['CANT12CA']."</a></td>";
            /***************************************/


            /*CUMPLIMIENTO CA%*/
            echo"
            <td>".number_format(($key['TOTAL_ANUAL_CA']+$key['PEDDCA'])*100/$key['CONTRATO_ANUAL'],1)." %</td>";
            /***************************************/

            /*PENDIENTE ORDER CA*/    
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
                /*echo " <td class='negra' style='color: green;!important'>".number_format(($key['TOTAL_ANUAL_CA']+$key['PEDDCA'])-$key['CONTRATO_ANUAL'],2)."</td> ";*/
            }
            echo "<td class='negra' style='color: ".$color.";!important'>".number_format($CONTRATO,2)."</td>";
            /********************************************************/

            /*ORDERNAR----CLASIFICACION-----DAÑADOS Y VENCIDOS*/
            $ORDENAR;
            $ORDENAR=number_format(($key['CANT_DISPONIBLE']+$key['CTBP']+$key['CTTS'])-($key['PEDDCA']+$CANTIDADCA+($key['PROMEDIO']*6)));
            echo"
            <td class='Ancho negra'>".$ORDENAR."</td>
            <td class='negra'>".$key['CLASE_ABC']."</td>
            <td>".$key['VENCIDOS']."</td>
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
              <!--  <th rowspan="2">PRESENTACIÓN</th>
                <th rowspan="2">LABORATORIO</th>-->

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
             
            </tr>
        </thead>
        <tbody>
            
        </tbody>    
    </table>
    </div>
  </div>

