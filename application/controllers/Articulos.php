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
        $data['meses']=$this->Table->generateMeses();
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
                $json['data'][$i]['13'] = $row[$i]['13'];                                  
                $json['data'][$i]['14'] = $row[$i]['14'];                                  
                $json['data'][$i]['15'] = $row[$i]['15'];
                $json['data'][$i]['16'] = $row[$i]['16'];
                $json['data'][$i]['17'] = $row[$i]['17'];
                $json['data'][$i]['18'] = $row[$i]['18'];
                $json['data'][$i]['19'] = $row[$i]['19'];
                $json['data'][$i]['20'] = $row[$i]['20'];
                $json['data'][$i]['21'] = $row[$i]['21'];
                $json['data'][$i]['22'] = $row[$i]['22'];
                $json['data'][$i]['29'] = $row[$i]['23'];                                
                $json['data'][$i]['23'] = $row[$i]['24'];
                $json['data'][$i]['24'] = $row[$i]['25'];
                $json['data'][$i]['25'] = $row[$i]['26'];
                $json['data'][$i]['26'] = $row[$i]['27'];
                $json['data'][$i]['27'] = $row[$i]['28'];
                $json['data'][$i]['28'] = $row[$i]['29'];                                  
                $json['data'][$i]['30'] = $row[$i]['30'];  
                $json['data'][$i]['31'] = $row[$i]['31'];
                $json['data'][$i]['32'] = $row[$i]['32'];
                $json['data'][$i]['33'] = $row[$i]['33'];
                $json['data'][$i]['34'] = $row[$i]['34'];
                $json['data'][$i]['35'] = $row[$i]['35'];
                $json['data'][$i]['36'] = $row[$i]['36'];
                $json['data'][$i]['37'] = $row[$i]['37'];
                $json['data'][$i]['38'] = $row[$i]['38'];
                $json['data'][$i]['39'] = $row[$i]['39'];
                $json['data'][$i]['40'] = $row[$i]['40'];
                $json['data'][$i]['41'] = $row[$i]['41'];
                $json['data'][$i]['42'] = $row[$i]['42'];
                $json['data'][$i]['43'] = $row[$i]['43'];                               
                $json['data'][$i]['44'] = $row[$i]['44'];                                   
                $json['data'][$i]['45'] = $row[$i]['45'];  
                $json['data'][$i]['46'] = $row[$i]['46'];
                $json['data'][$i]['47'] = $row[$i]['47'];
                $json['data'][$i]['48'] = $row[$i]['48'];
                $json['data'][$i]['49'] = $row[$i]['49'];
                $json['data'][$i]['50'] = $row[$i]['50'];
                $json['data'][$i]['51'] = $row[$i]['51'];
                $json['data'][$i]['52'] = $row[$i]['52'];
                $json['data'][$i]['TOTALGENERAL'] = $row[$i]['TOTALGENERAL'];
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