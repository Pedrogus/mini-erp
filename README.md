# Mini ERP - PHP & MySQLi

Este é um projeto simples de ERP (Enterprise Resource Planning) desenvolvido em PHP procedural com MySQLi, usando a arquitetura MVC (Model-View-Controller). Ele permite o gerenciamento de produtos, controle de estoque e simulação de carrinho de compras com regras de frete.

## 📦 Funcionalidades

- Cadastro de produtos com nome, preço e estoque.
- Listagem de produtos.
- Adição de produtos ao carrinho.
- Controle de estoque baseado nas compras.
- Cálculo automático de frete:
    - Subtotal entre R$52,00 e R$166,59 → Frete R$15,00
    - Subtotal acima de R$200,00 → Frete grátis
    - Outros casos → Frete R$20,00
- Finalização de compra com resumo.


## 🚀 Como Usar

php -S localhost:8000


### 1. Pré-requisitos

- PHP 5.6 ou superior (Recomendado: PHP 7.0+)
- Servidor local (Apache ou PHP embutido)
- MySQL

### 2. Configuração

- Clone ou baixe este repositório.
- Importe o banco de dados `mini_erp.sql` (forneça se necessário).
- Atualize as credenciais do banco no arquivo:

```php
// config/config.php
$host = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'mini_erp';
