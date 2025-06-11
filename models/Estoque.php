<?php

namespace models;

require_once 'config/config.php';
class Estoque
{
    public static function reduzir($idProduto, $quantidade)
    {
        global $conn;

        $sql = "UPDATE produto SET estoque = estoque - ? WHERE id = ? AND estoque >= ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iii", $quantidade, $idProduto, $quantidade);
        return $stmt->execute();
    }
}