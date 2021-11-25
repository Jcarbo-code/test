<?php

require_once './libs/smarty-3.1.39/libs/Smarty.class.php';

class RegisterView
{

    public function showRegister($error = "")
    {
        $smarty = new Smarty();
        $smarty->assign('BASE_URL', BASE_URL);
        $smarty->assign('nombre', 'Registrate');
        $smarty->assign('error', $error);
        $smarty->display('templates/register.tpl');
    }

    public function showHome()
    {
        header("Location: " . BASE_URL . "home");
    }
}
