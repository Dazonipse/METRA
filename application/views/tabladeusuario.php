
<div class="container"> 
    <div class="row">
        <div class="col s12">

            <h5 class="center" style="font-family:'robotoblack'; color:#616161;font-size:35px; margin-bottom:30px;"><br>LISTADO DE USUARIO</h5>
            <div class="row">
                
                <table id="TblMaster" class="striped " >
                    <thead>
                        <tr class="tblcabecera">
                            <th style="border-radius: 20px 0px 0px 20px;">Nº</th>
                            <th>USUARIO</th>                                    
                            <th>TIPO PERMISO</th>
                            <th style="border-radius: 0px 20px 20px 0px;">OPCIÓN</th>                
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $c=1;
                        foreach ($MTUS as $key) {
                            if ($key['Privilegio'] == 1)
                                $per = "Administrador";
                            elseif ($key['Privilegio'] == 2){
                                $per = "Institucionales";
                            }elseif ($key['Privilegio'] == 3) {
                                $per = "Asistente";
                            }else{
                             $per = "Presidencia"; 
                         }
                         echo "<tr>                                    
                         <td class='regular'>".$c."</td>
                         <td class='bold'>".$key['Name']."</td>
                         <td>".$per."</td>
                         <td><a href='".base_url('Eliminar/'.$key['IdUser'].'')."'><i style='color:red; font-size:30px;' class='material-icons'>close</i></a></td>                                    
                         </tr>";
                         $c++;
                     }
                     ?>
                 </tbody> 
             </table>                

         </div> <!-- END ROW -->


     </div> <!-- END COLUMN -->
 </div> <!-- END ROW -->    
 <br>
<div class="row" style="text-align:center; padding-left:30%;">
    
    <div class="col s12 l3">
        <a  href="<?php echo base_url('index.php/Ingreso')?>">
         <img width="50px"src="<?php echo base_url('assets/images/crear.png')?>">
         <p style="font-family:'robotoblack';color:#616161;">CREAR</p>
     </a>
 </div>
 <div class="col s12 l3">
    <a href="<?php echo base_url('index.php/dashboard')?>">
     <img width="40px" src="<?php echo base_url('assets/images/cancelar.png')?>" >
     <p style="margin-top:10px;font-family:'robotoblack';color:#616161">CANCELAR</p>
 </a>
</div>
</div>
</div> <!-- END CONTAINER -->
