<!DOCTYPE html>
<head>
  <meta http-equiv="Content-Type" charset="utf-8" />
  <title>Ajax</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <header><h1>Header</h1></header>
    <div id="modal">
    <div id="cont1">
    <div id="cerrar-cont">
            <button id="cerrar">X</button>
        </div>
        <div>
      <div id="cont4">
      <div id="cont-datos">
        
        <label for="">ID usuario</label>
        <input required id="ID" type="text" required />
        <label for="">Login</label>
        <input required id="login" type="text" />
        <label for="">Apelldo</label>
        <input required id="apellido" min="100" type="text" />
        <label for="">Nombres</label>
        <input required id="nombres" type="text" />
        <label for="">Fecha de nacimiento</label>
        <input required id="fecha" type="date" />
        <button id="enviar">Enviar</button>
      </div>

      <div id="cont-json">
        <h3>Resultado JSON:</h3>
      </div>
      </div>

      </div>

      
    </div>
  </div>
    <section id="contenido-modal">
   
        <button id="abrir">Abrir modal</button>
    </section>
    <footer><h1>Footer</h1></footer>

    <script>
         const data = new URLSearchParams();
$("#enviar" ).click(function(){
  
    var confirmacion = confirm("Esta seguro de enviar?")
    if(confirmacion){
        $("#cont-json").empty();

    $("#cont-json").html("<h2>Esperando respuesta..</h2>");

    $.ajax({
      type:"post",
      url: "./respuestaJSON.php",
      data: { id: $("#ID").val(), login: $("#login").val(), apellido: $("#apellido").val(),nombres: $("#nombres").val(), fecha: $("#fecha").val()},
      success: function(respuestaDelServer,estado){

 $("#cont-json").html("<h1>Resultado de la transformacion a JSON del servidor: </h1><h4>"+respuestaDelServer+"</h4>");

}
})
    }

})

$("#cerrar").click(function(){
    $("#apellido").val("") 
    $("#ID").val("");
    $("#login").val("");
    $("#nombres").val("");
    $("#fecha").val("");
    $("#cont-json").html("<h3>Resultado JSON:</h3>");
    $("#modal").css("display","none");
})

$("#abrir").click(function(){
   $("#modal").css("display","block");
})




    </script>
</body>