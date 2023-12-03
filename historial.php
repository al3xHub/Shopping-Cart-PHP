<?php
session_start();
if (isset($_POST['procesar'])) {
    $_SESSION['carrito'] = array();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../PracticaTema1/style.css">
    <title>Historial</title>
</head>
<body>
<div class="container">
    <h1>Historial de pedidos</h1>
    <?php
   if(isset($_POST['procesar'])){
       $historial = $_COOKIE['historial']+1;
       setcookie('historial', $historial, time()+3600);
       echo "Número de pedidos: $historial";

        date_default_timezone_set('Europe/Madrid');
        $fecha = date("d/m/y H:i:s");
        setCookie("fecha",$fecha);
        echo "<br>Tu último pedido fue realizado el:  $fecha";
        
    } elseif(isset($_POST['reducir'])){
        $historial = max(0,$_COOKIE['historial']-1);
        setcookie('historial', $historial, time()+3600);
        echo "Número de pedidos: $historial";

        date_default_timezone_set('Europe/Madrid');
        $fecha = date("d/m/y H:i:s");
        setCookie("fecha",$fecha);
        echo "<br>Tu último pedido fue realizado el:  $fecha";
    
    }elseif(isset($_POST['borrar'])){
        setcookie('historial', 0, time()-3600);
        setcookie('fecha', 0, time()-3600);
        echo "Número de pedidos: 0";

        date_default_timezone_set('Europe/Madrid');
        $fecha = date("d/m/y H:i:s");
        setCookie("fecha",$fecha);
        echo "<br>Tu último pedido fue realizado el:  $fecha";   
    }
    ?>
    <form action="historial.php" method="post">
        <input type="submit" name="borrar" value="Borrar historial">
    </form>
    <form action="historial.php" method="post">
        <input type="submit" name="reducir" value="Reducir nº de pedidos">
    </form> 
</div>
</body>
</html>