<!DOCTYPE html>
<head>
  <meta http-equiv="Content-Type" charset="utf-8" />
  <title>Respuesta</title>
  <style>
    table{
        border:1px solid black;
    }
    td{
        border: solid 1px black;
        background-color: lightgrey;
    }
  </style>
</head>

<body>
    <h1>Valores ingresados: </h1>
    <?php 
    echo "<h1>Apellido = " .$_GET['apellido']."</h1>";
    echo "<h1>nombre = " .$_GET['nombre']."</h1>";
    ?>

    <button id="cerrar">Cerrar</button>

    <script>
        document.getElementById("cerrar").addEventListener("click", function(){
            window.close();
        })
    </script>
    
</body>