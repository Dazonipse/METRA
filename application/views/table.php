<div id= "MyBar" class="progress green" style="Display:none;">
    <div class="indeterminate blue"></div>
</div>
<?php echo"asd"; ?>
<h5 class="center" style="font-family:'robotoblack'; color:#616161"><br>PEDIDOS</h5>

<div class="row">
    <div class="col s12"> 


        <div class="row center">
            <?php
            if ((!$LOG)) {
                # code...
            } else {
                foreach ($LOG as $key ) {                
                    $retVal = (($key['Us_name'] == $_SESSION['SlpName']) ? "Mi" : $key['Us_name']);?>
                <p style="font-family:'robotomedium'; color:#616161; font-size:18px;">ULTIMA ACTUALIZACION: <code style="font-family:'robotoblack';"><?php echo $key['Date_Reg']; ?></code> REALIZADA POR: <code style="font-family:'robotoblack';"><?php echo $retVal; ?></code> </p>
               <?php }
            }      
            ?>
        </div>
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

</div>



<!--<table id = "tbArticulos" class="tableizer-table striped responsive-table">-->
<table style="width:97%;" id = "tbArticulos" class="tableizer-table striped " cellspacing="0" >
    <thead >
     <tr >
        <?php
        $sql = '<th >ARTICULO</th>
        <th  >DESCRIPCION</th>
        <th >LABORATORIO</th>
        <th >UNIDAD</th>
        <th >PROVEEDOR</th>
        <th >DISPONIBLE</th>
        <th >PROMEDIO MÁS ALTO</th>';

        switch ($_SESSION['Permiso']) {
            case 1:
            case 4:
            $sql .= "<th>PEDIDO CRUZ AZUL</th>
            <th>CONSUMO CRUZ AZUL</th>
            <th>CANTIDAD BAJO PEDIDO</th>
            <th>CANTIDAD EN TRANSITO</th>";
            break;

            case 2:
            $sql .= "
            <th>FACTOR DE EMPAQUE</th>
            <th>UNIDADES DISP.</th>
            <th>PEDIDO CRUZ AZUL</th>
            <th>CONSUMO CRUZ AZUL</th>

            ";
            break;

            case 3:
            $sql .= "                                        
            <th>CANTIDAD BAJO PEDIDO</th>
            <th>CANTIDAD EN TRANSITO</th>
            
            ";
            break;
        }

        if($_SESSION['Permiso'] <> 4){
          // $sql .= "<th>ACTUALIZAR</th>";
        }
        echo $sql;
        ?>
    </tr>
</thead>
<tfoot id="TblFiltros" >
    <tr>
        <?php
        $sql = "<th style='display:none'>ARTICULO</th>
        <th style='display:none'>DESCRIPCION</th>
        <th>LABORATORIO</th>
        <th style='display:none'>UNIDAD</th>
        <th >PROVEEDOR</th>
        <th style='display:none'>DISPONIBLE</th>";

        switch ($_SESSION['Permiso']) {
            case 1:
            case 4:
            $sql .= "<th style='display:none'>PEDIDO CRUZ AZUL</th>
            <th style='display:none'>CONSUMO CRUZ AZUL</th>
            <th style='display:none'>CANTIDAD BAJO PEDIDO</th>
            <th style='display:none'>CANTIDAD EN TRANCITO</th>";
            break;

            case 2:
            $sql .= "<th style='display:none'>FACTOR DE EMPAQUE</th>
            <th style='display:none'>UNIDADES DISP.</th>
            <th style='display:none'>PEDIDO CRUZ AZUL</th>
            <th style='display:none'>CONSUMO CRUZ AZUL</th>";
            break;

            case 3:
            $sql .= "                                        
            <th style='display:none'>CANTIDAD BAJO PEDIDO</th>
            <th style='display:none'>CANTIDAD EN TRANCITO</th>";
            break;
        }

        if($_SESSION['Permiso'] <> 4){
         //   $sql .= "<th style='display:none'>ACTUALIZAR</th>";
        }
        echo $sql;
        ?>
    </tr>
</tfoot>
<tbody>

    <?php
    foreach ($AllART as $key) {
        $sql = "<tr>
        <td class='Ancho negra'><input type='hidden' readonly value=".$key['ARTICULO']."><a style='color:black;' href='#' onclick='Deathalles(".'"'.$key['ARTICULO'].'"'.")'>".$key['ARTICULO']."</a></td>
        <td class='Ancho medium'><input type='hidden' readonly value=".$key['DESCRIPCION'].">".utf8_decode($key['DESCRIPCION'])."</td>
        <td class='Ancho'>".$key['LABORATORIO']."</td>
        <td><input type='hidden' readonly value=".$key['UNIDAD'].">".$key['UNIDAD']."</td>
        <td class='Ancho medium'>".$key['PROVEEDOR']."</td>
        <td class='Ancho'><input type='hidden' readonly value=".$key['CANT_DISPONIBLE'].">".number_format($key['CANT_DISPONIBLE'], 2)."</td>
        <td class='Ancho'><a onclick='modalABC(".'"'.$key['ARTICULO'].'"'.")'>".number_format($key['PROMEDIO'],2)."</a></td>";

        switch ($_SESSION['Permiso']) {
            case 1:
            case 4:
            $pv = ($key['PEDDCA']) ?: 0;
            $sv = ($key['CSCA']) ?: 0;
            $tv = ($key['CTBP']) ?: 0;
            $cv = ($key['CTTS']) ?: 0;

            if($_SESSION['Permiso'] == 4){
                $sql .= " 
                <td><input type='hidden' readonly value=".$pv.">".number_format($pv, 2)."</td>
                <td><input type='hidden' readonly value=".$sv.">".number_format($sv, 2)."</td>
                <td><input type='hidden' readonly value=".$tv.">".number_format($tv, 2)."</td>
                <td><input type='hidden' readonly value=".$cv.">".number_format($cv, 2)."</td>";
            }else{
                $sql .= "<td><input type='number' min='0' value=".number_format($pv, 2)." id='Row-0-".$key['FACTOREMPAQUE']."'>
                <br><a href><i onclick='MUP(".'"'.$key['ARTICULO'].'",'.'"'.$_SESSION['Permiso'].'"'.", ".'"'.$key['FACTOREMPAQUE'].'"'.")' style='font-size:30px;' class='material-icons'>sync</i></a>
                </td>
                <td><input type='number' min = '0' value=".number_format($sv, 2)." id='Row-1-".$key['FACTOREMPAQUE']."'>
                <br><a href><i onclick='MUP(".'"'.$key['ARTICULO'].'",'.'"'.$_SESSION['Permiso'].'"'.", ".'"'.$key['FACTOREMPAQUE'].'"'.")' style='font-size:30px;' class='material-icons'>sync</i></a>
                </td>
                <td><input type='number' min = '0' value=".number_format($tv, 2)." id='Row-2-".$key['FACTOREMPAQUE']."'>
                <br><a href><i onclick='MUP(".'"'.$key['ARTICULO'].'",'.'"'.$_SESSION['Permiso'].'"'.", ".'"'.$key['FACTOREMPAQUE'].'"'.")' style='font-size:30px;' class='material-icons'>sync</i></a>
                </td>
                <td><input type='number' min = '0' value=".number_format($cv, 2)." id='Row-3-".$key['FACTOREMPAQUE']."'>
                <br><a href><i onclick='MUP(".'"'.$key['ARTICULO'].'",'.'"'.$_SESSION['Permiso'].'"'.", ".'"'.$key['FACTOREMPAQUE'].'"'.")' style='font-size:30px;' class='material-icons'>sync</i></a>
                </td>";
            }

            break;
            case 2:
            $pv = ($key['PEDDCA']) ?: 0;
            $sv = ($key['CSCA']) ?: 0;
/*>>>>>>>>>>>>>>>>>>>>>ACA*/
            $sql .= "
            <td><span id='FE-".$key['ARTICULO']."'>".$key['FACTOREMPAQUE']."</span></td>
            <td>".number_format(($key['CANT_DISPONIBLE'] * $key['FACTOREMPAQUE']),2)."</td>
            <td>
            <input type='text' type='text' style='text-align:center; width:60%;' 
            onkeypress='return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 44 || event.charCode == 46 || event.charCode == 0 ' min='0'
            value=".number_format($pv, 2)." 
            id='Row-0-".$key['ARTICULO']."'>            
            <div style='display:none' id = 'DivRow-0-".$key['ARTICULO']."'><center><span>Modificado</span></center></div>
            <br><a href='#!' onclick='ModalComentarios(".'"'.$key['ARTICULO'].'"'.","."0".")'><i class='material-icons Small' style='font-size:30px;'>add_circle_outline</i></a>
            <a href><i onclick='MUP(".'"'.$key['ARTICULO'].'",'.'"'.$_SESSION['Permiso'].'"'.", ".'"'.$key['FACTOREMPAQUE'].'"'.")' style='font-size:30px;' class='material-icons'>sync</i></a>
            </td>
            <td>
            <input type='text' type='text' type='text' style='text-align:center; width:60%;'
            onkeypress='return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 44 || event.charCode == 46 || event.charCode == 0 ' min = '0'
            value=".number_format($sv, 2)." 
            id='Row-1-".$key['ARTICULO']."'>
            <div style='display:none' id = 'DivRow-1-".$key['ARTICULO']."'><center><span>Modificado</span></center></div>
            <br><a href='#!' onclick='ModalComentarios(".'"'.$key['ARTICULO'].'"'.","."1".")'><i class='material-icons Small' style='font-size:30px;'>add_circle_outline</i></a>
            <a href><i onclick='MUP(".'"'.$key['ARTICULO'].'",'.'"'.$_SESSION['Permiso'].'"'.", ".'"'.$key['FACTOREMPAQUE'].'"'.")' style='font-size:30px;' class='material-icons'>sync</i></a>
            </td>
            ";

            break;
            case 3:
            $tv = ($key['CTBP']) ?: 0;
            $cv = ($key['CTTS']) ?: 0;

            $sql .= "   
            <td>
            <div class='input-field col s12'>                                                  
            <input type='number' min = '0' value=".number_format($tv, 2)." id='Row-0-".$key['ARTICULO']."'><br>
            <a href='#!' onclick='ModalComentarios(".'"'.$key['ARTICULO'].'"'.","."2".")'><i style='font-size:30px;' class='material-icons Small'>add_circle_outline</i></a>
            </div>                                                
            </td>
            <td>
            <div class='input-field col s12'>
            <input type='number' min = '0' value=".number_format($cv, 2)." id='Row-1-".$key['ARTICULO']."'><br>
            <a href='#!' onclick='ModalComentarios(".'"'.$key['ARTICULO'].'"'.","."3".")'><i style='font-size:30px;' class='material-icons Small'>add_circle_outline</i></a>
            </div>                                                
            </td>
            ";
            break;                            
        }

        if($_SESSION['Permiso'] <> 4){
          /*  $sql .= "   
            <td>
            <button class= 'btn waves-effect waves-light red btn-floating btn-small'
            onclick='MUP(".'"'.$key['ARTICULO'].'",'.'"'.$_SESSION['Permiso'].'"'.", ".'"'.$key['ARTICULO'].'"'.")'>
            <i class='material-icons center'>send</i>
            </button>
            </td>";*/
        }

        $sql .= "</tr>";
        echo $sql;
    }
    ?>                         
</tbody>
</table>
</div>
</div>
<!-- Modal Structure -->
<div id="modal1" class="modal modal-fixed-footer" style="height:45%;">
    <div class="modal-content">
        <span style="display: none;" id="IdRowComent">000000</span>
        <h4 class="center negra" style="color: #4D4D4D">Agregar Comentarios sobre el Articulo: <span id="IdArtiComent">000000</span></h4>
        <textarea id='textarea1' class='materialize-textarea' length='450'></textarea>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat "><i class='material-icons'>close</i></a>
        <a href="#!" class="modal-action waves-effect waves-green btn-flat " onclick="SaveComentario()"><i class='material-icons'>save</i></a>

    </div>
</div>


  <!-- Modal Structure -->
  <div id="modalABC" class="modal">
    <div class="modal-content">
      <h4 class="center">Modal Header</h4>
      <table id="tableabc" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>

            </tr>
        </thead>
        <tbody>
            
        </tbody>    
    </table>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>