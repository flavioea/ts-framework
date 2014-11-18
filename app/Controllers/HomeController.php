<?php
 
/**
 * Classe controle básica para testar o nosso MVC
 */
class HomeController extends Controller {

    public $_controller;

	public function __construct() {
        parent::__construct();
        
        $this->_controller = Request::getGlobal('controller');
		print_r(sprintf(
            'Método <strong>construct()</strong> do controller <strong>%s</strong> foi executado!',
            Request::getGlobal('controller')
        ));
		echo "<br />";
	}

	/**
     * Método que será chamado caso nenhuma ação seja informada
     */
    public function index() {
        //die(sprintf('Método <strong>index()</strong> de <strong>%s</strong>', $this->controller));
        # Agora esse método usa o mecanismo de visão
 
        # Cria a variável "title" onde é utilizada no arquivo de visão do MVC
        $this->view->set('title', 'Meu primeiro MVC em PHP');
     
        # Diz ao nosso mecanismo de visão para renderizar os seus dados
        # usando o arquivo de visão Views/home/index.php
        $this->view->render('home/index');
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