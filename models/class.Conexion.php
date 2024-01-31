<?php 

error_reporting(E_ALL ^ E_WARNING);
error_reporting(E_ALL ^ E_NOTICE); 

date_default_timezone_set('America/Bogota');
class Conexion extends mysqli	
{
	private $Fecha;
	private $Hora;
    
	public function __construct() 
	{
		//parent::__construct('localhost','root','Fra2011@','liscaya');
		parent::__construct('localhost','root','123456789','facturacion');
        //parent::__construct('localhost','root','12345','puntodeventa');
		//parent::__construct('localhost','franklin','Fra2011@','sir');
		$this->query("SET NAMES utf8;");
		$this->connect_errno ? die ('Error: Conexion a la base de datos incorrecta.') : null;
	}

	public function rows($x)
	{
		return mysqli_num_rows($x);
	}	

	public function recorrer($x)
	{
		return mysqli_fetch_array($x);
	}

	public function liberar($x) 
	{
		return mysqli_free_result($x);
	}	

	public function preparada()
	{
		return mysqli_stmt_init();
	}		
    public function validateDate($date)
    {
     $d = DateTime::createFromFormat('Y-m-d', $date);
      return $d && $d->format('Y-m-d') == $date;
    }
    public function arr_assoc($x)
    {
        return mysqli_fetch_assoc($x);
    }
    public function filas_afectadas($con){
         return  mysqli_affected_rows($con);        
    }    
}

?>
