<!-- Modal listar productos-->
<div class="modal fade" id="listarProductos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
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
                                        <form id="form_listarProductos" method="POST"></form>
                                        <?php require_once('vistas/tabla_ventas.php'); ?>  
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <!--fin formulario-->
      </div>
      
    </div>
  </div>
</div>