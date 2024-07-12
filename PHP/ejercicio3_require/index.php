<!DOCTYPE html>
<head>
  <meta http-equiv="Content-Type" charset="utf-8" />
  <title>require</title>
  <style>
    td{
        border: solid 1px black;
    }
  </style>
</head>

<body>
    <h1>Ejemplo de la funcion require() que ubica el codigo PHP en archivoInc2</h1>
    <h1>Antes de llamar el require() las varaibles son:</h1>

    <?php 

   
    echo"$mensajeInc";
    echo"$a";
    echo"$b";
    echo"$c";
    echo"$t";
    echo"$arreglo";

    require("./archivoInc2.inc");

  echo"<h3>Usando el require()</h3>";
  echo"<h3>La longitud del arreglo es: ".count($arreglo)."</h3>";
 
//array_push($autos, $auto2);

/*foreach($autos as $auto){
    echo $auto['marca'];
}*/
  echo "<table>";
  echo"<tr>";
  echo"<td>". $autos['marca']."</td>";
  echo"<td>". $autos['modelo']."</td>";
  echo"<td>". $autos['fechaDeVenta']."</td>";
  echo"<td>". $autos['kilometros']."</td>";
  echo"</tr>";
  echo"<tr>";
  echo"<td>". $autos['marca2']."</td>";
  echo"<td>". $autos['modelo2']."</td>";
  echo"<td>". $autos['fechaDeVenta2']."</td>";
  echo"<td>". $autos['kilometros2']."</td>";
  echo"</tr>";
  echo "</table>";


    ?>
</body>