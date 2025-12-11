<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de productos</title>
</head>

<body>
    <h2>Lista de productos</h2>

    <?php foreach ($products as $product): ?>
        <div>
            <h3><?= $product['nombre'] ?></h3>
            <p><?= $product['descripcion'] ?></p>
            <p>Precio: $<?= $product['precio'] ?></p>
            <button>Editar</button>


            <form action="../public/index.php" method="POST">
                <input type="hidden" name="action" value="removeProduct">
                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                <input type="submit" value="Eliminar">
            </form>
        </div>
    <?php endforeach; ?>

</body>

</html>