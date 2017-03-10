<?php  ini_set("memory_limit","256M");  ?>
<style>
@font-face {
    font-family: 'robotoblack';
    src: url('METRA/assets/font/roboto/roboto-black-webfont.eot');
    src: url('METRA/assets/font/roboto/roboto-black-webfont.eot?#iefix') format('embedded-opentype'),
         url('METRA/assets/font/roboto/roboto-black-webfont.woff2') format('woff2'),
         url('METRA/assets/font/roboto/roboto-black-webfont.woff') format('woff'),
         url('METRA/assets/font/roboto/roboto-black-webfont.ttf') format('truetype'),
         url('METRA/assets/font/roboto/roboto-black-webfont.svg#robotoblack') format('svg');
    font-weight: normal;
    font-style: normal;
}
@font-face {
    font-family: 'robotobold';
    src: url('/METRA/assets/font/roboto/roboto-bold-webfont.eot');
    src: url('/METRA/assets/font/roboto/roboto-bold-webfont.eot?#iefix') format('embedded-opentype'),
         url('/METRA/assets/font/roboto/roboto-bold-webfont.woff2') format('woff2'),
         url('/METRA/assets/font/roboto/roboto-bold-webfont.woff') format('woff'),
         url('/METRA/assets/font/roboto/roboto-bold-webfont.ttf') format('truetype'),
         url('/METRA/assets/font/roboto/roboto-bold-webfont.svg#robotobold') format('svg');
    font-weight: normal;
    font-style: normal;
}
@font-face {
    font-family: 'robotomedium';
    src: url('/METRA/assets/font/roboto/roboto-medium-webfont.eot');
    src: url('/METRA/assets/font/roboto/roboto-medium-webfont.eot?#iefix') format('embedded-opentype'),
         url('/METRA/assets/font/roboto/roboto-medium-webfont.woff2') format('woff2'),
         url('/METRA/assets/font/roboto/roboto-medium-webfont.woff') format('woff'),
         url('/METRA/assets/font/roboto/roboto-medium-webfont.ttf') format('truetype'),
         url('/METRA/assets/font/roboto/roboto-medium-webfont.svg#robotomedium') format('svg');
    font-weight: normal;
    font-style: normal;
}
@font-face {
    font-family: 'robotoregular';
    src: url('/METRA/assets/font/roboto/roboto-regular-webfont.eot');
    src: url('/METRA/assets/font/roboto/roboto-regular-webfont.eot?#iefix') format('embedded-opentype'),
         url('/METRA/assets/font/roboto/roboto-regular-webfont.woff2') format('woff2'),
         url('/METRA/assets/font/roboto/roboto-regular-webfont.woff') format('woff'),
         url('/METRA/assets/font/roboto/roboto-regular-webfont.ttf') format('truetype'),
         url('/METRA/assets/font/roboto/roboto-regular-webfont.svg#robotoregular') format('svg');
    font-weight: normal;
    font-style: normal;
}
.cesia{
    background-color:#c1f4ff;
}
.vivian{
    background-color: #8ede93;
}
#tbArticulos tr th {
    background-color: #253778;
    color: white;
    font-family: 'robotobold';
    border: 1px solid #94D8F2;
}

#tbArticulos tr td {
    text-align: center!important;
    font-family: 'robotoblack'!important;

}
table{
        margin: 0 auto;
    clear: both;
    border-collapse: separate;
    border-spacing: 0;
}
thead {
    border-bottom: 1px solid #d0d0d0;
    font-size: 11px;   
}
tbody{
     /*font-family: 'robotoregular'!important;   */
    font-size: 11px;    
}
#tbArticulos tr:nth-child(odd) {
    background-color: rgba(0, 0, 0, 0);
    text-align: center;
}
#tbArticulos tr td {
    padding: 1px;
    border-collapse: separate;
    border: 1px solid #28B1E7!important;
}
.negra{
    font-weight:bold;
    font-family: 'robotoblack'!important;
}
.titulos{
    font-size: 15px!important;
    /*font-family: 'robotobold'!important;*/
    padding: 10px;
}
.contenidos{

}
</style>

 <div style="text-align:center;">
    <h5 style="color:#253778; font-size:20px;" class="negra">REPORTE DE ANALISIS DE CONSUMO</h5>
  </div>

<div class="row" style="width:100%;">
    <div class="col s12 l12" style="width:100%;">  
    <table id = "tbArticulos" class="tableizer-table responsive-table"  width="100%">
        <thead>
         <tr>
            <th class="titulos" style=" color:white;">ARTICULO</th>
           <th class="titulos" style=" color:white;">DESCRIPCION</th>
           <th class="titulos" style=" color:white;">LABORATORIO</th>
           <th class="titulos" style=" color:white;">UNIDAD</th>
           <th class="titulos" style=" color:white;">PROVEEDOR</th>
           <th class="titulos" style=" color:white;">EXISTENCIAS</th>
           <th class="titulos" style=" color:white;">PROMEDIO TRES MÁS ALTOS PRIVADO</th>
           <th class="titulos" style=" color:white;">PROMEDIO TRES MÁS ALTOS INST. PUBLICO</th>
           <th class="titulos" style=" color:white;">CONTRATO ANUAL CRUZ AZUL</th>
           <th class="titulos" style=" color:white;">ENTREGA PENDIENTE CRUZ AZUL</th>
           <th class="titulos" style=" color:white;">CONSUMO INST. PUBLICO 12 MESES</th>
           <th class="titulos" style=" color:white;">ORDENADO CONTRATO CRUZ AZUL</th>
           <th class="titulos" style=" color:white;">PENDIENTE ORDENAR CRUZ AZUL</th>
           <th class="titulos" style=" color:white;">CUMPLIMIENTO CONTRATO CRUZ AZUL %</th>
           <th class="titulos" style=" color:white;">CANTIDAD BAJO PEDIDO A PROVEEDOR</th>
           <th class="titulos" style=" color:white;">CANTIDAD EN TRANSITO</th>
           <th class="titulos" style=" color:white;">MESES DE EXISTENCIA POR PROMEDIO DE TRES MAS ALTOS</th>
           <th class="titulos" style=" color:white;">INVENTARIO MINIMO (PUNTO DE RE-ORDEN)</th>
           <th class="titulos" style=" color:white;">ORDENAR</th>
           <th class="titulos" style=" color:white;">CLASIFICACIÓN</th>
           <th class="titulos" style=" color:white;">DAÑADOS Y VENCIDOS</th>
           <th class="titulos" style=" color:white;">PROMEDIO MENSUAL FARMACIA E INST.PRIVADA (ULTIMOS 12M)</th>
           <th class="titulos" style=" color:white;">PROMEDIO MENSUAL INST.PUBLICO (ULTIMOS 12M)</th>
         </tr>
     </thead>
    <tbody>
      <?php
      foreach ($AllART['Analisis'] as $key) {
          if ($key['M3_PUBLICA']=='0.00') {
          echo "<tr class='ocultar'>";
        }
        else{echo "<tr>";}
        echo "
        <td class='Ancho'>".$key['ARTICULO']."</td>
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
          echo "<td style='color:red;' class='negra'>".$key['PENDIENTE_ORDENAR_CA']."</td>";
        }else{echo "<td style='color:green;' class='negra'>".$key['PENDIENTE_ORDENAR_CA']."</td>";}
        echo "<td>".$key['CUMPLIMIENTO_CONTRATO_CA']."</td>
        <td class='vivian'>".$key['CTBP']."</td>";
        if ($key['Comnet3']=="")
          {echo "<td class='vivian'>".$key['CTTS']."</td>";}
        else{echo "<td class='vivian'><a style='color:#4D4D4D;'
        class='tooltipped' data-position='bottom' data-delay='50' data-tooltip='".$key['Comnet3']."'>".$key['CTTS']."</a></td>";}
        echo "<td>".$key['MESES_DE_EXIXTENCIA_PROMEDIO_MASALTOS']."</td>
        <td>".number_format($key['INVENTARIO_MINIMO_PUNTO_REORDEN'])."</td>";

        if ($key['ORDENAR']>$key['INVENTARIO_MINIMO_PUNTO_REORDEN']) {
          echo "<td class='red-text'>".$key['ORDENAR']."</td>";  
        }else{
          echo "<td>".$key['ORDENAR']."</td>";}

        echo"<td>".$key['CLASE_ABC']."</td>
        <td>".$key['VENCIDO']."</td>
        <td>".$key['PROMEDIO_MENSUAL_FARM_INSTPRIV']."</td>
        <td>".$key['PROMEDIO_MENSUAL_INSTPUBLICA']."</td>
        </tr>";



        /*if ($key['PROMEDIO']=='0.00') {
          echo "<tr class='ocultar'>";
        }
        else{echo "<tr>";}
        echo "<td class='Ancho'>".$key['ARTICULO']."</td>
        <td class='Ancho medium negra'>".utf8_decode($key['DESCRIPCION'])."</td>
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
       /* echo "<td class='cesia'>".$impresion1."</td>
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
       /* }
        else{
          $CONTRATO=($key['TOTAL_ANUAL_CA']+$key['PEDDCA'])-$key['CONTRATO_ANUAL'];
          $color="green";
        }
        echo "<td class='negra cesia' style='color: ".$color.";!important'>".number_format($CONTRATO,2)."</td>";
        echo "<td class='negra cesia'>".number_format($key['CONTRATO_ANUAL'],2)."</td>";
        /***************************************/
        /*CUMPLIMIENTO CA%*/
        /*if($key['CONTRATO_ANUAL']!=0)
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
        /*$ORDENAR;
        $ORDENAR=number_format(($key['CANT_DISPONIBLE']+$key['CTBP']+$key['CTTS'])-($key['PEDDCA']+$CANTIDADCA+($key['PROMEDIO']*6)));
        echo"
        <td class='Ancho negra'>".$ORDENAR."</td>
        <td class='negra'>".$key['CLASE_ABC']."</td>
        <td>".$key['VENCIDOS']."</td>
        <td>".$key['M3_PRIVADA']."</td>
        <td>".$key['M3_PUBLICA']."</td>
        <td>".$key['MINIMO_P_REORDEN']."</td>
        <td>".$key['INVENTARIO_OPTIMO']."</td>
        <td class='negra'>".$key['ORDENAR2']."</td>
        </tr>
        ";*/
      }
      ?>                         
    </tbody>
</table>
</div>
</div>
</div>
