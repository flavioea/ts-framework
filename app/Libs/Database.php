<?php 
 
/**
 * classe que serve de caminho padrão para instanciar uma conexão com
 * o banco de dados usando singleton.
 */
class Database {
 
    /**
     * lista de conexões com o banco de dados abertas para cada
     * tipo de configuração em Config.php
     */
    private static $database = array();

    /** 
     * @var object $dbUser hold user object
     */
    protected $dbUser;

    /** 
     * @var MYSQLI $connection (hold pdo connection)
     */
    private $dbConn;

    private $dbType;

    /**
     * Método usado para instanciar um objeto
     * de conexão com o banco de dados.
     */
    public function createConnection($_type) {
        # Verifica se a configuração de banco de dados
        # existe na classe config. Se não existir, emite
        # uma mensagem de erro.
        if (!array_key_exists($_type, Config::$database))
            die('Configuração de banco de dados não encontrada!');
 
        # Verifica se o tipo de banco de dados já
        # foi instanciado. Se já tiver sido criado
        # retorna a conexão com o banco existentene
        if (array_key_exists($_type, self::$database))
            return $this->dbConn = self::$database[$_type];
 
        # Se o banco de dados ainda não tiver sido criado,
        # cria uma nova conexão com o banco de dados.
        if (Config::$database[$_type]['driver'] == 'mysqli') {
            $this->dbConn = self::$database[$_type] = new mysqli(
                Config::$database[$_type]['servername'],
                Config::$database[$_type]['username'],
                Config::$database[$_type]['password'],
                Config::$database[$_type]['database']
            );
 
            if (Config::$database[$_type]['charset'] != '')
                $this->dbConn = self::$database[$_type]->set_charset(
                    Config::$database[$_type]['charset']
                );
        }

        // print_r($this->dbConn); exit();
        // print_r(self::$database[$_type]); exit();
        return $this->dbConn = self::$database[$_type];
    }
}