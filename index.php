<!DOCTYPE html>
<html lang="en">
<head>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <script src="js/jquery-1.4.4.min.js"> </script>
   <?php require_once('vistas/cabecera.php');?>
  
   <title>Login</title>
    
</head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form id="form" method="POST">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="user" name="user" type="text" placeholder="Ingrese su usuario" />
                                                <label for="inputEmail">Ingrese su usuario</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="pass" name="pass" type="password" placeholder="Ingrese su Password" />
                                                <label for="inputPassword">Ingrese su Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Recordar tu Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Se te olvidó tu Password?</a>
                                                <button type="button" id="btn_acceso" class="btn btn-primary" >Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.html">Necesitas ayuda? Haz click aquí</a></div>
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
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>     
        <script src="js/mis_script.js"></script>
    </body>
</html>
