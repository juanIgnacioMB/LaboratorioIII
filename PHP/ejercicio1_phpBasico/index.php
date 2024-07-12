<!DOCTYPE html>
<head>
  <meta http-equiv="Content-Type" charset="utf-8" />
  <title>PHP basico</title>
</head>

<body>
    <h1>Todo lo escrito fuera de marcas PHP es entregado en la respuesta  HTTP sin pasar por el procesardor PHP</h1>
    <hr>

    <?php echo "<h1> ¡ Todo texto html <span style = 'color:green' > entregado por el procesador php </span> va usando la sentencia <span style='color:green'>echo</span>!</h1>"; ?>
<hr>

<?php $variableValor = "valor variable 1";
echo"<h1> <span>Sin usar concatenar:</span> <span style='color: blue'>\$variableValor: </span> <span> $variableValor</span></h1>";
echo "<h1> <span>Usando concatenar</span> <span style='color: blue'>\$variableValor </span> ".$variableValor."<span>:</span></h1>";?>

<hr>

<?php $booleanaTrue = true;
      $booleanaFalse = false;
echo "<h1>Variable tipo booleana o logica (verdadero) <spam style='color: red'>\$booleanaTrue</spam>: $booleanaTrue</h1>";
echo "<h1>Variable tipo booleana o logica (falsa) <spam style='color: red'>\$booleanaFalse</spam>: $booleanaFalse</h1>";
?>

<hr>

<?php 
    define("variableConstante", "valor constante");
    echo "<h1>La constante: <spam style='color: blue'>variableConstante: </spam>".variableConstante."</h1>";
    echo "<h1>El tipo de dato de<spam style='color: blue'> variableConstante: es</spam> ".gettype(variableConstante)."</h1>";
?>

<hr>

<h1>Arreglos:</h1>

<?php 
    $arregloFrutas = ["Manzana", "Apple"];
    
    echo "<h1> <spam style='color: lightgreen'> \$arregloFrutas[0] : $arregloFrutas[0]</spam> </h1>";
    echo "<h1> <spam style='color: lightgreen'> \$arregloFrutas[1] : $arregloFrutas[1]</spam> </h1>";
    echo "<h1>Se agregan dos elementos al array por programa</h1>";

    array_push($arregloFrutas,"Naranja");
    array_push($arregloFrutas,"Orange");

    echo"<ul>";
    foreach($arregloFrutas as $fruta){
        echo"<li style='font-size: 20px'>$fruta</li>";
    }
    echo"</ul>";

    echo "<h1>Arreglo de dos dimensiones</h1>";

    $arregloFrutasEspañol = ["manzana", "Naranja", "Sandia"];
    $arregloFrutasIngles = ["Apple", "Orange", "Watermelon"];
    $arregloFrutasItaliano = ["La Mela", "L'Arancia", "Anguria"];
    $arregloFrutasFrances = ["pomme", "Orange", "pastèque  "];

    $diccionario = [$arregloFrutasEspañol , $arregloFrutasIngles];
    array_push($diccionario,$arregloFrutasItaliano);
    array_push($diccionario,$arregloFrutasFrances);

    echo $diccionario[3][0];
    echo "<h1>Tipo de varaible de \$diccionario es: ".gettype($diccionario)."</h1>";
    
    echo "<table>";
    
    echo "<tr>";
    foreach($diccionario[0] as $fruta){
        
        echo"<td style='font-size: 20px'>".$fruta."</td>";
        
    }
    echo "</tr>";

    echo "<tr>";
    foreach($diccionario[1] as $fruta){
        echo"<td style='font-size: 20px'>".$fruta."</td>";
    }
    echo "</tr>";
    echo "<tr>";
    foreach($diccionario[2] as $fruta){
        echo"<td style='font-size: 20px'>".$fruta."</td>";
    }
    echo "</tr>";

    echo "<tr>";
    foreach($diccionario[3] as $fruta){
        echo"<td style='font-size: 20px'>".$fruta."</td>";
    }
    echo "</tr>";
    echo "</table>";

    $elementosDiccionario = count($diccionario[0]);

    echo "<h1>Cantidad de elementos en diccionario: $elementosDiccionario</h1>";
?>

</body>