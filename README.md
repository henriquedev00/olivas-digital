# Olivas Digital

## Setup

Para rodar a aplicação em seu ambiente é preciso:

1. Clonar o repositório do GitHub:
```bash
git clone git@github.com:henriquedev00/olivas-digital.git
```

2. Criar o .env da aplicação:
> A partir daqui é preciso abrir o terminal na pasta do projeto e executar o comando:
```bash
cp .env.example .env
```

3. Baixar a vendor do projeto:
```bash
composer install
```

4. Baixar a node_modules do projeto:
```bash
npm install
```

5. Compilar os assets:
```bash
npm run production
```

6. Gerar o APP_KEY da aplicação:
```bash
php artisan key:generate
```

7. Criar um link simbólico de `public/storage` para `storage/app/public`
```bash
php artisan storage:link
```

8. Criar o `database` no seu ambiente.  

9. Configurar os dados de acesso ao seu `database` no `.env` da aplicação:
```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=olivas-digital-database
DB_USERNAME=root
DB_PASSWORD=
```
> Este é apenas um exemplo de configuração  

10. Configurar os dados do seu servidor SMTP no `.env` da aplicação:
```dotenv
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=olivas-digital@gmail.com
```
> Este é apenas um exemplo de configuração. O campo `MAIL_FROM_ADDRESS` recebe o endereço de e-mail que será utilizado para enviar os e-mails. E não se esqueça de adicionar suas credencias nos campos `MAIL_USERNAME` e `MAIL_PASSWORD`.

11. Rodar as migrations e seeders:
```bash
php artisan migrate --seed
```

12. Ligar o server:
```bash
php artisan serve
```

# Usage

- Ao tentar fazer login na aplicação certifique-se que esteja conectado a uma rede de internet, pois o campo e-mail utiliza um estilo de validação DNSCheckValidation.

- Ao cadastrar um novo cliente um envio de e-mail de boas vindas é encaminhado para uma fila (queue). Onde os e-mails só serão de fato enviados para os clientes cadastrados ao executar o comando:
```bash
php artisan queue:work
```