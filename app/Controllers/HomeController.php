<?php
 
/**
 * Classe controle básica para testar o nosso MVC
 */
class HomeController {

	public function __construct() {
		print_r('Método construct() do controller ' . Request::getGlobal('controller') . ' foi executado!');
		echo "<br />";
	}

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