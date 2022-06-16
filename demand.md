#### Interface Administrativa com login/senha de acesso.
1) **Criar um CRUD** de Clientes com os campos
    - Nome*
    - Email*
    - Imagem*
    - Telefones <em>(Relacionamento N pra N, com obrigatoriedade de ao menos 1 telefone)</em>
    - Tipo de cliente* <em>(Relacionamento 1 pra N)</em>. Sendo que os tipos podem ser “Pessoa Física” e “Pessoa Jurídica”

   ***Campos obrigatórios**
2) **Disparar um e-mail** de “Boas vindas” para o cliente
3) Utilizar **migrations** para a criação das tabelas
4) Utilizar o **[Eloquent](https://laravel.com/docs/8.x/eloquent)** para os relacionamentos
#### API
6) API com autenticação JWT
7) Disponilizar os dados de clientes
___
### Critério de avaliação
- Organização do código: Separação de módulos, view, model e controller
- Clareza: O README explica de forma resumida como rodar a aplicação?
- Segurança: Existe alguma vulnerabilidade clara?
- Histórico de commits (estrutura e qualidade)
- UX: A interface é de fácil uso e auto-explicativa? A API é intuitiva?
- API: Códigos de Resposta/Verbos HTTP corretos
### Diferenciais:
- Testes automatizados
- Utilização de Cache
- Uso de Logs
- Documentação da API
- [LaravelMix](https://laravel-mix.com/)
- [Eloquent API Resources](https://laravel.com/docs/8.x/eloquent-resources)
- Disparo de e-mail utilizando filas [(Queues)](https://laravel.com/docs/8.x/queues)