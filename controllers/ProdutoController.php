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


    public function adicionarCarrinho() {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = intval($_POST['id']);
            $quantidade = intval($_POST['quantidade']);
            if ($quantidade < 1) $quantidade = 1;

            $produto = Produto::buscarPorId($id);
            if (!$produto) {
                echo 'Nenhum produto encontrado';
                exit;
            }

            $estoque = isset($produto['estoque']) ? $produto['estoque'] : 100;
            if ($quantidade > $estoque) {
                echo "quantidade maior que estoque";
                exit;
            }

            if(!isset($_SESSION['carrinho'])) {
                $_SESSION['carrinho'] = [];
            }

            if (isset($_SESSION['carrinho'][$id])) {
                $novaQuantidade = $_SESSION['carrinho'][$id]['quantidade'] + $quantidade;
                if ($novaQuantidade > $estoque) {
                    echo "Quantidade excede o estoque disponível.";
                    exit;
                }
                $_SESSION['carrinho'][$id]['quantidade'] = $novaQuantidade;
        } else {
                $_SESSION['carrinho'][$id] = [
                    'nome' => $produto['nome'],
                    'preco' => $produto['preco'],
                    'quantidade' => $quantidade,
                    'estoque' => $estoque,
                ];
            }
            header('Location: ?action=verCarrinho');
            exit;
        }
    }
    public function verCarrinho() {

        $carrinho = isset($_SESSION['carrinho']) ? $_SESSION['carrinho'] : [];

        // Calcula subtotal
        $subtotal = 0;
        foreach ($carrinho as $item) {
            $subtotal += $item['preco'] * $item['quantidade'];
        }

        // Calcula frete conforme regra
        if ($subtotal >= 52.00 && $subtotal <= 166.59) {
            $frete = 15.00;
        } elseif ($subtotal > 200.00) {
            $frete = 0.00;
        } else {
            $frete = 20.00;
        }

        $total = $subtotal + $frete;

        require 'views/produtos/carrinho.php';
    }

    public function finalizarCompra()
    {

        if (!isset($_SESSION['carrinho']) || empty($_SESSION['carrinho'])) {
            echo "Carrinho vazio!";
            return;
        }

        $carrinho = $_SESSION['carrinho'];

        // Calcular subtotal
        $subtotal = 0;
        foreach ($carrinho as $item) {
            $subtotal += $item['preco'] * $item['quantidade'];
        }

        // Calcular frete
        if ($subtotal >= 52 && $subtotal <= 166.59) {
            $frete = 15.00;
        } elseif ($subtotal > 200) {
            $frete = 0.00;
        } else {
            $frete = 20.00;
        }

        $total = $subtotal + $frete;

        // Aqui você pode registrar o pedido no banco de dados, se quiser...

        // Limpar carrinho
        unset($_SESSION['carrinho']);

        // Exibir confirmação simples
        echo "<h1>Compra Finalizada</h1>";
        echo "<p>Subtotal: R$ " . number_format($subtotal, 2, ',', '.') . "</p>";
        echo "<p>Frete: R$ " . number_format($frete, 2, ',', '.') . "</p>";
        echo "<p>Total: R$ " . number_format($total, 2, ',', '.') . "</p>";
        echo "<a href='?action=listar'>Voltar para loja</a>";
    }


}