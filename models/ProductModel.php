<?php

class ProductModel
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=dbtpe;charset=utf8', 'root', '');
    }

    function getProducts($offset, $limit)
    {
        $query = $this->db->prepare('SELECT l.*, e.categoria, e.local FROM product l JOIN category e ON l.id_category = e.id_category ORDER BY l.id_product limit ?, ?');
        $query->bindParam(2, $limit, PDO::PARAM_INT);
        $query->bindParam(1, $offset, PDO::PARAM_INT);
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }

    function countProducts()
    {
        $query = $this->db->prepare("SELECT count(*) as cantidad FROM product l JOIN category e ON l.id_category = e.id_category");
        $query->execute();
        $cantidad = $query->fetch(PDO::FETCH_OBJ);
        return $cantidad;
    }

    function getProductsbyCategory($id_category)
    {
        $query = $this->db->prepare("SELECT l.*, e.categoria, e.local FROM product l JOIN category e ON l.id_category = e.id_category WHERE e.id_category = ?");
        $query->execute([$id_category]);
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }

    function getProduct($id_product)
    {
        $query = $this->db->prepare("SELECT l.*, e.categoria, e.local FROM product l JOIN category e ON l.id_category = e.id_category WHERE id_product = ?");
        $query->execute([$id_product]);
        $product = $query->fetch(PDO::FETCH_OBJ);
        return $product;
    }

    function editProduct($id_product, $nombre, $descripcion, $precio, $imagen = NULL, $imagenVieja)
    {
        $pathImg = $imagenVieja;
        if ($imagen) {
            $pathImg = $this->uploadFile($imagen, $pathImg);
        }
        $query = $this->db->prepare("UPDATE product SET nombre = ?, descripcion = ?, precio = ?, imagen = ? WHERE id_product = ?");
        $query->execute([$nombre, $descripcion, $precio, $pathImg, $id_product]);
    }

    function editImgProduct($imagen, $id_product)
    {
        $query = $this->db->prepare("UPDATE product SET imagen = ? WHERE id_product = ?");
        $query->execute([$imagen, $id_product]);
    }

    function deleteProduct($id_product)
    {
        $query = $this->db->prepare("DELETE FROM product WHERE id_product = ?");
        $query->execute([$id_product]);
    }

    function uploadFile($imagen, $old = NULL)
    {
        $filePath = "img/" . uniqid("", true) . "."
            . strtolower(pathinfo($imagen['name'], PATHINFO_EXTENSION));
        // obtenemos algo como “img/123127843873.jpg” (o la extensión que sea)
        $ok = move_uploaded_file($imagen["tmp_name"], $filePath);
        if ($ok && $old) {
            unlink($old);
        }
        return $filePath;
    }

    function addProduct($nombre, $descripcion, $precio, $imagen = NULL, $id_category)
    {
        $pathImg = null;
        if ($imagen) {
            $pathImg = $this->uploadFile($imagen);
        }
        $query = $this->db->prepare("INSERT INTO product (nombre, descripcion, precio, imagen, id_category) VALUES(?,?,?, ?, ?)");
        $query->execute([$nombre, $descripcion, $precio, $pathImg, $id_category]);
    }
}
