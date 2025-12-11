<?php

require_once __DIR__ . '/../models/productModel.php';

class productController
{
    private $productModel;

    public function __construct($db)
    {
        $this->productModel = new ProductModel($db);
    }

    public function createProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $description = trim($_POST['description']);
            $price = trim($_POST['price']);

            $success = $this->productModel->insertProduct($name, $description, $price);

            if ($success) {
                // Redirigir a la lista de productos después de agregar uno nuevo
                header("Location: ./index.php?action=showProducts");
                exit;
            } else {
                echo "Error al agregar el producto.";
            }
        }
    }

    public function showProducts()
    {
        return $this->productModel->getAllProducts();
    }

    public function removeProduct($id)
    {
        $success = $this->productModel->deleteProduct($id);

        if ($success) {
            // Redirigir a la lista de productos después de eliminar uno
            header("Location: ./index.php?action=showProducts");
            exit;
        } else {
            echo "Error al eliminar el producto.";
        }
    }
}
