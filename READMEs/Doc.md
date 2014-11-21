Doc
===

### Acessando o MySQL via linha de comando

    ~$ mysql -uroot -p'tsroot@tyler-vortex'

**Host MySQL**

Vamos utiliar o host `ubuntu-php-5`.


**Criando um banco de dados**

    mysql>

    CREATE DATABASE ts_cms CHARACTER SET utf8 COLLATE utf8_general_ci;

    CREATE USER 'tscms'@'localhost' IDENTIFIED BY '068s@b9i_78';

    GRANT ALL PRIVILEGES ON ts_cms . * TO 'tscms'@'localhost';
    GRANT ALL PRIVILEGES ON ts_cms . * TO 'tscms'@'ubuntu-php-5';

    FLUSH PRIVILEGES;

