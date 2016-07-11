<?php
    class CoreMySQL extends mysqli {
        public function __construct() {
            parent::__construct("localhost","root","a7m1425.","metra");
            if (mysqli_connect_error()) {
                die('Error de Conexi0n (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
            }
        }
    }
    // TODO: ALTER TABLE  masterarticulos ADD  CLASE_ABC VARCHAR( 5 ) NOT NULL AFTER  CTTS
 class CnxSrvSQL {
        public $serverName = '192.168.1.112';
        public $dbname = 'PRODUCCION';
        public $user = 'sa';
        public $password = 'Server2012!';
        public $characterSet = "UTF-8";
        public $connection;
        protected $statement = null;
        protected $status = null;
        function __construct()
        {
            $connectionInfo = array(
                "UID" => $this->user,
                "PWD" => $this->password,
                "Database" => $this->dbname,
                "CharacterSet" => $this->characterSet
            );
            $this->connection = sqlsrv_connect($this->serverName, $connectionInfo);
            if ($this->connection) {
                $this->status = true;
            } else {
                $this->status = false;
            }
        }
        public function getStatus(){
            return $this->status;
        }
        public function close(){
            if ($this->connection) {
                sqlsrv_close($this->connection);
            }
        }
        public function query($query)
        {
            $this->statement = sqlsrv_query($this->connection, $query);
            if (!$this->statement) {
                die(print_r(sqlsrv_errors(), true));
            }
            return $this->statement;
        }
        public function fetchArray($query = null, $type = SQLSRV_FETCH_ASSOC){
            $stmt = $this->query($query);
            $a_array = array();
            while ($res = sqlsrv_fetch_array($stmt, $type)) {
                $a_array[] = $res;
            }
            return $a_array;
        }
    }
    /**
    * 
    */
    class ClassCore{
        public static function UpdateBAT(){
            $ObjSQLSRV = new CnxSrvSQL;
            $ObjMysql = new CoreMySQL;
            $sql = "";
            $Array = "";
            $MYUDP = "";
            $ArticuloIN = "";
            
           echo "<br>";
           echo " - FASE 1: Ingreso de Articulos.<br>";
            //VERIFICAR CAMBIOS EN LAS CANTIDADES DE MYSQL
           @$sql = "SELECT Articulo, CANT_DISPONIBLE FROM MasterArticulos";
            
            $Array = $ObjMysql->query($sql);
            
            $MYUDP ='UPDATE MasterArticulos SET CANT_DISPONIBLE = CASE  Articulo';
            foreach ($Array AS $fila) {
                $sql = "WHERE ARTICULO = '".$fila['Articulo']."' AND CANT_DISPONIBLE <> ".$fila['CANT_DISPONIBLE'];
                $sql = $ObjSQLSRV->fetchArray("SELECT Articulo, CANT_DISPONIBLE FROM WEB_METRA_ACD ".$sql, SQLSRV_FETCH_ASSOC);
                
                if (count($sql) > 0){
                    $MYUDP.= ' WHEN '."'".$sql[0]['Articulo']."'".' THEN '."'".$sql[0]['CANT_DISPONIBLE']."'";
                    @$ArticuloIN.="'".$sql[0]['Articulo']."',";
                }
            }
            $MYUDP.=' END ';
            $MYUDP .= 'WHERE Articulo IN ('.substr(@$ArticuloIN, 0,-1).')';
            $ObjMysql->query($MYUDP);
            
            //VERIFICAMOS LA INFORMACION DEL BASE MYSQL
            @$sql = "SELECT Articulo FROM MasterArticulos";
            $Array = $ObjMysql->query($sql);
                
            $sql = "";
            $ArraySQL = "";
            
            //VERIFICAR SI EXISTE INFORMACION, DE SER ASI ARMAMOS LA INFORMACION PARA LUEGO SER FILTRADA EN LA BASE DE EXACTUS
            if ($Array->num_rows > 0){
                //CARGAMOS LA INFORMACION DE LOS ARTICULOS QUE ESTAN EN LA MYSQL
                foreach ($Array as $fila) {
                    @$sql .= "'".$fila['Articulo']."',";
                }
                $sql = substr($sql,0,-1);//QUITAMOS LA ULTIMA COMA
                $ARTUDPT = $sql;
                //FILTRAMOS LA INFORMACION DE LA TABLA DE EXACTUS
                $ArraySQL = $ObjSQLSRV->fetchArray("SELECT * FROM WEB_METRA_ACD WHERE ARTICULO NOT IN (".$sql.")", SQLSRV_FETCH_ASSOC);
            }else{
                //CARGAMOS LA TABLA DE EXACTUS COMPLETA
                $ArraySQL = $ObjSQLSRV->fetchArray("SELECT ARTICULO, DESCRIPCION, LABORATORIO, UNIDAD,FACTOR_EMPAQUE, PROVEEDOR, CANT_DISPONIBLE,PROMEDIO,CLASE_ABC FROM WEB_METRA_ACD", SQLSRV_FETCH_ASSOC);
            }
            
            if (count($ArraySQL) > 0) {
                //$UPDTPROMEDIO ='UPDATE MasterArticulos SET PROMEDIO = CASE  Articulo';
                $sql = "INSERT INTO MasterArticulos (ARTICULO, DESCRIPCION, LABORATORIO, UNIDAD,FACTOREMPAQUE, PROVEEDOR, CANT_DISPONIBLE,CLASE_ABC) VALUES";
                foreach ($ArraySQL AS $fila) {
                    $sql .= "('".$fila['ARTICULO']."','".$fila['DESCRIPCION']."','".$fila['LABORATORIO']."','".$fila['UNIDAD']."','".$fila['FACTOR_EMPAQUE']."','".$fila['PROVEEDOR']."','".$fila['CANT_DISPONIBLE']."','".$fila['CLASE_ABC']."'),";
                  //  $UPDTPROMEDIO.= ' WHEN '."'".$fila['ARTICULO']."'".' THEN '."'".$fila['PROMEDIO']."'";
                }
                $sql = substr($sql,0,-1);
                //$UPDTPROMEDIO.=' END ';
                //$UPDTPROMEDIO .= 'WHERE Articulo IN ('.substr(@$ARTUDPT, 0,-1).')';
                //echo $UPDTPROMEDIO;
                
                $ObjMysql->query($sql);
            }//*/
            
            
            /*  $rows = funny_query_results("SELECT ...");
                foreach($rows as $row) { // Uh... What should I use? foreach VS for VS while?
                echo $row->something;
                }$results = $mysqli->query("SELECT ...");
                while( $row = $results->fetch_object()) {
                    echo $row->something;
                }   while ($row = mysql_fetch_assoc($result)) {
                    echo $row["userid"];
                    echo $row["fullname"];
                    echo $row["userstatus"];}
            */
            
            echo " - FASE 2: Actualizaciones de Cantidades Disponibles de Articulos.<br>";
            //VERIFICAR CAMBIOS EN LAS CANTIDADES DE MYSQL
            @$sql = "SELECT Articulo, CANT_DISPONIBLE FROM MasterArticulos";
            $Array = $ObjMysql->query($sql);
            
            $MYUDP ='UPDATE MasterArticulos SET CANT_DISPONIBLE = CASE  Articulo';
            foreach ($Array AS $fila) {
                $sql = "WHERE ARTICULO = '".$fila['Articulo']."' AND CANT_DISPONIBLE <> ".$fila['CANT_DISPONIBLE'];
                $sql = $ObjSQLSRV->fetchArray("SELECT Articulo, CANT_DISPONIBLE FROM WEB_METRA_ACD ".$sql, SQLSRV_FETCH_ASSOC);
                
                if (count($sql) > 0){
                    $MYUDP.= ' WHEN '."'".$sql[0]['Articulo']."'".' THEN '."'".$sql[0]['CANT_DISPONIBLE']."'";
                    @$ArticuloIN.="'".$sql[0]['Articulo']."',";
                }
            }
            $MYUDP.=' END ';
            $MYUDP .= 'WHERE Articulo IN ('.substr(@$ArticuloIN, 0,-1).')';
            $ObjMysql->query($MYUDP);
            echo " - FASE 3: Actualizaciones de promedio sobre Articulos.<br>";
            //VERIFICAR CAMBIOS EN LAS CANTIDADES DE MYSQL
            @$sql = "SELECT Articulo, PROMEDIO FROM MasterArticulos";
            $Array = $ObjMysql->query($sql);
            
            $MYUDP ='UPDATE MasterArticulos SET PROMEDIO = CASE  Articulo';
            foreach ($Array AS $fila) {
                $sql = "WHERE ARTICULO = '".$fila['Articulo']."' AND PROMEDIO <> ".$fila['PROMEDIO'];
                $sql = $ObjSQLSRV->fetchArray("SELECT Articulo, PROMEDIO FROM WEB_METRA_ACD ".$sql, SQLSRV_FETCH_ASSOC);
                
                if (count($sql) > 0){
                    $MYUDP.= ' WHEN '."'".$sql[0]['Articulo']."'".' THEN '."'".$sql[0]['PROMEDIO']."'";
                    @$ArticuloIN.="'".$sql[0]['Articulo']."',";
                }
            }
            $MYUDP.=' END ';
            $MYUDP .= 'WHERE Articulo IN ('.substr(@$ArticuloIN, 0,-1).')';
            $ObjMysql->query($MYUDP);
            
            echo " - FASE 4: Actualizaciones de Laboratorios.<br>";
            //BUSCAR ACTUALIZACION DE LABORATORIOS
            @$sql = "SELECT Articulo FROM MasterArticulos WHERE LABORATORIO = ''";
            $Array = $ObjMysql->query($sql);
            
            $MYUDP ='UPDATE MasterArticulos SET LABORATORIO = CASE  Articulo';
            foreach ($Array as $fila ) {
                $sql = "WHERE ARTICULO = '".$fila['Articulo']."' AND LABORATORIO <> ''";
                $sql = $ObjSQLSRV->fetchArray("SELECT Articulo, LABORATORIO FROM WEB_METRA_ACD ".$sql, SQLSRV_FETCH_ASSOC);
                
                if (count($sql) <> 0){
                    $MYUDP.= ' WHEN '."'".$sql[0]['Articulo']."'".' THEN '."'".$sql[0]['LABORATORIO']."'";
                    @$ArticuloIN.="'".$sql[0]['Articulo']."',";
                }
            }
            $MYUDP.=' END ';
            $MYUDP .= 'WHERE Articulo IN ('.substr(@$ArticuloIN, 0,-1).')';
            
            if (@$ArticuloIN <> ''){
                $ObjMysql->query($MYUDP);
            }
            //echo $MYUDP; //
            
            echo " - FASE 5: Actualizaciones de Proveedores.<br>";
            //BUSCAR ACTUALIZACION DE PROVEEDORES
            @$sql = "SELECT Articulo FROM MasterArticulos WHERE PROVEEDOR = ''";
            $Array = $ObjMysql->query($sql);
            
            $MYUDP ='UPDATE MasterArticulos SET PROVEEDOR = CASE  Articulo';
            foreach ($Array as $fila ) {
                $sql = "WHERE ARTICULO = '".$fila['Articulo']."' AND PROVEEDOR <> ''";
                $sql = $ObjSQLSRV->fetchArray("SELECT Articulo, PROVEEDOR FROM WEB_METRA_ACD ".$sql, SQLSRV_FETCH_ASSOC);
                
                if (count($sql) <> 0){
                    $MYUDP.= ' WHEN '."'".$sql[0]['Articulo']."'".' THEN '."'".$sql[0]['PROVEEDOR']."'";
                    @$ArticuloIN.="'".$sql[0]['Articulo']."',";
                }
            }
            $MYUDP.=' END ';
            $MYUDP .= 'WHERE Articulo IN ('.substr(@$ArticuloIN, 0,-1).')';
            
            if (@$ArticuloIN <> ''){
                $ObjMysql->query($MYUDP);
            }
            //echo $MYUDP;//*/
            echo " - FASE 6: Actualizaciones de Dañados y Vencidos.<br><br>";
            $actualizado=0;$insertado=0;  $MYUDP="";$acumulado=0;
            $sql = $ObjSQLSRV->fetchArray("SELECT * FROM WEB_DANADO_VENCIDO", SQLSRV_FETCH_ASSOC);
            for ($i=0; $i <count($sql) ; $i++) {  
                $mysql="SELECT * FROM lotesvendidos
                where ARTICULO='".$sql[$i]['ARTICULO']."' AND LOTE ='".$sql[$i]['LOTE']."' 
                AND FECHA_ENTRADA ='".$sql[$i]['FECHA_ENTRADA']."' AND FECHA_VENCIMIENTO = '".$sql[$i]['FECHA_VENCIMIENTO']."'";
                //AND CANTIDAD_INGRESADA <> '".$sql[$i]['CANTIDAD_INGRESADA']."'";    
                $Array2 = $ObjMysql->query($mysql);              
                if($Array2->num_rows > 0)
                {   
                    foreach ($Array2 as $key) {
                    if($sql[$i]['CANTIDAD_INGRESADA']!=$key['CANTIDAD_INGRESADA']){
                    $acumulado=$acumulado+$sql[$i]['CANTIDAD_INGRESADA'];
                    $MYUDP="UPDATE lotesvendidos set CANTIDAD_INGRESADA='".$acumulado."',
                    CANT_DISPONIBLE= '".$sql[$i]['CANT_DISPONIBLE']."',
                    FECHA_VENCIMIENTO='".$sql[$i]['FECHA_VENCIMIENTO']."'
                    WHERE ARTICULO='".$key['ARTICULO']."'  AND LOTE ='".$key['LOTE']."'
                    AND FECHA_ENTRADA ='".$key['FECHA_ENTRADA']."' AND FECHA_VENCIMIENTO = '".$sql[$i]['FECHA_VENCIMIENTO']."'";
                    //AND CANTIDAD_INGRESADA <> '".$key['CANTIDAD_INGRESADA']."'";
                    $ObjMysql->query($MYUDP);    
                     $actualizado++;                 
                    }
                    
                    //echo $MYUDP;
                    //echo "Se encontro, se actualizo registro <br>";
                    }
                }
                else{ 
                     /*  $mysql="SELECT * FROM lotesvendidos
                        where ARTICULO='".$sql[$i]['ARTICULO']."' AND LOTE ='".$sql[$i]['LOTE']."' 
                        AND FECHA_ENTRADA ='".$sql[$i]['FECHA_ENTRADA']."' AND FECHA_VENCIMIENTO = '".$sql[$i]['FECHA_VENCIMIENTO']."'
                        AND CANTIDAD_INGRESADA = '".$sql[$i]['CANTIDAD_INGRESADA']."'";                   
                        $Array = $ObjMysql->query($mysql);              
                    if($Array->num_rows > 0)
                     { }*/
                    //else{
                    $MYUDP="INSERT INTO lotesvendidos
                    (ARTICULO,DESCRIPCION,CATEGORIA,LAB,CLASETER,BODEGA,LOTE,FECHA_VENCIMIENTO,CANT_DISPONIBLE,FECHA_ENTRADA,CANTIDAD_INGRESADA)
                    VALUES ('".$sql[$i]['ARTICULO']."','".$sql[$i]['DESCRIPCION']."','".$sql[$i]['CATEGORIA']."','".$sql[$i]['Lab']."','".$sql[$i]['ClaseTer']."','".$sql[$i]['BODEGA']."','".$sql[$i]['LOTE']."','".$sql[$i]['FECHA_VENCIMIENTO']."','".$sql[$i]['CANT_DISPONIBLE']."','".$sql[$i]['FECHA_ENTRADA']."','".$sql[$i]['CANTIDAD_INGRESADA']."')";
                    $ObjMysql->query($MYUDP);
                    $insertado++;  
                  //  echo $MYUDP;
                   //        echo "no se encontro nada, se ingresara registro nuevo <br>";
                   // }            
                                
                } 
                //$ObjMysql->query($MYUDP);         
            }
          // echo "SE ACTUALIZARON: ".$actualizado." REGISTROS, SE INGRESARON: ".$insertado."<br>";                
            
            $ObjSQLSRV->close();
        }
    }
    echo "Inicio: ".date('Y-m-d h:i:s');
    echo "<br>";
    $Obj = new ClassCore;
    $Obj -> UpdateBAT();
    echo "Termino: ".date('Y-m-d h:i:s');
?>