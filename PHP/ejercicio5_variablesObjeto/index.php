<!DOCTYPE html>
<head>
  <meta http-equiv="Content-Type" charset="utf-8" />
  <title>Variables dle servidor</title>

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
    <h1>Variables tipo objeto</h1>

    <?php 
     $autoObjeto = new stdclass;
     $autoObjeto->marca = "Toyota";
     $autoObjeto->modelo = "Corolla";
     $autoObjeto->kilometros = 20000;

     $autoObjeto2 = new stdclass;
     $autoObjeto2->marca = "Fiat";
     $autoObjeto2->modelo = "Sienna";
     $autoObjeto2->kilometros = 150000;

     echo "<h1 style='color: blue'>\$autoObjeto</h1>";

     echo"<h3>Marca: ".$autoObjeto->marca."</h3>";
     echo"<h3>Modelo: ".$autoObjeto->modelo."</h3>";
     echo"<h3>kilometros: ".$autoObjeto->kilometros."</h3>";

     echo"<h2>Tipo de <spam style='color: blue'>\$autoObjeto </spam>= ".gettype($autoObjeto)."</h2>";

     echo"<h2>Defino arreglo de autos</h2>";
    $autosObjetoArray = [];
    array_push($autosObjetoArray, $autoObjeto);
    array_push($autosObjetoArray, $autoObjeto2);

    echo"<h2 >Recorro: <spam style='color: orange'>  \$autosObjeto</spam></h2>";

    echo"<table>";

    foreach( $autosObjetoArray as $auto) {
        echo"<tr>";
             echo "<td>".$auto->marca."</td>";
             echo "<td>".$auto->modelo."</td>";
             echo "<td>".$auto->kilometros."</td>";

        echo"</tr>";
}
    echo"</table>";

    echo"<h3>Cantidad de autos: ".count($autosObjetoArray)."</h3>";

    $objetoAutosContArray = new stdClass();
    $objetoAutosContArray->array = $autosObjetoArray;
    $objetoAutosContArray->cantAutos = count($autosObjetoArray);

    echo "<h1>Produccion de un objeto <spam style='color: orange'>\$objetoAutosContArray</spam>. Con atributos array y cantAutos</h1>";
    echo "<h2>Cantidad de autos $objetoAutosContArray->cantAutos</h2>";

    $jsonAuto = json_encode($objetoAutosContArray);

    echo"<h1>Produccion de un JSON <spam style='color: lightblue'> jsonAutos</spam></h1>";
    echo"<h3>$jsonAuto</h3>";
    ?>
</body>