
<!DOCTYPE html>
<html>
<head>
    <title>Carrinho de Compras</title>
</head>
<body>
<h1>Seu Carrinho</h1>
<?php if (!empty($carrinho)): ?>
    <ul>
        <?php foreach ($carrinho as $item): ?>
            <li>
                <?= htmlspecialchars($item['nome']) ?> -
                R$ <?= number_format($item['preco'], 2, ',', '.') ?> x <?= $item['quantidade'] ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <form method="post" action="?action=finalizarCompra">
        <button type="submit">Finalizar Compra</button>
    </form>
    <p>Subtotal: R$ <?= number_format($subtotal, 2, ',', '.') ?></p>
    <p>Frete: R$ <?= number_format($frete, 2, ',', '.') ?></p>
    <p><strong>Total: R$ <?= number_format($total, 2, ',', '.') ?></strong></p>
<?php else: ?>
    <p>O carrinho está vazio.</p>
<?php endif; ?>
</body>
</html>
