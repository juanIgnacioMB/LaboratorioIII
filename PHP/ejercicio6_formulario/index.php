<!DOCTYPE html>
<head>
  <meta http-equiv="Content-Type" charset="utf-8" />
  <title>Formulario</title>
  <style>
    form{
      display: flex;
      flex-direction: column;
    }
    input{
        width: 200px;
    }
    button{
        width: fit-content;
    }
   
  </style>
</head>

<body>
    <form target="_blank" action="./respuesta.php">
        
        <label for="">Nombre:</label>
        <input name="nombre" type="text">

        <label for="">Apellido:</label>
        <input name="apellido" type="text">

        <button type="submit">Ingresar datos</button>
    </form>

</body>