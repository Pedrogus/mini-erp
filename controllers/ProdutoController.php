<?php

use models\Produto;

require_once 'models/Produto.php';

class ProdutoController {
    public function listar() {
        $produtos = Produto::getAll();
        require  'views/produtos/listar.php';
    }

    public function criar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome = $_POST['nome'];
            $preco = $_POST['preco'];
            Produto::criar($nome, $preco);
            header('location: index.php');
        } else {
            require 'views/produtos/criar.php';
        }
    }

    public function editar() {
        $id = $_GET['id'];
        $produto = Produto::buscarPorId($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome = $_POST['nome'];
            $preco = $_POST['preco'];
            Produto::atualizar($id, $nome, $preco);
            header('location: index.php');
        } else {
            require 'views/produtos/editar.php';
        }
    }

    public function excluir()
    {
        $id = $_GET['id'];
        Produto::excluir($id);
        header('Location: index.php');
    }
}