<?php

require_once "models/commentModel.php";
require_once "views/apiView.php";
require_once "models/productModel.php";
require_once "helpers/authHelper.php";

class CommentAPIController
{

    private $model;
    private $view;
    private $authHelper;
    private $modelproduct;

    public function __construct()
    {
        $this->authHelper = new AuthHelper();
        $this->model = new CommentModel();
        $this->view = new ApiView();
        $this->modelproduct = new productModel();
    }

    public function getRatingCommentsByProduct($params = null)
    {
        if (isset($params[':ID']) && isset($params[':rating'])) {
            $idproduct = $params[":ID"];
            $rating = $params[':rating'];
            $comments = $this->model->getproductRating($idproduct, $rating);
            return $this->view->response($comments, 200);
        } else {
            return $this->view->response("error de parametros", 500);
        }
    }
    
    public function getCommentsByproduct($params = null)
    {
        $idproduct = $params[":ID"];
        $orderBy = null;
        $order = null;
        $product = $this->modelproduct->getproduct($idproduct);
        if (isset($product)) {
            if (isset($_GET['orderBy']) && ($_GET['orderBy'] == 'puntuacion' || $_GET['orderBy'] == 'fecha_creacion')) {
                $orderBy = $_GET['orderBy'];
            } else {
                $orderBy = 'fecha_creacion';
            }
            if (isset($_GET['order']) && ($_GET['order'] == 'ASC' || $_GET['order'] == 'DESC'))
                $order = $_GET['order'];
            else
                $order = 'DESC';
            $comments = $this->model->getCommentsByproduct($idproduct, $orderBy, $order);
            if (isset($comments) && !empty($comments)) {
                return $this->view->response($comments, 200);
            } else {
                return $this->view->response([], 200);
            }
        } else {
            return $this->view->response("El producto no existe", 404);
        }
    }

    public function addCommentproduct()
    {
        $this->authHelper->isLogged();
        $id_usuario = $this->authHelper->getUserId();
        $body = $this->getBody();
        if (!isset($body->puntuacion) || !isset($body->comentario) || !isset($body->id_product)) {
            $this->view->response("Faltan datos necesarios para insertar un comentario", 400);
        } else {
            $product = $this->modelproduct->getproduct($body->id_product);
            if (!isset($product)) {
                $this->view->response("El producto no existe", 404);
            } else {
                $idComment = $this->model->addCommentproduct($body->comentario, $body->puntuacion, $id_usuario, $body->id_product);
                if (isset($idComment)) {
                    $this->view->response("Se ha insertado correctamente", 201);
                } else {
                    $this->view->response("No se ha podido insertar", 500);
                }
            }
        }
    }

    public function deleteComment($params = null)
    {
        $isLogged = $this->authHelper->isLogged();
        if ($isLogged) {
            $isAdmin = $this->authHelper->isAdmin();
            if ($isAdmin) {
                $idComment = $params[":ID"];
                $comment = $this->model->getComment($idComment);
                if (isset($comment)) {
                    $this->model->deleteComment($idComment);
                    return $this->view->response("El comentario ha sido eliminado", 200);
                } else {
                    return $this->view->response("El comentario no existe", 404);
                }
            } else {
                return $this->view->response("No tienes permisos suficientes para poder eliminarlo", 401);
            }
        } else {
            return $this->view->response("Debes loguearte para poder eliminarlo", 403);
        }
    }

    function getproduct($params = null)
    {
        $idproduct =  $params[":ID"];
        $product = $this->modelproduct->getproduct($idproduct);
        if ($product) {
            $this->view->response($product, 200);
        } else {
            return $this->view->response("El producto no existe", 404);
        }
    }


    private function getBody()
    {
        $bodyString = file_get_contents("php://input");
        return json_decode($bodyString);
    }
}
