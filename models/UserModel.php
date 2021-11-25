<?php

class UserModel
{

    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=dbtpe;charset=utf8', 'root', '');
    }

    function getUserByEmail($mail)
    {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE mail = ?');
        $query->execute([$mail]);
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }

    function getUserById($id)
    {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE id_usuario = ?');
        $query->execute([$id]);
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }


    function insertUser($nombre, $mail, $clave, $rol)
    {
        $query = $this->db->prepare('INSERT INTO usuarios (nombre, mail, clave, rol) values(?,?,?,?)');
        $query->execute([$nombre, $mail, $clave, $rol]);
    }

    function getUsers()
    {
        $query = $this->db->prepare('SELECT * FROM usuarios');
        $query->execute();
        $users = $query->fetchAll(PDO::FETCH_OBJ);
        return $users;
    }

    function editUser($nombre, $mail, $rol, $id_usuario)
    {
        $query = $this->db->prepare("UPDATE usuarios SET nombre = ?, mail = ?, rol = ? WHERE id_usuario = ?");
        $query->execute([$nombre, $mail, $rol, $id_usuario]);
    }

    function deleteUser($id_usuario)
    {
        $query = $this->db->prepare("DELETE FROM usuarios WHERE id_usuario = ?");
        $query->execute([$id_usuario]);
    }
}
