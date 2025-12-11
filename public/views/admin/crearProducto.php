<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir producto al menú</title>
</head>

<body>
    <form action="../../index.php?action=createProduct" method="post">
        <h2>Crear nuevo producto</h2>

        <label for="name">Nombre del producto:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="description">Descripción:</label><br>
        <textarea id="description" name="description" required></textarea><br><br>

        <label for="price">Precio:</label><br>
        <input type="number" step="0.01" id="price" name="price" required><br><br>

        <input type="submit" value="Añadir producto">
    </form>
</body>

</html>