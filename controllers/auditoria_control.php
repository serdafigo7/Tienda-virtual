<?php
$type= $_REQUEST['type'];
if(isset($type)){
    switch ($type) {
        case 1:{
            require_once('../models/auditoria_modelo.php');
            $obj = new Acceso();
            echo $resp = $obj->auditoria_ventas(); 
            break;
        }
        case 2:{
            require_once('../models/auditoria_modelo.php');
            $obj = new Acceso();
            echo $resp = $obj->busqueda_nfactura(); 
            break;
        }
        case 3:{
            require_once('../models/auditoria_modelo.php');
            $obj = new Acceso();
            echo $resp = $obj->busqueda_nit_cliente(); 
            break;
        }
        case 4:{
            require_once('../models/auditoria_modelo.php');
            $obj = new Acceso();
            echo $resp = $obj->busqueda_nit_vendedor(); 
            break;
        }
        case 5:{
            require_once('../models/auditoria_modelo.php');
            $obj = new Acceso();
            echo $resp = $obj->fecha_exacta(); 
            break;
        }
        case 6:{
            require_once('../models/auditoria_modelo.php');
            $obj = new Acceso();
            echo $resp = $obj->rango_fecha(); 
            break;
        }
        
    }
}
?>