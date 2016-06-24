<?php

class Usuarios extends CI_Controller
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		//$this->seguridad->estactivo($this->session->userdata('logged'));
		$user = $this->session->userdata('logged');

           if (!isset($user)) { 
               redirect(base_url().'index.php','refresh');
           } 
	}
	public function index(){
		$this->Bandeja();
	}
	public function Crear(){
		$this->load->view('header');
        $this->load->view('dashboardclean');
        $this->load->view('frmcrearusuario');
		$this->load->view('footer');
	}
	public function Bandeja(){
		$this->load->view('header');
        $this->load->view('dashboardclean');
        $data['MTUS']=$this->Users->allUser();                
		$this->load->view('tabladeusuario',$data);
		$this->load->view('footer');	
	}
	public function Eliminar($cod){		
		$data = $this->users->del($cod);
        if($data)
        {
            redirect('Usuarios');
        }        
	}
	public function Guardar(){
		$this->form_validation->set_rules('txtNombreUsuario', 'Campo', 'required');
		$this->form_validation->set_rules('txtpassword', 'Campo', 'required');
		
		if ($this->form_validation->run()== FALSE) {
			$this->Crear();
		} else {
			$name = $this->input->get_post('txtNombreUsuario');
			$Contraseña = $this->input->get_post('txtpassword');
			$Permisos = $this->input->get_post('P1');
			$OK = $this->Users->Guardar($name,$Contraseña,$Permisos);
			if ($OK==1) {
				redirect('Usuarios');
			}			
		}
	}
}