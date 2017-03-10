<?php
/**
 *
 * User: Marangelo
 * Date: 04/02/2016
 * Time: 03:14 pm
 */
class Users extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
    public function login($name, $pass ){
        echo $name;
        if($name != FALSE && $pass != FALSE){

            $this->db->where('Name', $name);
            $this->db->where('Pass', $pass);
            $query = $this->db->get('user');
            if($query->num_rows() == 1){
                return $query->result_array();
            }
            return 0;
        }
    }
    public function Guardar($name,$Contraseña,$Permisos){
        $data = array(
            'Name' => $name ,
            'Pass' => $Contraseña ,
            'Privilegio' =>  $Permisos,
            'Date_Creat' => date('Y-m-d')
        );
        $insert= $this->db->insert('user', $data);
        if($insert){
            return 1;
        }
        return 0;
    }
    public function del($id){
        $this->db->where('IdUser', $id);
        $delete= $this->db->delete('user');
        if($delete){
            return 1;
        }
        return 0;
    }
    public function allUser(){        
        $query = $this->db->get('user');        
        if($query->num_rows() <> 0){            
            return $query->result_array();
        }
        return 0;
    }
    public function InsertLog($usuario,$id)
    {
        $datos = array('Grupo' => 0, 
                'Us_name' =>$usuario." ID=> ".$id,
                'Date_Reg' => date('Y-m-d H:i:s'),
                'Descripcion' => 'Ingreso al sistema'
                );
        $this->db->insert('log_transac',$datos);
    }
    /*public function AllEmp(){
     $query = $this->db->get('Privilegio');        
        if($query->num_rows() <> 0){            
            return $query->result_array();
        }
        return 0;   
    }//*/
}