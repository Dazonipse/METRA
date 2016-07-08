<nav>
	<div style="background-color:#253778!important;" class="nav-wrapper orange accent-4">

		<?php if ($this->uri->segment(1)=='Detalles'){ }
		else{
			?>
		<a style=" margin-top:10px;margin-left:10px;" href="<?php echo base_url('index.php/Menu')?>" class="brand-logo left"><img src="<?php echo base_url('assets/images/unimark-blanco.png')?>" width="200px"></a>
		<?php } ?>
		<?php 
		
		if ($this->uri->segment(1)=='Usuarios' or $this->uri->segment(1)=='Ingreso') {?>
	 <a  href="#" class="brand-logo center"><img style="width:75%;height:75%;" src="<?php echo base_url('assets/images/user.png')?>"></a>
				<?php } else { ?>			
		<?php }
			if ($this->uri->segment(1)=='Detalles') {?>
			<!--<a  href="#" class="brand-logo center"><img style="width:75%;height:75%;" src="<?php echo base_url('assets/images/articulo-icon-superior.png')?>"></a>-->
				<?php } 
				else {
					echo '
						<ul class="right hide-on-med-and-down">        	
							<li ><a href="'.base_url("index.php/Salir").'"><i style="font-size:40px;" class="material-icons">power_settings_new</i></a></li>  
				      	</ul> 
					';
			}?>
<?php 
if ($this->uri->segment(1)=='Articulos') {?>
					<a  href="#" class="brand-logo center"><img style="width:75%;height:75%;" src="<?php echo base_url('assets/images/articulo-icon-superior.png')?>"></a>
				<?php } 
				else {
			}?>
	</div>
</nav>