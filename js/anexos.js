//Función selección multiple
function multiselect(){ //Función para la selección multiple en la parte de rol y áreas
  $(document).ready(function() {
    $('.js-example-basic-multiple').select2({
      theme: "classic" //pone el tema un poco mas moderno
    });
  });
}

//Guardar Anexo
function guardar(){
  //alert ("entrar guardar");
  //variables
  let num_anexo =  document.getElementById("num_anexo").value;
  let detalles =  document.getElementById("detalles").value; 
  let incisos = document.getElementById("incisos").value;
  let notas = document.getElementById("notas").value;
  let num_fraccion =  document.getElementById("num_fraccion").value;
  let detallesd =  document.getElementById("detallesd").value; 
  let incisosd = document.getElementById("incisosd").value;
  let notasd = document.getElementById("notasd").value;

  //Guardar Array de la sección áreas
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

   let area2 = ''
  let selectObject2 = document.getElementById("aread");
   for (let i = 0; i < selectObject.options.length; i++) {
       if (selectObject2.options[i].selected == true) {
         area2 += ',' + selectObject.options[i].value;
       }
   }
   gstarea = area1.substr(1);
   let aread = gstarea;

   //Array area AFAC
   let area_afac2 = ''
   let select2 = document.getElementById("area_afacd");
   for (let i = 0; i < select.options.length; i++) {
       if (select2.options[i].selected == true) {
         area_afac2 += ',' + select.options[i].value;
       }
   }
   gstarea_afac = area_afac2.substr(1);
   let area_afacd = gstarea_afac;


  datos= 'num_anexo='+num_anexo + '&detalles='+detalles + '&area='+area + '&area_afac='+area_afac + '&incisos='+incisos + '&notas='+notas + '&num_fraccion='+num_fraccion + 
  '&detallesd='+detallesd + '&aread='+aread + '&area_afacd='+area_afacd + '&incisosd='+incisosd + '&notasd='+notasd + '&opcion=altaAnexo'
  //alert(datos);

  if(num_anexo==""||detalles==""||area==""||area_afac==""||incisos==""||notas==""||num_fraccion==""||detallesd==""||aread==""||area_afacd==""||incisosd==""||
  notasd==""){
    alert("Campos vacios");
    return;
  }else{
    //Llamado a Ajax
    $.ajax({
      url: 'guardar_anexo.php',
      method: 'POST',
      data: datos
    }).done(function(res){
      if(res==0){
        alert("Alta con exito");
        setTimeout("location.href='anexos.php';",1200);
      }else{
        alert("Error");
        alert(res);
      }
    });
  }
}

//Eliminar anexo
function eliminarAnexo(eliminar){
  //alert(eliminar);
  document.getElementById("id_anexodel").value=eliminar;
}

function confeliminarAnexo(eliminar){
  //alert(eliminar);
  var elimAnexo = document.getElementById("id_anexodel").value;
  datos = 'id_anexo=' + elimAnexo +'&opcion=eliminarAnexo'
  $.ajax({
    url: 'guardar_anexo.php',
    method: 'POST',
    data: datos
  }).done(function(res){
    if(res==0){
      alert("Anexo eliminado");
      setTimeout("location.href='anexos.php';",1200);
    }else{
      alert("Error");
      alert(res);
    }
  })
}

//Editar Anexo
function editarAnexo(editar){
  //alert(editar);
  $.ajax({
    url: '../admin/cons_anexo.php',
    type: 'GET'
  }).done(function(resp){
    obj = JSON.parse(resp);
    let res = obj.data;
    for (U = 0; U < res.length; U++){
      if(obj.data[U].id_anexo == editar){
        datos = obj.data[U].num_anexo +'*'+ obj.data[U].detalles +'*'+ obj.data[U].area +'*'+ obj.data[U].area_afac +'*'+ obj.data[U].incisos +'*'+ obj.data[U].notas;
        
        //Llenado
        var data = datos.split('*');
        let area = data[2]; //Se llama a la información de la BD
        let area_afac = data[3];
        // const array1 = [area];
        var data1 = area.split(','); //Se le indica que los datos son separados por una coma
        var data2 = area_afac.split(',')
        //console.log(data1);8
        //console.log(data2);

        $("#num_anexoEdit").val(data[0]); //Se coloca el html para que sea abierto y no llegue a chocar, antes del primer # para ser mas especificos podría llevar #NombreForm
        $("#detallesEdit").val(data[1]);
        $("#areaEdit").val(data1).trigger('change.select2'); //Se llama al array separado
        //$("#area1").val(area).trigger('change');
        $("#area_afacEdit").val(data2).trigger('change.select2');
        $("#incisosEdit").val(data[4]);
        $("#notasEdit").val(data[5]);
      }
    }
  });
}

function editAnexo(){
  //Variables
  let area1 = ''
   //Array area
  let selectObject = document.getElementById("areaEdit");
   for (let i = 0; i < selectObject.options.length; i++) {
       if (selectObject.options[i].selected == true) {
         area1 += ',' + selectObject.options[i].value;
       }
   }
   gstarea = area1.substr(1);
   let area = gstarea;

   let area_afac1 = ''
   let select = document.getElementById("area_afacEdit");
   for (let i = 0; i < select.options.length; i++) {
       if (select.options[i].selected == true) {
         area_afac1 += ',' + select.options[i].value;
       }
   }
  gstarea_afac = area_afac1.substr(1);
  let area_afac = gstarea_afac;

  let num_anexo = document.getElementById("num_anexoEdit").value;
  let detalles = document.getElementById("detallesEdit").value;
  let incisos = document.getElementById("incisosEdit").value;
  let notas = document.getElementById("notasEdit").value;

  datos = 'num_anexo='+num_anexo + '&detalles='+detalles + '&area='+area + '&area_afac='+area_afac + '&incisos='+incisos +'&notas='+notas + '&opcion=editAnexo'
  //alert (datos);

  //AJAX
  $.ajax({
    type:"POST",
    url: "../admin/guardar_anexo.php",
    data: datos
  }).done(function(respuesta){
    if(respuesta==0){
      alert("Exito");
      setTimeout("location.href='anexos.php';",1200);
    }else{
      alert("Error");
      alert(respuesta);
    }
  })
}

//Función editar Fracción
function editarFra(fraccion){
  //alert(fraccion);
  $.ajax({
    url: '../admin/cons_fraccion.php',
    type: 'GET'
  }).done(function(resp){
    obj = JSON.parse(resp);
    let res = obj.data;
    for (U = 0; U < res.length; U++){
      if(obj.data[U].id_fraccion == fraccion ){
        datos = obj.data[U].num_fraccion +'*'+ obj.data[U].detalles_fra +'*'+ obj.data[U].aread +'*'+ obj.data[U].area_afacd +'*'+ obj.data[U].incisos_fra +'*'+ obj.data[U].notas_fra; //Se llaman desde la BD
        //alert(datos);
        
        //Llenado
        var data = datos.split('*');
        let area = data[2]; //Se llama a la información de la BD
        let area_afac = data[3];
        // const array1 = [area];
        var data1 = area.split(','); //Se le indica que los datos son separados por una coma
        var data2 = area_afac.split(',')
        //console.log(data1);8
        //console.log(data2);

        $("#fraEdit").val(data[0]); //Se coloca el html para que sea abierto y no llegue a chocar, antes del primer # para ser mas especificos podría llevar #NombreForm
        $("#detallesFra").val(data[1]);
        $("#areaFra").val(data1).trigger('change.select2'); //Se llama al array separado
        //$("#area1").val(area).trigger('change');
        $("#area_afacFra").val(data2).trigger('change.select2');
        $("#incisosFra").val(data[4]);
        $("#notasFra").val(data[5]);
      }
    }
  });

}

function editFra(){
  //Variables
  let area1 = ''
   //Array area
  let selectObject = document.getElementById("areaFra");
   for (let i = 0; i < selectObject.options.length; i++) {
       if (selectObject.options[i].selected == true) {
         area1 += ',' + selectObject.options[i].value;
       }
   }
   gstarea = area1.substr(1);
   let area = gstarea;

   let area_afac1 = ''
   let select = document.getElementById("area_afacFra");
   for (let i = 0; i < select.options.length; i++) {
       if (select.options[i].selected == true) {
         area_afac1 += ',' + select.options[i].value;
       }
   }
  gstarea_afac = area_afac1.substr(1);
  let area_afac = gstarea_afac;

  let num_fraccion = document.getElementById("fraEdit").value;
  let detalles = document.getElementById("detallesFra").value;
  let incisos = document.getElementById("incisosFra").value;
  let notas = document.getElementById("notasFra").value;

  datos = 'num_fraccion='+num_fraccion + '&detalles='+detalles + '&area='+area + '&area_afac='+area_afac + '&incisos='+incisos +'&notas='+notas + '&opcion=editFra'
  //alert (datos);

  //AJAX
  $.ajax({
    type:"POST",
    url: "../admin/guardar_fra.php",
    data: datos
  }).done(function(respuesta){
    if(respuesta==0){
      alert("Exito");
      setTimeout("location.href='anexos.php';",1200);
    }else{
      alert("Error");
      alert(respuesta);
    }
  })
}

//Función para eliminar Fracción
function eliminarFra(elimFra){
  document.getElementById("elimFra").value = elimFra;
}

function elimFra(elimFra){
  var eliminarFra = document.getElementById("elimFra").value;
  datos = 'id_fraccion=' + eliminarFra + '&opcion=eliminarFra'
  $.ajax({
    url: '../admin/guardar_fra.php',
    method: 'POST',
    data: datos
  }).done(function(res){
    if(res==0){
      alert("Fracción eliminada");
      setTimeout("location.href='anexos.php';",1200);
    }else{
      alert("Error");
      alert(res);
    }
  })
}

//Función del TO DO LIST
function todopruebas(){
  //alert("entro");
  let anexo = document.getElementById("num_anexo").value;

    $.ajax({
      url: '../admin/data_subfrac.php',
      type: 'POST'
    }).done(function(resp) {
      obj = JSON.parse(resp);
      let res = obj.data;
      let x = 0;
      //alert("entro2");
      html = '<thead><div><table style="width:100%" id="subfrac" name="subfrac" class="table table-bordered table-striped"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i>Sub fracción</th><th><i></i>Descripción</th><th><i></i>Área asignada</th><th><i></i>Área AFAC</th><th><i></i>ACCIONES</th></tr></thead><tbody>';
      for (U = 0; U < res.length; U++){
        if (obj.data[U].id_fraccion  == anexo){
          x++;
         let id_sub=obj.data[U].id_sub;
          datos = obj.data[U].num_sub+'*'+obj.data[U].detalles +'*'+ obj.data[U].area +'*'+ obj.data[U].area_afac +'*'+ obj.data[U].incisos +'*'+ obj.data[U].notas; //Se llaman los datos para que estos se editen
          html += "<tr><td>" + x + "</td><td>" + obj.data[U].num_sub + "</td><td>" + obj.data[U].detalles + "</td><td>" + obj.data[U].area + "</td><td>" + obj.data[U].area_afac + "</td><td>" + "<button class='btn btn-success edit' data-toggle='modal' data-target='#EditarSub' onclick='mostrarInf("+'"'+ datos +'"'+")' type='button'><i class='fa fa-edit'></i></button> <button class='btn btn-danger delete' data-toggle='modal' onclick='eliminarsub("+id_sub+")' type='button'><i class='fa fa-trash delete'></i></button>"+ "</td></tr>"; //Aqui se coloca el llamado a la BD
        }
      }
      html += '</div></tbody></table></div>';
      $("#addsub").html(html);
    })
}

function mostrarInf(datos){ //Muestra datos de la sub fraccion a editar
  
  var data = datos.split('*');
  //alert(datos);
  let area = data[2]; //Se llama a la información de la BD
  let area_afac = data[3];
 // const array1 = [area];
  var data1 = area.split(','); //Se le indica que los datos son separados por una coma
  var data2 = area_afac.split(',')
  //console.log(data1);
  //console.log(data2);

  $("#sub_fraccion1").val(data[0]); //Se coloca el html para que sea abierto y no llegue a chocar, antes del primer # para ser mas especificos podría llevar #NombreForm
  $("#detalles1").val(data[1]);
  $("#area1").val(data1).trigger('change.select2'); //Se llama al array separado
  //$("#area1").val(area).trigger('change');
  $("#area_afac1").val(data2).trigger('change.select2');
  $("#incisos1").val(data[4]);
  $("#notas1").val(data[5]);
}

function editarsub(){
  //alert("entra editar");

  //variables
  let area1 = ''
   //Array area AFAC
  let selectObject = document.getElementById("area1");
   for (let i = 0; i < selectObject.options.length; i++) {
       if (selectObject.options[i].selected == true) {
         area1 += ',' + selectObject.options[i].value;
       }
   }
   gstarea = area1.substr(1);
   let area = gstarea;
//fin arreglo
   let area_afac1 = ''
   let select = document.getElementById("area_afac1");
   for (let i = 0; i < select.options.length; i++) {
       if (select.options[i].selected == true) {
         area_afac1 += ',' + select.options[i].value;
       }
   }
  gstarea_afac = area_afac1.substr(1);
  let area_afac = gstarea_afac;
  let num_sub = document.getElementById("sub_fraccion1").value;
  let detalles = document.getElementById("detalles1").value;
  let incisos = document.getElementById("incisos1").value;
  let notas = document.getElementById("notas1").value;

  datos = 'num_sub='+num_sub + '&detalles='+detalles + '&area='+area +'&area_afac='+area_afac + '&incisos='+incisos + '&notas='+notas + '&opcion=editarsub'
  //alert(datos);

  if(num_sub==""||detalles==""||area==""||area_afac==""||incisos==""||notas==""){
    alert("Campos vacios");
    return;

  }else{
    //AJAX
    $.ajax({
      type:'POST',
      url:"../admin/guardar_sub.php",
      data:datos
    }).done(function(respuesta){
      if(respuesta==0){
        alert("Sub fracción editada");
        todopruebas();
        setTimeout("location.href='anexos.php';",1200);
        /*swal({
          title: "Sub fracción editada",
          timer: 2000 ,
        });*/
      }else{
        alert("Error");
        alert(respuesta);
      }
    });
  }
}

//Función para editar desde la tabla mostrada y no en modal de anexo
function editSub(sub){
  //alert(sub);
  $.ajax({
    url: '../admin/cons_sub.php',
    type: 'GET'
  }).done(function(resp){
    obj = JSON.parse(resp);
    let res = obj.data;
    for (U = 0; U < res.length; U++){
      if(obj.data[U].id_sub == sub ){
        datos = obj.data[U].num_sub +'*'+ obj.data[U].detalles +'*'+ obj.data[U].area +'*'+ obj.data[U].area_afac +'*'+ obj.data[U].incisos +'*'+ obj.data[U].notas; //Se llaman desde la BD
        //alert(datos);
        
        //Llenado
        var data = datos.split('*');
        let area = data[2]; //Se llama a la información de la BD
        let area_afac = data[3];
        // const array1 = [area];
        var data1 = area.split(','); //Se le indica que los datos son separados por una coma
        var data2 = area_afac.split(',')
        //console.log(data1);8
        //console.log(data2);

        $("#sub_fraccion1").val(data[0]); //Se coloca el html para que sea abierto y no llegue a chocar, antes del primer # para ser mas especificos podría llevar #NombreForm
        $("#detalles1").val(data[1]);
        $("#area1").val(data1).trigger('change.select2'); //Se llama al array separado
        //$("#area1").val(area).trigger('change');
        $("#area_afac1").val(data2).trigger('change.select2');
        $("#incisos1").val(data[4]);
        $("#notas1").val(data[5]);
      }
    }
  });
}

function eliminarsub(eliminar){
  alert("¿Desea eliminar esta sub fracción?");
  var idEliminar = eliminar;
  datos= 'id_sub=' + idEliminar + '&opcion=eliminarsub'
    $.ajax({
      url: 'guardar_sub.php',
      method:'POST',
      data:datos
    }).done(function(res){
      if(res==0){
        alert("Se elimino con exito");
        todopruebas();
        setTimeout("location.href='anexos.php';",1200);
      }else{
        alert("Error");
        alert(res);
      }
    })
}

function guardarsub(){
  //variables
  let id_fraccion = document.getElementById("num_fraccion").value;
  let sub_fraccion =  document.getElementById("sub_fraccion").value;
  let detalles =  document.getElementById("detallest").value;
  let incisos = document.getElementById("incisost").value;
  let notas = document.getElementById("notast").value;

  //alert(id_fraccion);
  //Array área
  let area1 = ''
  let selectObject = document.getElementById("areat");
    for (let i = 0; i < selectObject.options.length; i++) {
        if (selectObject.options[i].selected == true) {
          area1 += ',' + selectObject.options[i].value;
        }
    }

    gstarea = area1.substr(1);
    let area = gstarea;

  //Array área AFAC
  let area_afac1 = ''
    let select = document.getElementById("area_afact");
    for (let i = 0; i < select.options.length; i++) {
        if (select.options[i].selected == true) {
          area_afac1 += ',' + select.options[i].value;
        }
    }

    gstarea_afac = area_afac1.substr(1);
    let area_afac = gstarea_afac;

  datos = 'sub_fraccion=' + sub_fraccion + '&detallest=' + detalles + '&areat=' + area + '&area_afact=' + area_afac + 
  '&notast=' + notas + '&incisost=' + incisos + '&num_fraccion=' + id_fraccion + '&opcion=guardarsub'
  //alert(datos);
  //Llamado a Ajax
  if(id_fraccion==""||sub_fraccion==""||detalles==""||incisos==""||notas==""||area1==""||area_afac1==""){
    alert("Campos vacios"); //Función para que los campos sean obligatorios 
    return;
  }else{
    $.ajax({
      url: 'guardar_sub.php',
      method: 'POST',
      data: datos
    }).done(function(res){
      if(res==0){
        alert("Alta con exito");
        todopruebas();
        setTimeout("location.href='anexos.php';",1200);
        //Limpia los campos una vez que son guardados .value="";
        document.getElementById("detallest").value="";
        document.getElementById("sub_fraccion").value="";
        document.getElementById("detallest").value="";
        document.getElementById("incisost").value="";
        document.getElementById("notast").value="";
        document.getElementById("areat").innerHTML; //Aqui cambia a innerHTML porque es un multiselect
        document.getElementById("area_afact").innerHTML;

      }else if(res==2){
        alert("Duplicado");
        alert(res);
      }else{
        alert("Error");
        alert(res);
      }
    });
  }
}

function mos_anexo() {
  document.getElementById('tabla_anexo').style.display = 'block';
}
function ocul_anexo() {
    document.getElementById('tabla_anexo').style.display = 'none';
}

function mos_fra() {
  document.getElementById('tabla_fra').style.display = 'block';
}
function ocul_fra() {
    document.getElementById('tabla_fra').style.display = 'none';
}

function mos_sub() {
  document.getElementById('tabla_sub').style.display = 'block';
}
function ocul_sub() {
    document.getElementById('tabla_sub').style.display = 'none';
}

function mostrar_ocultar(){
  var select = document.getElementById("tabla_anexo");
  if (select.style.display == "none"){
    mos_anexo();
    ocul_fra();
    ocul_sub();
  }else{
    ocul_fra();
    ocul_sub();
  }  
}

function mos_oculFra(){
  var sel2 = document.getElementById("tabla_fra");
  if (sel2.style.display == "none") {
    mos_fra();
    ocul_anexo();
    ocul_sub();
  }else{
    ocul_fra();
  }

}

function mos_oculSub(){
  var sel3 = document.getElementById("tabla_sub");
  if (sel3.style.display == "none") {
    mos_sub();
    ocul_fra();
    ocul_anexo();
  }else{
    ocul_sub();
  }

}
