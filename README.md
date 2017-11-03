# Projeto Mercado

__Autor:__ Felipe Flamarion da Conceição

__Data:__ 2017-10-29

__Linguagem:__ PHP5

__Banco de Dados:__ PostgreSQL 9.4

## Instalação
* __Clone este repositório__ ou __baixe o arquivo .ZIP__ (e extraia)
* Coloque o diretório __mercado__ no devido local ("/var/www/", por exemplo)
#### Recuperando o Banco de Dados
* No PostgreSQL: __CREATE DATABASE mercado_virtual__
* Acesse o diretório __"mercado/bd/scripts/"__
* Através do terminal em modo superusuário:
* Insira o comando: __psql -U postgres -d mercado_virtual -f backup.sql__

#### Configurando o Banco de Dados
Para configurar o acesso do sistema ao BD, modifique o arquivo __"mercado/bd/config.php"__. A configuração padrão é:

* $_DBNAME = 'mercado_virtual';
* $_HOST = 'localhost';
* $_PORT = '5432';
* $_USER = 'postgres';
* $_PASSWORD = 'postgres';

#### *[OPCIONAL]* Popular o Banco de Dados
* Através do terminal em modo superusuário, acesse __"mercado/bd/scripts/"__,
* Insira o comando: __psql -U postgres -d mercado_virtual -f populate.sql__

## Tabelas
* id (PK)

#### Produto
* id (PK)
* descricao
* preco

#### Tipo Produto
* id (PK)
* descricao
* percentual_imposto

#### Venda
* id (PK)
* dt_abertura
* dt_conclusao

#### Item
* venda (PK)(FK)
* produto (PK)(FK)
* quantidade
