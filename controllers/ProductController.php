<?php

require_once "models/productModel.php";
require_once "views/productView.php";
require_once "helpers/authHelper.php";
require_once "models/categoryModel.php";
require_once "views/CategoryView.php";
require_once "models/CommentModel.php";

class ProductController
{
    private $model;
    private $view;
    private $authHelper;
    private $categoryModel;
    private $commentModel;

    public function __construct()
    {
        $this->authHelper = new AuthHelper();
        $this->model = new ProductModel();
        $this->view = new ProductView();
        $this->CategoryView = new CategoryView();
        $this->categoryModel = new CategoryModel();
        $this->commentModel = new CommentModel();
    }

    public function getProducts()
    {
        if (isset($_GET['page']))
            $page = (int) $_GET['page'];
        else
            $page = 1;
        if (isset($_GET['pageSize']))
            $pageSize = (int) $_GET['pageSize'];
        else
            $pageSize = 10;
        if ($page == 1)
            $offset = 0;
        else
            $offset = ($pageSize * $page);
        $product = $this->model->getProducts($offset, $pageSize);
        $counts = $this->model->countProducts();
        $categoryModel = new CategoryModel();
        $this->view->showProducts($product, $categoryModel->getCategorys(), $counts->cantidad / $pageSize - 1);
    }

    public function getProduct($id)
    {
        $product = $this->model->getProduct($id);
        if ($product) {
            $this->view->showProduct($product);
        } else {
            $this->view->showError('el producto no existe');
        }
    }

    public function editProduct($id)
    {
        $this->authHelper->checkLoggedIn();
        $product = $this->model->getProduct($id);
        if ($product) {
            $isAdmin = $this->authHelper->isAdmin();
            if (
                isset($_POST['nombre']) && !empty($_POST['nombre']) && isset($_POST['descripcion']) && !empty($_POST['descripcion'])
                && isset($_POST['precio']) && !empty($_POST['nombre']) /* && isset($_POST['imagen']) && !empty($_POST['imagen']) */
            ) {
                if ($isAdmin) {
                    $nombre = $_POST['nombre'];
                    $descripcion = $_POST['descripcion'];
                    $precio = $_POST['precio'];
                    /* $imagen = $_POST['imagen']; */
                    $this->model->editProduct($id, $nombre, $descripcion, $precio);
                }
            }
            header("Location: " . BASE_URL);
        } else {
            $this->view->showError('el producto no existe');
        }
    }

    public function editproductForm($id)
    {
        $this->authHelper->checkLoggedIn();
        $product = $this->model->getProduct($id);
        if ($product) {
            $product = $this->model->getProduct($id);
            $this->view->editProduct($product);
        } else {
            $this->view->showError('el producto no existe');
        }
    }

    public function deleteproduct($id)
    {
        $this->authHelper->checkLoggedIn();
        $product = $this->model->getProduct($id);
        if ($product) {
            $isAdmin = $this->authHelper->isAdmin();
            $comments = $this->commentModel->getCommentsByproduct($id, 'fecha_creacion', 'DESC');
            if (!$comments) {
                if ($isAdmin) {
                    $this->model->deleteProduct($id);
                    header("Location: " . BASE_URL);
                } else {
                    header("Location: " . BASE_URL );
                }
            } else {
                $this->view->showError('el producto tiene comentarios');
            }
        } else {
            $this->view->showError('el producto no existe');
        }
    }


    function getProductsbyCategory($id_category)
    {
        $category = $this->categoryModel->getCategory($id_category);
        if ($category) {
            if (isset($id_category) && !empty($id_category)) {
                $category = $this->categoryModel->getCategory($id_category);
                if (isset($category) && !empty($category)) {
                    $products = $this->model->getProductsbyCategory($id_category);
                    $this->view->showProductsByCategory($products);
                }
            }
        } else {
            $this->CategoryView->showError('la categoria no existe');
        }
    }

    public function addProduct()
    {
        $this->authHelper->checkLoggedIn();
        $isAdmin = $this->authHelper->isAdmin();
        if (
            isset($_POST['nombre']) && !empty($_POST['nombre']) && isset($_POST['descripcion']) && !empty($_POST['descripcion'])
            && isset($_POST['precio']) && !empty($_POST['precio']) /* && isset($_POST['imagen']) && !empty($_POST['imagen']) */
        ) {
            if ($isAdmin) {
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $precio = $_POST['precio'];
                /* $imagen = $_POST['imagen']; */
                $id_category = $_POST['id_category'];
                $this->model->addproduct($nombre, $descripcion, $precio, $id_category);
                header("Location: " . BASE_URL);
            }
        } else {
            header("Location: " . BASE_URL);
        }
    }
}
