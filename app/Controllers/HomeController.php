<?php
 
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
        # Cria a variável "title" onde é utilizada no arquivo de visão do MVC
        $this->view->set('pageTitle', 'Meu primeiro MVC em PHP');
     
        # Renderizar os seus dados da View Views/home/index.php
        $this->view->render('includes/header');
        $this->view->render('home/index');
        $this->view->render('includes/footer');
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