<?php
class Articulos extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
        $this->load->library('session');
        $this->seguridad->estactivo($this->session->userdata('logged'));
	}
    public function index()
    {
        $this->load->view('header');
        $this->load->view('dashboardclean');
        $data['AllART']=$this->Table->MASTER_ARTICULOS();
        $data['LOG']=$this->Table->restore_log();
		$this->load->view('table', $data);
        $this->load->view('footer');
    }
  
    public function UpdateRow($key,$C,$P1,$P2,$P3,$P4){
        $OK = $this->Table->Guardar($key,$C,$P1,$P2,$P3,$P4);
		
        if ($OK==1) {
		    redirect('Articulos');
		}		
    }
    public function vencidos(){
        $this->Table->vencidos();                
    }
    public function SaveComentarios($Articulo,$Comentario,$IDC){
        
        $OK = $this->Table->GuardarComentario($Articulo,$Comentario,$IDC);
        if ($OK==1) {
            redirect('Articulos');
        }
    }
    public function RestoreComentario($Articulo,$IDC){
        
        $Coment = $this->Table->RestoreComentario($Articulo,$IDC);
        echo $Coment;
               
    }
    
    public function toXLS(){
        header("Content-type: application/vnd.ms-excel; name='excel'");
        header("Content-Disposition: filename=File.xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        echo $_POST['datos_a_enviar'];
    }
    public function Detalles($IdArticulos){
        $this->load->view('header');
        $this->load->view('dashboardclean');
        $data['Bodega']     =   $this->Table->LOTES_ARTICULOS($IdArticulos);                
        $this->load->view('menudetalle',$data);
        $this->load->view('footer');
    }
    public function Consumo(){
        $this->load->view('header');        
        $this->load->view('dashboardclean');
        $data['fechas']=$this->Table->generarDates();
        $data['AllART']=$this->Table->ANALISIS_CONSUMO();
        $this->load->view('analisisconsumo', $data);
        $this->load->view('footer');
    }

    public function get_contrato($id)
    {
        $data= $this->Table->obtenercontrato($id);
        $json = array();
        $i=0;
        foreach( $data as $row){
            $json['data'][$i]['Tipo'] = $row[$i]['Tipo'];
            $json['data'][$i]['ARTICULO'] = $row[$i]['ARTICULO'];
            $json['data'][$i]['Clasificacion5'] = $row[$i]['Clasificacion5'];
            $json['data'][$i]['Clasificacion3'] = $row[$i]['Clasificacion3'];
            $json['data'][$i]['DESCRIPCION'] = $row[$i]['DESCRIPCION'];
            $json['data'][$i]['1'] = $row[$i]['1'];
            $json['data'][$i]['2'] = $row[$i]['2'];
            $json['data'][$i]['3'] = $row[$i]['3'];
            $json['data'][$i]['4'] = $row[$i]['4'];
            $json['data'][$i]['5'] = $row[$i]['5'];
            $json['data'][$i]['6'] = $row[$i]['6'];
            $json['data'][$i]['7'] = $row[$i]['7'];
            $json['data'][$i]['8'] = $row[$i]['8'];
            $json['data'][$i]['9'] = $row[$i]['9'];
            $json['data'][$i]['10'] = $row[$i]['10'];
            $json['data'][$i]['11'] = $row[$i]['11'];
            $json['data'][$i]['12'] = $row[$i]['12'];
            $json['data'][$i]['EXISTENCIA'] = $row[$i]['EXISTENCIA'];
            $i++;
        }
        echo json_encode($json);         
    }
      public function get_abc($id)
    {

    }
}