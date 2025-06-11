<?php

$host = 'localhost';
$usuario = 'root';
$senha = 'DtNasc@261204';
$banco = 'erp';

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_errno) {
    die("Conexão falha:  " . $conn->connect_error);
}
?>