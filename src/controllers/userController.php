<?php

require_once __DIR__ . '/productController.php';

abstract class UserController
{
    protected $db;
    protected $productController;

    public function __construct($db)
    {
        $this->db = $db;
        $this->productController = new productController($db);
    }

    abstract public function home();
    abstract public function showProducts();
}
