function guardar_form(){
  alert ("entrar guardar");
   let num_pq = document.getElementById("num_pq").value;
   let area = document.getElementById("area").value;
   let elemento = document.getElementById("elemento").value;
   //INICIO SECCIÓN I
   let pregunta = document.getElementById("pregunta").value;
   let orientacion = document.getElementById("orientacion").value;
   let inciso = document.getElementById("inciso").value;
   let documentos = document.getElementById("documentos").value;
   //INICIO SECCIÓN II
   let fecha_inicio = document.getElementById("fecha_inicio").value;
   let fecha_termino = document.getElementById("fecha_termino").value;
   let porcentaje = document.getElementById("porcentaje").value;
   let introduccion = document.getElementById("introduccion").value;
   let fundamentos = document.getElementById("fundamentos").value;
   let cumplimiento = document.getElementById("cumplimiento").value;
   let intervenciones = document.getElementById("intervenciones").value;
   let conclusion = document.getElementById("conclusion").value;
   let pruebas = document.getElementById("pruebas").value;
   let responsable = document.getElementById("responsable").value;
   let evidencias = document.getElementById("evidencias").value;
//INICIO SECCIÓN III
   let fecha_inicio_atencion = document.getElementById("fecha_inicio_atencion").value;
   let fecha_termino_cap = document.getElementById("fecha_termino_cap").value;
   let porcentaje_total = document.getElementById("porcentaje_total").value;
   let actividades = document.getElementById("actividades").value;
   let responsable_cap = document.getElementById("responsable_cap").value;
   let inicio_final = document.getElementById("inicio_final").value;
   let producto = document.getElementById("producto").value;
   let porcentaje_cap = document.getElementById("porcentaje_cap").value; 

   datos = 'num_pq'+num_pq +'&area'+area + '&elemento'+elemento + '&pregunta'+pregunta + '&orientacion'+orientacion +
   '&inciso'+inciso +'&documentos'+documentos + '&fecha_inicio'+fecha_inicio + '&fecha_termino'+fecha_termino + '&porcentaje'+porcentaje
   + '&introduccion'+introduccion + '&fundamentos'+fundamentos + '&cumplimiento'+cumplimiento + '&intervenciones'+intervenciones 
   + '&conclusion'+conclusion + '&pruebas'+pruebas + '&responsable'+responsable + '&evidencias'+evidencias + '&fecha_inicio_atencion'+fecha_inicio_atencion 
   + '&fecha_termino_cap'+fecha_termino_cap + '&porcentaje_total'+porcentaje_total + '&actividades'+actividades + '&responsable_cap'+responsable_cap 
   + '&inicio_final'+inicio_final + '&producto'+producto + '&porcentaje_cap'+porcentaje_cap + '&opcion=guardarform'

   $.ajax({
    url: 'guardar_formulario.php',
    method: 'POST',
    data: datos
   }).done(function(res){
    if(res==0){
      alert("Respuestas guardadas");
      setTimeout("location.href='anexos.php';",1500);
    }else if(res==2){
      alert("Duplicado");
      alert(res);
    }else{
      alert("Error");
      alert(res);
    }
   });

}

function formllenado(){
  //alert("entra pqs");
  let numeropq= document.getElementById('num_pq').value;
//alert(area);


$.ajax({
        url: 'consult-form.php',
        type: 'POST'
    }).done(function(respuesta) {
        obj = JSON.parse(respuesta);
        let res = obj.data;
        let x = 0;
        for (Q = 0; Q < res.length; Q++) { 
            if (obj.data[Q].num_pq == numeropq){
              //area=obj.data[Q].areas;
              document.getElementById('area').value=obj.data[Q].area;
              document.getElementById('elemento').value=obj.data[Q].elemento;
              document.getElementById('pregunta').value=obj.data[Q].pregunta;
              document.getElementById('orientacion').value=obj.data[Q].orientacion;
              document.getElementById('inciso').value=obj.data[Q].inciso;
              document.getElementById('documentos').value =obj.data[Q].documentos;
            }
        }
    });
}