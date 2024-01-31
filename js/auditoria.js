$(document).ready(function (){

auditoria_ventas();

  $("#nfact").keypress(function(tecla){
    if(tecla==13){
   alert('hola');
    //  busqueda_nfactura();
    }
    
 });
 $("#btn_prueba").click(function(){
   rango_fecha();
   //fecha_exacta();

 // busqueda_nit_vendedor();
   //busqueda_nit_cliente();
   //alert('hola');
   //busqueda_nfactura();
 });

 
});

function rango_fecha(){
  var pet = "controllers/auditoria_control.php?type=6";
  var met = $('#e').attr('method'); // Obtén el método del formulario correctamente
  var formData = $('#e').serialize(); // Serializa el formulario correctamente

  $.ajax({
    beforeSend: function () {

    },
    url: pet,
    type: met,
    data: formData, // Utiliza la variable formData para enviar los datos del formulario
    success: function (data2json) {
      console.log("Verif_Utilidad: " + data2json.trim());
      try {
        var json_obj = $.parseJSON(data2json);
           var json_obj = $.parseJSON(data2json); 
                    $("#lista_au").empty();
                    var encabezado ='<thead class="thead-dark"><tr>'+
                       '<td width="" style="background:#FBFCB8; text-align:center;">Fecha</td>'+
                       '<td width="" style="background:#FBFCB8; text-align:center;">Hora</td>'+
                       '<td width="" style="background:#FBFCB8; text-align:center;">Cliente</td>'+
                       '<td width="" style="background:#FBFCB8; text-align:center;">N° Factura</td>'+
                       '<td width="" style="background:#FBFCB8; text-align:center;">Total Venta</td>'+   
                       '<td width="" style="background:#FBFCB8; text-align:center;">Vendedor</td>'+   
                       '<td width="" style="background:#FBFCB8; text-align:center;">Estado</td>'+   
                       '<td width="" colspan="2" style="background:#FBFCB8; text-align:center;">Opciones</td>'+                  
                       '<td width="" style="background:#FBFCB8;"></td></tr> ';
                    $('#lista_au').append(encabezado);
                   for (var i in json_obj){ 

                    var boton_imprimir='<button type="button" class="btn btn-secondary btn-sm" onclick="imprimir_factura('+json_obj[i].xml4+')">Imprimir</button>';

                       var filaadd='<tbody><tr>'+
                       '<td width="" style="background:#; text-align:center; ">'+json_obj[i].xml1+'</td>'+
                       '<td width="" style="background:#; text-align:center;">'+json_obj[i].xml2+'</td>'+
                       '<td width="" style="background:#; text-align:center;">'+json_obj[i].xml3+'</td>'+
                       '<td width="" style="background:#; text-align:center;">'+json_obj[i].xml4+'</td>'+             
                       '<td width="" style="background:#; text-align:center;">'+json_obj[i].xml5+'</td>'+    
                       '<td width="" style="background:#; text-align:center;">'+json_obj[i].xml6+'</td>'+  
                       '<td width="" style="background:#; text-align:center;">'+json_obj[i].xml7+'</td>'+
                       '<td width="" style="background:#; text-align:center;">'+boton_imprimir+'</td>'+
                       '<td width="" style="background:#; text-align:center;">'+ '</td>'+   
                                                  
                       '</tr></tbody>';
                       $('#lista_au').append(filaadd); 
                       
                   } 


      } catch (err1) {
        console.log(err1.message);
      }
    },
    error: function (jqXHR, estado, error) {
      console.log("del error type 3" + estado);
    },
    complete: function (jqXHR, estado2) {
      console.log("del complete type 3" + estado2);
    },
    timeout: 90000
  });
}

function fecha_exacta(){
  var pet = "controllers/auditoria_control.php?type=5";
  var met = $('#e').attr('method'); // Obtén el método del formulario correctamente
  var formData = $('#e').serialize(); // Serializa el formulario correctamente

  $.ajax({
    beforeSend: function () {

    },
    url: pet,
    type: met,
    data: formData, // Utiliza la variable formData para enviar los datos del formulario
    success: function (data2json) {
      console.log("Verif_Utilidad: " + data2json.trim());
      try {
        var json_obj = $.parseJSON(data2json);
           var json_obj = $.parseJSON(data2json); 
                    $("#lista_au").empty();
                    var encabezado ='<thead class="thead-dark"><tr>'+
                       '<td width="" style="background:#FBFCB8; text-align:center;">Fecha</td>'+
                       '<td width="" style="background:#FBFCB8; text-align:center;">Hora</td>'+
                       '<td width="" style="background:#FBFCB8; text-align:center;">Cliente</td>'+
                       '<td width="" style="background:#FBFCB8; text-align:center;">N° Factura</td>'+
                       '<td width="" style="background:#FBFCB8; text-align:center;">Total Venta</td>'+   
                       '<td width="" style="background:#FBFCB8; text-align:center;">Vendedor</td>'+   
                       '<td width="" style="background:#FBFCB8; text-align:center;">Estado</td>'+   
                       '<td width="" colspan="2" style="background:#FBFCB8; text-align:center;">Opciones</td>'+                  
                       '<td width="" style="background:#FBFCB8;"></td></tr> ';
                    $('#lista_au').append(encabezado);
                   for (var i in json_obj){ 

                    var boton_imprimir='<button type="button" class="btn btn-secondary btn-sm" onclick="imprimir_factura('+json_obj[i].xml4+')">Imprimir</button>';

                       var filaadd='<tbody><tr>'+
                       '<td width="" style="background:#; text-align:center; ">'+json_obj[i].xml1+'</td>'+
                       '<td width="" style="background:#; text-align:center;">'+json_obj[i].xml2+'</td>'+
                       '<td width="" style="background:#; text-align:center;">'+json_obj[i].xml3+'</td>'+
                       '<td width="" style="background:#; text-align:center;">'+json_obj[i].xml4+'</td>'+             
                       '<td width="" style="background:#; text-align:center;">'+json_obj[i].xml5+'</td>'+    
                       '<td width="" style="background:#; text-align:center;">'+json_obj[i].xml6+'</td>'+  
                       '<td width="" style="background:#; text-align:center;">'+json_obj[i].xml7+'</td>'+
                       '<td width="" style="background:#; text-align:center;">'+boton_imprimir+'</td>'+
                       '<td width="" style="background:#; text-align:center;">'+ '</td>'+   
                                                  
                       '</tr></tbody>';
                       $('#lista_au').append(filaadd); 
                       
                   } 


      } catch (err1) {
        console.log(err1.message);
      }
    },
    error: function (jqXHR, estado, error) {
      console.log("del error type 3" + estado);
    },
    complete: function (jqXHR, estado2) {
      console.log("del complete type 3" + estado2);
    },
    timeout: 90000
  });
}

function busqueda_nit_vendedor(){
  var pet = "controllers/auditoria_control.php?type=4";
  var met = $('#e').attr('method'); // Obtén el método del formulario correctamente
  var formData = $('#e').serialize(); // Serializa el formulario correctamente

  $.ajax({
    beforeSend: function () {

    },
    url: pet,
    type: met,
    data: formData, // Utiliza la variable formData para enviar los datos del formulario
    success: function (data2json) {
      console.log("Verif_Utilidad: " + data2json.trim());
      try {
        var json_obj = $.parseJSON(data2json);
           var json_obj = $.parseJSON(data2json); 
                    $("#lista_au").empty();
                    var encabezado ='<thead class="thead-dark"><tr>'+
                       '<td width="" style="background:#FBFCB8; text-align:center;">Fecha</td>'+
                       '<td width="" style="background:#FBFCB8; text-align:center;">Hora</td>'+
                       '<td width="" style="background:#FBFCB8; text-align:center;">Cliente</td>'+
                       '<td width="" style="background:#FBFCB8; text-align:center;">N° Factura</td>'+
                       '<td width="" style="background:#FBFCB8; text-align:center;">Total Venta</td>'+   
                       '<td width="" style="background:#FBFCB8; text-align:center;">Vendedor</td>'+   
                       '<td width="" style="background:#FBFCB8; text-align:center;">Estado</td>'+   
                       '<td width="" colspan="2" style="background:#FBFCB8; text-align:center;">Opciones</td>'+                  
                       '<td width="" style="background:#FBFCB8;"></td></tr> ';
                    $('#lista_au').append(encabezado);
                   for (var i in json_obj){ 

                    var boton_imprimir='<button type="button" class="btn btn-secondary btn-sm" onclick="imprimir_factura('+json_obj[i].xml4+')">Imprimir</button>';

                       var filaadd='<tbody><tr>'+
                       '<td width="" style="background:#; text-align:center; ">'+json_obj[i].xml1+'</td>'+
                       '<td width="" style="background:#; text-align:center;">'+json_obj[i].xml2+'</td>'+
                       '<td width="" style="background:#; text-align:center;">'+json_obj[i].xml3+'</td>'+
                       '<td width="" style="background:#; text-align:center;">'+json_obj[i].xml4+'</td>'+             
                       '<td width="" style="background:#; text-align:center;">'+json_obj[i].xml5+'</td>'+    
                       '<td width="" style="background:#; text-align:center;">'+json_obj[i].xml6+'</td>'+  
                       '<td width="" style="background:#; text-align:center;">'+json_obj[i].xml7+'</td>'+
                       '<td width="" style="background:#; text-align:center;">'+boton_imprimir+'</td>'+
                       '<td width="" style="background:#; text-align:center;">'+ '</td>'+   
                                                  
                       '</tr></tbody>';
                       $('#lista_au').append(filaadd); 
                       
                   } 


      } catch (err1) {
        console.log(err1.message);
      }
    },
    error: function (jqXHR, estado, error) {
      console.log("del error type 3" + estado);
    },
    complete: function (jqXHR, estado2) {
      console.log("del complete type 3" + estado2);
    },
    timeout: 90000
  });
}






function busqueda_nit_cliente() {
  var pet = "controllers/auditoria_control.php?type=3";
  var met = $('#e').attr('method'); // Obtén el método del formulario correctamente
  var formData = $('#e').serialize(); // Serializa el formulario correctamente

  $.ajax({
    beforeSend: function () {

    },
    url: pet,
    type: met,
    data: formData, // Utiliza la variable formData para enviar los datos del formulario
    success: function (data2json) {
      console.log("Verif_Utilidad: " + data2json.trim());
      try {
        var json_obj = $.parseJSON(data2json);
           var json_obj = $.parseJSON(data2json); 
                    $("#lista_au").empty();
                    var encabezado ='<thead class="thead-dark"><tr>'+
                       '<td width="" style="background:#FBFCB8; text-align:center;">Fecha</td>'+
                       '<td width="" style="background:#FBFCB8; text-align:center;">Hora</td>'+
                       '<td width="" style="background:#FBFCB8; text-align:center;">Cliente</td>'+
                       '<td width="" style="background:#FBFCB8; text-align:center;">N° Factura</td>'+
                       '<td width="" style="background:#FBFCB8; text-align:center;">Total Venta</td>'+   
                       '<td width="" style="background:#FBFCB8; text-align:center;">Vendedor</td>'+   
                       '<td width="" style="background:#FBFCB8; text-align:center;">Estado</td>'+   
                       '<td width="" colspan="2" style="background:#FBFCB8; text-align:center;">Opciones</td>'+                  
                       '<td width="" style="background:#FBFCB8;"></td></tr> ';
                    $('#lista_au').append(encabezado);
                   for (var i in json_obj){ 

                    var boton_imprimir='<button type="button" class="btn btn-secondary btn-sm" onclick="imprimir_factura('+json_obj[i].xml4+')">Imprimir</button>';

                       var filaadd='<tbody><tr>'+
                       '<td width="" style="background:#; text-align:center; ">'+json_obj[i].xml1+'</td>'+
                       '<td width="" style="background:#; text-align:center;">'+json_obj[i].xml2+'</td>'+
                       '<td width="" style="background:#; text-align:center;">'+json_obj[i].xml3+'</td>'+
                       '<td width="" style="background:#; text-align:center;">'+json_obj[i].xml4+'</td>'+             
                       '<td width="" style="background:#; text-align:center;">'+json_obj[i].xml5+'</td>'+    
                       '<td width="" style="background:#; text-align:center;">'+json_obj[i].xml6+'</td>'+  
                       '<td width="" style="background:#; text-align:center;">'+json_obj[i].xml7+'</td>'+
                       '<td width="" style="background:#; text-align:center;">'+boton_imprimir+'</td>'+
                       '<td width="" style="background:#; text-align:center;">'+ '</td>'+   
                                                  
                       '</tr></tbody>';
                       $('#lista_au').append(filaadd); 
                       
                   } 


      } catch (err1) {
        console.log(err1.message);
      }
    },
    error: function (jqXHR, estado, error) {
      console.log("del error type 3" + estado);
    },
    complete: function (jqXHR, estado2) {
      console.log("del complete type 3" + estado2);
    },
    timeout: 90000
  });
}

function busqueda_nfactura() {
  var pet = "controllers/auditoria_control.php?type=2";
  var met = $('#e').attr('method'); // Obtén el método del formulario correctamente
  var formData = $('#e').serialize(); // Serializa el formulario correctamente

  $.ajax({
    beforeSend: function () {

    },
    url: pet,
    type: met,
    data: formData, // Utiliza la variable formData para enviar los datos del formulario
    success: function (data2json) {
      console.log("Verif_Utilidad: " + data2json.trim());
      try {
        var json_obj = $.parseJSON(data2json);
           var json_obj = $.parseJSON(data2json); 
                    $("#lista_au").empty();
                    var encabezado ='<thead class="thead-dark"><tr>'+
                       '<td width="" style="background:#FBFCB8; text-align:center;">Fecha</td>'+
                       '<td width="" style="background:#FBFCB8; text-align:center;">Hora</td>'+
                       '<td width="" style="background:#FBFCB8; text-align:center;">Cliente</td>'+
                       '<td width="" style="background:#FBFCB8; text-align:center;">N° Factura</td>'+
                       '<td width="" style="background:#FBFCB8; text-align:center;">Total Venta</td>'+   
                       '<td width="" style="background:#FBFCB8; text-align:center;">Vendedor</td>'+   
                       '<td width="" style="background:#FBFCB8; text-align:center;">Estado</td>'+   
                       '<td width="" colspan="2" style="background:#FBFCB8; text-align:center;">Opciones</td>'+                  
                       '<td width="" style="background:#FBFCB8;"></td></tr> ';
                    $('#lista_au').append(encabezado);
                   for (var i in json_obj){ 

                    var boton_imprimir='<button type="button" class="btn btn-secondary btn-sm" onclick="imprimir_factura('+json_obj[i].xml4+')">Imprimir</button>';

                       var filaadd='<tbody><tr>'+
                       '<td width="" style="background:#; text-align:center; ">'+json_obj[i].xml1+'</td>'+
                       '<td width="" style="background:#; text-align:center;">'+json_obj[i].xml2+'</td>'+
                       '<td width="" style="background:#; text-align:center;">'+json_obj[i].xml3+'</td>'+
                       '<td width="" style="background:#; text-align:center;">'+json_obj[i].xml4+'</td>'+             
                       '<td width="" style="background:#; text-align:center;">'+json_obj[i].xml5+'</td>'+    
                       '<td width="" style="background:#; text-align:center;">'+json_obj[i].xml6+'</td>'+  
                       '<td width="" style="background:#; text-align:center;">'+json_obj[i].xml7+'</td>'+
                       '<td width="" style="background:#; text-align:center;">'+boton_imprimir+'</td>'+
                       '<td width="" style="background:#; text-align:center;">'+ '</td>'+   
                                                  
                       '</tr></tbody>';
                       $('#lista_au').append(filaadd); 
                       
                   } 


      } catch (err1) {
        console.log(err1.message);
      }
    },
    error: function (jqXHR, estado, error) {
      console.log("del error type 3" + estado);
    },
    complete: function (jqXHR, estado2) {
      console.log("del complete type 3" + estado2);
    },
    timeout: 90000
  });
}










function auditoria_ventas(){   
    
        
    var pet="controllers/auditoria_control.php?type=1";  
    var met=$('form_auditoria').attr('method'); 
    $.ajax({
    beforeSend: function(){ 
     
    },
    url:pet,
    type:met,
    data:$('form_auditoria').serialize(),      
    success:function(data2json){
      console.log("Verif_Utilidad: "+data2json.trim());
              try{   
                           
                      var json_obj = $.parseJSON(data2json); 
                      $("#lista_au").empty();
                      var encabezado ='<thead class="thead-dark"><tr>'+
                         '<td width="" style="background:#FBFCB8; text-align:center;">Fecha</td>'+
                         '<td width="" style="background:#FBFCB8; text-align:center;">Hora</td>'+
                         '<td width="" style="background:#FBFCB8; text-align:center;">Cliente</td>'+
                         '<td width="" style="background:#FBFCB8; text-align:center;">N° Factura</td>'+
                         '<td width="" style="background:#FBFCB8; text-align:center;">Total Venta</td>'+   
                         '<td width="" style="background:#FBFCB8; text-align:center;">Vendedor</td>'+   
                         '<td width="" style="background:#FBFCB8; text-align:center;">Estado</td>'+   
                         '<td width="" colspan="2" style="background:#FBFCB8; text-align:center;">Opciones</td>'+                  
                         '<td width="" style="background:#FBFCB8;"></td></tr> ';
                      $('#lista_au').append(encabezado);
                     for (var i in json_obj){ 

                      var boton_imprimir='<button type="button" class="btn btn-secondary btn-sm" onclick="imprimir_factura('+json_obj[i].xml4+')">Imprimir</button>';
 
                         var filaadd='<tbody><tr>'+
                         '<td width="" style="background:#; text-align:center; ">'+json_obj[i].xml1+'</td>'+
                         '<td width="" style="background:#; text-align:center;">'+json_obj[i].xml2+'</td>'+
                         '<td width="" style="background:#; text-align:center;">'+json_obj[i].xml3+'</td>'+
                         '<td width="" style="background:#; text-align:center;">'+json_obj[i].xml4+'</td>'+             
                         '<td width="" style="background:#; text-align:center;">'+json_obj[i].xml5+'</td>'+    
                         '<td width="" style="background:#; text-align:center;">'+json_obj[i].xml6+'</td>'+  
                         '<td width="" style="background:#; text-align:center;">'+json_obj[i].xml7+'</td>'+
                         '<td width="" style="background:#; text-align:center;">'+boton_imprimir+'</td>'+
                         '<td width="" style="background:#; text-align:center;">'+ '</td>'+   
                                                    
                         '</tr></tbody>';
                         $('#lista_au').append(filaadd); 
                         
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

 function imprimir_factura(id){
  location.href = './libreria/informe.php?id_f=' + id;
  //location.href = './libreria/informe.php';


}