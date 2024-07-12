<!DOCTYPE html>
<head>
  <meta http-equiv="Content-Type" charset="utf-8" />
  <title>Form to escrypt</title>
  <style>
    *{
        font-family: arial;
        margin: 0;
     
    }
    body{
      background-color: #3a3153;
    }
   form{
    background-color: #800080;
    font-family: arial;
    width: 500px;
    height: 100px;
    margin: auto;
    border: 2px black solid;
    border-radius: 10px
   }
   h3{
    color: white;
    text-align: center;
   }
  div{
    margin: auto;
    width: 300px;
    font-size: 20px;
    display:flex;
    justify-content: center;
    flex-direction:column;
    align-items: center;
    box-sizing: border-box;
    padding: 10px;
   
   }

  button{
    width: 150px;
    height: 30px

  }

  </style>
</head>

<body>
    <h3>Ingrese clave</h3>
    <form target="_blank" action="./respuestaEncriptada.php">
        <div>
        <input name="palabra" type="text">
       <button>Encriptar</button>
       </div>
    </form>
</body>