<?php
  date_default_timezone_set("America/Bogota");
  session_start();
  if($_SESSION['rol']!='administrador'){
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
                           
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                <?php echo $_SESSION['nombre'].' '.$_SESSION['apellido'];  ?> <?php echo "(".$_SESSION['rol'].")";  ?>
                            </div>
                            

                            <div class="card-body">
                                        <form id="form_general" method="POST">
                                          <input id="id_reg_editar" name="id_reg_editar" type="hidden"/>
                                          <input id="rol_user" value="<?php echo $_SESSION['rol']; ?>" type="hidden" />
                                            <div class="row mb-12">
                                            
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Enter your Nombre" />
                                                        <label for="inputFirstName">Nombre</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="apellidos" name="apellidos" type="text" placeholder="Enter your Apellido" />
                                                        <label for="inputLastName">Apellido</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="user" name="user" type="text" placeholder="Enter your last Usuario" />
                                                        <label for="inputLastName">Usuario</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="pass" name="pass" type="text" placeholder="Enter your Contraseña" />
                                                        <label for="inputLastName">Contraseña</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-floating">
                                                        <select class="form-control" name="rol" id="rol">
                                                            <option value="">--Seleccione--</option>
                                                            <option value="ventas">Venta</option>
                                                            <option value="contabilidad">Contabilidad</option>
                                                            <option value="administrador">Administrador</option>
                                                        </select>
                                                    </div>
                                                    
                                                </div>
                                                
                                            </div>
                                            <div class="row mb-12">



                                            <div class="col-md-12 mt-3 d-md-flex justify-content-md-center">
                                                   <button type="button" class="btn btn-primary mr-3" id="btn_add_user">Add</button>
                                                </div>




                                                <div class="col-md-12 mt-3 d-md-flex justify-content-md-center">
                                                   <button type="button" class="btn btn-danger mr-3" id="btn_editar">Editar</button>
                                                   <button type="button" class="btn btn-warning" id="btn_cancelar">Cancelar</button>
                                                </div>
                                            </div>
                                            
                                        </form>
                                    </div>
                            <?php require_once('vistas/tabla.php'); ?>
                        </div>
                    </div>
                </main>
                <?php require_once('vistas/footer_principal.php') ?>
            </div>
        </div>

        <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <!--Inicio formulario-->
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                          <form id="form_SaveUser2" method="POST">                                          
                                            <div class="row mb-8">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control mt-2" id="nombres" name="nombres" type="text" placeholder="Enter your name" />
                                                        <label for="inputFirstName">Nombres</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-floating">
                                                        <input class="form-control mt-2" id="apellidos" name="apellidos" type="text" placeholder="Enter your apellido" />
                                                        <label for="inputLastName">Apellidos</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-12">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                    <select class="form-control" name="rol" id="rol">
                                                            <option value="">--Seleccione--</option>
                                                            <option value="venta">Venta</option>
                                                            <option value="contabilidad">Contabilidad</option>
                                                            <option value="administrativo">Administrativo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-12">
                                                <input class="form-control mt-2" id="user" name="user" type="text" placeholder="Usuario" />
                                                <label for="inputEmail">Usuario</label>
                                            </div>
                                            <div class="row mb-12">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control mt-2" id="pass" name="pass" type="password" placeholder="Password" />
                                                        <label for="inputPassword">Password</label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                            <div class="mt-12 mb-0">
                                                <div class=""><button id="btn_crear_user" type="button" class="btn btn-primary btn-block" >Crear un usuario</button></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.html">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; DR Sergio 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!--fin formulario-->
      </div>
      
    </div>
  </div>
</div>

<?php require_once('vistas/link_footer.php') ?>     
<script src="js/mis_script.js"></script>    
</body>
</html>
