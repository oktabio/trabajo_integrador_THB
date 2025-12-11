<?php
require_once __DIR__ . '/userController.php';

class AdminController extends UserController
{
    public function home()
    {
        // Lógica para la vista de inicio del administrador
        include __DIR__ . '/../../public/views/admin/home.php';
    }

    public function showProducts()
    {
        // Lógica para mostrar productos al administrador
        $products = $this->productController->showProducts();
        include __DIR__ . '/../../public/views/admin/listaProductos.php';
    }


    public function createProduct()
    {
        // Lógica para crear un producto (solo para administradores)
        $this->productController->createProduct();
    }

    public function removeProduct($id)
    {
        // Lógica para eliminar un producto (solo para administradores)
        $this->productController->removeProduct($id);
    }
}
