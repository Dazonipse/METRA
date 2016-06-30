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
        $Array = $this->sqlsrv -> fetchArray("EXEC Softland.dbo.SP_ALDER_CLASIFICACION_ABC '".$id."'",SQLSRV_FETCH_ASSOC); 
        $json = array();
        $i=0;

        if (count($Array)==0) {
                $json['data'][$i]['ARTICULO'] = NULL;
                $json['data'][$i]['DESCRIPCION'] = NULL;
                $json['data'][$i]['PRESENTACION'] = NULL;                       
                $json['data'][$i]['LABORATORIO'] =NULL;                              
                $json['data'][$i]['1'] = NULL;                                 
                $json['data'][$i]['2'] = NULL;                                 
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
                $json['data'][$i]['13'] = NULL;
                $json['data'][$i]['14'] = NULL;
                $json['data'][$i]['15'] = NULL;
                $json['data'][$i]['16'] = NULL;
                $json['data'][$i]['17'] = NULL;
                $json['data'][$i]['18'] = NULL;
                $json['data'][$i]['19'] = NULL;
                $json['data'][$i]['20'] = NULL;
                $json['data'][$i]['21'] = NULL;
                $json['data'][$i]['22'] = NULL;
                $json['data'][$i]['29'] = NULL;
                $json['data'][$i]['23'] = NULL;
                $json['data'][$i]['24'] = NULL;
                $json['data'][$i]['25'] = NULL;
                $json['data'][$i]['26'] = NULL;
                $json['data'][$i]['27'] = NULL;
                $json['data'][$i]['28'] = NULL;
                $json['data'][$i]['30'] = NULL;
                $json['data'][$i]['31'] = NULL;
                $json['data'][$i]['32'] = NULL;
                $json['data'][$i]['33'] = NULL;
                $json['data'][$i]['34'] = NULL;
                $json['data'][$i]['35'] = NULL;
                $json['data'][$i]['36'] = NULL;
                $json['data'][$i]['37'] = NULL;
                $json['data'][$i]['38'] = NULL;
                $json['data'][$i]['39'] = NULL;
                $json['data'][$i]['40'] = NULL;
                $json['data'][$i]['41'] = NULL;
                $json['data'][$i]['42'] = NULL;
                $json['data'][$i]['43'] = NULL;
                $json['data'][$i]['44'] = NULL;
                $json['data'][$i]['45'] = NULL;
                $json['data'][$i]['46'] = NULL;
                $json['data'][$i]['47'] = NULL;
                $json['data'][$i]['48'] = NULL;
                $json['data'][$i]['49'] = NULL;
                $json['data'][$i]['50'] = NULL;
                $json['data'][$i]['51'] = NULL;
                $json['data'][$i]['52'] = NULL;
                $json['data'][$i]['TOTALGENERAL'] = NULL;
                /*$json['data'][$i]['EXISTENCIA'] = NULL;
                $json['data'][$i]['PROMEDIO3MESES'] = NULL;
                $json['data'][$i]['MESESEXISTENCIA'] = NULL;*/
                //$i++;
        } else {
            foreach ($Array as $row) {      
                $json['data'][$i]['ARTICULO'] = $row['ARTICULO'];
                $json['data'][$i]['DESCRIPCION'] = $row['DESCRIPCION'];
                $json['data'][$i]['PRESENTACION'] = $row['PRESENTACION'];                                  
                $json['data'][$i]['LABORATORIO'] = $row['LABORATORIO'];                                  
                $json['data'][$i]['1'] = number_format($row['IPRIVADA1'],2);                                  
                $json['data'][$i]['2'] = number_format($row['FPRIVADA1'],2);                                  
                $json['data'][$i]['3'] = number_format($row['FPUBLICA1'],2);
                $json['data'][$i]['4'] = number_format($row['TOTAL1'],2);
                $json['data'][$i]['5'] = number_format($row['IPRIVADA2'],2);
                $json['data'][$i]['6'] = number_format($row['FPRIVADA2'],2);
                $json['data'][$i]['7'] = number_format($row['FPUBLICA2'],2);
                $json['data'][$i]['8'] = number_format($row['TOTAL2'],2);
                $json['data'][$i]['9'] = number_format($row['IPRIVADA3'],2);
                $json['data'][$i]['10'] = number_format($row['FPRIVADA3'],2);
                $json['data'][$i]['11'] = number_format($row['FPUBLICA3'],2);
                $json['data'][$i]['12'] = number_format($row['TOTAL3'],2);
                $json['data'][$i]['13'] = number_format($row['IPRIVADA4'],2);                                  
                $json['data'][$i]['14'] = number_format($row['FPRIVADA4'],2);                                  
                $json['data'][$i]['15'] = number_format($row['FPUBLICA4'],2);
                $json['data'][$i]['16'] = number_format($row['TOTAL4'],2);
                $json['data'][$i]['17'] = number_format($row['IPRIVADA5'],2);
                $json['data'][$i]['18'] = number_format($row['FPRIVADA5'],2);
                $json['data'][$i]['19'] = number_format($row['FPUBLICA5'],2);
                $json['data'][$i]['20'] = number_format($row['TOTAL5'],2);
                $json['data'][$i]['21'] = number_format($row['IPRIVADA6'],2);
                $json['data'][$i]['22'] = number_format($row['FPRIVADA6'],2);
                $json['data'][$i]['29'] = number_format($row['FPUBLICA6'],2);                                
                $json['data'][$i]['23'] = number_format($row['TOTAL6'],2);
                $json['data'][$i]['24'] = number_format($row['IPRIVADA7'],2);
                $json['data'][$i]['25'] = number_format($row['FPRIVADA7'],2);
                $json['data'][$i]['26'] = number_format($row['FPUBLICA7'],2);
                $json['data'][$i]['27'] = number_format($row['TOTAL7'],2);
                $json['data'][$i]['28'] = number_format($row['IPRIVADA8'],2);                                  
                $json['data'][$i]['30'] = number_format($row['FPRIVADA8'],2);  
                $json['data'][$i]['31'] = number_format($row['FPUBLICA8'],2);
                $json['data'][$i]['32'] = number_format($row['TOTAL8'],2);
                $json['data'][$i]['33'] = number_format($row['IPUBLICA9'],2);
                $json['data'][$i]['34'] = number_format($row['FPRIVADA9'],2);
                $json['data'][$i]['35'] = number_format($row['FPUBLICA9'],2);
                $json['data'][$i]['36'] = number_format($row['TOTAL9'],2);
                $json['data'][$i]['37'] = number_format($row['IPRIVADA10'],2);
                $json['data'][$i]['38'] = number_format($row['FPRIVADA10'],2);
                $json['data'][$i]['39'] = number_format($row['FPUBLICA10'],2);
                $json['data'][$i]['40'] = number_format($row['TOTAL10'],2);
                $json['data'][$i]['41'] = number_format($row['IPRIVADA11'],2);
                $json['data'][$i]['42'] = number_format($row['FPRIVADA11'],2);
                $json['data'][$i]['43'] = number_format($row['FPUBLICA11'],2);                               
                $json['data'][$i]['44'] = number_format($row['TOTAL11'],2);                                   
                $json['data'][$i]['45'] = number_format($row['IPRIVADA12'],2);  
                $json['data'][$i]['46'] = number_format($row['FPRIVADA12'],2);
                $json['data'][$i]['47'] = number_format($row['FPUBLICA12'],2);
                $json['data'][$i]['48'] = number_format($row['TOTAL12'],2);
                $json['data'][$i]['49'] = number_format($row['IPRIVADA13'],2);
                $json['data'][$i]['50'] = number_format($row['FPRIVADA13'],2);
                $json['data'][$i]['51'] = number_format($row['FPUBLICA13'],2);
                $json['data'][$i]['52'] = number_format($row['TOTAL13'],2);
                $json['data'][$i]['TOTALGENERAL'] = number_format($row['TOTALGENERAL'],2);
                /*$json['data'][$i]['EXISTENCIA'] = number_format($row['EXISTENCIA'],2);
                $json['data'][$i]['PROMEDIO3MESES'] = number_format($row['PROMEDIO3MESES'],2);
                $json['data'][$i]['MESESEXISTENCIA'] = number_format($row['MESESEXISTENCIA'],2);*/
               // $i++;                
            }
        }
       
        /*$this->db->select('PEDDCA,CTBP');
        $this->db->where('ARTICULO',$id);
        $Array2=$this->db->get('masterarticulos');

        foreach ($Array2->result_array() as $row) 
        { 
          if($row['PEDDCA']==NULL OR $row['PEDDCA']==NULL)
            {$json['data'][$i]['PDA'] =0;
             $json['data'][$i]['CTBP'] =0;$i++;}
            else
            {                  
            $json['data'][$i]['PDA'] = number_format($row['PEDDCA'],2);
            $json['data'][$i]['CTBP'] = number_format($row['CTBP'],2);   
            $i++;
            }
        } */
        $this->sqlsrv->close();
        return $json;
    }
    public function obtenercontrato($id)
    {
          $Array = $this->sqlsrv -> fetchArray("SELECT TOP 1 * FROM Softland.dbo.ALDER where ARTICULO='".$id."'",SQLSRV_FETCH_ASSOC); 
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
     public function generateMeses()
    {
        $fecha = date('d-m-Y');
        //$nuevafecha = strtotime ( '-"'.$i.'" month' , strtotime ($fecha)) ;
        $pila = array();  
        for ($i=12; $i >=0 ; $i--) { 
         $nuevafecha = strtotime ( '-'.$i.' month' , strtotime ($fecha)) ;
         $nuevafecha = date ( 'd-m-Y' , $nuevafecha );
        $transf = strtotime($nuevafecha);     

        $mes = date("F", $transf);
        $ano = date("Y", $transf);
        if ($mes=="January") $mes="Enero";
        if ($mes=="February") $mes="Febrero";
        if ($mes=="March") $mes="Marzo";
        if ($mes=="April") $mes="Abril";
        if ($mes=="May") $mes="Mayo";
        if ($mes=="June") $mes="Junio";
        if ($mes=="July") $mes="Julio";
        if ($mes=="August") $mes="Agosto";
        if ($mes=="September") $mes="Septiembre";
        if ($mes=="October") $mes="Octubre";
        if ($mes=="November") $mes="Noviembre";
        if ($mes=="December") $mes="Diciembre";
        $definitiva=$mes.' '.$ano;
         array_push($pila, $definitiva);
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
        
        $query = $this->db->query("SELECT * FROM view_analisis_consumo LIMIT 15");
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
                    $json['Analisis'][$i]['CTBP'] = number_format($row['CTBP'], 2);
                    $json['Analisis'][$i]['CTTS'] = number_format($row['CTTS'], 2);              
                    $json['Analisis'][$i]['ORDENAR'] = $row['ORDENAR'];
                    /*tambien mando a traer otros datos de un procedimiento almacenado*/
                    $Array = $this->sqlsrv -> fetchArray("EXEC Softland.dbo.SP_ALDER_CLASIFICACION_ABC '".$row['ARTICULO']."'",SQLSRV_FETCH_ASSOC);
                    if(count($Array) <> 0)
                    {
                        for ($a=0; $a <count($Array) ; $a++)
                        {$json['Analisis'][$i]['MESES'] = number_format($Array[$a]['MESESEXISTENCIA'],2);}
                    }
                    else{$json['Analisis'][$i]['MESES'] =0;}

                    $this->db->select('PEDDCA,CTBP');
                    $this->db->where('ARTICULO',$row['ARTICULO']);
                    $Array2=$this->db->get('masterarticulos');

                    foreach ($Array2->result_array() as $row) 
                    { 
                      if($row['PEDDCA']==NULL OR $row['PEDDCA']==NULL)
                        {$json['Analisis'][$i]['PDA'] ="EKISDE";
                         $json['Analisis'][$i]['CTBP'] ="EKISDE";$i++;}
                        else
                        {                  
                        $json['Analisis'][$i]['PDA'] = number_format($row['PEDDCA'],2);
                        $json['Analisis'][$i]['CTBP'] = number_format($row['CTBP'],2);   
                        $i++;
                        }
                    }
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
                $json['Analisis'][$i]['MESES'] ="";  
                $json['Analisis'][$i]['PDA'] ="";
                $json['Analisis'][$i]['CTBP'] ="";  
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