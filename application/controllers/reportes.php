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
		$ignorar=$this->input->get_post('txtignorar');
		
        $data['AllART']=$this->Table->ANALISIS_CONSUMO2($articulo,$laboratorio,$proveedor,$ignorar);
        $this->load->view('analisisconsumo', $data);
     	$mPDF = new mPDF('utf-8','Legal-L');
     	$mPDF->SetFooter("Página {PAGENO} de {nb}");//PARA PONER EL NUMERO DE PAGINA EKISDE
     	$mPDF->writeHTML($this->load->view('reportes/pdfanalisisconsumo',$data,true));
		$mPDF->Output();

		//echo "articulo".$articulo." laboratorio: ".$laboratorio." proveedor: ".$proveedor;
	}
	public function ExecelConsumo()
	{
		$bandera=$_POST['bandera'];
		$articulo=$_POST['excel_articulo'];
		$laboratorio=$_POST['excel_laboratorio'];
		$proveedor=$_POST['excel_proveedor'];
		$data['fechas']=$this->Table->generarDates();
        $data['AllART']=$this->Table->ANALISIS_CONSUMO_EXCEL($bandera,$articulo,$laboratorio,$proveedor);
        $data['meses']=$this->Table->generateMeses();
        $data['laboratorios']=$this->Table->laboratorios();
        $data['proveedores']=$this->Table->proveedores();
        $this->load->view('reportes/ExcelConsumo', $data);
	}
	public function ExcelArticulos()
	{
		$data['articulos'] = $this->Table->ExcelArticulos();
		// print_r($data['articulos']);
		$this->load->view('reportes/ExcelArticulos', $data);
	}

}