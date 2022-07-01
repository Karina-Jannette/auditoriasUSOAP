//Función selección multiple
function multiselect(){ //Función para la selección multiple en la parte de rol y áreas
  $(document).ready(function() {
    $('.js-example-basic-multiple').select2({
      theme: "classic" //pone el tema un poco mas moderno
    });
  });
}

//Función guardar
function guardarpq(){
  //alert ("entrar guardar");
   //variables
   //Array área 
   let area1 = ''
   let selectObject = document.getElementById("area");
    for (let i = 0; i < selectObject.options.length; i++) {
        if (selectObject.options[i].selected == true) {
          area1 += ',' + selectObject.options[i].value;
        }
    }
    gstarea = area1.substr(1);
    let area = gstarea;

    //Array area AFAC
    let area_afac1 = ''
    let select = document.getElementById("area_afac");
    for (let i = 0; i < select.options.length; i++) {
        if (select.options[i].selected == true) {
          area_afac1 += ',' + select.options[i].value;
        }
    }
    gstarea_afac = area_afac1.substr(1);
    let area_afac = gstarea_afac;

    let num_pq =  document.getElementById("num_pq").value;
    let elemento =  document.getElementById("elemento").value;
    let pregunta =  document.getElementById("pregunta").value;
    let orientacion =  document.getElementById("orientacion").value;
    let inciso =  document.getElementById("inciso").value;
    let documentos =  document.getElementById("documentos").value; 

    datos= 'num_pq='+num_pq + '&area='+area + '&area_afac='+area_afac + '&elemento='+elemento + '&pregunta='+pregunta + '&orientacion='+orientacion + '&inciso='+inciso + '&documentos='+documentos + '&opcion=guardarpq' 
    
    //Llamado a Ajax
    $.ajax({
      url: "../admin/conspqs.php",
      method: "POST",
      data: datos
    }).done(function(res){
      if(res==0){
        alert("Alta con exito");
        setTimeout("location.href='pqs.php';",1500);
      }else{
        alert("error");
        alert(res);
      }
    });
}

//función para editar
function editar_pq(){
  //alert("entra editar");
  //variables

  let area1 = ''
  let selectObject = document.getElementById("area1");
   for (let i = 0; i < selectObject.options.length; i++) {
       if (selectObject.options[i].selected == true) {
         area1 += ',' + selectObject.options[i].value;
       }
   }

   gstarea = area1.substr(1);
   let area = gstarea;

   //Array area AFAC
   let area_afac1 = ''
   let select = document.getElementById("area_afac1");
   for (let i = 0; i < select.options.length; i++) {
       if (select.options[i].selected == true) {
         area_afac1 += ',' + select.options[i].value;
       }
   }

   gstarea_afac = area_afac1.substr(1);
   let area_afac = gstarea_afac;


  let num_pq =  document.getElementById("num_pq1").value;
  let elemento =  document.getElementById("elemento1").value;
  let pregunta =  document.getElementById("pregunta1").value;
  let orientacion =  document.getElementById("orientacion1").value;
  let inciso =  document.getElementById("inciso1").value;
  let documentos =  document.getElementById("documentos1").value;
  
  datos= 'num_pq=' + num_pq + '&area=' + area + '&area_afac=' + area_afac + '&elemento=' + elemento + '&pregunta=' + pregunta + '&orientacion=' + orientacion + '&inciso=' + inciso + '&documentos=' + documentos + '&opcion=editpqs' 
 //alert(datos);
  //ajax
  $.ajax({
    type:"POST",
    url:"../admin/conspqs.php",
    data:datos
  }).done(function(respuesta){
    if (respuesta==0){
      alert("Exito");
      setTimeout("location.href='pqs.php';",1500);
    }else{
      alert("Error");
      alert(respuesta);
      //setTimeout("location.href='pqs.php';",1500);
    }
  });

}

//Función editar y eliminar 

$(document).ready(function(){
    var idEliminar= -1;
    var idEditar= -1;
    var fila;
    $(".btnEliminar").click(function(){
      idEliminar=$(this).data('id');
      fila=$(this).parent('td').parent('tr');
    });
    $(".eliminar").click(function(){
      $.ajax({
        url: 'eliminarpq.php',
        method: 'POST',
        data:{
          id:idEliminar
        }
      }).done(function(res){
        alert(res);
        $(fila).fadeOut(1000);
      });
    });

    //trae los datos para editar
    $(".btnEditar").click(function(){
  
      idEditar=$(this).data('id');
      var num_pq=$(this).data('num_pq');
      var area =$(this).data('area');
      var area_afac=$(this).data('area_afac');
      var elemento=$(this).data('elemento');
      var pregunta=$(this).data('pregunta');
      var orientacion=$(this).data('orientacion');
      var inciso=$(this).data('inciso');
      var documentos=$(this).data('documentos');
  
      $("#num_pq1").val(num_pq);
      $("#area1").val(area);
      $("#area_afac1").val(area_afac);
      $("#elemento1").val(elemento);
      $("#pregunta1").val(pregunta);
      $("#orientacion1").val(orientacion);
      $("#inciso1").val(inciso);
      $("#documentos1").val(documentos);
      $("#idEdit").val(idEditar);
      // alert(idEditar);
  
  });
  
  });