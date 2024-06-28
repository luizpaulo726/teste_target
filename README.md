# Projeto 

## Instalação

1. Clone o repositório
2. Instale as dependências via Composer
3. Configure o arquivo `.env` com suas credenciais de banco de dados
4. Execute as migrações

```bash
git clone <repo-url>
cd test-project
composer install
cp .env.example .env
php artisan key:generate
# Edite o arquivo .env com suas credenciais de banco de dados
php artisan migrate
php artisan serve
