<!DOCTYPE html>
<head>
  <meta http-equiv="Content-Type" charset="utf-8" />
  <title>Variables del servidor</title>
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
    <h1>Varibles del servidor</h1>
    <table>
    <?php 
    echo"<tr>";
    echo"<td>SERVER_ADDR</td>";
    echo"<td>".$_SERVER['SERVER_ADDR']."</td>";
    echo"</tr>";

    echo"<tr>";
    echo"<td>SERVER_PORT</td>";
    echo"<td>".$_SERVER['SERVER_PORT']."</td>";
    echo"</tr>";

    echo"<tr>";
    echo"<td>SERVER_NAME</td>";
    echo"<td>".$_SERVER['SERVER_NAME']."</td>";
    echo"</tr>";

    echo"<tr>";
    echo"<td>DOCUMENT_ROOT</td>";
    echo"<td>".$_SERVER['DOCUMENT_ROOT']."</td>";
    echo"</tr>";
    ?> 
    </table>

    <h1>Varibles del servidor</h1>
    <table>
    <?php 
     echo"<tr>";
     echo"<td>REMOTE_ADDR</td>";
     echo"<td>".$_SERVER['REMOTE_ADDR']."</td>";
     echo"</tr>";
 
     echo"<tr>";
     echo"<td>REMOTE_PORT</td>";
     echo"<td>".$_SERVER['REMOTE_PORT']."</td>";
     echo"</tr>";
    ?>
    </table>

    <h1>Varibles del requirimiento</h1>
    <table>
    <?php 
     echo"<tr>";
     echo"<td>SCRIPT_NAME</td>";
     echo"<td>".$_SERVER['SCRIPT_NAME']."</td>";
     echo"</tr>";
 
     echo"<tr>";
     echo"<td>REQUEST_METHOD</td>";
     echo"<td>".$_SERVER['REQUEST_METHOD']."</td>";
     echo"</tr>";
    ?>
    </table>

    <h1>Todas</h1>

    <?php 
    foreach($_SERVER as $key_name=> $key_value)
    {
        echo"<h3>$key_name $key_value</h3>";
        }
?>
</body>