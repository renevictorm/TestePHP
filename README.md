# Teste de PHP

## Indice

* [Sobre](#sobre)
  * [Tecnologias](#tecnologias)
* [Começando](#começando)
  * [Requisitos](#requisitos)
  * [Instalação](#instalação)
* [Testando](#testando)


## Sobre
Esta API se trata de um teste simples de conhecimentos em PHP. A API é capaz de armazernar dados (Triângulos e Retângulos), lista-los e retornar a área somada de todos os polígonos. 


### Tecnologias

* [Docker](https://www.docker.com)
* [PHP](https://www.php.net/)
* [phpMyAdmin](https://www.phpmyadmin.net)
* [MySQL](https://www.mysql.com)
* [Postman](https://www.getpostman.com)


## Começando

Para obter uma cópia local em execução, siga estas etapas simples de exemplo:

###  Requisitos

Para rodar a aplicação basta ter o Docker e o Postman instalados 

### Instalação

Uma vez com o Docker instalado, basta ir até o diretório raiz da aplicação e executar o seguinte comando:
```sh
 $ docker-compose up --build
```
Assim que estiver rodando acesse o PhpMyAdmin com user e senha "root" e execute o SQL forncecido nesse diretório ou o importe.

![](/images/SQL.png)

## Testando

Para testar a aplicação usaremos o Postman. Com ele instalado o primeiro passo é importar a collection usando este link:

https://www.getpostman.com/collections/6f31a07fbd26b67ab5cd

![](/images/import.png)

O segundo passo é adicionar a variável {{dockerUrl}} a um ambiente e atribuir o endereço onde está rodando o Docker, como na imagem a seguir. 

![](/images/variavel.png)

No meu caso o Docker está rodando no  192.168.99.100:80.

Para rodar os testes basta ir em "RUNNER", selecionar a collection que você importou pelo link ("Testando"), selecionar o ambiente em que configurou a variável {{dockerUrl}} e clicar em Run.

![](/images/Runner.png)


Os resultados devem ser comos os a seguir

![](/images/results.png)


