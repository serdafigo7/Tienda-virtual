<?php
  date_default_timezone_set("America/Bogota");
  session_start();
  if($_SESSION['rol']!='ventas'){
    session_start();
    $_SESSION = array();
    session_destroy();
    header('Location: index.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once('vistas/cabecera.php');?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
   
   <title>Administración</title>
</head>
    <body class="sb-nav-fixed">
    <?php require_once('vistas/menu_horizontal.php'); ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
               <?php require_once('vistas/menu_vertical2.php'); ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                       
                        
                        <ol class="">
                           <br>
                        </ol>
                           <?php //require_once('vistas/card.php'); ?>
                           <?php //require_once('vistas/graficos.php'); ?> 
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Bienvenido: <?php echo $_SESSION['nombre'].' '.$_SESSION['apellido']; ?> Rol: <?php echo $_SESSION['rol'];  ?>
                            </div>
                            

                            <div class="card-body">
                                <form id="form_general" method="POST">

                                total<input id="total_venta_enviar" name="total_venta_enviar" type="text" />
                                cliente_env<input id="cliente_env" name="cliente_env" type="text" />
                                id_formaPago<input id="id_formaPago" name="id_formaPago" type="text" />
                                <br>
                                cant_stock<input id="cant_stock" name="cant_stock" type="text" />
                                cant_vendida<input id="cant_vendida" name="cant_vendida" type="text" />  
                                id_elim_edit<input id="id_elim_edit" name="id_elim_edit" type="text" />          

                                <input id="id_prod" name="id_prod" type="hidden" />   
                                <input id="precio_ven" name="precio_ven" type="hidden" />  
                                <input value="<?php echo $_SESSION['id_vendedor']; ?>" id="id_vendedor" name="id_vendedor" type="hidden" />  

                                <input id="rol_user" value="<?php echo $_SESSION['rol']; ?>" type="hidden" />
                                <input id="rol_user" name="nombre_prod" type="hidden" />
                                    <div class="row mb-3">
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                            <input class="form-control" id="inputCodigo" name="codigo" type="text" placeholder="Ingrese Código del Articulo" />
                                                            <label for="inputCodigo">Código o nombre del Producto</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-floating">
                                                            <input class="form-control" id="inputPrecio" name="precio" type="text" placeholder="Ingrese el precio de venta" />
                                                            <label for="inputPrecio">Precio de venta</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-floating">
                                                            <input class="form-control" id="inputCantidad" name="cantidad" type="text" placeholder="Ingrese la Cantidad" />
                                                            <label for="inputCantidad">Cantidad</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 mt-3 d-md-flex justify-content-md-center">
                                                    <button type="button" class="btn btn-info" id="btn_add_articulo">Add Producto</button>
                                                    <button type="button" class="btn btn-warning" id="btn_actualizarProd">Actualizar Producto</button>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 mt-3 d-md-flex justify-content-md-center">
                                                        <?php require_once('vistas/tabla_ventas.php'); ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="row mb-12">
                                                        <div class="card bg-danger text-white mb-12">
                                                            <div class="card-body"><span id="span_nombreProducto"></span></div>
                                                            <div class="card-footer d-flex align-items-center justify-content-between">                                                              
                                                                <table class="small text-white stretched-link align-items-center">
                                                                    <tr><td colspan="2">DATOS DEL ARTICULO</td></tr>
                                                                    <tr><td>Stock </td><td><span id="stock"></span></td></tr>
                                                                    <tr><td>Precio</td><td><span id="precio_venta"></span></td></tr>        
                                                                </table>
                                                            </div>
                                                        </div>

                                                        <div class="card bg-warning text-black mb-12 mt-3">
                                                            <div class="card-body">
                                                                <table>
                                                                    <tr><td>NETO</td><td>$ <span id="td_neto"></span></td></tr>
                                                                    <tr><td>T PAGADO</td><td>$</td></tr>
                                                                    <tr><td>SALDO</td><td>$</td></tr>
                                                                    <tr><td>CAMBIO</td><td>$</td></tr>
                                                                </table>
                                                                <div class="md-12 mt-3 d-md-flex justify-content-md-center">                                                                        
                                                                    <select class="form-control" name="cliente" id="cliente">
                                                                        <option value="">--Seleccione el cliente--</option> 
                                                                        <option value="1">--Juan Carlos Lopez Mogollón--</option>
                                                                        <option value="Mateo Ruiz Martinez">--Mateo Ruiz Martinez--</option>                                                                   
                                                                    </select>
                                                                </div>                                                            
                                                                <div class="md-12 mt-3 d-md-flex justify-content-md-center">                                                                                                                             
                                                                    <select class="form-control" name="forma_pago" id="forma_pago">
                                                                        <option value="">--Seleccione la forma de pago--</option>   
                                                                        <option value="Contado">--Contado--</option>   
                                                                        <option value="Crédito">--Crédito--</option>                                                                    
                                                                    </select>                                                            
                                                                </div>
                                                                <div class="md-12 mt-3 d-md-flex justify-content-md-center">     
                                                                    <textarea class="form-control" name="obs" id="obs" cols="20" rows="6"></textarea>
                                                                </div>
                                                            </div>  
                                                            
                                                                                                                  
                                                        </div> 
                                                          
                                                        <div class="mb-12 mt-3 d-md-flex justify-content-md-center">
                                                           <button type="button" class="btn btn-success" id="btn_calcular">Grabar Factura</button>
                                                        </div> 
                                                                                                     
                                                </div>    
                                            </div>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </main>
                <?php require_once('vistas/footer_principal.php') ?>
            </div>
        </div>
       
<?php require_once('vistas/productos.php'); ?> 
<?php require_once('vistas/link_footer.php') ?>     
</body>
</html>
