function guardar(){
  //variables
  let id_rol = document.getElementById("id_rol").value;
  let num_empleado = document.getElementById("num_empleado").value;
  let id_area  = document.getElementById("id_area").value;
  let nombre = document.getElementById("nombre").value;
  let apellido = document.getElementById("apellido").value;
  let pass = document.getElementById("pass").value;

  datos= 'id_rol='+id_rol + '&num_empleado='+num_empleado + '&id_area='+id_area + '&nombre='+nombre + '&apellido='+apellido + '&pass='+pass + '&opcion=guardar'
  //alert(datos);

  if(id_rol==""||num_empleado==""||id_area==""||nombre==""||apellido==""||pass==""){
    alert("Campos vacios, favor de llenar todos los campos");
    return;
  }else{
    $.ajax({
      url: "../admin/insertarUsuario.php",
      method: "POST",
      data: datos
    }).done(function(res){
      if(res==0){
        alert("Alta de usuario con exito");
        setTimeout("location.href='usuario.php';",1200);
      }else if(res==2){
        alert("El empleado ya está registrado");
      }else{
        //alert(res);
        alert("Error");
      }
    });
  }
}

//Editar usuario 
function datosEdit(editar){
  //alert(editar);
  $.ajax({
    url: "../admin/cons_usuarios.php",
    type: "GET"
  }).done(function(resp){
    obj = JSON.parse(resp);
    let res = obj.data;
    for (U = 0; U < res.length; U++){
      if(obj.data[U].id_usuario == editar){
        datos = obj.data[U].id_rol +'*'+ obj.data[U].num_empleado +'*'+ obj.data[U].id_area +'*'+ obj.data[U].nombre +'*'+ obj.data[U].apellido;

        //Llenado
        var data = datos.split('*');

        $("#id_rol1").val(data[0]);
        $("#num_empleado1").val(data[1]);
        $("#id_area1").val(data[2]);
        $("#nombre1").val(data[3]);
        $("#apellido1").val(data[4]);
      }
    }
  });
}

function editUsuario(){
  //variables
  let id_rol = document.getElementById("id_rol1").value;
  let num_empleado = document.getElementById("num_empleado1").value;
  let id_area = document.getElementById("id_area1").value;
  let nombre = document.getElementById("nombre1").value;
  let apellido = document.getElementById("apellido1").value;

  datos=  'id_rol='+id_rol + '&num_empleado='+num_empleado + '&id_area='+id_area + '&nombre='+nombre + '&apellido='+apellido + '&opcion=editUsuario'
  //alert (datos);

  if(id_rol==""||num_empleado==""||id_area==""||nombre==""||apellido==""){
    alert("Campos vacios, favor de llenar todos los campos");
    return;
  }else{
    //AJAX
    $.ajax({
      type: "POST",
      url: "../admin/insertarUsuario.php",
      data: datos
    }).done(function(respuesta){
      if(respuesta==0){
        alert("Usuario editado");
        setTimeout("location.href='usuario.php';",1200);
      }else{
        alert(respuesta);
        alert("Error");
      }
    });
  }
}

$(document).ready(function(){
  var idEliminar= -1;
  var fila;
  $(".btnEliminar").click(function(){
    idEliminar=$(this).data('id');
    fila=$(this).parent('td').parent('tr');
  });
  $(".eliminar").click(function(){
    $.ajax({
      url: 'eliminarusuario.php',
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