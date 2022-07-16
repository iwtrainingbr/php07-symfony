### Para instalar as dependencias
`composer install`

### Para criar o banco de dados
Configure o arquivo `.env` com os dados de conexão do seu computador e execute
```shell
php bin/console doctrine:database:create
```


### Para atualizar as tabelas do banco de dados
```shell
php bin/console doctrine:schema:update --force
```


### Para subir o servidor
`php -S localhost:8000 -t public`