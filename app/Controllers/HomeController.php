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
    public function catalog() {
        # Carrega o modelo `User` que está na pasta `Models`
        $this->model('User');
 
        # Define uma variável para receber a lista de usuários
        $list = array();
 
        # Usa o método bind para vincular a variável `list` dentro da view.
        $this->view->bind('list', $list);
 
        # A partir de agora, toda alteração na variável `list` é refletida
        # na variável `list` dentro da view
 
        # Usa o modelo para listar os usuários cadastrados no banco de dados
        $list = $this->User->catalog();
 
        # Indica a view para renderizar  a lista de usuários no navegador
        $this->view->render('User/list');
    }

}