<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= isset($produto) ? 'Editar' : 'Criar' ?> Produto</title>
</head>
<body>
    <h1><?= isset($produto) ? 'Editar' : 'Criar' ?> Produto</h1>

    <form method="post">
        <label for="nome">Nome:</label><br>
        <input type="text" name="nome" id="nome" value="<?= $produto['nome'] ?? '' ?>" required><br><br>

        <label for="preco">Preço:</label><br>
        <input type="number" name="preco" id="preco" step="0.01" value="<?= $produto['preco'] ?? '' ?>" required><br><br>

        <button type="submit">Salvar</button>
        <a href="ProdutoController.php?action=listar">Cancelar</a>
    </form>
</body>
</html>
