# Poc - PHP sem framework

Usando algumas bibliotecas via composer, construi um pequeno crud para cadastro de clientes.

- Arquitetura em camadas
- PDO
- POO 

## Como rodar este projeto ?

Para rodar o projeto você precisa de:

- Docker
- docker-compose
<br>
<br>

Antes de subir os containers, verifique se estas portas estão livres:

- 80
- 443
- 3306
<br>
<br>
Agora apenas execute este comando na raiz do projeto:

``` 
docker-compose up --build
```

*Mas o que esta acontecendo?*

Basicamente estamos subindo maquinas virtuais que irão suprir toda nossa infraestrutura: **PHP7.2, Apache e Mysql 8**.

**Banco de dados**

Agora com seu cliente SQL favorito, você pode se conectar ao banco de dados MYSQL:

- host: localhost
- port: 3306
- user: pocuser
- password: pocuser
- database: pocuser

Criando a tabela de usuários:

```sql
create table usuario
(
    id       int auto_increment
        primary key,
    nome     varchar(120) not null,
    email    varchar(120) not null,
    telefone varchar(20)  null,
    cpf      bigint       not null
);
```
Criando a tabela de log's:

```sql
create table log
(
    id           int auto_increment
        primary key,
    acao         varchar(120) not null,
    data_criacao datetime     not null
);
```

## Arquitetura

O projeto é um MVC simples, com uma arquitetura em camadas com: Services, Domains, Entitys e Repositorys.

---> User Request

------> Router

*Cliente Layer*

--------> Controllers

*Services Layer*

----------> Services

*Data Base Layer*

------------> Repository

--------------> Entitys

Basicamente estamos tentando implementar classes que sigam o principio de responsabilidade única, e separando por camadas as regras de negócios (*Que é a criação do usuário neste caso*), a camada que se conecta ao banco de dados, e a camada que lida com a requisição do client.

Foi utilizado o autoload via composer, seguindo as PSR's.

As principais bibliotecas foram:

- [SimpleRouter](https://github.com/skipperbent/simple-php-router/tree/master/src/Pecee/SimpleRouter): Biblioteca utilizada para criar e gerenciar as rotas da aplicação.

- [Plates](http://platesphp.com/): Biblioteca utilizada para que possa ser aproveitado partes de outras views, você pode criar templates e ir compondo suas views.

- [Bootstrap 4](https://getbootstrap.com/): Biblioteca utilizada para construir a estilização do front-end.
