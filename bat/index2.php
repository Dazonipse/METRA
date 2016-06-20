 <?php
    class CoreMySQL extends mysqli {
        public function __construct() {
            parent::__construct("localhost","root","a7m1425.","metra");

            if (mysqli_connect_error()) {
                die('Error de Conexión (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
            }
        }
    }
    
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
            
            //VERIFICAMOS LA INFORMACION DEL BASE MYSQL
           /* @$sql = "SELECT Articulo FROM MasterArticulos";
            $Array = $ObjMysql->query($sql);
                
            $sql = "";
            
            //VERIFICAR SI EXISTE INFORMACION, DE SER ASI ARMAMOS LA INFORMACION PARA LUEGO SER FILTRADA EN LA BASE DE EXACTUS
            if ($Array->num_rows > 0){    
                //CARGAMOS LA INFORMACION DE LOS ARTICULOS QUE ESTAN EN LA MYSQL
                foreach ($Array as $fila) {
                    @$sql .= "'".$fila['Articulo']."',";
                }
                $sql = substr($sql,0,-1);//QUITAMOS LA ULTIMA COMA
                
                //FILTRAMOS LA INFORMACION DE LA TABLA DE EXACTUS
                $Array = $ObjSQLSRV->fetchArray("SELECT * FROM WEB_METRA_ACD WHERE ARTICULO NOT IN (".$sql.")", SQLSRV_FETCH_ASSOC);
            }else{
                //CARGAMOS LA TABLA DE EXACTUS COMPLETA
                $Array = $ObjSQLSRV->fetchArray("SELECT ARTICULO, DESCRIPCION, Laboratorio, UNIDAD, Proveedor, CANT_DISPONIBLE FROM WEB_METRA_ACD", SQLSRV_FETCH_ASSOC);
            }
            
            if (count($Array) > 0) {
                $sql = "INSERT INTO MasterArticulos (ARTICULO, DESCRIPCION, LABORATORIO, UNIDAD, PROVEEDOR, CANT_DISPONIBLE) VALUES";
                
                foreach ($Array as $fila) {
                    $sql .= "('".$fila['ARTICULO']."','".$fila['DESCRIPCION']."','".$fila['LABORATORIO']."','".$fila['UNIDAD']."','".$fila['PROVEEDOR']."','".$fila['CANT_DISPONIBLE']."'),";
                }
                $sql = substr($sql,0,-1);
                
                $ObjMysql->query($sql);
            }   //   */      
            
            //VERIFICAR CAMBIOS EN LAS CANTIDADES DE MYSQL
            @$sql = "SELECT ARTICULO, CANT_DISPONIBLE FROM masterarticulos";
            
            $ArrayQuery = $ObjMysql->query($sql)or die(mysqli_error($mysqli));
            
            
            while($row = $ArrayQuery->fetch_assoc()) {                
                $Array[]=$row;
            }

            
            $MYUDP ='UPDATE masterarticulos SET CANT_DISPONIBLE = CASE  ARTICULO';
            foreach ($Array as $fila) {
                echo $fila['ARTICULO'].'<br>';
                /*$sql = "WHERE ARTICULO = '".$fila['Articulo']."' AND CANT_DISPONIBLE <> ".$fila['CANT_DISPONIBLE'];
                $sql = $ObjSQLSRV->fetchArray("SELECT Articulo, CANT_DISPONIBLE FROM WEB_METRA_ACD ".$sql, SQLSRV_FETCH_ASSOC);
                 
                if (count($sql) > 0){
                    $MYUDP.= ' WHEN '."'".$sql[0]['Articulo']."'".' THEN '."'".$sql[0]['CANT_DISPONIBLE']."'";
                    @$ArticuloIN.="'".$sql[0]['Articulo']."',";
                }*/
            }
            $MYUDP.=' END ';
            $MYUDP .= 'WHERE ARTICULO IN ('.substr(@$ArticuloIN, 0,-1).')';
            //$ObjMysql->query($MYUDP);
                        
            /*//BUSCAR ACTUALIZACION DE LABORATORIOS
            @$sql = "SELECT Articulo FROM MasterArticulos WHERE Laboratorio = ''";
            $Array = $ObjMysql->query($sql);
                        
            $MYUDP ='UPDATE MasterArticulos SET Laboratorio = CASE  Articulo';
            foreach ($Array as $fila ) {
                $sql = "WHERE ARTICULO = '".$fila['Articulo']."' AND Laboratorio <> ''";
                $sql = $ObjSQLSRV->fetchArray("SELECT Articulo, Laboratorio FROM WEB_METRA_ACD ".$sql, SQLSRV_FETCH_ASSOC);
                    
                if (count($sql) <> 0){
                    $MYUDP.= ' WHEN '."'".$sql[0]['Articulo']."'".' THEN '."'".$sql[0]['Laboratorio']."'";
                    @$ArticuloIN.="'".$sql[0]['Articulo']."',";
                }
            }
            $MYUDP.=' END ';
            $MYUDP .= 'WHERE Articulo IN ('.substr(@$ArticuloIN, 0,-1).')';
            
            if (@$ArticuloIN <> ''){
                $ObjMysql->query($MYUDP);
            }
            //echo $MYUDP; //*/
            
            
            //BUSCAR ACTUALIZACION DE PROVEEDORES
            @$sql = "SELECT Articulo FROM MasterArticulos WHERE Proveedor = ''";
            $Array = $ObjMysql->query($sql);
                        
            $MYUDP ='UPDATE MasterArticulos SET Proveedor = CASE  Articulo';
            foreach ($Array as $fila ) {
                $sql = "WHERE ARTICULO = '".$fila['Articulo']."' AND Proveedor <> ''";
                $sql = $ObjSQLSRV->fetchArray("SELECT Articulo, Proveedor FROM WEB_METRA_ACD ".$sql, SQLSRV_FETCH_ASSOC);
                    
                if (count($sql) <> 0){
                    $MYUDP.= ' WHEN '."'".$sql[0]['Articulo']."'".' THEN '."'".$sql[0]['Proveedor']."'";
                    @$ArticuloIN.="'".$sql[0]['Articulo']."',";
                }
            }
            $MYUDP.=' END ';
            $MYUDP .= 'WHERE Articulo IN ('.substr(@$ArticuloIN, 0,-1).')';
            
            if (@$ArticuloIN <> ''){
                $ObjMysql->query($MYUDP);
            }
            //echo $MYUDP;//*/ 
            
            $ObjSQLSRV->close();
        }
    }

    $Obj = new ClassCore;        
    $Obj -> UpdateBAT();
?>