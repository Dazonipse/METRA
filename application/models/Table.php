<?php

/**
 * Created by CODE.
 * User: MUA
 * Date: 10/03/2016
 * Time: 03:26 PM
 */
class Table extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function obtenerABC($id)
    {
        $Array = $this->sqlsrv -> fetchArray("SELECT TOP 1 * FROM Softland.dbo.ALDER where ARTICULO='".$id."'",SQLSRV_FETCH_ASSOC); 
        $json = array();
        $i=0;
    }
    public function obtenercontrato($id)
    {
          $Array = $this->sqlsrv -> fetchArray("SELECT TOP 1 * FROM Softland.dbo.SP_ALDER_CLASIFICACION_ABC where ARTICULO='".$id."'",SQLSRV_FETCH_ASSOC); 
        $json = array();
        $i=0;

         if (count($Array)==0) {
                $json['data'][$i]['Tipo'] = NULL;
                $json['data'][$i]['ARTICULO'] = NULL;
                $json['data'][$i]['Clasificacion5'] = NULL;
                $json['data'][$i]['Clasificacion3'] = NULL;
                $json['data'][$i]['DESCRIPCION'] =NULL;
                $json['data'][$i]['1'] =NULL;
                $json['data'][$i]['2'] =NULL;
                $json['data'][$i]['3'] = NULL;
                $json['data'][$i]['4'] = NULL;
                $json['data'][$i]['5'] = NULL;
                $json['data'][$i]['6'] = NULL;
                $json['data'][$i]['7'] = NULL;
                $json['data'][$i]['8'] = NULL;
                $json['data'][$i]['9'] = NULL;
                $json['data'][$i]['10'] = NULL;
                $json['data'][$i]['11'] = NULL;
                $json['data'][$i]['12'] = NULL;
                $json['data'][$i]['EXISTENCIA'] = NULL;
                $i++;
        } else {
            foreach ($Array as $row) {
                $json['data'][$i]['Tipo'] = $row['Tipo'];
                $json['data'][$i]['ARTICULO'] = $row['ARTICULO'];
                $json['data'][$i]['Clasificacion5'] = $row['Clasificacion5'];
                $json['data'][$i]['Clasificacion3'] = $row['Clasificacion3'];                                  
                $json['data'][$i]['DESCRIPCION'] = $row['DESCRIPCION'];                                  
                $json['data'][$i]['1'] = number_format($row['1'],2);                                  
                $json['data'][$i]['2'] = number_format($row['2'],2);                                  
                $json['data'][$i]['3'] = number_format($row['3'],2);
                $json['data'][$i]['4'] = number_format($row['4'],2);
                $json['data'][$i]['5'] = number_format($row['5'],2);
                $json['data'][$i]['6'] = number_format($row['6'],2);
                $json['data'][$i]['7'] = number_format($row['7'],2);
                $json['data'][$i]['8'] = number_format($row['8'],2);
                $json['data'][$i]['9'] = number_format($row['9'],2);
                $json['data'][$i]['10'] = number_format($row['10'],2);
                $json['data'][$i]['11'] = number_format($row['11'],2);
                $json['data'][$i]['12'] = number_format($row['12'],2);
                $json['data'][$i]['EXISTENCIA'] = number_format($row['EXISTENCIA'],2);
                $i++;
            }
        }
        $this->sqlsrv->close();
        return $json;
    }


/**********metodo para generar las cabeceras de la tabla en el modal, solo el mes y año by ALDER*/
    public function generarDates()
    {
    $fechauno=date('d-m-Y');
     $pila = array();  
     $fechaaamostar =$fechauno;
     array_push($pila, date("d-m-Y", strtotime($fechaaamostar)));
     for ($i=1; $i <12 ; $i++) { 
         
        $fechaaamostar = date("d-m-Y", strtotime($fechaaamostar . " - 1 month"));
        array_push($pila, $fechaaamostar);            
     }
    return $pila;
    }


    public function FechadeVencimiento($Pro,$Lote){
        $Array = $this->sqlsrv -> fetchArray("SELECT  CONVERT(CHAR, Softland.umk.LOTE.FECHA_VENCIMIENTO, 101) AS FECHA_VENCIMIENTO FROM Softland.umk.LOTE where ARTICULO='".$Pro."' and LOTE='".$Lote."'",SQLSRV_FETCH_ASSOC); 
        foreach ($Array as $row) {
           return $row['FECHA_VENCIMIENTO'];
        }
        return 0;
    }
    public function FechadeIngreso($Pro,$Lote){
        $Array = $this->sqlsrv -> fetchArray("SELECT  CONVERT(CHAR,FECHA_CRM, 101) AS FECHA_ENTRADA FROM WEB_Lotes_Embarque where ARTICULO='".$Pro."' and LOTE='".$Lote."'",SQLSRV_FETCH_ASSOC); 
        $FD="00/00/00";
        foreach ($Array as $row) {
           $FD = $row['FECHA_ENTRADA'];
        }
        return $FD;
    }
    
    public function CantidadIngreso($Pro,$Lote){
        $Array = $this->sqlsrv -> fetchArray("SELECT  CANTIDAD_ACEPTADA FROM WEB_Lotes_Embarque where ARTICULO='".$Pro."' and LOTE='".$Lote."'",SQLSRV_FETCH_ASSOC); 
        $FD="0.00";
        foreach ($Array as $row) {
           $FD= $row['CANTIDAD_ACEPTADA'];
        }
        return number_format($FD,2);      
    }
    public function vencidos(){        
        
        $query = $this->db->query('SELECT ARTICULO,COUNT(LOTE) AS MyC,GROUP_CONCAT(CONCAT("'."'".'",LOTE,"'."'".'")) as G  FROM lotesvendidos GROUP BY ARTICULO');
        $I=1;
        if ($query->num_rows() <> 0) {
            foreach ($query->result_array() as $Row) {
                $sqlsTRS ="SELECT ARTICULO,COUNT(LOTE) AS SqlC FROM dbo.WEB_DANADO_VENCIDO WHERE ARTICULO ='".$Row['ARTICULO']."' GROUP BY ARTICULO";
                $Array = $this->sqlsrv -> fetchArray($sqlsTRS,SQLSRV_FETCH_ASSOC);         
                
                if (count($Array) <> 0) {                    
                    foreach ($Array as $key) {
                        //echo $Row['MyC'] .'Diferente de esto '.$key['SqlC'].'<br>';
                        if ($key['SqlC'] > $Row['MyC']  ) {
                            $Difere = ($key['SqlC'] - $Row['MyC']);
                            //echo $I++.'.-'.$key['ARTICULO'].' : '.$Difere.'<br>';
                            $arr[] = $Difere;
                            
                            //echo $I++.'.-'.$key['ARTICULO'].'---'.$key['SqlC'].'---'.$Row['G'].'<br>';
                            /*$sqlsTRS ="SELECT  * FROM dbo.WEB_DANADO_VENCIDO WHERE ARTICULO ='".$key['ARTICULO']."' AND LOTE NOT IN (".$Row['G'].")";
                            $Array = $this->sqlsrv -> fetchArray($sqlsTRS,SQLSRV_FETCH_ASSOC);         
                            
                            if (count($Array) <> 0) {
                                
                                foreach ($Array as $key) {
                                    echo $I++.'.-'.$key['ARTICULO'].'---'.$key['LOTE'].'<br>';
                                }
                                
                            }*/
                        }
                        
                    }
                    
                }
            }
        }
        echo array_sum($arr);
      /*  $query = $this->db->query('SELECT ARTICULO,GROUP_CONCAT(CONCAT("'."'".'",LOTE,"'."'".'")) as G  FROM lotesvendidos GROUP BY ARTICULO');
        $I=1;
        if($query->num_rows() <> 0){                        
            foreach ($query->result_array() as $key) {        
                
                $sqlsTRS ="SELECT  * FROM dbo.WEB_DANADO_VENCIDO WHERE ARTICULO ='".$key['ARTICULO']."' AND LOTE NOT IN (".$key['G'].")";
                $Array = $this->sqlsrv -> fetchArray($sqlsTRS,SQLSRV_FETCH_ASSOC);         
                
                if (count($Array) <> 0) {
                    
                    foreach ($Array as $key) {
                        echo $I++.'.-'.$key['ARTICULO'].'---'.$key['LOTE'].'<br>';
                    }
                    
                }
                //echo $sqlsTRS.'<br>';
                
            }
        }
        //echo $I;
       /* $Array = $this->sqlsrv -> fetchArray("SELECT  * FROM dbo.WEB_DANADO_VENCIDO",SQLSRV_FETCH_ASSOC);
        $i=0;
        foreach ($Array as $key ) {
            $this->db->where('LOTE', $key['LOTE']);
            $this->db->where('ARTICULO', $key['ARTICULO']);
            $query = $this->db->get('lotesvendidos');
            if($query->num_rows() <> 0){            
                # code...
            }else{
                $i++;
            }
        }
        echo $i;   */     
        $this->sqlsrv->close();
        
    }
    public function LOTES_ARTICULOS($id){
      
        //CANTIDAD DE EXISTENTE DE PRODUCTO REAL
        $Array = $this->sqlsrv -> fetchArray("SELECT  * FROM dbo.View_Lotes_UMK where ARTICULO='".$id."'",SQLSRV_FETCH_ASSOC); 
        $json = array();
        $i=0;

        if (count($Array)==0) {
                $json['BodegaReal'][$i]['NAME'] = "";
                $json['BodegaReal'][$i]['ARTICULO'] = "";
                $json['BodegaReal'][$i]['BODEGA'] = "";
                $json['BodegaReal'][$i]['CANT_DISPONIBLE'] = "";
                $json['BodegaReal'][$i]['CANT_RESERVADA'] ="";
                $json['BodegaReal'][$i]['CANT_NO_APROBADA'] ="";
                $json['BodegaReal'][$i]['CANT_VENCIDA'] ="";
                $json['BodegaReal'][$i]['CANT_REMITIDA'] = "";
                $i++;
        } else {
            foreach ($Array as $row) {
                $json['BodegaReal'][$i]['NAME'] = $row['NAME'];
                $json['BodegaReal'][$i]['ARTICULO'] = $row['ARTICULO'];
                $json['BodegaReal'][$i]['BODEGA'] = $row['BODEGA'].' - '.$row['NOMBRE'];
                $json['BodegaReal'][$i]['CANT_DISPONIBLE'] = number_format($row['CANT_DISPONIBLE'],2);                                  
                $json['BodegaReal'][$i]['CANT_RESERVADA'] = number_format($row['CANT_RESERVADA'],2);                                  
                $json['BodegaReal'][$i]['CANT_NO_APROBADA'] = number_format($row['CANT_NO_APROBADA'],2);                                  
                $json['BodegaReal'][$i]['CANT_VENCIDA'] = number_format($row['CANT_VENCIDA'],2);                                  
                $json['BodegaReal'][$i]['CANT_REMITIDA'] = number_format($row['CANT_REMITIDA'],2);               
                $i++;
            }
        }
        //CANTIDAD EXISTENTE EN EL PRODUCTO BONIDICADO
        $Array = $this->sqlsrv -> fetchArray("SELECT  * FROM dbo.View_Lotes_UMK where ARTICULO='".$id."-B'",SQLSRV_FETCH_ASSOC); 
        if (count($Array)==0) {
                $json['BodegaBoni'][$i]['BODEGA'] = "";
                $json['BodegaBoni'][$i]['CANT_DISPONIBLE'] = "";                                  
                $json['BodegaBoni'][$i]['CANT_RESERVADA'] = "";                                  
                $json['BodegaBoni'][$i]['CANT_NO_APROBADA'] = "";                                  
                $json['BodegaBoni'][$i]['CANT_VENCIDA'] = "";                                  
                $json['BodegaBoni'][$i]['CANT_REMITIDA'] ="";               
        } else {
            foreach ($Array as $rowbONI) {
                $json['BodegaBoni'][$i]['BODEGA'] = $rowbONI['BODEGA'].' - '.$rowbONI['NOMBRE'];
                $json['BodegaBoni'][$i]['CANT_DISPONIBLE'] = number_format($rowbONI['CANT_DISPONIBLE'],2);                                  
                $json['BodegaBoni'][$i]['CANT_RESERVADA'] = number_format($rowbONI['CANT_RESERVADA'],2);                                  
                $json['BodegaBoni'][$i]['CANT_NO_APROBADA'] = number_format($rowbONI['CANT_NO_APROBADA'],2);                                  
                $json['BodegaBoni'][$i]['CANT_VENCIDA'] = number_format($rowbONI['CANT_VENCIDA'],2);                                  
                $json['BodegaBoni'][$i]['CANT_REMITIDA'] = number_format($rowbONI['CANT_REMITIDA'],2);               
                $i++;
            }
        }
        //DETALLE DE LOTES
        $Array = $this->sqlsrv -> fetchArray("SELECT  * FROM Softland.umk.EXISTENCIA_LOTE where ARTICULO='".$id."' and BODEGA <>'004'",SQLSRV_FETCH_ASSOC); 
        if (count($Array)==0) {
                $json['ExiLote'][$i]['FECHA_VENCIMIENTO'] ="";
                $json['ExiLote'][$i]['LOTE'] = "";;
                $json['ExiLote'][$i]['CANT_DISPONIBLE'] = "";
                $json['ExiLote'][$i]['BODEGA'] ="";
                $json['ExiLote'][$i]['FI'] = "";
                $json['ExiLote'][$i]['CI'] = "";
        } else {
            foreach ($Array as $row) {
                $json['ExiLote'][$i]['FECHA_VENCIMIENTO'] = $this -> FechadeVencimiento($id,$row['LOTE']);
                $json['ExiLote'][$i]['LOTE'] = $row['LOTE'];
                $json['ExiLote'][$i]['CANT_DISPONIBLE'] = number_format($row['CANT_DISPONIBLE'],2);
                $json['ExiLote'][$i]['BODEGA'] = $row['BODEGA'];
                $json['ExiLote'][$i]['FI'] = $this -> FechadeIngreso($id,$row['LOTE']);
                $json['ExiLote'][$i]['CI'] = $this -> CantidadIngreso($id,$row['LOTE']);
                $i++;
            }
        }
        
        

        //DETALLE DE LOTES ARTICULOS BONIFICADOS
        $Array = $this->sqlsrv -> fetchArray("SELECT  * FROM Softland.umk.EXISTENCIA_LOTE where ARTICULO='".$id."-B' and BODEGA <>'004'",SQLSRV_FETCH_ASSOC); 
        if (count($Array)==0) {            
                $json['ExiLoteboni'][$i]['FECHA_VENCIMIENTO'] = "";
                $json['ExiLoteboni'][$i]['LOTE'] = "";
                $json['ExiLoteboni'][$i]['CANT_DISPONIBLE'] ="";
                $json['ExiLoteboni'][$i]['BODEGA'] = "";
                $json['ExiLoteboni'][$i]['FI'] = "";
                $json['ExiLoteboni'][$i]['CI'] = "";
        } else {
            foreach ($Array as $row) {
                $json['ExiLoteboni'][$i]['FECHA_VENCIMIENTO'] = $this -> FechadeVencimiento($id,$row['LOTE']);
                $json['ExiLoteboni'][$i]['LOTE'] = $row['LOTE'];
                $json['ExiLoteboni'][$i]['CANT_DISPONIBLE'] = number_format($row['CANT_DISPONIBLE'],2);
                $json['ExiLoteboni'][$i]['BODEGA'] = $row['BODEGA'];                
                $json['ExiLoteboni'][$i]['FI'] = $this -> FechadeIngreso($id,$row['LOTE']);
                $json['ExiLoteboni'][$i]['CI'] = $this -> CantidadIngreso($id,$row['LOTE']);
                $i++;
            }
        }

        //DETALLE DE LOTES VENCIDOS        
        $this->db->where('ARTICULO', $id);
        $query = $this->db->get('lotesvendidos');
        if (count($Array)==0) {            
                $json['LotesVenci'][$i]['ARTICULO'] = "";
                $json['LotesVenci'][$i]['DESCRIPCION'] = "";
                $json['LotesVenci'][$i]['CATEGORIA'] ="";
                $json['LotesVenci'][$i]['LAB'] = "";
                $json['LotesVenci'][$i]['CLASETER'] = "";
                $json['LotesVenci'][$i]['BODEGA'] = "";
                $json['LotesVenci'][$i]['LOTE'] = "";
                $json['LotesVenci'][$i]['FECHA_VENCIMIENTO'] = "";
                $json['LotesVenci'][$i]['CANT_DISPONIBLE'] = "";
                $json['LotesVenci'][$i]['FECHA_ENTRADA'] = "";
                $json['LotesVenci'][$i]['CANTIDAD_INGRESADA'] = "";
        } else {
            foreach ($query->result_array() as $row) {
                $json['LotesVenci'][$i]['ARTICULO'] = $row['ARTICULO'];
                $json['LotesVenci'][$i]['DESCRIPCION'] = $row['DESCRIPCION'];
                $json['LotesVenci'][$i]['CATEGORIA'] =$row['CATEGORIA'];
                $json['LotesVenci'][$i]['LAB'] = $row['LAB'];
                $json['LotesVenci'][$i]['CLASETER'] = $row['CLASETER'];
                $json['LotesVenci'][$i]['BODEGA'] = $row['BODEGA'];
                $json['LotesVenci'][$i]['LOTE'] = $row['LOTE'];
                $json['LotesVenci'][$i]['FECHA_VENCIMIENTO'] = $row['FECHA_VENCIMIENTO'];
                $json['LotesVenci'][$i]['CANT_DISPONIBLE'] = $row['CANT_DISPONIBLE'];
                $json['LotesVenci'][$i]['FECHA_ENTRADA'] = $row['FECHA_ENTRADA'];
                $json['LotesVenci'][$i]['CANTIDAD_INGRESADA'] = $row['CANTIDAD_INGRESADA'];
                $i++;
            }
        }
        
        

        $this->sqlsrv->close();
        return $json;

    }
    public function MASTER_ARTICULOS(){        
        //$this->db->order_by('DESCRIPCION', 'ASC');
        $this->db->limit(5);
        $query = $this->db->get('masterarticulos');
        if($query->num_rows() <> 0){            
            return $query->result_array();
        }
        return 0;
    }
    public function ANALISIS_CONSUMO(){        
        
        $query = $this->db->query("SELECT * FROM view_analisis_consumo");
        $json = array();
        $i=0;
        if($query->num_rows() <> 0){            
             
                foreach ($query->result_array() as $row){      
                    $json['Analisis'][$i]['ARTICULO'] = $row['ARTICULO'];
                    $json['Analisis'][$i]['DESCRIPCION'] = $row['DESCRIPCION'];
                    $json['Analisis'][$i]['LABORATORIO'] = $row['LABORATORIO'];
                    $json['Analisis'][$i]['UNIDAD'] = $row['UNIDAD'];
                    $json['Analisis'][$i]['PROVEEDOR'] =$row['PROVEEDOR'];
                    $json['Analisis'][$i]['CANT_DISPONIBLE'] =$row['CANT_DISPONIBLE'];
                    $json['Analisis'][$i]['PROMEDIO'] =$row['PROMEDIO'];
                    $json['Analisis'][$i]['PEDDCA'] = $row['PEDDCA'];
                    $json['Analisis'][$i]['CSCA'] = $row['CSCA'];
                    $json['Analisis'][$i]['Comnet0'] = $row['Comnet0'];
                    $json['Analisis'][$i]['Comnet1'] = $row['Comnet1'];
                    $json['Analisis'][$i]['Comnet2'] = $row['Comnet2'];
                    $json['Analisis'][$i]['Comnet3'] = $row['Comnet3'];

                   /* $Coment0 = $this ->RestoreComentario ($row['ARTICULO'],0);                    
                    if ($Coment0 <> "") {
                        $json['Analisis'][$i]['CTBP'] = "<a class='tooltipped' data-position='top' data-delay='50' data-tooltip='".$Coment0."'>".number_format($row['CTBP'], 2)."</a>";
                    } else {*/
                        $json['Analisis'][$i]['CTBP'] = number_format($row['CTBP'], 2);
                   /* }
                    $Coment1 = $this ->RestoreComentario ($row['ARTICULO'],1);                    
                    if ($Coment1 <> "") {
                        $json['Analisis'][$i]['CTTS'] = "<a class='tooltipped' data-position='top' data-delay='50' data-tooltip='".$Coment1."'>".number_format($row['CTTS'], 2)."</a>";
                    } else {*/
                        $json['Analisis'][$i]['CTTS'] = number_format($row['CTTS'], 2);
                   // }
                    $json['Analisis'][$i]['ORDENAR'] = $row['ORDENAR'];
                    $i++;   
                }
             
        } else {   
                $json['Analisis'][$i]['ARTICULO'] = "";
                $json['Analisis'][$i]['DESCRIPCION'] = "";
                $json['Analisis'][$i]['LABORATORIO'] = "";
                $json['Analisis'][$i]['UNIDAD'] = "";
                $json['Analisis'][$i]['PROVEEDOR'] ="";
                $json['Analisis'][$i]['CANT_DISPONIBLE'] ="";
                $json['Analisis'][$i]['PROMEDIO'] ="";
                $json['Analisis'][$i]['PEDDCA'] = "";
                $json['Analisis'][$i]['CSCA'] = "";
                $json['Analisis'][$i]['CTBP'] = "";
                $json['Analisis'][$i]['CTTS'] = "";
                $json['Analisis'][$i]['Comnet0'] = "";
                $json['Analisis'][$i]['Comnet1'] = "";
                $json['Analisis'][$i]['Comnet2'] = "";
                $json['Analisis'][$i]['Comnet3'] = "";
                $json['Analisis'][$i]['ORDENAR'] = "";        
        }
        
       
        return $json;
    }
    
    
    public function Guardar($Key,$C,$P1,$P2,$P3,$P4){
        if ($C == 1){
            $data = array(
                    'PEDDCA' => $P1,
                    'CSCA' =>  $P2,
                    'CTBP' => $P3,
                    'CTTS' =>  $P4
                );
        }elseif ($C == 2){
                $data = array(
                    'PEDDCA' => $P1,
                    'CSCA' =>  $P2
                );
            }elseif ($C == 3){
                $data = array(
                    'CTBP' => $P1,
                    'CTTS' =>  $P2
                );
        }
        
        $this->db->where('ARTICULO', $Key);
        $update=$this->db->update('masterarticulos', $data);

        $this ->log();
        if($update){
            return 1;
        }
        return 0;
    }
    public function GuardarComentario($Arti,$Coment,$IDC){
        $this->db->where('ARTICULO', $Arti);
        $query = $this->db->get('comentarios');

        if($query->num_rows() > 0){         

                if ($IDC == 0) {
                   $data = array(
                        'Comnet0' =>  base64_decode($Coment)
                    );  
                }
                if ($IDC == 1) {
                    $data = array(
                        'Comnet1' =>  base64_decode($Coment)
                    );        
                }
                if ($IDC == 2) {
                    $data = array(
                        'Comnet2' =>  base64_decode($Coment)
                    );        
                }
                 if ($IDC == 3) {
                    $data = array(
                        'Comnet3' =>  base64_decode($Coment)
                    );        
                }               
                
                $this->db->where('ARTICULO', $Arti);
                $Accion=$this->db->update('comentarios', $data);
            } else {

                if ($IDC == 0) {
                    $data = array(
                        'Articulo' => $Arti,
                        'Comnet0' =>  base64_decode($Coment)
                    );        
                }
                if ($IDC == 1) {
                    $data = array(
                        'Articulo' => $Arti,
                        'Comnet1' =>  base64_decode($Coment)
                    );        
                }
                if ($IDC == 2) {
                    $data = array(
                        'Articulo' => $Arti,
                        'Comnet1' =>  base64_decode($Coment)
                    );        
                }

                if ($IDC == 3) {
                    $data = array(
                        'Articulo' => $Arti,
                        'Comnet3' =>  base64_decode($Coment)
                    );        
                }
                
                $Accion= $this->db->insert('comentarios', $data);

        }
        $this ->log();
        if($Accion){
            return 1;
        }
        return 0;
    }
    public function RestoreComentario($Articulo,$IDC){
        

        $query = $this->db->query("SELECT * FROM comentarios WHERE Articulo='".$Articulo."'");
        $com="";
        if($query->num_rows() <> 0){            
            foreach ($query->result_array() as $row)
            {                
                    if ($IDC ==0) {
                        $com = $row['Comnet0'];
                    } if ($IDC == 1) {
                        $com = $row['Comnet1'];
                    }
                    if ($IDC == 2) {
                        $com = $row['Comnet2'];
                    }
                    if ($IDC == 3) {
                        $com = $row['Comnet3'];
                    }
                    
            }
        }
        return $com;

    }
    public function LOG()
    {
        $this->db->where('Grupo', $_SESSION['Permiso']);
        $query = $this->db->get('log_transac');

        if($query->num_rows() > 0){         

                    $data = array(                        
                        'Grupo' =>  $_SESSION['Permiso'],
                        'Us_name' =>  $_SESSION['SlpName'],
                        'Date_Reg' =>  date("Y-m-d h:i:s")
                    );        
                
                
                $this->db->where('Grupo', $_SESSION['Permiso']);
                $Accion=$this->db->update('log_transac', $data);
            } else {

                $data = array(
                    'Grupo' =>  $_SESSION['Permiso'],
                    'Us_name' =>  $_SESSION['SlpName'],
                    'Date_Reg' =>  date("Y-m-d h:i:s")
                );
                
                $Accion= $this->db->insert('log_transac', $data);

        }
    }
    public function restore_log()
    {
        $this->db->where('Grupo', $_SESSION['Permiso']);
        $query = $this->db->get('log_transac');
        if($query->num_rows() <> 0){            
            return $query->result_array();
        }
        return 0;
    }
}