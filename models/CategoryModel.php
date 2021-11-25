<?php

class CategoryModel
{

    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=dbtpe;charset=utf8', 'root', '');
    }

    function getCategorys()
    {
        $query = $this->db->prepare("SELECT * FROM category");
        $query->execute();
        $categorys = $query->fetchAll(PDO::FETCH_OBJ);
        return $categorys;
    }

    function getCategory($id_category)
    {
        $query = $this->db->prepare("SELECT * FROM category where id_category = ?");
        $query->execute([$id_category]);
        $category = $query->fetch(PDO::FETCH_OBJ);
        return $category;
    }

    function editCategory($id_category, $categoria, $local, $fecha_menu, $descripcion)
    {
        $query = $this->db->prepare("UPDATE category SET categoria = ?, local = ?, fecha_menu = ?,
        descripcion = ? WHERE id_category = ?");
        $query->execute([$categoria, $local, $fecha_menu, $descripcion, $id_category]);
    }

    function deleteCategory($id_category)
    {
        $query = $this->db->prepare("DELETE FROM category WHERE id_category = ?");
        $query->execute([$id_category]);
    }

    function addCategory($categoria, $local, $fecha_menu, $descripcion)
    {
        $query = $this->db->prepare("INSERT INTO category(categoria, local, fecha_menu, descripcion) VALUES(?, ?, ?, ?)");
        $query->execute([$categoria, $local, $fecha_menu, $descripcion]);
    }
}
