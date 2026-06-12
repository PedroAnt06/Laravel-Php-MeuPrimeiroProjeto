# Meu Primeiro Projeto Laravel — CRUD de Produtos

Aplicação de estudo construída com **Laravel** para praticar o fluxo completo
**rota → controller → model → banco → view**. Implementa um CRUD de produtos
(criar, listar, editar e excluir) usando Eloquent, migrations e views Blade.

## Tecnologias

- **Laravel** (PHP 8.4)
- **MySQL** (via WAMP)
- **Blade** para as views
- **Composer** para gerenciamento de dependências

## Pré-requisitos

Antes de rodar o projeto, você precisa ter instalado:

- PHP 8.2 ou superior
- Composer
- Node.js (apenas se for compilar assets com `npm run dev`)

> Confira a versão do PHP exigida no arquivo `composer.json`.

## Como rodar o projeto

### 1. Clonar o repositório

```bash
git clone https://github.com/PedroAnt06/Laravel-Php-MeuPrimeiroProjeto.git
cd Laravel-Php-MeuPrimeiroProjeto
```

### 2. Instalar as dependências

O Composer lê o `composer.json` e baixa o framework e todas as bibliotecas
para a pasta `vendor/` (essa pasta NÃO vai para o repositório — é reconstruída
por este comando).

```bash
composer install
```

### 3. Configurar o ambiente

Copie o arquivo de exemplo e gere a chave da aplicação:

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configurar o banco de dados

Crie um banco vazio no sqlite chamado `meu_primeiro_projeto`
e ajuste as credenciais no arquivo `.env`:

```dotenv
DB_CONNECTION=sqlite
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=meu_primeiro_projeto
DB_USERNAME=root
DB_PASSWORD=
```

Após mexer no `.env`, limpe o cache de configuração para garantir que o Laravel
leia os valores novos:

```bash
php artisan config:clear
```

### 5. Rodar as migrations

As migrations criam as tabelas no banco (incluindo a tabela `produtos`):

```bash
php artisan migrate
```

### 6. Subir o servidor

```bash
php artisan serve
```

Acesse no navegador:

```
http://127.0.0.1:8000/produtos
```

## Estrutura principal

| Caminho | Responsabilidade |
|---|---|
| `routes/web.php` | Define as rotas (mapa de URLs da aplicação) |
| `app/Http/Controllers/ProdutoController.php` | Recebe as requisições e orquestra a lógica |
| `app/Models/Produto.php` | Model Eloquent — representa e acessa a tabela `produtos` |
| `database/migrations/` | Versionamento da estrutura do banco |
| `resources/views/produtos/` | Views Blade (index, create, edit) |

## Rotas do CRUD

Geradas por uma única linha no `routes/web.php`:

```php
Route::resource('produtos', ProdutoController::class);
```

| Método HTTP | URL | Ação | Função |
|---|---|---|---|
| GET | `/produtos` | Listar | `index` |
| GET | `/produtos/create` | Form de criar | `create` |
| POST | `/produtos` | Salvar novo | `store` |
| GET | `/produtos/{id}/edit` | Form de editar | `edit` |
| PUT/PATCH | `/produtos/{id}` | Atualizar | `update` |
| DELETE | `/produtos/{id}` | Excluir | `destroy` |

Para ver todas as rotas registradas:

```bash
php artisan route:list
```

## Comandos úteis

```bash
php artisan migrate:status   # ver quais migrations já rodaram
php artisan migrate:fresh    # apaga e recria todas as tabelas (zera o banco)
php artisan tinker           # console interativo para testar o banco
php artisan db:show          # mostra driver, banco e tabelas em uso
php artisan test             # roda os testes automatizados
```

## Observações

- A pasta `vendor/` e o arquivo `.env` **não** são versionados (estão no
  `.gitignore`). O `.env` contém credenciais e nunca deve ir para o repositório.
- Projeto desenvolvido para fins de estudo.

## Autor

**Pedro** — [@PedroAnt06](https://github.com/PedroAnt06)
