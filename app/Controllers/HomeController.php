<?php

use app\Libs\Controller;
use app\Libs\Request;
use app\Libs\Template;

/**
 * Classe controle básica para testar o nosso MVC
 */
class HomeController extends Controller {

    public $_controller;

	public function __construct() {
        parent::__construct();
        
        $this->_controller = Request::getGlobal('controller');

        if (DEBUG) {
    		print_r(sprintf(
                'Método <strong>construct()</strong> do controller <strong>%s</strong> foi executado!',
                Request::getGlobal('controller')
            ));
    		echo "<br />";
        }
	}

	/**
     * Método que será chamado caso nenhuma ação seja informada
     */
    public function index() {
        $template = new Template();
        $template->setTheme('Default');

        $template->setFile('header', (Object) array('folder' => 'includes'));
        $template->set('urlTheme', 'app/Themes/Default');
        $template->set('pageTitle', 'The CMS with Bootstrap Template');
        echo $template->output();

        $template->setFile('home');
        $template->set('pageTitle', 'Meu primeiro MVC em PHP');
        $template->set('username', 'Monk3y');
        echo $template->output();
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
    public function catalog() {
        // # Define uma variável para receber a lista de usuários
        $list = array();

        // # Usa o método bind para vincular a variável `list` dentro da view
        $this->view->set('pageTitle', 'Lista de Usuários');
        $this->view->bind('list', $list);

        # Retorn find method from ActiveRecord
        $list = User::find('all');

        # Indica a view para renderizar a lista de usuários no navegador
        $this->view->render('includes/header');
        $this->view->render('User/list');
        $this->view->render('includes/footer');
    }

}