<?php
require_once "./libs/smarty-3.1.39/libs/Smarty.class.php";

class LoginView
{

    public function showLogin($error = "")
    {
        $smarty = new Smarty();
        $smarty->assign('BASE_URL', BASE_URL);
        $smarty->assign('nombre', 'Iniciar Sesión');
        $smarty->assign('error', $error);
        $smarty->display('templates/login.tpl');
    }

    public function showHome()
    {
        header("Location: " . BASE_URL . "home");
    }
}
