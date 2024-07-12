<!DOCTYPE html>
<head>
  <meta http-equiv="Content-Type" charset="utf-8" />
  <title>Ajax</title>
  <style>
    *{
        margin: 0;
        font-family: arial;
    }
    body{
        width: 100vw;
        height: 100vh;
        background-color: #3a3153;
    }
   #resulEstado-cont{
    display:flex;
    flex-direction: row;
   }
   div{
    border: 2px solid #094F29;
    width: 50%;
    margin:auto;
    height: 30%;
   }
   #resultado,#estado{
    height: 100%;
    background-color: #94C58C;
   }
   #entrada{
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #429B46;
   }
   button{
    width: 250px;
    height: 50px;
    font-size: 32px;
    display: block;
   margin: 10% auto;
   }
   #encriptar{
    background-color: #64AD62;
   }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>



<body>

</script>
<div id="entrada">
    <h1>Dato de entrada:</h1>

    <form id="fomulario" >
    <input id="clave" name="clave" type="text">
   
    </form>
</div>

<div id="encriptar">

   <button id="enc" >Encriptar</button>
</div>

<div id="resulEstado-cont">


<div id="resultado">
    <h1>Resultado:</h1>
    
</div>

<div id="estado">
    <h1>Estado de requerimiento</h1>
  
</div>
</div>

<script > 

    const data = new URLSearchParams();
    

$("#enc" ).click(function(){
  
    $("#resultado").empty();
    $("#resultado").addClass("estiloRecibiendo");
    $("#resultado").html("<h2>Esperando respuesta..</h2>");
    $("#estado").empty();
    $("#estado").append("<h4>Estado del requerimiento: </h4>");

    $.ajax({
    type:"post",
    url: "./respuesta.php",
    data: { clave: $("#clave").val()},
    success: function(respuestaDelServer,estado){
    $("#resultado").removeClass("estilo recibiendo");
    $("#resultado").html("<h1>Resultado: </h1><h4>"+respuestaDelServer+"</h4>");
    $("#estado").append("<h2>"+estado+"</h2>");
}
 })
})



</script>



</body>