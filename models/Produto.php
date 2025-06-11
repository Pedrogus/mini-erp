<?php

namespace models;

require_once 'config/config.php';

class Produto
{
    public static function getAll()
    {
        global $conn;
        $sql = "SELECT * FROM produto";
        $result = $conn->query($sql);
        $produtos = [];

        while ($row = $result->fetch_assoc()) {
            $produtos[] = $row;
        }
        return $produtos;
    }

    public static function criar($nome, $preco)
    {
        global $conn;
        $sql = "INSERT INTO produto (nome, preco) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sd", $nome, $preco);
        $stmt->execute();
    }

    public static function buscarPorId($id)
    {
        global $conn;
        $sql = "SELECT * FROM produto WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function atualizar($id, $nome, $preco)
    {
        global $conn;
        $sql = "UPDATE produto SET nome = ?, preco = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sdi", $nome, $preco, $id);
        $stmt->execute();
    }

    public static function excluir($id)
    {
        global $conn;
        $sql = "DELETE FROM produto WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}
