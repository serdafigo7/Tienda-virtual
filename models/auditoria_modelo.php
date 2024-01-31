<?php 
session_start();
require_once('class.Conexion.php');
class Acceso{

    public function auditoria_ventas(){
        try{
         
               $db = new Conexion();
               $query1="select f.fecha xml1,f.hora xml2,concat(c.nombres, ' ', c.apellidos) xml3,f.id xml4,f.total_venta xml5,concat(u.nombre, ' ',u.apellido) xml6,f.estado xml7 from factura_venta as f
               right join cliente as c on f.id_cliente = c.id
               right join usuarios as u on f.id_vendedor=u.id
               WHERE f.estado = 'facturado';";					
               $sql = $db->query($query1);				
               if($db->filas_afectadas($db)>=1)
               {		
                 while ($datos= $db->recorrer($sql)) {
                 
                    $rta_0[]=$datos;
                 }  
             // $array=$datos;
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


   public function rango_fecha(){
    try{
if ($_POST) {
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];
  }
    $respuesta = array();

    $db = new Conexion();
    $query4 = "select f.fecha xml1,f.hora xml2,concat(c.nombres, ' ', c.apellidos) xml3,f.id xml4,f.total_venta xml5,concat(u.nombre, ' ',u.apellido) xml6,f.estado xml7 from factura_venta as f
           right join cliente as c on f.id_cliente = c.id
           right join usuarios as u on f.id_vendedor=u.id
           WHERE f.estado = 'facturado' and f.fecha>= '$fecha_inicio' and f.fecha<= '$fecha_fin';";
    $sql4 = $db->query($query4);
    if($db->filas_afectadas($db) >= 1) {
        while ($datos = $db->recorrer($sql4)){
           
            $rta_0[] = $datos;
        }
        // $array=$datos;
        return json_encode($rta_0);
    } else {
        $rta = 0;
        $rta_0['rta'] = "$rta";
        return json_encode($rta_0);
    }

    $db->close();
				     
   }catch(Exception $login){
       echo $login->getMessage();
   }
}




   public function fecha_exacta(){
    try{
if ($_POST) {
    $fecha = $_POST['fecha'];
  }
    $respuesta = array();

    $db = new Conexion();
    $query4 = "select f.fecha xml1,f.hora xml2,concat(c.nombres, ' ', c.apellidos) xml3,f.id xml4,f.total_venta xml5,concat(u.nombre, ' ',u.apellido) xml6,f.estado xml7 from factura_venta as f
           right join cliente as c on f.id_cliente = c.id
           right join usuarios as u on f.id_vendedor=u.id
           WHERE f.estado = 'facturado' and f.fecha= '$fecha';";
    $sql4 = $db->query($query4);
    if($db->filas_afectadas($db) >= 1) {
        while ($datos = $db->recorrer($sql4)){
           
            $rta_0[] = $datos;
        }
        // $array=$datos;
        return json_encode($rta_0);
    } else {
        $rta = 0;
        $rta_0['rta'] = "$rta";
        return json_encode($rta_0);
    }

    $db->close();
				     
   }catch(Exception $login){
       echo $login->getMessage();
   }
}
   





   public function busqueda_nit_vendedor(){
    try{
if ($_POST) {
    $identidadv = $_POST['identidadv'];
  }
    $respuesta = array();

    $db = new Conexion();
    $query4 = "select f.fecha xml1,f.hora xml2,concat(c.nombres, ' ', c.apellidos) xml3,f.id xml4,f.total_venta xml5,concat(u.nombre, ' ',u.apellido) xml6,f.estado xml7 from factura_venta as f
           right join cliente as c on f.id_cliente = c.id
           right join usuarios as u on f.id_vendedor=u.id
           WHERE f.estado = 'facturado' and u.nombre= '$identidadv';";
    $sql4 = $db->query($query4);
    if($db->filas_afectadas($db) >= 1) {
        while ($datos = $db->recorrer($sql4)){
           
            $rta_0[] = $datos;
        }
        // $array=$datos;
        return json_encode($rta_0);
    } else {
        $rta = 0;
        $rta_0['rta'] = "$rta";
        return json_encode($rta_0);
    }

    $db->close();
				     
   }catch(Exception $login){
       echo $login->getMessage();
   }
}




public function busqueda_nit_cliente(){
    try{
if ($_POST) {
    $nitc = $_POST['nitc'];
  }
    $respuesta = array();

    $db = new Conexion();
    $query3 = "select f.fecha xml1,f.hora xml2,concat(c.nombres, ' ', c.apellidos) xml3,f.id xml4,f.total_venta xml5,concat(u.nombre, ' ',u.apellido) xml6,f.estado xml7 from factura_venta as f
           right join cliente as c on f.id_cliente = c.id
           right join usuarios as u on f.id_vendedor=u.id
           WHERE f.estado = 'facturado' and c.nit= '$nitc';";
    $sql3 = $db->query($query3);
    if($db->filas_afectadas($db) >= 1) {
        while ($datos = $db->recorrer($sql3)) {
           
            $rta_0[] = $datos;
        }
        // $array=$datos;
        return json_encode($rta_0);
    } else {
        $rta = 0;
        $rta_0['rta'] = "$rta";
        return json_encode($rta_0);
    }

    $db->close();
				     
   }catch(Exception $login){
       echo $login->getMessage();
   }
}


   

public function busqueda_nfactura(){
    try{
if ($_POST) {
    $nfact = $_POST['nfact'];
  }
    $respuesta = array();

    $db = new Conexion();
    $query2 = "select f.fecha xml1,f.hora xml2,concat(c.nombres, ' ', c.apellidos) xml3,f.id xml4,f.total_venta xml5,concat(u.nombre, ' ',u.apellido) xml6,f.estado xml7 from factura_venta as f
           right join cliente as c on f.id_cliente = c.id
           right join usuarios as u on f.id_vendedor=u.id
           WHERE f.estado = 'facturado' and f.id= '$nfact';";
    $sql2 = $db->query($query2);
    if($db->filas_afectadas($db) >= 1) {
        while ($datos = $db->recorrer($sql2)) {
           
            $rta_0[] = $datos;
        }
        // $array=$datos;
        return json_encode($rta_0);
    } else {
        $rta = 0;
        $rta_0['rta'] = "$rta";
        return json_encode($rta_0);
    }

    $db->close();
				     
   }catch(Exception $login){
       echo $login->getMessage();
   }
}

   
   public function factura_pdf($id){
    try{
      $respuesta= array();
           $db = new Conexion();
           $query1="select p.nombre xml1, dv.cantidad xml2,  p.precio xml3, (dv.cantidad * p.precio) xml4 , fv.fecha xml5, fv.total_venta xml6  from productos p
           left join detalle_venta dv on p.id= dv.id_producto 
           left join factura_venta fv on dv.id_factura = fv.id where dv.id_factura =  '$id';";			
           $sql = $db->query($query1);				
           if($db->filas_afectadas($db)>=1)
           {		
             while ($datos= $db->recorrer($sql)) {
                $rta_0[]=$datos;
             }  
         // $array=$datos;
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



public function factura_cabecera($id){
    try{
      $respuesta= array();
           $db = new Conexion();
           $query1="select concat(c.nombres,' ', c.apellidos) xml12, fv.fecha xml13, u.nombre xml14 from cliente c left join 
           factura_venta fv on c.id = fv.id_Cliente
           left join forma_de_pago fp on fv.id_forma_pago = fp.id
           left join usuarios u on fv.id_vendedor = u.id
           
            where fv.id  = '$id';";			
           $sql = $db->query($query1);				
           if($db->filas_afectadas($db)>=1)
           {		
             while ($datos= $db->recorrer($sql)) {
                $rta_0[]=$datos;
             }  
         // $array=$datos;
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



   
   

}
