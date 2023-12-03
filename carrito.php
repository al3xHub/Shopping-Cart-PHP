<?php
session_start();
$precios = array(
    "Fresas" => 2.5,
    "Naranjas" => 1.2,
    "Platanos" => 0.95
);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];

    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();
    }
    
    if (isset($_SESSION['carrito'][$producto])) {
        $_SESSION['carrito'][$producto] += $cantidad;
    } else {
        $_SESSION['carrito'][$producto] = $cantidad;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../PracticaTema1/style.css">
    <title>Carrito</title>
</head>
<body>
<div class="container">
    <h1>Carrito</h1>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $total = 0;

        echo "<table>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
            </tr>";

        foreach ($_SESSION['carrito'] as $producto => $cantidad) {
            $subtotal = $precios[$producto] * $cantidad;
            $total += $subtotal;

            echo "<tr>
                    <td>$producto</td>
                    <td>$cantidad</td>
                    <td>$subtotal</td>
                </tr>";
        }
        echo "</table>";

        echo "<h4>Precio Total:</h4><p>$total</p>";
    }
    ?>
    <form action="historial.php" method="post">
        <input type="submit" name="procesar" value="Procesar pedido">
    </form>
    <form action="inicio.php" method="get">
        <input type="submit" name="seguir" value="Seguir comprando">
    </form>
</div>   
</body>
</html>