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
   
   <title>Auditoria Ventas</title>
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
                       
                        
                
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                AUDITORIA A LAS VENTAS
                            </div>

                            <div class="card-body">
                               <form action="" id='e'>
                               <table class="table" id="lista_au"></table>
                               </form>
                            </div>
                            
                        </div>
                    </div>
                </main>
                <?php require_once('vistas/footer_principal.php') ?>
            </div>
        </div>

       
<?php require_once('vistas/link_footer.php') ?> 
<script src="js/auditoria.js"></script>

</body>
</html>
