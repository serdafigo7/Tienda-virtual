$(document).ready(function(){
   $("#btn_actualizarProd").hide();

   traer_cliente();
   traer_forma_pago();

   $("#btn_actualizarProd").click(function(){
      editarProducto();
   });

   $("#btn_editar").hide();
   $("#btn_cancelar").hide();
   var rol_user = $("#rol_user").val();
   if(rol_user=='ventas'){
      cargar_tabla_list_prod_vendidos(); 
   }else if(rol_user=='administrador'){
      cargar_tabla_usuarios();
   }
   $("#btn_add_user").click(function(){


    // Llama a la función para crear el usuario
    crear_user();

      //swal("Good job!", "Se ha editado exitosamente", "success")
      //cargar_tabla_usuarios();
      
     });

   $("#btn_acceso").click(function(){
    acceder();
   });

   $("#btn_add_articulo").click(function(){
      guardar_detalle_venta();
   });
   $("#btn_calcular").click(function(){
   
      guardar_factura_venta();
   });

   $("#btn_cerrarSession").click(function(){
      cerrarSession();
   });

  

   $("#inputCodigo").keypress(function(tecla){
      if(tecla.which==13){
         $("#listaProductos").modal('show');
         listadoProductos();
      }
   });

   $("#btn_editar").click(function(){
      editar_user();
   });

   $("#cliente").change(function(){
      var cliente = $("#cliente").val();  
      $("#cliente_env").val(cliente);  
   });

   $("#forma_pago").change(function(){
      var forma_pago = $("#forma_pago").val();  
      $("#id_formaPago").val(forma_pago);  
   });

   $("#btn_cancelar").click(function(){
      $("#id_reg_editar").val("");  
      $("#nombre").val("");  
      $("#apellidos").val("");  
      $("#user").val("");  
      $("#pass").val("");  
      $("#rol").val("");  
      $("#btn_editar").hide();
      $("#btn_cancelar").hide();  
   });

   

   

});

function conComas(valor) {
   var nums = new Array();
   var simb = "."; //Éste es el separador
   valor = valor.toString();
   valor = valor.replace(/\D/g, "");   //Ésta expresión regular solo permitira ingresar números
   nums = valor.split(""); //Se vacia el valor en un arreglo
   var long = nums.length - 1; // Se saca la longitud del arreglo
   var patron = 3; //Indica cada cuanto se ponen las comas
   var prox = 2; // Indica en que lugar se debe insertar la siguiente coma
   var res = "";

   while (long > prox) {
       nums.splice((long - prox),0,simb); //Se agrega la coma
       prox += patron; //Se incrementa la posición próxima para colocar la coma
   }

   for (var i = 0; i <= nums.length-1; i++) {
       res += nums[i]; //Se crea la nueva cadena para devolver el valor formateado
   }

   return res;
}

function traer_forma_pago(){ 
   var pet="controllers/control_acceso.php?type=12";  
   var met=$('#form_general').attr('method'); 
   $.ajax({
   beforeSend: function(){ 
    
   },
   url:pet,
   type:met,
   data:$('#form_general').serialize(),      
   success:function(data2json){
     console.log("Verif_Utilidad: "+data2json.trim());
             try{
                var json_obj = $.parseJSON(data2json);
                $("#forma_pago").empty();
                $("#forma_pago").append('<option value="">--Sel forma de pago--</option>');
                for (var i in json_obj){
                  //$("#id_formaPago").empty();
                  //$("#id_formaPago").val(json_obj[i].xml_1);
                  $("#forma_pago").append('<option value="'+json_obj[i].xml_1+'">'+json_obj[i].xml_2+'</option>');                  
                } 
                 }catch(err1){
                  console.log(err1.message);  
                 }                  
             },
   error:function(jqXHR,estado,error){
    console.log("del error type 3"+estado);   
   }, 
   complete:function(jqXHR,estado2){     
            console.log("del complete type 3"+estado2);
           },
   timeout:90000
  });    
}

function traer_cliente(){ 
   var pet="controllers/control_acceso.php?type=11";  
   var met=$('#form_general').attr('method'); 
   $.ajax({
   beforeSend: function(){ 
    
   },
   url:pet,
   type:met,
   data:$('#form_general').serialize(),      
   success:function(data2json){
     console.log("Verif_Utilidad: "+data2json.trim());
             try{              
                var json_obj = $.parseJSON(data2json);
                $("#cliente").empty();
                $("#cliente").append('<option value="">--Seleccione al cliente--</option>');
                for (var i in json_obj){ 
                  
                  $("#cliente").append('<option value="'+json_obj[i].xml_1+'">'+json_obj[i].xml_2+'</option>'); 
                  
                }  

                 }catch(err1){
                  console.log(err1.message);  
                 }
                   //  toastr["warning"](""+data2json+"");

             },
   error:function(jqXHR,estado,error){
    console.log("del error type 3"+estado);   
   }, 
   complete:function(jqXHR,estado2){     
            console.log("del complete type 3"+estado2);
           },
   timeout:90000
  });    
}

function listadoProductos(){   
   $("#datoBusqueda").val($("#inputCodigo").val());
       
   var pet="controllers/control_acceso.php?type=9";  
   var met=$('#form_lis_prod').attr('method'); 
   $.ajax({
   beforeSend: function(){ 
    
   },
   url:pet,
   type:met,
   data:$('#form_lis_prod').serialize(),      
   success:function(data2json){
     console.log("Verif_Utilidad: "+data2json.trim());
             try{              
                     var json_obj = $.parseJSON(data2json); 
                     $("#tbl_lista_prod").empty();
                     var pos=0;
                     var encabezado ='<thead class="thead-dark"><tr>'+
                        '<td width="10%" style="background:#FBFCB8; text-align:center;">Id</td>'+
                        '<td width="15%" style="background:#FBFCB8; text-align:center;">Código</td>'+
                        '<td width="30%" style="background:#FBFCB8; text-align:center;">Producto</td>'+
                        '<td width="15%" style="background:#FBFCB8; text-align:center;">Precio</td>'+
                        '<td width="10%" style="background:#FBFCB8; text-align:center;">Cantidad</td>'+                  
                        '<td width="20%" style="background:#FBFCB8;"></td></tr> ';
                     $('#tbl_lista_prod').append(encabezado);
                    for (var i in json_obj){ 
                        var boton_seleccionar='<button type="button" id="btn_up_'+pos+'" title="Seleccionar producto" class="btn btn-danger btn-sm" onclick="buscarProducto('+json_obj[i].xml_1+')"><span class="icon-delete">Seleccionar</span></button>';  
                        //var boton_editar='<button type="button" id="btn_up_'+pos+'" title="Editar este usuario" class="btn btn-secondary btn-sm" onclick="get_reg_usuario('+json_obj[i].xml_1+')"><span class="icon-mode_edit">Editar</span></button>';

                        var filaadd=' <tbody><tr id="tr_obj_general_'+pos+'">'+
                        '<td width="" style="background:#; text-align:center;" id="obj_codigo_'+pos+'">'+json_obj[i].xml_1+'</td>'+
                        '<td width="" style="background:#; text-align:center;" id="obj_nombre_'+pos+'">'+json_obj[i].xml_2+'</td>'+
                        '<td width="" style="background:#; text-align:center;" id="obj_nombre_'+pos+'">'+json_obj[i].xml_3+'</td>'+
                        '<td width="" style="background:#; text-align:center;" id="obj_fecha_'+pos+'">'+json_obj[i].xml_4+'</td>'+                 
                        '<td width="" style="background:#; text-align:center;" id="obj_categoria_'+pos+'">'+json_obj[i].xml_5+'</td>'+                               
                        '<td width="" style="background:#; text-align:center;" id="obj_boton_'+pos+'">'+boton_seleccionar+'</td>'+'</tr></tbody>';
                        $('#tbl_lista_prod').append(filaadd); 
                        pos++;
                    }

                 }catch(err1){
                  console.log(err1.message);  
                 }

             },
   error:function(jqXHR,estado,error){
    console.log("del error type 3"+estado);   
   }, 
   complete:function(jqXHR,estado2){     
            console.log("del complete type 3"+estado2);
           },
   timeout:90000
  });    
}

function buscarProducto(id){ 
   $("#idBusqueda").val(id);
   var pet="controllers/control_acceso.php?type=8";  
   var met=$('#form_lis_prod').attr('method'); 
   $.ajax({
   beforeSend: function(){ 
    
   },
   url:pet,
   type:met,
   data:$('#form_lis_prod').serialize(),      
   success:function(data2json){
     console.log("Verif_Utilidad: "+data2json.trim());
             try{              
                var json_obj = $.parseJSON(data2json); 
                for (var i in json_obj){ 
                    $("#id_prod").val(""); 
                    $("#id_prod").val(json_obj[i].xml_1); 
                    $("#precio_ven").val(""); 
                    $("#precio_ven").val(json_obj[i].xml_4); 
                                       
                    $("#cant_stock").val(json_obj[i].xml_5);

                    $("#nombre_prod").val("");  
                    $("#nombre_prod").val(json_obj[i].xml_3); 
                    $("#span_nombreProducto").html(json_obj[i].xml_3);  
                    $("#inputPrecio").val(""); 
                    var p=conComas(json_obj[i].xml_4);
                    $("#inputPrecio").val(p); 
                    $("#inputCantidad").val("");
                    $("#inputCodigo").val(json_obj[i].xml_2);
                    $("#stock").html(json_obj[i].xml_5);  
                    $("#precio_venta").html(p);                                    
                }  
                $("#listaProductos").modal('hide');
                buscarCantVendida(id);

                 }catch(err1){
                  console.log(err1.message);  
                 }
                   //  toastr["warning"](""+data2json+"");

             },
   error:function(jqXHR,estado,error){
    console.log("del error type 3"+estado);   
   }, 
   complete:function(jqXHR,estado2){     
            console.log("del complete type 3"+estado2);
           },
   timeout:90000
  });    
}

function buscarCantVendida(){ 

   var pet="controllers/control_acceso.php?type=13";  
   var met=$('#form_lis_prod').attr('method'); 
   $.ajax({
   beforeSend: function(){ 
    
   },
   url:pet,
   type:met,
   data:$('#form_lis_prod').serialize(),      
   success:function(data2json){
     console.log("Verif_Utilidad: "+data2json.trim());
         try{              
                var json_obj = $.parseJSON(data2json); 
                if(json_obj.rta==0){                   
                     $("#cant_vendida").val(0);  
                     var cant_stock = $("#cant_stock").val();
                     $("#stock").html(cant_stock);  
                }else{
                        for (var i in json_obj){ 
                           $("#cant_vendida").val("");                     
                           $("#cant_vendida").val(json_obj[i].xml_1);  
                           var cant_stock = $("#cant_stock").val();  
                           var total_stock = eval(cant_stock)-eval(json_obj[i].xml_1);
                           $("#stock").html("");  
                           $("#stock").html(total_stock);                                                      
                        } 
                }                                 
         }catch(err1){
                  console.log(err1.message);  
                 }
                   //  toastr["warning"](""+data2json+"");

             },
   error:function(jqXHR,estado,error){
    console.log("del error type 3"+estado);   
   }, 
   complete:function(jqXHR,estado2){     
            console.log("del complete type 3"+estado2);
           },
   timeout:90000
  });    
}

function guardar_factura_venta(){ 

   var pet="controllers/control_acceso.php?type=18";  
   var met=$('#form_general').attr('method'); 
   $.ajax({
   beforeSend: function(){ 
    
   },
   url:pet,
   type:met,
   data:$('#form_general').serialize(),      
   success:function(data2json){
     console.log("Verif_Utilidad: "+data2json.trim());
             try{              
                var json_obj = $.parseJSON(data2json); 
                if(json_obj.rta == 1){
                   swal("Good job!", "Se ha insertado exitosamente", "success");                                    
                   $("#total_venta_enviar").val("");
                   $("#cliente_env").val("");
                   $("#id_formaPago").val("");
                   $("#td_neto").html("");
                   cargar_tabla_list_prod_vendidos();
                }  

                 }catch(err1){
                  console.log(err1.message);  
                 }

             },
   error:function(jqXHR,estado,error){
    console.log("del error type 3"+estado);   
   }, 
   complete:function(jqXHR,estado2){     
            console.log("del complete type 3"+estado2);
           },
   timeout:90000
  });    
}




function guardar_detalle_venta(id){ 
   buscarCantVendida(id) 
   var pet="controllers/control_acceso.php?type=10";  
   var met=$('#form_general').attr('method'); 
   $.ajax({
   beforeSend: function(){ 
    
   },
   url:pet,
   type:met,
   data:$('#form_general').serialize(),      
   success:function(data2json){
     console.log("Verif_Utilidad: "+data2json.trim());
             try{              
                var json_obj = $.parseJSON(data2json); 
                if(json_obj.rta == 1){
                   swal("Good job!", "Se ha insertado exitosamente", "success");                  
                   cargar_tabla_list_prod_vendidos();
                }  

                 }catch(err1){
                  console.log(err1.message);  
                 }
                   //  toastr["warning"](""+data2json+"");

             },
   error:function(jqXHR,estado,error){
    console.log("del error type 3"+estado);   
   }, 
   complete:function(jqXHR,estado2){     
            console.log("del complete type 3"+estado2);
           },
   timeout:90000
  });    
}
function obtenerIdproducto(id) {
   $("#id_elim_edit").val(id);
   buscarProductoEditar(id);
}

function editarProducto(){ 
    
   var pet="controllers/control_acceso.php?type=17";  
   var met=$('#form_general').attr('method'); 
   $.ajax({
   beforeSend: function(){ 
    
   },
   url:pet,
   type:met,
   data:$('#form_general').serialize(),      
   success:function(data2json){
     console.log("Verif_Utilidad: "+data2json.trim());
             try{              
                var json_obj = $.parseJSON(data2json); 
                if(json_obj.rta == 1){
                   swal("Good job!", "Se ha editado exitosamente", "success");                       
                   $("#id_elim_edit").val("");  
                   $("#id_prod").val(""); 
                   $("#id_prod").val(""); 
                   $("#precio_ven").val(""); 
                   $("#cant_stock").val("");
                   $("#nombre_prod").val("");  
                   $("#span_nombreProducto").html("");  
                   $("#inputPrecio").val("");                   
                   $("#inputCantidad").val("");
                   $("#inputCodigo").val("");
                   $("#stock").html("");  
                   $("#precio_venta").html("");  
                   $("#btn_actualizarProd").hide();
                   $("#btn_add_articulo").show();
                   cargar_tabla_usuarios();             
                }else if(json_obj.rta == -1){
                  swal("Good job!", "Algún dato requerido viene vacio!...", "error");    
                  cargar_tabla_usuarios();              
               }    

                 }catch(err1){
                  console.log(err1.message);  
                 }
                   //  toastr["warning"](""+data2json+"");

             },
   error:function(jqXHR,estado,error){
    console.log("del error type 3"+estado);   
   }, 
   complete:function(jqXHR,estado2){     
            console.log("del complete type 3"+estado2);
           },
   timeout:90000
  });    
}


function buscarProductoEditar(id){ 
   $("#idBusqueda").val(id);
   var pet="controllers/control_acceso.php?type=16";  
   var met=$('#form_lis_prod').attr('method'); 
   $.ajax({
   beforeSend: function(){ 
    
   },
   url:pet,
   type:met,
   data:$('#form_lis_prod').serialize(),      
   success:function(data2json){
     console.log("Verif_Utilidad: "+data2json.trim());
             try{              
                var json_obj = $.parseJSON(data2json); 
                for (var i in json_obj){ 
                    $("#id_prod").val(""); 
                    $("#id_prod").val(json_obj[i].xml_1); 
                    $("#precio_ven").val(""); 
                    $("#precio_ven").val(json_obj[i].xml_4); 
                                       
                    $("#cant_stock").val(json_obj[i].xml_5);

                    $("#nombre_prod").val("");  
                    $("#nombre_prod").val(json_obj[i].xml_3); 
                    $("#span_nombreProducto").html(json_obj[i].xml_3);  
                    $("#inputPrecio").val(""); 
                    var p=conComas(json_obj[i].xml_4);
                    $("#inputPrecio").val(p); 
                    $("#inputCantidad").val("");
                    $("#inputCodigo").val(json_obj[i].xml_2);
                    $("#stock").html(json_obj[i].xml_5);  
                    $("#precio_venta").html(p);                                    
                }  
                $("#listaProductos").modal('hide');
                $("#btn_actualizarProd").show();
                $("#btn_add_articulo").hide();

                buscarCantVendida(id);

                 }catch(err1){
                  console.log(err1.message);  
                 }
                   //  toastr["warning"](""+data2json+"");

             },
   error:function(jqXHR,estado,error){
    console.log("del error type 3"+estado);   
   }, 
   complete:function(jqXHR,estado2){     
            console.log("del complete type 3"+estado2);
           },
   timeout:90000
  });    
}

function cargar_tabla_list_prod_vendidos(){     
   var pet="controllers/control_acceso.php?type=14";  
   var met=$('#form_general').attr('method'); 
   $.ajax({
   beforeSend: function(){ 
    
   },
   url:pet,
   type:met,
   data:$('#form_general').serialize(),      
   success:function(data2json){
     console.log("Verif_Utilidad: "+data2json.trim());
             try{              
                     var json_obj = $.parseJSON(data2json); 
                     $("#lista_Art_ventas").empty();
                     var pos=0;
                     var total_venta=0;
                     var total_cant=0;
                     var encabezado ='<thead class="thead-dark"><tr>'+
                        '<td width="10%" style="background:#FBFCB8; text-align:center;">Código</td>'+
                        '<td width="32%" style="background:#FBFCB8; text-align:center;">Producto</td>'+
                        '<td width="12%" style="background:#FBFCB8; text-align:center;">Precio</td>'+
                        '<td width="10%" style="background:#FBFCB8; text-align:center;">Cantidad</td>'+                  
                        '<td width="13%" style="background:#FBFCB8; text-align:center;">Total</td>'+
                        '<td width="25%" style="background:#FBFCB8;"></td></tr> ';
                     $('#lista_Art_ventas').append(encabezado);
                    for (var i in json_obj){ 

                        var boton_eliminar='<button type="button" id="btn_up_'+pos+'" title="Eliminar este producto" class="btn btn-danger btn-sm" onclick="eliminar_producto('+json_obj[i].xml_6+')"><span class="icon-delete">Eliminar</span></button>';  
                        var boton_editar='<button type="button" id="btn_up_'+pos+'" title="Editar este producto" class="btn btn-secondary btn-sm" onclick="obtenerIdproducto('+json_obj[i].xml_7+')"><span class="icon-mode_edit">Editar</span></button>';
                        total_venta = total_venta+parseInt(json_obj[i].xml_5);
                        total_cant = total_cant+parseInt(json_obj[i].xml_4);
                        var filaadd=' <tbody><tr id="tr_obj_general_'+pos+'">'+
                        '<td width="" style="background:#; text-align:center;" id="obj_codigo_'+pos+'">'+json_obj[i].xml_1+'</td>'+
                        '<td width="" style="background:#; text-align:center;" id="obj_nombre_'+pos+'">'+json_obj[i].xml_2+'</td>'+
                        '<td width="" style="background:#; text-align:center;" id="obj_nombre_'+pos+'">'+conComas(json_obj[i].xml_3)+'</td>'+
                        '<td width="" style="background:#; text-align:center;" id="obj_fecha_'+pos+'">'+conComas(json_obj[i].xml_4)+'</td>'+                 
                        '<td width="" style="background:#; text-align:center;" id="obj_categoria_'+pos+'">'+conComas(json_obj[i].xml_5)+'</td>'+                                
                        '<td width="" style="background:#; text-align:center;" id="obj_boton_'+pos+'">'+boton_editar+' '+boton_eliminar+'</td>'+'</tr></tbody>';
                        $('#lista_Art_ventas').append(filaadd); 
                        pos++;
                    }
                    var base ='<thead class="thead-dark"><tr>'+
                    '<td width="52%" colspan="3" style="background:; text-align:center;">Totales:</td>'+
                    '<td width="10%" style="background:; text-align:center;">'+conComas(total_cant)+'</td>'+
                    '<td width="13%" style="background:; text-align:center;">'+conComas(total_venta)+'</td>'+                   
                    '<td width="25%" style="background:;"></td></tr> ';
                 $('#lista_Art_ventas').append(base);
                 $("#total_venta_enviar").val(total_venta);
                 $("#td_neto").html(conComas(total_venta));

                 }catch(err1){
                  console.log(err1.message);  
                 }

             },
   error:function(jqXHR,estado,error){
    console.log("del error type 3"+estado);   
   }, 
   complete:function(jqXHR,estado2){     
            console.log("del complete type 3"+estado2);
           },
   timeout:90000
  });    
}



function eliminar_producto(id){
   let text ="¿Desea eliminar este producto?";
   if(confirm(text)==true){
      swal("Good job!", "Ha confirmado exitosamente", "success");
      $("#id_elim_edit").val(id);
     
      var pet="controllers/control_acceso.php?type=15";  
      var met=$('#form_general').attr('method'); 
      $.ajax({
      beforeSend: function(){ 
       
      },
      url:pet,
      type:met,
      data:$('#form_general').serialize(),      
      success:function(data2json){
        console.log("Verif_Utilidad: "+data2json.trim());
                try{              
                   var json_obj = $.parseJSON(data2json); 
                   if(json_obj.rta == 1){
                      swal("Good job!", "Se ha eliminado exitosamente", "success");                       
                      $("#id_elim_edit").val("");  
                      cargar_tabla_list_prod_vendidos();             
                   }else if(json_obj.rta == -1){
                     swal("Good job!", "El Id del registro requerido viene vacio!...", "error");    
                     cargar_tabla_list_prod_vendidos();              
                  }    
   
                    }catch(err1){
                     console.log(err1.message);  
                    }
                      //  toastr["warning"](""+data2json+"");
   
                },
      error:function(jqXHR,estado,error){
       console.log("del error type 3"+estado);   
      }, 
      complete:function(jqXHR,estado2){     
               console.log("del complete type 3"+estado2);
              },
      timeout:90000
     });

   }else{
      swal("Good job!", "Operación cancelada", "error");
   }
}

function cargar_tabla_usuarios(){     
   var pet="controllers/control_acceso.php?type=4";  
   var met=$('#form_SaveUser2').attr('method'); 
   $.ajax({
   beforeSend: function(){ 
    
   },
   url:pet,
   type:met,
   data:$('#form_SaveUser2').serialize(),      
   success:function(data2json){
     console.log("Verif_Utilidad: "+data2json.trim());
             try{              
                     var json_obj = $.parseJSON(data2json); 
                     $("#lista_de_usuarios").empty();
                     var pos=0;
                     var encabezado ='<thead class="thead-dark"><tr>'+
                        '<td width="5%" style="background:#FBFCB8; text-align:center;">Id</td>'+
                        '<td width="20%" style="background:#FBFCB8; text-align:center;">Nombres</td>'+
                        '<td width="20%" style="background:#FBFCB8; text-align:center;">Apellidos</td>'+
                        '<td width="12%" style="background:#FBFCB8; text-align:center;">Usuario</td>'+
                        '<td width="12%" style="background:#FBFCB8; text-align:center;">Contraseña</td>'+
                        '<td width="12%" style="background:#FBFCB8; text-align:center;">Rol user</td>'+
                        '<td width="19%" style="background:#FBFCB8;"></td></tr> ';
                     $('#lista_de_usuarios').append(encabezado);
                    for (var i in json_obj){ 
                        var boton_eliminar='<button type="button" id="btn_up_'+pos+'" title="Eliminar este usuario" class="btn btn-danger btn-sm" onclick="dow_reg_usuario('+json_obj[i].xml_1+')"><span class="icon-delete">Eliminar</span></button>';  
                        var boton_editar='<button type="button" id="btn_up_'+pos+'" title="Editar este usuario" class="btn btn-secondary btn-sm" onclick="get_reg_usuario('+json_obj[i].xml_1+')"><span class="icon-mode_edit">Editar</span></button>';

                        var filaadd=' <tbody><tr id="tr_obj_general_'+pos+'">'+
                        '<td width="" style="background:#; text-align:center;" >'+json_obj[i].xml_1+'</td>'+
                        '<td width="" style="background:#; text-align:center;" >'+json_obj[i].xml_2+'</td>'+
                        '<td width="" style="background:#; text-align:center;" >'+json_obj[i].xml_3+'</td>'+                 
                        '<td width="" style="background:#; text-align:center;" >'+json_obj[i].xml_4+'</td>'+
                        '<td width="" style="background:#; text-align:center;" >'+json_obj[i].xml_5+'</td>'+
                        '<td width="" style="background:#; text-align:center;" >'+json_obj[i].xml_6+'</td>'+            
                        '<td width="" style="background:#; text-align:center;" >'+boton_editar+' '+boton_eliminar+'</td>'+'</tr></tbody>';
                        $('#lista_de_usuarios').append(filaadd); 
                        pos++;
                    }

                 }catch(err1){
                  console.log(err1.message);  
                 }

             },
   error:function(jqXHR,estado,error){
    console.log("del error type 3"+estado);   
   }, 
   complete:function(jqXHR,estado2){     
            console.log("del complete type 3"+estado2);
           },
   timeout:90000
  });    
}


function dow_reg_usuario(id){ 
   var text = "Confirma que va a eliminar el registro !\nEither OK or Cancel.";
   if(confirm(text)== true){
      swal("Good job!", "Se ha eliminado exitosamente", "success"); 
      $("#id_reg_editar").val(id); 
      var pet="controllers/control_acceso.php?type=7";  
      var met=$('#form_general').attr('method'); 
      $.ajax({
      beforeSend: function(){ 
       
      },
      url:pet,
      type:met,
      data:$('#form_general').serialize(),      
      success:function(data2json){
        console.log("Verif_Utilidad: "+data2json.trim());
                try{              
                   var json_obj = $.parseJSON(data2json); 
                   if(json_obj.rta == 1){
                      swal("Good job!", "Se ha eliminado exitosamente", "success");                       
                      $("#id_reg_editar").val("");  
                      cargar_tabla_usuarios();             
                   }else if(json_obj.rta == -1){
                     swal("Good job!", "El Id del registro requerido viene vacio!...", "error");    
                     cargar_tabla_usuarios();              
                  }    
   
                    }catch(err1){
                     console.log(err1.message);  
                    }
                      //  toastr["warning"](""+data2json+"");
   
                },
      error:function(jqXHR,estado,error){
       console.log("del error type 3"+estado);   
      }, 
      complete:function(jqXHR,estado2){     
               console.log("del complete type 3"+estado2);
              },
      timeout:90000
     });
   }else{
      swal("Good job!", "Ha cancelado la eliminación", "warning"); 
   }
      
}

function get_reg_usuario(id){ 
  
   $("#id_reg_editar").val(id);  
   $("#btn_editar").show();
   $("#btn_cancelar").show();
   var pet="controllers/control_acceso.php?type=5";  
   var met=$('#form_general').attr('method'); 
   $.ajax({
   beforeSend: function(){ 
    
   },
   url:pet,
   type:met,
   data:$('#form_general').serialize(),      
   success:function(data2json){
     console.log("Verif_Utilidad: "+data2json.trim());
             try{              
                var json_obj = $.parseJSON(data2json); 
                for (var i in json_obj){ 
                    $("#nombre").val(json_obj[i].xml_4);  
                    $("#apellidos").val(json_obj[i].xml_5);  
                    $("#user").val(json_obj[i].xml_2);  
                    $("#pass").val(json_obj[i].xml_3);  
                    $("#rol").val(json_obj[i].xml_6);                
                }  

                 }catch(err1){
                  console.log(err1.message);  
                 }
                   //  toastr["warning"](""+data2json+"");

             },
   error:function(jqXHR,estado,error){
    console.log("del error type 3"+estado);   
   }, 
   complete:function(jqXHR,estado2){     
            console.log("del complete type 3"+estado2);
           },
   timeout:90000
  });  
}

function editar_user(){ 
    
   var pet="controllers/control_acceso.php?type=6";  
   var met=$('#form_general').attr('method'); 
   $.ajax({
   beforeSend: function(){ 
    
   },
   url:pet,
   type:met,
   data:$('#form_general').serialize(),      
   success:function(data2json){
     console.log("Verif_Utilidad: "+data2json.trim());
             try{              
                var json_obj = $.parseJSON(data2json); 
                if(json_obj.rta == 1){
                   swal("Good job!", "Se ha editado exitosamente", "success");                       
                   $("#id_reg_editar").val("");  
                   $("#nombre").val("");  
                   $("#apellidos").val("");  
                   $("#user").val("");  
                   $("#pass").val("");  
                   $("#rol").val("");  
                   $("#btn_editar").hide();
                   $("#btn_cancelar").hide();   
                   cargar_tabla_usuarios();             
                }else if(json_obj.rta == -1){
                  swal("Good job!", "Algún dato requerido viene vacio!...", "error");    
                  cargar_tabla_usuarios();              
               }    

                 }catch(err1){
                  console.log(err1.message);  
                 }
                   //  toastr["warning"](""+data2json+"");

             },
   error:function(jqXHR,estado,error){
    console.log("del error type 3"+estado);   
   }, 
   complete:function(jqXHR,estado2){     
            console.log("del complete type 3"+estado2);
           },
   timeout:90000
  });    
}

function crear_user(){ 
    
   var pet="controllers/control_acceso.php?type=3";  
   var met=$('#form_general').attr('method'); 
   $.ajax({
   beforeSend: function(){ 
    
   },
   url:pet,
   type:met,
   data:$('#form_general').serialize(),      
   success:function(data2json){
     console.log("Verif_Utilidad: "+data2json.trim());
             try{              
                var json_obj = $.parseJSON(data2json); 
                if(json_obj.rta == 1){
                   swal("Good job!", "Se ha creado exitosamente", "success");                  
                }  

                 }catch(err1){
                  console.log(err1.message);  
                 }
                   //  toastr["warning"](""+data2json+"");

             },
   error:function(jqXHR,estado,error){
    console.log("del error type 3"+estado);   
   }, 
   complete:function(jqXHR,estado2){     
            console.log("del complete type 3"+estado2);
           },
   timeout:90000
  });    
}

function cerrarSession(){ 
    
    var pet="controllers/control_acceso.php?type=2";  
    var met=$('#form_general').attr('method'); 
    $.ajax({
    beforeSend: function(){ 
     
    },
    url:pet,
    type:met,
    data:$('#form_general').serialize(),      
    success:function(data2json){
      console.log("Verif_Utilidad: "+data2json.trim());
              try{              
                 var json_obj = $.parseJSON(data2json); 
                 if(json_obj.rta == 1){
                    swal("Good job!", "Su sessión se ha cerrado exitosamente", "info");
                    location.href='index.php';                          
                 }  

                  }catch(err1){
                   console.log(err1.message);  
                  }
                    //  toastr["warning"](""+data2json+"");

              },
    error:function(jqXHR,estado,error){
     console.log("del error type 3"+estado);   
    }, 
    complete:function(jqXHR,estado2){     
             console.log("del complete type 3"+estado2);
            },
    timeout:90000
   });    
}


function acceder(){ 
   //alert("hola");
   var pet="controllers/control_acceso.php?type=1";  
   var met=$('#form').attr('method'); 
   $.ajax({
   beforeSend: function(){ 
    
   },
   url:pet,
   type:met,
   data:$('#form').serialize(),  
   success:function(data2json){
     console.log("Verif_Utilidad: "+data2json.trim());
             try{
                var json_obj = $.parseJSON(data2json); 
                if(json_obj.rta == 1){
                   //swal("Good job!", "You clicked the button!", "success");
                   location.href='admin.php';                          
                }else  if(json_obj.rta == 2){
                  //swal("Good job!", "You clicked the button!", "success");
                  location.href='administrativo.php';                          
               }else  if(json_obj.rta == 3){
                  swal("Good job!", "You clicked the button!", "success");
                  location.href='admin.php';                          
               }else if(json_obj.rta == -1){
                    //swal("Good job!", "Credenciales invalidas debe ingresar el usuario", "info");
                }else if(json_obj.rta == -2){
                   //swal("Good job!", "Credenciales invalidas debe ingresar el contraseñs", "info");
               }   else if(json_obj.rta == 0){
                   //swal("Good job!", "Credenciales invalidas", "error");
               }    

                 }catch(err1){
                  console.log(err1.message);  
                 }
                   //  toastr["warning"](""+data2json+"");

             },
   error:function(jqXHR,estado,error){
              toastr["error"](""+jqXHR+"");
    console.log("del error type 3"+estado);   
   }, 
   complete:function(jqXHR,estado2){     
            console.log("del complete type 3"+estado2);

           },
   timeout:90000
  });    
}