<?php
class Reportes extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		ini_set('memory_limit', '256M');
        $this->load->library('session');
 		$this->load->library('MPDF/mpdf');
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
	public function pdfanalisisconsumo()
	{
		$articulo=$this->input->get_post('articulo');
		$laboratorio=$this->input->get_post('laboratorio');
		$proveedor=$this->input->get_post('proveedor');
		
        $data['AllART']=$this->Table->ANALISIS_CONSUMO2($articulo,$laboratorio,$proveedor);
        $this->load->view('analisisconsumo', $data);
     	$mPDF = new mPDF('utf-8','Legal-L');
     	$mPDF->SetFooter("Página {PAGENO} de {nb}");//PARA PONER EL NUMERO DE PAGINA EKISDE
     	$mPDF->writeHTML($this->load->view('reportes/pdfanalisisconsumo',$data,true));
		$mPDF->Output();

		//echo "articulo".$articulo." laboratorio: ".$laboratorio." proveedor: ".$proveedor;
	}

}