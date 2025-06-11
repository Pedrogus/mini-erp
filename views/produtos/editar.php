<!DOCTYPE html>
<html>
<head>
    <title>Editar Produto</title>
</head>
<body>
<h1>Editar Produto</h1>
<form method="post" action="?action=editar&id=<?= $produto['id'] ?>">
    <label>Nome:</label><br>
    <input type="text" name="nome" value="<?= htmlspecialchars($produto['nome']) ?>" required><br><br>

    <label>Preço:</label><br>
    <input type="number" step="0.01" name="preco" value="<?= $produto['preco'] ?>" required><br><br>

    <button type="submit">Atualizar</button>
    <a href="?action=listar">Cancelar</a>
</form>
</body>
</html>
