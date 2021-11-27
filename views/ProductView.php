<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';

class ProductView
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
    }


    public function showProducts($products, $categorys, $cantidadPag)
    {
        $this->smarty->assign('title', 'Lista de productos');
        $this->smarty->assign('categorys', $categorys);
        $this->smarty->assign('products', $products);
        $this->smarty->assign('cantidadPag', $cantidadPag);
        $this->smarty->display('templates/ProductList.tpl');
    }

    public function showProduct($Product)
    {
        $this->smarty->assign('title', 'Información detallada del plato');
        $this->smarty->assign('product', $Product);
        $this->smarty->display('templates/ProductsLayoutCSR.tpl');
    }

    public function editProduct($Product)
    {
        $this->smarty->assign('id', $Product->id_product);
        $this->smarty->assign('nombre', $Product->nombre);
        $this->smarty->assign('descripcion', $Product->descripcion);
        $this->smarty->assign('precio', $Product->precio);
        $this->smarty->assign('imagen', $Product->imagen);
        $this->smarty->display('templates/editProduct.tpl');
    }

    public function showProductsByCategory($products)
    {
        $this->smarty->assign('title', 'Lista de product');
        $this->smarty->assign('products', $products);
        $this->smarty->display('templates/ProductsByCategory.tpl');
    }

    function showError($error = "")
    {
        $this->smarty->assign('title', 'Lista de productos');
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/ProductList.tpl');
    }

    function showHome()
    {
        $this->smarty->display('templates/home.tpl');
    }

    function showNosotros()
    {
        $this->smarty->display('templates/nosotros.tpl');
    }
}
