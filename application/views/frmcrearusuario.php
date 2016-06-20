
<div class="container">	
    <div class="row">
        <div class="col s12">
                 <h5 class="center" style="font-family:'robotoblack'; color:#616161"><br>CREACIÓN DE USUARIO</h5>
                    <div class="row">
              	        <form class="col s12" method="post" action="<?php echo base_url('index.php/GuardarUsuario');?>">              	 			      
              	            <div class="row">
                                <div class="input-field col s12">
                                    <h6 style="font-family:'robotoblack';color:#616161">NOMBRE DE USUARIO</h6>
                                    <input type="text" name="txtNombreUsuario" class="required">
                                    <label ></label>
                                </div>        
                                <?php echo form_error('txtNombreUsuario'); ?>
			                </div>
			                <div class="row">
			                    <div class="input-field col s12">
			                        <h6 style="font-family:'robotoblack';color:#616161">CONTRASEÑA</h6>
			                        <input type="password" name="txtpassword" class="validate">
			                        <?php echo form_error('txtpassword'); ?>
			                    </div>
			                </div>
			                <div class="row center" style="text-align:center; padding-left:40%;">
			                    <div class="input-field col s12">
			                        <select class="input-field" style="color:#616161; font-family:'robotoblack';" name="P1">
					                    <option value="1">Administrador</option>
                                        <option value="4">Presidencia</option>
					                    <option value="2">Institucionales</option>
					                    <option value="3">Asistente</option>
					                </select>
			                    </div>
			                </div>

			                <br>
                            <div class="center">
			      	            <button class="btn waves-effect waves-light" style="background-color:#253778;" type="submit" name="action">Guardar
				    	            <i class="material-icons right">send</i>
				  	            </button>
			      	            <a class="btn waves-effect waves-light red" href="<?php echo base_url('index.php/Usuarios')?>">
                                      <i class="material-icons left">close</i>cancelar
                                </a>
			                </div>
			            </form>
                    </div> <!-- END ROW -->
        </div> <!-- END COL -->
    </div> <!-- END ROW -->
</div> <!-- END CONTAINER -->