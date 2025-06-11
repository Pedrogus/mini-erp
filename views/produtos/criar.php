<!DOCTYPE html>
<html>
<head>
    <title>Criar Produto</title>
</head>
<body>
<h1>Criar Produto</h1>
<form method="post" action="?action=criar">
    <label>Nome:</label><br>
    <input type="text" name="nome" required><br><br>

    <label>Preço:</label><br>
    <input type="number" step="0.01" name="preco" required><br><br>

    <button type="submit">Salvar</button>
    <a href="?action=listar">Cancelar</a>
</form>
</body>
</html>
