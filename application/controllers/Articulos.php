<?php
class Articulos extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
        $this->load->library('session');
       // $this->seguridad->estactivo($this->session->userdata('logged'));
        $user = $this->session->userdata('logged');

           if (!isset($user)) { 
               redirect(base_url().'index.php','refresh');
           } 
	}
    public function index()
    {
        $this->load->view('header');
        $this->load->view('dashboardclean');
        $data['AllART']=$this->Table->MASTER_ARTICULOS();
        $data['meses']=$this->Table->generateMeses();
        $data['LOG']=$this->Table->restore_log();
		$this->load->view('table', $data);
        $this->load->view('footer');
    }
  
    public function UpdateRow($key,$C,$P1,$P2,$P3,$P4,$P5){
        $OK = $this->Table->Guardar($key,$C,$P1,$P2,$P3,$P4,$P5);
		
        if ($OK==1) {
		    redirect('Articulos','refresh');
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
        $data['Bodega'] = $this->Table->LOTES_ARTICULOS($IdArticulos);                
        $this->load->view('menudetalle',$data);
        $this->load->view('footer');
    }
    public function Consumo(){
        $this->load->view('header');        
        $this->load->view('dashboardclean');
        $data['fechas']=$this->Table->generarDates();
        $data['AllART']=$this->Table->ANALISIS_CONSUMO();
        $data['meses']=$this->Table->generateMeses();
        $data['laboratorios']=$this->Table->laboratorios();
        $data['proveedores']=$this->Table->proveedores();
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
         $data= $this->Table->obtenerABC($id);
         $json = array();
        $i=0;
        foreach( $data as $row){
                $json['data'][$i]['ARTICULO'] = $row[$i]['ARTICULO'];
                $json['data'][$i]['DESCRIPCION'] = $row[$i]['DESCRIPCION'];
                $json['data'][$i]['PRESENTACION'] = $row[$i]['PRESENTACION'];                                  
                $json['data'][$i]['LABORATORIO'] = $row[$i]['LABORATORIO'];                                  
        /**/    $json['data'][$i]['1'] = '<div class="INSTPRIV"><p>'.$row[$i]['1'].'</p></div>';
                $json['data'][$i]['2'] = '<div class="FPRIVADO"><p>'.$row[$i]['2'].'</p></div>';
                $json['data'][$i]['3'] = '<div class="INSTPUB"><p>'.$row[$i]['3'].'</p></div>';
                $json['data'][$i]['4'] = '<div class="totales"><p class="bold">'.$row[$i]['4'].'</p></div>'; /**/
                $json['data'][$i]['5'] = '<div class="INSTPRIV"><p>'.$row[$i]['5'].'</p></div>';
                $json['data'][$i]['6'] = '<div class="FPRIVADO"><p>'.$row[$i]['6'].'</p></div>';
                $json['data'][$i]['7'] = '<div class="INSTPUB"><p>'.$row[$i]['7'].'</p></div>';
                $json['data'][$i]['8'] = '<div class="totales"><p class="bold">'.$row[$i]['8'].'</p></div>';
                $json['data'][$i]['9'] = '<div class="INSTPRIV"><p>'.$row[$i]['9'].'</p></div>';
                $json['data'][$i]['10'] = '<div class="FPRIVADO"><p>'.$row[$i]['10'].'</p></div>';
                $json['data'][$i]['11'] = '<div class="INSTPUB"><p>'.$row[$i]['11'].'</p></div>';
                $json['data'][$i]['12'] = '<div class="totales"><p class="bold">'.$row[$i]['12'].'</p></div>';
                $json['data'][$i]['13'] = '<div class="INSTPRIV"><p>'.$row[$i]['13'].'</p></div>';
                $json['data'][$i]['14'] = '<div class="FPRIVADO"><p>'.$row[$i]['14'].'</p></div>';
                $json['data'][$i]['15'] = '<div class="INSTPUB"><p>'.$row[$i]['15'].'</p></div>';
                $json['data'][$i]['16'] = '<div class="totales"><p class="bold">'.$row[$i]['16'].'</p></div>';
                $json['data'][$i]['17'] = '<div class="INSTPRIV"><p>'.$row[$i]['17'].'</p></div>';
                $json['data'][$i]['18'] = '<div class="FPRIVADO"><p>'.$row[$i]['18'].'</p></div>';
                $json['data'][$i]['19'] = '<div class="INSTPUB"><p>'.$row[$i]['19'].'</p></div>';
                $json['data'][$i]['20'] = '<div class="totales"><p class="bold">'.$row[$i]['20'].'</p></div>';
                $json['data'][$i]['21'] = '<div class="INSTPRIV"><p>'.$row[$i]['21'].'</p></div>';
                $json['data'][$i]['22'] = '<div class="FPRIVADO"><p>'.$row[$i]['22'].'</p></div>';
                $json['data'][$i]['23'] = '<div class="INSTPUB"><p>'.$row[$i]['23'].'</p></div>';
                $json['data'][$i]['24'] = '<div class="totales"><p class="bold">'.$row[$i]['24'].'</p></div>';
                $json['data'][$i]['25'] = '<div class="INSTPRIV"><p>'.$row[$i]['25'].'</p></div>';
                $json['data'][$i]['26'] = '<div class="FPRIVADO"><p>'.$row[$i]['26'].'</p></div>';
                $json['data'][$i]['27'] = '<div class="INSTPUB"><p>'.$row[$i]['27'].'</p></div>';
                $json['data'][$i]['28'] = '<div class="totales"><p class="bold">'.$row[$i]['28'].'</p></div>';
                $json['data'][$i]['29'] = '<div class="INSTPRIV"><p>'.$row[$i]['29'].'</p></div>';                                  
                $json['data'][$i]['30'] = '<div class="FPRIVADO"><p>'.$row[$i]['30'].'</p></div>';
                $json['data'][$i]['31'] = '<div class="INSTPUB"><p>'.$row[$i]['31'].'</p></div>';
                $json['data'][$i]['32'] = '<div class="totales"><p class="bold">'.$row[$i]['32'].'</p></div>';
                $json['data'][$i]['33'] = '<div class="INSTPRIV"><p>'.$row[$i]['33'].'</p></div>';
                $json['data'][$i]['34'] = '<div class="FPRIVADO"><p>'.$row[$i]['34'].'</p></div>';
                $json['data'][$i]['35'] = '<div class="INSTPUB"><p>'.$row[$i]['35'].'</p></div>';
                $json['data'][$i]['36'] = '<div class="totales"><p class="bold">'.$row[$i]['36'].'</p></div>';
                $json['data'][$i]['37'] = '<div class="INSTPRIV"><p>'.$row[$i]['37'].'</p></div>';
                $json['data'][$i]['38'] = '<div class="FPRIVADO"><p>'.$row[$i]['38'].'</p></div>';
                $json['data'][$i]['39'] = '<div class="INSTPUB"><p>'.$row[$i]['39'].'</p></div>';
                $json['data'][$i]['40'] = '<div class="totales"><p class="bold">'.$row[$i]['40'].'</p></div>';
                $json['data'][$i]['41'] = '<div class="INSTPRIV"><p>'.$row[$i]['41'].'</p></div>';
                $json['data'][$i]['42'] = '<div class="FPRIVADO"><p>'.$row[$i]['42'].'</p></div>';
                $json['data'][$i]['43'] = '<div class="INSTPUB"><p>'.$row[$i]['43'].'</p></div>';
                $json['data'][$i]['44'] = '<div class="totales"><p class="bold">'.$row[$i]['44'].'</p></div>';                                
                $json['data'][$i]['45'] = '<div class="INSTPRIV"><p>'.$row[$i]['45'].'</p></div>';  
                $json['data'][$i]['46'] = '<div class="FPRIVADO"><p>'.$row[$i]['46'].'</p></div>';
                $json['data'][$i]['47'] = '<div class="INSTPUB"><p>'.$row[$i]['47'].'</p></div>';
                $json['data'][$i]['48'] = '<div class="totales"><p class="bold">'.$row[$i]['48'].'</p></div>';
                $json['data'][$i]['49'] = '<div class="INSTPRIV"><p>'.$row[$i]['49'].'</p></div>';
                $json['data'][$i]['50'] = '<div class="FPRIVADO"><p>'.$row[$i]['50'].'</p></div>';
                $json['data'][$i]['51'] = '<div class="INSTPUB"><p>'.$row[$i]['51'].'</p></div>';
                $json['data'][$i]['52'] = '<div class="totales"><p class="bold">'.$row[$i]['52'].'</p></div>';
                $json['data'][$i]['TOTALGENERAL'] ='<div class="totales2"><p class="negra">'.$row[$i]['TOTALGENERAL'].'</p></div>';
                /*$json['data'][$i]['EXISTENCIA'] = $row[$i]['EXISTENCIA'];
                $json['data'][$i]['PROMEDIO3MESES'] = $row[$i]['PROMEDIO3MESES'];
                $json['data'][$i]['MESESEXISTENCIA'] = $row[$i]['MESESEXISTENCIA'];
                $json['data'][$i]['PDA'] = $row[$i]['PDA'];
                $json['data'][$i]['CTBP'] = $row[$i]['CTBP'];*/
            $i++;
        }
        echo json_encode($json);         
    }
}