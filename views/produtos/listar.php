<?php
if (!isset($produtos)) {
    echo "Erro: variável \$produtos não definida. A view deve ser chamada pelo controller!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Produtos</title>
</head>
<body>
<h1>Produtos</h1>
<a href="?action=criar">Adicionar Produto</a>
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>Ações</th>
    </tr>
    <?php if ($produtos): ?>
        <?php foreach ($produtos as $produto): ?>
            <tr>
                <td><?= htmlspecialchars($produto['id']) ?></td>
                <td><?= htmlspecialchars($produto['nome']) ?></td>
                <td>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></td>
                <td>
                    <a href="?action=editar&id=<?= $produto['id'] ?>">Editar</a> |
                    <a href="?action=deletar&id=<?= $produto['id'] ?>" onclick="return confirm('Tem certeza que deseja deletar?');">Deletar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="4">Nenhum produto encontrado.</td></tr>
    <?php endif; ?>
</table>
</body>
</html>
