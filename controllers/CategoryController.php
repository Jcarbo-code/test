<?php

require_once "models/CategoryModel.php";
require_once "views/CategoryView.php";
require_once "helpers/authHelper.php";

class CategoryController
{

    private $model;
    private $view;
    private $authHelper;

    function __construct()
    {
        $this->authHelper = new AuthHelper();
        $this->model = new CategoryModel();
        $this->view = new CategoryView();
    }

    function getCategorys()
    {
        $categorys = $this->model->getCategorys();
        if (isset($categorys)) {
            $this->view->showCategorys($categorys);
        }
    }

    function editCategory($id)
    {
        $this->authHelper->checkLoggedIn();
        $categoria = $this->model->getCategory($id);
        if ($categoria) {
            $isAdmin = $this->authHelper->isAdmin();
            if (
                isset($_POST['categoria']) && !empty($_POST['categoria']) && isset($_POST['local']) && !empty($_POST['local'])
                && isset($_POST['fecha_menu']) && !empty($_POST['fecha_menu']) && isset($_POST['descripcion'])
                && !empty($_POST['descripcion'])
            ) {
                if ($isAdmin) {
                    $categoria = $_POST['categoria'];
                    $local = $_POST['local'];
                    $fecha_menu = $_POST['fecha_menu'];
                    $descripcion = $_POST['descripcion'];
                    $this->model->editCategory($id, $categoria, $local, $fecha_menu, $descripcion);
                    header("Location: " . BASE_URL . "category");
                }
            }
        } else {
            $this->view->showError('la categoria no existe');
        }
    }

    function editCategoryForm($id)
    {
        $this->authHelper->checkLoggedIn();
        $categoria = $this->model->getCategory($id);
        if ($categoria) {
            $category = $this->model->getCategory($id);
            $this->view->editCategory($category);
        } else {
            $this->view->showError('la categoria no existe');
        }
    }

    function deleteCategory($id)
    {
        $this->authHelper->checkLoggedIn();
        $categoria = $this->model->getCategory($id);
        if ($categoria) {
            $isAdmin = $this->authHelper->isAdmin();
            if ($isAdmin) {
                $category = $this->model->getCategory($id);
                if (isset($category)) {
                    $this->model->deleteCategory($id);
                    header("Location: " . BASE_URL . "category");
                }
            }
        } else {
            $this->view->showError('la categoria no existe');
        }
    }


    function addCategory()
    {
        $this->authHelper->checkLoggedIn();
        $isAdmin = $this->authHelper->isAdmin();
        if (
            isset($_POST['categoria']) && !empty($_POST['categoria']) && isset($_POST['local']) && !empty($_POST['local'])
            && isset($_POST['fecha_menu']) && !empty($_POST['fecha_menu']) && isset($_POST['descripcion'])
            && !empty($_POST['descripcion'])
        ) {
            if ($isAdmin) {
                $categoria = $_POST['categoria'];
                $local = $_POST['local'];
                $fecha_menu = $_POST['fecha_menu'];
                $descripcion = $_POST['descripcion'];
                $this->model->addCategory($categoria, $local, $fecha_menu, $descripcion);
                header("Location: " . BASE_URL . "category");
            }
        } else {
            $categorys = $this->model->getCategorys();
            $this->view->showCategorys($categorys, "Faltó completar un campo requerido");
        }
    }
}
