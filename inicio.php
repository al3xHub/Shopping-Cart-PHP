<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../PracticaTema1/style.css">
    <title>Productos</title>
</head>
<body>
    <div class="container">
    <h1>Selección de productos</h1>
    <form action="carrito.php" method="post">
        <label for="seleccionar">Seleccionar producto: </label>
        <select name="producto">
            <option value="Fresas">Fresas 2,50kg</option>
            <option value="Naranjas">Naranjas 1,20kg</option>
            <option value="Platanos">Platanos 0,95kg</option>
        </select>
        <br> <br>
        <label for="cantidad">Añadir cantidad:</label>
        <input type="number" name="cantidad" value="1" min="1">
        <br> <br>
        <input type="submit" name="añadir" value="Añadir al carrito">
    </form>
    </div>
</body>
</html>