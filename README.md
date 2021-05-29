## CRUD-PDO
É um pequeno projeto que utiliza o conceito de CRUD. 
Para seu desenvolvimento foi utilizado PHP orientado 
a objetos, PDO, Ajax, MySQL e Bootstrap.

## Criação da Tabela no MySQL
```
CREATE TABLE `users` (
  id INT NOT NULL AUTO_INCREMENT,
  full_name VARCHAR(80) NOT NULL,
  email VARCHAR(50) NOT NULL,
  phone VARCHAR(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
)
```

## Acesso ao Banco de Dados
As credenciais do banco de dados devem ser colocadas 
em ./model/connect/development.ini para o correto
funcionamento do CRUD-PDO.