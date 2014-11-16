<?php
 
/**
 * Classe controle básica para testar o nosso MVC
 */
class HomeController extends Controller {

    public $controller;

	public function __construct() {
        $this->controller = Request::getGlobal('controller');
		print_r(sprintf(
            'Método <strong>construct()</strong> do controller <strong>%s</strong> foi executado!',
            Request::getGlobal('controller')
        ));
		echo "<br />";
	}

	/**
     * Método que será chamado caso nenhuma ação seja informada
     */
    // public function index() {
    //     die(sprintf('Método <strong>index()</strong> de <strong>%s</strong>', $this->controller));
    // }

	/**
     * método form para ser executado dentro de nosso MVC
     */
	public function form() {
		die("Método <strong>form()</strong> executado!");
	}

	/**
     * Método listar que será executado pela URL.
     */ 
    public function listar() {
        die("O método <strong>listar()</strong> foi executado.");
    }

}