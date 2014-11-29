<?php
 
namespace app\Libs;

use View;

/**
 * Classe controller base para todos os Controllers do nosso MVC em PHP.
 * Ela serve para compartilhar código entre todos os controllers.
 */

class Controller {

	/**
     * Variável usada como mecanismo de renderização de visões.
     * O objeto Visão do arquivo View.php
     */
    protected $view = null;

    /**
     * Construtor da classe, inicializando o mecanismo de visão dos controles
     */
    public function __construct() {
        $this->view = new View();
    }
 
    /**
     * Método index padrão usado em todos os controllers.
     */
    public function index() {
        die("Método <strong>index()</strong> do Controller base!");
    }

    /**
     * Método para incluir e carregar um modelo dinamicamente dentro
     * de um controle.
     */
    public function model($filename) {
        $modelLabel = 'Models';
        # Search model file in model directory
        if (file_exists(APP . DS . $modelLabel . DS . $filename . '.php')) {
            include_once APP . DS . $modelLabel . DS . $filename . '.php';
        }
        else {
            die("Modelo {$filename} não encontrado na pasta Models.");
        }
 
        # se o arquivo existir, instancia o objeto
        # e usa o mesmo como propriedade do controle
        $this->$filename = new $filename();
    }
 
}