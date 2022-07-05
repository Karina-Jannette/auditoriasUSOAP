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

function infoEdit(editar){
  $.ajax({
    url: "../admin/consultpqs.php",
    type: "GET"
  }).done(function(resp){
    obj = JSON.parse(resp);
    let res = obj.data;
    for (U = 0; U < res.length; U++){
      if(obj.data[U].id_pq == editar)
      datos = obj.data[U].num_pq +'*'+ obj.data[U].area +'*'+ obj.data[U].area_afac +'*'+ obj.data[U].elemento +'*'+ obj.data[U].pregunta +'*'+ obj.data[U].orientacion +'*'+ obj.data[U].inciso +'*'+ obj.data[U].documentos;

      //Llenado
      var data = datos.split('*');
      let area = data[1]; //Se llama a la información de la BD
      let area_afac = data[2];
      // const array1 = [area];
      var data1 = area.split(','); //Se le indica que los datos son separados por una coma
      var data2 = area_afac.split(',')
      //console.log(data1);8
      //console.log(data2);

      $("#num_pq1").val(data[0]); //Se coloca el html para que sea abierto y no llegue a chocar, antes del primer # para ser mas especificos podría llevar #NombreForm
      $("#area1").val(data1).trigger('change.select2'); //Se llama al array separado
      $("#area_afac1").val(data2).trigger('change.select2');
      $("#elemento1").val(data[3]);
      $("#pregunta1").val(data[4]);
      $("#orientacion1").val(data[5]);
      $("#inciso1").val(data[6]);
      $("#documentos1").val(data[7]);
    }
  })
}

//Función eliminar 
$(document).ready(function(){
  var idEliminar= -1;
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
});