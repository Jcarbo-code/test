<?php

require_once "controllers/productController.php";
require_once "controllers/categoryController.php";
require_once "controllers/userController.php";

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home';
}

$params = explode('/', $action);
$productController = new productController();
$categoryController = new CategoryController();
$userController = new UserController();
switch ($params[0]) {
    case 'home':
        $productController->showHome();
        break;
    case 'product':
        if (isset($params[1]))

            switch ($params[1]) {
                case 'detalle':
                    $productController->getProduct($params[2]);
                    break;
                case 'agregar':
                    $productController->addProduct();
                    break;
                case 'editar':
                    $productController->editProductForm($params[2]);
                    break;
                case 'edit':
                    $productController->editProduct($params[2]);
                    $productController->getProduct($params[2]);
                    break;
                case 'eliminar':
                    $productController->deleteProduct($params[2]);
                    break;
                default:
                    $productController->getProducts();
                    break;
            }
        else
            $productController->getProducts();
        break;

    case 'category':
        if (isset($params[1]))
            switch ($params[1]) {
                case 'agregar':
                    $categoryController->addCategory();
                    break;
                case 'editar':
                    $categoryController->editCategoryForm($params[2]);
                    break;
                case 'edit':
                    $categoryController->editCategory($params[2]);
                    break;
                case 'eliminar':
                    $categoryController->deleteCategory($params[2]);
                    break;
                case 'product':
                    $productController->getProductsbyCategory($params[2]);
                    break;
                default:
                    $categoryController->getCategorys();
                    break;
            }
        else
            $categoryController->getCategorys();
        break;
    case 'login':
        $userController->showLogin();
        break;
    case 'verify':
        $userController->verifyLogin();
        break;
    case 'logout':
        $userController->logout();
        break;
    case 'verify-register':
        $userController->registerUser();
        break;
    case 'register':
        $userController->showRegister();
        break;
    case 'nosotros':
        $productController->showNosotros();
        break;
    case 'usuarios':
        if (isset($params[1]))
            switch ($params[1]) {
                case 'editar':
                    $userController->editUserForm($params[2]);
                    break;
                case 'edit':
                    $userController->editUser($params[2]);
                    break;
                case 'eliminar':
                    $userController->deleteUser($params[2]);
                    break;
            }
        else
            $userController->getUsers();
        break;
    default:
        echo ('404 Page not found');
        break;
}
