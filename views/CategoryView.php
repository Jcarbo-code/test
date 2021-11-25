<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';


class CategoryView
{
    private $authHelper;
    private $smarty;

    public function __construct()
    {
        $this->authHelper = new AuthHelper();
        $isLogged = $this->authHelper->isLogged();
        $isAdmin = $this->authHelper->isAdmin();
        $this->smarty = new Smarty();
        $this->smarty->assign('BASE_URL', BASE_URL);
        $this->smarty->assign('isLogged', $isLogged);
        $this->smarty->assign('isAdmin', $isAdmin);
        $this->smarty->assign('title', 'Lista de categorias');
    }

    public function showCategorys($categorys)
    {
        $this->smarty->assign('categorys', $categorys);
        $this->smarty->display('templates/categoryList.tpl');
    }

    function editCategory($category)
    {
        $this->smarty->assign('id', $category->id_category);
        $this->smarty->assign('categoria', $category->categoria);
        $this->smarty->assign('local', $category->local);
        $this->smarty->assign('fecha_menu', $category->fecha_menu);
        $this->smarty->assign('descripcion', $category->descripcion);
        $this->smarty->display('templates/editCategory.tpl');
    }
    function showError($error = ""){  
        $this->smarty->assign('error', $error);      
        $this->smarty->display('templates/categoryList.tpl');
    }
}
