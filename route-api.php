<?php


require_once('libs/Router.php');
require_once('./controllers/commentAPIController.php');

// crea el router
$router = new Router();

// CAMBIAR TABLA DE ROUTEO
$router->addRoute('product/detalle/:ID', 'GET', 'commentAPIController', 'getCommentsByProduct');
$router->addRoute('product/detalle/:ID/comments', 'POST', 'commentAPIController', 'addCommentProduct');
$router->addRoute('product/detalle/:ID/comments/:ID', 'DELETE', 'commentAPIController', 'deleteComment');
// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
