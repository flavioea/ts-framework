<?php
 
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
 
}