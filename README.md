# YETZCARDS

## Recursos Desenvolvidos:

* Criei um translation para associar tradução com os niveis de cada jogador. 

| Nivel  | Descrição        |
| -------| -----------------|
| 1      | Iniciante        |
| 2      | Intermediário    |
| 3      | Avançado         |
| 4      | Expert           |
| 5      | Veterano         | 

## Criação de jogadores podera ocorrer em massa dependendo da configuração de limite por time nas "*Configurações do Sorteio*":

*Configurações*

* Opção de Balancear o Jogo.

* Opção alterar limite de jogadores por time.

| Validações  | Configuração              | Descrição
| ------------| --------------------------|--------------
| 1           | Limite por time (Menu)    | Deve existir algum limite diferente de 0 nas configurações
| 6           | Balancear (Menu)          | Você consegue balancear os times no sorteio
| 2           | Confirmação por jogador   | Deve existir confirmado os jogadores para cada time pra ocorrer o sorteio 
| 3           | Time completo             | Deve existir pelo menos 2 times completos pra sortear
| 4           | Goleiros                  | Deve existir pelo menos 2 goleiros nos times
| 5           | Goleiros Para Cada Time   | Deve existir pelo menos 2 goleiros para cada time
| 7           | Repetição                 | Não Deve existir goleiros ou jogadores repetidos no mesmo time

## Notificação por E-mail pra cada Usúario Admin criado:

Pra teste utilizei o *Mailtrap* :

```dosini
https://mailtrap.io/register/signup?ref=header
```

## Adicione o nome do banco DB_DATABASE .env

```dosini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=yetzcards
DB_USERNAME=root
DB_PASSWORD=
```

## Próximos Passos (Melhorias) -> Infraestrutura

- Utilizar RDS para instânciar o Banco de dados.

- Utilizar grupo de segurança para VPC.

## Próximos Passos (Melhorias/Futuras) -> Código

- Policy -> pra gerenciar permissões a outros usúarios

- Desacoplar o SorteioService em Camadas, tornando mais (Modular,Escalável).

###  Requisitos / Frameworks

- PHP ^8.1
- Laravel ^10.10
- Composer
- NVM

### Padrões Solid (SRP/ISP)

- Controllers/Sortear -> Injeção de depêndencia / SRP
- Controllers/Player -> Injeção de depêndencia / Service Layer
- Services/AuthenticationService -> Single Responsiblity Principle
- Requests -> Single Responsibility Principle, Interface Segregation Principle

## Instale os pacotes e dependências

`composer install`

## Instale os pacotes e dependências

`npm install`

## Compílar os assets

`npm run dev`

## Gerar key da aplicação

`php artisan key:generate`

## Rodar migrações do banco (ORM)

`php artisan migrate --seed`

## Rodar o projeto

`php artisan serve --port=8001`
