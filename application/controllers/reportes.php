<?php
class Reportes extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
        $this->load->library('session');
 		$this->load->library('MPDF/mpdf');
        //$this->seguridad->estactivo($this->session->userdata('logged'));
        $user = $this->session->userdata('logged');

           if (!isset($user)) { 
               redirect(base_url().'index.php','refresh');
           } 
	}

	public function pdfdetalle($IdArticulos)
	{

		$IdArticulos=$_POST['idreporte'];
 		$data['Bodega'] =  $this->Table->LOTES_ARTICULOS($IdArticulos);  
 		$mPDF = new mPDF('utf-8','A4');		
		$mPDF->writeHTML($this->load->view('reportes/pdfdetalle',$data,true));
		$mPDF->Output();
	}

}