
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
    <form id="cepForm">
        <label for="cep">CEP:</label>
        <input type="text" id="cep" name="cep" maxlength="9" required>
        <button type="button" onclick="buscarCep()">Verificar CEP</button>
    </form>

    <div id="endereco"></div>
    <hr>

    <form method="post" action="?action=finalizarCompra">
        <button type="submit">Finalizar Compra</button>
    </form>
    <p>Subtotal: R$ <?= number_format($subtotal, 2, ',', '.') ?></p>
    <p>Frete: R$ <?= number_format($frete, 2, ',', '.') ?></p>
    <p><strong>Total: R$ <?= number_format($total, 2, ',', '.') ?></strong></p>
<?php else: ?>
    <p>O carrinho está vazio.</p>
<?php endif; ?>

<script>
    function buscarCep() {
        const cep = document.getElementById('cep').value.replace(/\D/g, '');
        if (cep.length !== 8) {
            alert('CEP inválido. Deve conter 8 dígitos.');
            return;
        }

        fetch('https://viacep.com.br/ws/' + cep + '/json/')
            .then(response => response.json())
            .then(data => {
                if (data.erro) {
                    document.getElementById('endereco').innerHTML = '<p>CEP não encontrado.</p>';
                } else {
                    document.getElementById('endereco').innerHTML =
                        `<p><strong>Endereço:</strong> ${data.logradouro}, ${data.bairro}, ${data.localidade} - ${data.uf}</p>`;
                }
            })
            .catch(() => {
                document.getElementById('endereco').innerHTML = '<p>Erro ao buscar CEP.</p>';
            });
    }
</script>

</body>
</html>
