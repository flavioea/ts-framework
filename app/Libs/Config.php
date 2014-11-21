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