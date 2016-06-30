<div class="">
<!--<iframe id="calendar"  src="<?php echo base_url("index.php/Articulos") ?>" 
    name="mipagina" width="700" height="500" framedorber="1">Tu navegador no soporta iframes</iframe>-->
<!--
PRUEBA CON IFRAME EKISDE EKISDE
    <button onClick="change()">cambiar iframe</button>-->
<script>
    function change()
    {

        loc="www.google.com";
        $('#calendar').attr('src', loc);
    }

</script>
    <div class="row menu">     
        <?php
        if (!isset($_SESSION['Permiso'])) {          
        }else{
            switch ($_SESSION['Permiso']) {
                case 1: //ADMINISTRADOR
                    echo '                          
                          
                                <div class="col offset-l4 s12 l2">
                                    <div class="card small" >
                                            <a href='.base_url("index.php/Articulos").'>
                                        <div class="card-image">
                                                <img style="margin-top:20px;" src='.base_url("assets/images/articulos-transito.png").' >
                                        </div>
                                        <div class="card-content center">
                                            <p style="color:black;">ARTICULOS & TRANSITO</p>
                                        </div>
                                            </a>
                                    </div>
                                </div>
                                <div class="col s12 l2">
                                    <div class="card small" >
                                            <a href='.base_url("index.php/Usuarios").'>
                                            <div class="card-image">
                                                <img style="margin-top:20px;" src='.base_url("assets/images/agregar-usuario.png").' >
                                            </div>
                                            <div class="card-content center">
                                                <p style="color:black;">CREACION DE USUARIO</p>
                                            </div>
                                            </a>
                                    </div>
                                </div>';
                    break;
                    case 2:
                    case 3:

                        echo '                          
                          
                                <div class="col offset-l5 s12 l2">
                                    <div class="card small" >
                                            <a href='.base_url("index.php/Articulos").'>
                                        <div class="card-image">
                                                <img style="margin-top:20px;" src='.base_url("assets/images/articulos-transito.png").' >
                                        </div>
                                        <div class="card-content center">
                                            <p style="color:black;">ARTICULOS & TRANSITO</p>
                                        </div>
                                            </a>
                                    </div>
                                </div>';
                        
                    break;
                    case 4://INSTITUCIONALES
                            echo ' 

                              <div class="row">
                                <div class="col s6">
                                    <div class="card" >
                                        <div class="card-image">
                                            <a href='.base_url("index.php/Articulos").'>
                                                <img src='.base_url("assets/img/Pills.jpg").' class="circle responsive-img">
                                            </a>
                                        </div>
                                        <div class="card-content center">
                                            <a href='.base_url("index.php/Articulos").'><p>Articulos & Transito.</p></a>                                            
                                        </div>
                                    </div>
                                </div>                   
                                <div class="col offset-l5 s12 l2">
                                    <div class="card small" >
                                     <a href='.base_url("index.php/Consumo").'>
                                        <div class="card-image">                                           
                                                <img style="margin-top:20px;" src='.base_url("assets/images/analisis.png").' >                                            
                                        </div>
                                        <div class="card-content center">
                                            <p style="color:black;">ANALISIS DE CONSUMO</p>
                                        </div>
                                        </a>
                                    </div>
                                </div>';    


                              /*    echo '<div class="col s12 m6 l3">
                            <div class="row">
                                <div class="col s6">
                                    <div class="card" >
                                        <div class="card-image">
                                            <a href='.base_url("index.php/Articulos").'>
                                                <img src='.base_url("assets/img/Pills.jpg").' class="circle responsive-img">
                                            </a>
                                        </div>
                                        <div class="card-content center">
                                            <a href='.base_url("index.php/Articulos").'><p>Articulos & Transito.</p></a>                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col s6">
                                    <div class="card" >
                                        <div class="card-image">
                                            <a href='.base_url("index.php/Consumo").'>
                                                <img src='.base_url("assets/img/Analisis.jpg").' class="circle responsive-img">
                                            </a>
                                        </div>
                                        <div class="card-content center">
                                            <a href='.base_url("index.php/Consumo").'><p>Análisis de Consumo.</p></a>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </div>';  */                  
                            
                    break;
                }
            }
        ?>

        
    </div>
</div>
