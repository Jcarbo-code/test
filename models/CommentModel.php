<?php

class CommentModel
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=dbtpe;charset=utf8', 'root', '');
    }

    function getComment($idComment)
    {
        $query = $this->db->prepare("SELECT * FROM comentarios WHERE id_comentario = ? ");
        $query->execute([$idComment]);
        $comment = $query->fetch(PDO::FETCH_OBJ);
        return $comment;
    }

    function getCommentsByProduct($idProduct, $orderby, $order)
    {
        $query = $this->db->prepare("SELECT * FROM comentarios AS a INNER JOIN usuarios AS b ON a.id_usuario = b.id_usuario WHERE a.id_product = ?
            order by $orderby $order");
        $query->execute([$idProduct]);
        $comments = $query->fetchAll(PDO::FETCH_OBJ);
        return $comments;
    }

    function getCommentsByUser($id_usuario, $orderby, $order)
    {
        $query = $this->db->prepare("SELECT * FROM comentarios AS a INNER JOIN usuarios AS b ON a.id_usuario = b.id_usuario WHERE a.id_usuario = ?
            order by $orderby $order");
        $query->execute([$id_usuario]);
        $comments = $query->fetchAll(PDO::FETCH_OBJ);
        return $comments;
    }

    function getproductRating($idProduct, $rating, $orderby, $order)
    {
        $query = $this->db->prepare("SELECT * FROM comentarios AS a INNER JOIN usuarios AS b ON a.id_usuario = b.id_usuario WHERE a.id_product = ? AND a.puntuacion = ? order by $orderby $order");
        $query->execute([$idProduct, $rating]);
        $comments = $query->fetchAll(PDO::FETCH_OBJ);
        return $comments;
    }

    function addCommentProduct($comentario, $puntuacion, $id_usuario, $id_product)
    {
        $query = $this->db->prepare("INSERT INTO comentarios(comentario, puntuacion, id_usuario, id_product) VALUES (?,?,?,?)");
        $query->execute([$comentario, $puntuacion, $id_usuario, $id_product]);
        return $this->db->lastInsertId();
    }

    function deleteComment($idComment)
    {
        $query = $this->db->prepare("DELETE FROM comentarios WHERE id_comentario = ?");
        $query->execute([$idComment]);
    }
}
