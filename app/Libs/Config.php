<?php 
 
/**
 * Classe de configuração da aplicação em nosso MVC em PHP.
 * Atualmente possui apenas informações de configuração
 * de acesso ao banco de dados.
 */
class Config {
 
    /**
     * Um array de configurações possibilita a 
     * criação de modelos para múltiplos bancos
     * de dados.
     */
    public static $database = array(
        'default' => array(
            'servername' => 'localhost',
            'username' => 'tscms',
            'driver' => 'mysqli',
            'password' => '068s@b9i_78',
            'port' => '3306',
            'database' => 'ts_cms',
            'charset' => 'utf-8'
        ),
 
        'other_database' => array(
            'servername' => 'localhost',
            'username' => 'postgres',
            'driver' => 'postgre',
            'password' => '',
            'port' => '5432',
            'database' => 'ts_cms',
            'charset' => 'utf-8'
        )
    );

 
}

ActiveRecord\Config::initialize(function($cfg) {
    $cfg->set_model_directory(APP . DS . 'Models');
    $cfg->set_connections(
        array(
            'development' => 'mysql://tscms:068s@b9i_78@localhost/ts_cms',
            'test' => 'mysql://username:password@localhost/test_database_name',
            'production' => 'mysql://username:password@localhost/production_database_name'
        )
    );
});
