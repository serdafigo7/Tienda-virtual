<?php 
session_start();
require_once('class.Conexion.php');
class Acceso{

    public function cargar_tabla_list_prod_vendidos(){
        try{
               $db = new Conexion();
               $query1="SELECT b.codigo xml_1, b.nombre xml_2, a.precio_venta xml_3, a.cantidad xml_4,
               (a.precio_venta * a.cantidad) xml_5, a.id xml_6, a.id_producto xml_7
               FROM detalle_venta a
               LEFT JOIN productos b ON b.id = a.id_producto
               LEFT JOIN factura_venta c ON a.id_factura = c.id
               WHERE 
                 c.id_vendedor='".$_SESSION['id_vendedor']."' and c.estado='En_proceso_de_facturacion';";					
               $sql = $db->query($query1);				
               if($db->filas_afectadas($db)>=1)
               {		
                 while ($datos= $db->recorrer($sql)) {
                    $rta_0[]=$datos;
                 }  
                 return json_encode($rta_0);         
               }else{
                  $rta = 0; 
                  $rta_0['rta'] ="$rta";
                  return json_encode($rta_0);   
               }
                   
             $db->close();  				     
       }catch(Exception $login){
           echo $login->getMessage();
       }
   }
   

   public function cargar_tabla_usuarios_usuarios(){
    try{
           $db = new Conexion();
           $query1="SELECT id xml_1, nombre xml_2, apellido xml_3, usuario xml_4, 
           pass xml_5, rol xml_6 FROM usuarios;";					
           $sql = $db->query($query1);				
           if($db->filas_afectadas($db)>=1)
           {		
             while ($datos= $db->recorrer($sql)) {
                $rta_0[]=$datos;
             }  
             return json_encode($rta_0);         
           }else{
              $rta = 0; 
              $rta_0['rta'] ="$rta";
              return json_encode($rta_0);   
           }
               
         $db->close();  				     
   }catch(Exception $login){
       echo $login->getMessage();
   }
}




    public function evaluar_acceso(){
       
        try{
            if(!empty($_POST['user']) and !empty($_POST['pass']))
            {
               $db = new Conexion();
               $rta = -1000;
                
               $user = filter_var($_POST['user'],FILTER_SANITIZE_SPECIAL_CHARS);		
               $pass = filter_var($_POST['pass'],FILTER_SANITIZE_SPECIAL_CHARS);	
               $query1="SELECT id, nombre, rol, apellido FROM `usuarios` WHERE `usuario`='$user' 
               and `pass`='$pass';";
               //echo $query1;    								
               $sql = $db->query($query1);	
               $db->filas_afectadas($db)==1;			
               if($db->filas_afectadas($db)==1)
               {		
                   $datos = $db->recorrer($sql);
                   $_SESSION['id_vendedor'] = $datos['id'];
                   $_SESSION['nombre'] = $datos['nombre'];
                   $_SESSION['apellido'] = $datos['apellido'];
                   $_SESSION['rol'] = $datos['rol'];
                   if($_SESSION['rol'] =='ventas'){
                      $rta = 1;  
                   }else if($_SESSION['rol'] =='administrador'){
                      $rta = 2;  
                   }else if($_SESSION['rol'] =='contabilidad'){
                      $rta = 3;   
                   }
                      
               }else{
                $rta = 0; 
               }
                   
                   $db->close();  				
               }else{
                       if(empty($_POST['user'])){
                          $rta=-1;
                       }else if(empty($_POST['pass'])){
                          $rta=-2;
                       }	
                    }
               
       }catch(Exception $login){
           echo $login->getMessage();
       }
   $rta_0['rta'] ="$rta";
   return json_encode($rta_0);    
   }

   public function get_reg_usuario(){
       
    try{
        if(!empty($_POST['id_reg_editar']))
        {
           $db = new Conexion();
           $rta = -1000;
            
           $id = filter_var($_POST['id_reg_editar'],FILTER_SANITIZE_SPECIAL_CHARS);		
           
           $query1="SELECT id xml_1, usuario xml_2, pass xml_3, 
           nombre xml_4, apellido xml_5, rol xml_6 FROM `usuarios` WHERE id='$id';";   								
           $sql = $db->query($query1);				
           if($db->filas_afectadas($db)>=1)
           {  
               while ($datos= $db->recorrer($sql)) {
                    $rta_0[]=$datos;
               }  
                return json_encode($rta_0);         
           }else{
                  $rta = 0; 
                  $rta_0['rta'] ="$rta";
                  return json_encode($rta_0);   
                }
        }else{
            $rta = -1; 
           }
         $db->close();  				  
   }catch(Exception $login){
       echo $login->getMessage();
   }
$rta_0['rta'] ="$rta";
return json_encode($rta_0);    
}

public function buscarProducto(){       
    try{
        if(!empty($_POST['idBusqueda']))
        {
           $db = new Conexion();
           $rta = -1000;
            
           $id = filter_var($_POST['idBusqueda'],FILTER_SANITIZE_SPECIAL_CHARS);		
           
           $query1="SELECT id xml_1, codigo xml_2, nombre xml_3, 
           precio xml_4, cantidad xml_5 FROM `productos` WHERE id = '$id';";   								
           $sql = $db->query($query1);				
           if($db->filas_afectadas($db)>=1)
           {
              while ($datos= $db->recorrer($sql)) {
                 $rta_0[]=$datos;
              }  
              return json_encode($rta_0);
           }else{
                    $rta = 0; 
                    $rta_0['rta'] ="$rta";
                    return json_encode($rta_0);
                }
                  
       }else{
          $rta = -1; 
          $rta_0['rta'] ="$rta";
          return json_encode($rta_0);
       }
          
       $db->close();  				  
   }catch(Exception $login){
       echo $login->getMessage();
   }
 
}

public function buscarProductoEditar(){       
    try{
        if(!empty($_POST['idBusqueda']))
        {
           $db = new Conexion();
           $rta = -1000;
            
           $id = filter_var($_POST['idBusqueda'],FILTER_SANITIZE_SPECIAL_CHARS);		
           
           $query1="SELECT id xml_1, codigo xml_2, nombre xml_3, 
           precio xml_4, cantidad xml_5 FROM `productos` WHERE id = '$id';";   								
           $sql = $db->query($query1);				
           if($db->filas_afectadas($db)>=1)
           {
              while ($datos= $db->recorrer($sql)) {
                 $rta_0[]=$datos;
              }  
              return json_encode($rta_0);
           }else{
                    $rta = 0; 
                    $rta_0['rta'] ="$rta";
                    return json_encode($rta_0);
                }
                  
       }else{
          $rta = -1; 
          $rta_0['rta'] ="$rta";
          return json_encode($rta_0);
       }
          
       $db->close();  				  
   }catch(Exception $login){
       echo $login->getMessage();
   }
 
}

public function buscarCantVendida(){       
    try{
        if(!empty($_POST['idBusqueda']))
        {
           $db = new Conexion();
           $rta = -1000;
            
           $id = filter_var($_POST['idBusqueda'],FILTER_SANITIZE_SPECIAL_CHARS);		
           
           $query1="SELECT cantidad xml_1 FROM detalle_venta WHERE 
           id_producto= '$id';";   								
           $sql = $db->query($query1);				
           if($db->filas_afectadas($db)>=1)
           {
              while ($datos= $db->recorrer($sql)) {
                 $rta_0[]=$datos;
              }  
              return json_encode($rta_0);
           }else{
                    $rta = 0; 
                    $rta_0['rta'] ="$rta";
                    return json_encode($rta_0);
                }
                  
       }else{
          $rta = -1; 
          $rta_0['rta'] ="$rta";
          return json_encode($rta_0);
       }
          
       $db->close();  				  
   }catch(Exception $login){
       echo $login->getMessage();
   }
 
}

public function guardar_detalle_venta(){       
    try{
        if(!empty($_POST['id_prod']) && !empty($_POST['precio_ven'])
        && !empty($_POST['cantidad']))
        {
           $db = new Conexion();
           $db->begin_transaction();//inicia la transacción 

           $id_prod = filter_var($_POST['id_prod'],FILTER_SANITIZE_SPECIAL_CHARS);
           $id_vendedor = filter_var($_POST['id_vendedor'],FILTER_SANITIZE_SPECIAL_CHARS);		
           $precio_ven = filter_var($_POST['precio_ven'],FILTER_SANITIZE_SPECIAL_CHARS);	
           $cantidad = filter_var($_POST['cantidad'],FILTER_SANITIZE_SPECIAL_CHARS);		
           $estado = "En_proceso_de_facturacion";

           $query2="SELECT id FROM factura_venta 
                    where id_vendedor=$id_vendedor and estado='En_proceso_de_facturacion'"; 
           $sql2 = $db->query($query2);				
           if($db->filas_afectadas($db)>=1)
           {
              while ($datos= $db->recorrer($sql2)) {
                  $_SESSION['id_factura']=$datos[0];
                  $id_factura=$_SESSION['id_factura'];
              } 
              $_SESSION['control_fact']=1;//existe una fact y se debe add detalle prod
           }else{
              $_SESSION['id_factura']=0;
              $_SESSION['control_fact']=0;
           }

           $rta = -1000;
           $id_factura=0;
           
            //datos fijos que realiza sistemas         
            date_default_timezone_set("America/Bogota");        
            $hora_sys = date ("H:i:s"); 
            $fecha_sys=date ("Y-m-j");

           if($_SESSION['control_fact']==0){
                $query1="INSERT INTO factura_venta(id_cliente, id_vendedor, id_forma_pago, 
                id_empresa, fecha, hora, total_venta, estado) 
                VALUES ('0','$id_vendedor','0','1','$fecha_sys','$hora_sys','0','$estado')"; 
                $sql1 = $db->query($query1);				
                if($db->filas_afectadas($db)>=1)
                {
                    $query2="SELECT max(id) id FROM factura_venta 
                    where id_vendedor=$id_vendedor and estado='En_proceso_de_facturacion'"; 
                    $sql2 = $db->query($query2);				
                    if($db->filas_afectadas($db)>=1)
                    {
                        while ($datos= $db->recorrer($sql2)) {
                            $_SESSION['id_factura']=$datos[0];
                            $id_factura=$_SESSION['id_factura'];
                        } 
                        
                        $query_cons="SELECT id FROM detalle_venta 
                        where id_producto='$id_prod' and id_factura='$id_factura' 
                        and estado='En_proceso_de_facturacion'"; 
                        $sql_cons = $db->query($query_cons);
                        if($db->filas_afectadas($db)>=1)
                        {
                            $query3="UPDATE detalle_venta 
                            SET cantidad=cantidad+$cantidad WHERE id_factura=$id_factura 
                            and id_producto=$id_prod and estado='$estado'";
                        }else{
                            $query3="INSERT INTO detalle_venta(id_factura, id_producto, cantidad, 
                            precio_venta, estado) 
                            VALUES ('$id_factura','$id_prod','$cantidad','$precio_ven','$estado')";   								 
                        }

                       
                        $sql3 = $db->query($query3);				
                        if($db->filas_afectadas($db)>=1)
                        {
                            $db->commit(); //deja en firme las consultas                            
                            $rta = 1; 
                        }else{
                                $rta = 0; //no inserto en detalle_venta
                                $db->rollback();//devulve o reversa las transacciones
                            }
                        
                    }else{
                        $rta = -1; //no consulto nada en factura_venta
                        $db->rollback();
                    }
                } else{
                    $rta = -2; //no inserto en factura_venta
                    $db->rollback();
                }
           }else{//sino del control factura ==1
                
                    $query2="SELECT max(id) id FROM factura_venta 
                    where id_vendedor=$id_vendedor and estado='En_proceso_de_facturacion'"; 
                    $sql2 = $db->query($query2);				
                    if($db->filas_afectadas($db)>=1)
                    {
                        while ($datos= $db->recorrer($sql2)) {
                            $_SESSION['id_factura']=$datos[0];
                            $id_factura=$_SESSION['id_factura'];
                        } 
                        $query_cons="SELECT id FROM detalle_venta 
                        where id_producto='$id_prod' and id_factura='$id_factura' 
                        and estado='En_proceso_de_facturacion'"; 
                        $sql_cons = $db->query($query_cons);
                        if($db->filas_afectadas($db)>=1)
                        {
                            $query3="UPDATE detalle_venta 
                            SET cantidad=cantidad+$cantidad WHERE id_factura=$id_factura 
                            and id_producto=$id_prod and estado='$estado'";
                        }else{
                            $query3="INSERT INTO detalle_venta(id_factura, id_producto, cantidad, 
                            precio_venta, estado) 
                            VALUES ('$id_factura','$id_prod','$cantidad','$precio_ven','$estado')";   								 
                        }	
                        
                        $sql_query3 = $db->query($query3);
                        if($db->filas_afectadas($db)>=1)
                        {
                            $db->commit(); //deja en firme las consultas                  
                            $rta = 1; 
                        }else{
                                $rta = 0; //no inserto en detalle_venta
                                $db->rollback();//devulve o reversa las transacciones
                            }
                    }
               
           } 
            
            $rta_0['rta'] ="$rta";
            return json_encode($rta_0);    
       }else{
          $rta = -3; //algun dato requerido viene vacio 
          $rta_0['rta'] ="$rta";
          return json_encode($rta_0);
       }
          
       $db->close();  				  
   }catch(Exception $login){
       echo $login->getMessage();
   }
 
}


public function guardar_factura_venta(){       
    try{
        if(!empty($_POST['total_venta_enviar']) && !empty($_POST['cliente_env'])
        && !empty($_POST['id_formaPago']))
        {
           $db = new Conexion();
           $db->begin_transaction();

           $total_venta_enviar = filter_var($_POST['total_venta_enviar'],FILTER_SANITIZE_SPECIAL_CHARS);
           $cliente_env = filter_var($_POST['cliente_env'],FILTER_SANITIZE_SPECIAL_CHARS);		
           $id_formaPago = filter_var($_POST['id_formaPago'],FILTER_SANITIZE_SPECIAL_CHARS);	          
           $estado = "Facturado";           
           
           $query1="update factura_venta set id_cliente='$cliente_env', 
           id_forma_pago='$id_formaPago', total_venta='$total_venta_enviar', 
           estado='$estado' where id='".$_SESSION['id_factura']."' "; 
           $sql1 = $db->query($query1);				
           if($db->filas_afectadas($db)>=1)
           {
                $query_cons="update detalle_venta set estado='$estado'
                where id_factura='".$_SESSION['id_factura']."' 
                and estado='En_proceso_de_facturacion'"; 
                $sql_cons = $db->query($query_cons);
                if($db->filas_afectadas($db)>=1)
                {
                   $db->commit(); //deja en firme las consultas                            
                   $rta = 1; 
                }else{
                   $rta = 0; //no inserto en detalle_venta
                   $db->rollback();//devulve o reversa las transacciones
                }
                        
            }else{
                   $rta = -1; //no consulto nada en factura_venta
                   $db->rollback();
                 }
            $rta_0['rta'] ="$rta";
            return json_encode($rta_0);    
       }else{
          $rta = -3; //algun dato requerido viene vacio 
          $rta_0['rta'] ="$rta";
          return json_encode($rta_0);
       }
          
       $db->close();  				  
   }catch(Exception $login){
       echo $login->getMessage();
   }
 
}


    public function traer_forma_pago(){       
        try{
            
               $db = new Conexion();
               $rta = -1000;		
               
               $query1="SELECT id xml_1, formaPago xml_2 FROM forma_de_pago";   								
               $sql = $db->query($query1);				
               if($db->filas_afectadas($db)>=1)
               {
                    
                    while ($datos= $db->recorrer($sql)) {
                        $rta_0[]=$datos;
                    }  
                    return json_encode($rta_0);
                }else{
                    $rta = 0; 
                    $rta_0['rta'] ="$rta";
                    return json_encode($rta_0);
                }
                      
           
              
           $db->close();  				  
       }catch(Exception $login){
           echo $login->getMessage();
       }
     
    }

    public function traer_cliente(){       
        try{
            
               $db = new Conexion();
               $rta = -1000;		
               
               $query1="SELECT id xml_1, CONCAT(`nombres`,' ', `apellidos`) xml_2 FROM `cliente`";   								
               $sql = $db->query($query1);				
               if($db->filas_afectadas($db)>=1)
               {
                    
                    while ($datos= $db->recorrer($sql)) {
                        $rta_0[]=$datos;
                    }  
                    return json_encode($rta_0);
                }else{
                    $rta = 0; 
                    $rta_0['rta'] ="$rta";
                    return json_encode($rta_0);
                }
                      
           
              
           $db->close();  				  
       }catch(Exception $login){
           echo $login->getMessage();
       }
     
    }

public function listadoProductos(){       
    try{
        if(!empty($_POST['datoBusqueda']))
        {
           $db = new Conexion();
           $rta = -1000;
            
           $codigo = filter_var($_POST['datoBusqueda'],FILTER_SANITIZE_SPECIAL_CHARS);		
           
           $query1="SELECT id xml_1, codigo xml_2, nombre xml_3, 
           precio xml_4, cantidad xml_5 FROM `productos` WHERE codigo LIKE '%$codigo%';";   								
           $sql = $db->query($query1);				
           if($db->filas_afectadas($db)==0)
           {
                $query2="SELECT id xml_1, codigo xml_2, nombre xml_3, 
                precio xml_4, cantidad xml_5 FROM `productos` WHERE nombre LIKE '%$codigo%';";   								
                $sql2 = $db->query($query2);	
                if($db->filas_afectadas($db)>=1)
                { 
                    while ($datos= $db->recorrer($sql2)) {
                        $rta_0[]=$datos;
                    }  
                    return json_encode($rta_0);
                }else{
                    $rta = 0; 
                    $rta_0['rta'] ="$rta";
                    return json_encode($rta_0);
                  }
            }else{
                while ($datos= $db->recorrer($sql)) {
                    $rta_0[]=$datos;
                }  
                return json_encode($rta_0);
            }      
       }else{
          $rta = -1; 
          $rta_0['rta'] ="$rta";
          return json_encode($rta_0);
       }
          
       $db->close();  				  
   }catch(Exception $login){
       echo $login->getMessage();
   }
 
}

public function dow_reg_usuario(){
       
    try{
        if(!empty($_POST['id_reg_editar']))
        {
           $db = new Conexion();
           $rta = -1000;
           $id = filter_var($_POST['id_reg_editar'],FILTER_SANITIZE_SPECIAL_CHARS);		
           $query1="DELETE FROM `usuarios` WHERE id='$id'"; 								
           $sql = $db->query($query1);				
           if($db->filas_afectadas($db)==1)
           {		
              $rta = 1;  
           }else{
            $rta = 0; 
           }
               
               $db->close();  				
        }else{
               $rta=-1;
              }
           
   }catch(Exception $login){
       echo $login->getMessage();
   }
$rta_0['rta'] ="$rta";
return json_encode($rta_0);    
}


public function eliminar_producto(){
       
    try{
        if(!empty($_POST['id_elim_edit']))
        {
           $db = new Conexion();
           $rta = -1000;
           $id = filter_var($_POST['id_elim_edit'],FILTER_SANITIZE_SPECIAL_CHARS);		
           $query1="DELETE FROM detalle_venta WHERE id='$id'"; 								
           $sql = $db->query($query1);				
           if($db->filas_afectadas($db)==1)
           {		
              $rta = 1;  
           }else{
            $rta = 0; 
           }
               
               $db->close();  				
        }else{
               $rta=-1;
              }
           
   }catch(Exception $login){
       echo $login->getMessage();
   }
$rta_0['rta'] ="$rta";
return json_encode($rta_0);    
}

   public function guardar_usuarios(){
       
    try{
        if(!empty($_POST['nombre']) and !empty($_POST['apellidos']) and 
        !empty($_POST['user']) and !empty($_POST['pass']) and 
        !empty($_POST['rol']))
        {
           $db = new Conexion();
           $rta = -1000;
            
           $nombres = filter_var($_POST['nombre'],FILTER_SANITIZE_SPECIAL_CHARS);		
           $apellidos = filter_var($_POST['apellidos'],FILTER_SANITIZE_SPECIAL_CHARS);
           $user = filter_var($_POST['user'],FILTER_SANITIZE_SPECIAL_CHARS);		
           $pass = filter_var($_POST['pass'],FILTER_SANITIZE_SPECIAL_CHARS);	
           $rol = filter_var($_POST['rol'],FILTER_SANITIZE_SPECIAL_CHARS);
           
         /* $query1="INSERT INTO usuarios(usuario, pass, nombre, apellido, rol)
            VALUES (' $nombres','$apellidos',' $user','$pass','$rol')";*/
            $query1="CALL crear_usuarios('$nombres', '$apellidos', '$user', '$pass','$rol')";
           echo $query1;    								
           $sql = $db->query($query1);				
           if($db->filas_afectadas($db)==1)
           {		
              $rta = 1;  
           }else{
            $rta = 0; 
           }
               
               $db->close();  				
        }else{
               $rta=-1;
              }
           
   }catch(Exception $login){
       echo $login->getMessage();
   }
$rta_0['rta'] ="$rta";
return json_encode($rta_0);    
}



public function editarProducto(){
       
    try{
        if(!empty($_POST['id_prod']) && !empty($_POST['precio_ven'])
        && !empty($_POST['cantidad']))
        {
           $db = new Conexion();
           $rta = -1000;
            
           $id_prod = filter_var($_POST['id_prod'],FILTER_SANITIZE_SPECIAL_CHARS);
           $id_vendedor = filter_var($_POST['id_vendedor'],FILTER_SANITIZE_SPECIAL_CHARS);		
           $precio_ven = filter_var($_POST['precio_ven'],FILTER_SANITIZE_SPECIAL_CHARS);	
           $cantidad = filter_var($_POST['cantidad'],FILTER_SANITIZE_SPECIAL_CHARS);		
           $id_elim_edit =filter_var($_POST['id_elim_edit'],FILTER_SANITIZE_SPECIAL_CHARS);
           $estado = "En_proceso_de_facturacion";
           
           $query1="UPDATE detalle_venta SET id_producto='$id_prod',
           cantidad='$cantidad',precio_venta='$precio_ven' 
           WHERE id_producto='$id_elim_edit' and id_factura='".$_SESSION['id_factura']."'";
           //echo $query1;    								
           $sql = $db->query($query1);				
           if($db->filas_afectadas($db)==1)
           {		
              $rta = 1;  
           }else{
            $rta = 0; 
           }
               
               $db->close();  				
        }else{
               $rta=-1;
              }
           
   }catch(Exception $login){
       echo $login->getMessage();
   }
$rta_0['rta'] ="$rta";
return json_encode($rta_0);    
}

public function editar_user(){
       
    try{
        if(!empty($_POST['id_reg_editar']) and !empty($_POST['nombre'])and !empty($_POST['apellidos']) and 
        !empty($_POST['user']) and !empty($_POST['pass']) and 
        !empty($_POST['rol']))
        {
           $db = new Conexion();
           $rta = -1000;
            
           $id = filter_var($_POST['id_reg_editar'],FILTER_SANITIZE_SPECIAL_CHARS);	
           $nombres = filter_var($_POST['nombre'],FILTER_SANITIZE_SPECIAL_CHARS);		
           $apellidos = filter_var($_POST['apellidos'],FILTER_SANITIZE_SPECIAL_CHARS);
           $user = filter_var($_POST['user'],FILTER_SANITIZE_SPECIAL_CHARS);		
           $pass = filter_var($_POST['pass'],FILTER_SANITIZE_SPECIAL_CHARS);	
           $rol = filter_var($_POST['rol'],FILTER_SANITIZE_SPECIAL_CHARS);
           
           $query1="UPDATE usuarios SET usuario='$user', pass='$pass', nombre='$nombres', 
           apellido='$apellidos', rol='$rol' WHERE id='$id'";
           //echo $query1;    								
           $sql = $db->query($query1);				
           if($db->filas_afectadas($db)==1)
           {		
              $rta = 1;  
           }else{
            $rta = 0; 
           }
               
               $db->close();  				
        }else{
               $rta=-1;
              }
           
   }catch(Exception $login){
       echo $login->getMessage();
   }
$rta_0['rta'] ="$rta";
return json_encode($rta_0);    
}

   public function cerrarSession(){
    session_start();
    $_SESSION = array();
    session_destroy();
    $rta = 1; 
    $rta_0['rta'] ="$rta";
    return json_encode($rta_0);    
  }

}



?>