<?php
$type= $_REQUEST['type'];
if(isset($type)){
    switch ($type) {
        case 1:{
            require_once('../models/modelo.acceso.php');
            $obj = new Acceso();
            echo $resp = $obj->evaluar_acceso();
            /*$rta =1;
            $rta_0['rta'] ="$rta";
            echo json_encode($rta_0);*/   
            break;
        }

        case 2:{
            require_once('../models/modelo.acceso.php');
            $obj = new Acceso();
            echo $resp = $obj->cerrarSession(); 
            break;  
            
        }

        case 3:{
            require_once('../models/modelo.acceso.php');
            $obj = new Acceso();
            echo $resp = $obj->guardar_usuarios(); 
            break;  
        }

        case 4:{
            require_once('../models/modelo.acceso.php');
            $obj = new Acceso();
            echo $resp = $obj->cargar_tabla_usuarios_usuarios(); 
            break;   
        }

        case 5:{
            require_once('../models/modelo.acceso.php');
            $obj = new Acceso();
            echo $resp = $obj->get_reg_usuario(); 
            break;   
        }

        case 6:{
            require_once('../models/modelo.acceso.php');
            $obj = new Acceso();
            echo $resp = $obj->editar_user(); 
            break;   
        }

        case 7:{
            require_once('../models/modelo.acceso.php');
            $obj = new Acceso();
            echo $resp = $obj->dow_reg_usuario(); 
            break;   
        }

        case 8:{
            require_once('../models/modelo.acceso.php');
            $obj = new Acceso();
            echo $resp = $obj->buscarProducto(); 
            break;   
        }

        case 9:{
            require_once('../models/modelo.acceso.php');
            $obj = new Acceso();
            echo $resp = $obj->listadoProductos(); 
            break;   
        }

        case 10:{
            require_once('../models/modelo.acceso.php');
            $obj = new Acceso();
            echo $resp = $obj->guardar_detalle_venta(); 
            break;   
        }

        case 11:{
            require_once('../models/modelo.acceso.php');
            $obj = new Acceso();
            echo $resp = $obj->traer_cliente(); 
            break;   
        }

        case 12:{
            require_once('../models/modelo.acceso.php');
            $obj = new Acceso();
            echo $resp = $obj->traer_forma_pago(); 
            break;   
        }

        case 13:{
            require_once('../models/modelo.acceso.php');
            $obj = new Acceso();
            echo $resp = $obj->buscarCantVendida(); 
            break;   
        }

        case 14:{
            require_once('../models/modelo.acceso.php');
            $obj = new Acceso();
            echo $resp = $obj->cargar_tabla_list_prod_vendidos(); 
            break;   
        }

        case 15:{
            require_once('../models/modelo.acceso.php');
            $obj = new Acceso();
            echo $resp = $obj->eliminar_producto(); 
            break;   
        }
        case 16:{
            require_once('../models/modelo.acceso.php');
            $obj = new Acceso();
            echo $resp = $obj->buscarProductoEditar(); 
            break;   
        }
        case 17:{
            require_once('../models/modelo.acceso.php');
            $obj = new Acceso();
            echo $resp = $obj->editarProducto(); 
            break;   
        }
        case 18:{
            require_once('../models/modelo.acceso.php');
            $obj = new Acceso();
            echo $resp = $obj->guardar_factura_venta(); 
            break;   
        }
        case 19:{
            require_once('../models/modelo.acceso.php');
            $obj = new Acceso();
            echo $resp = $obj->cargar_auditoria(); 
            break;   
        }
    }
}

?>