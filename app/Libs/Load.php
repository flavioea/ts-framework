<?php

namespace app\Libs;

require_once LIB . DS . 'Request.php';
require_once LIB . DS . 'View.php';
require_once LIB . DS . 'Template.php';
require_once LIB . DS . 'Controller.php';
require_once LIB . DS . 'ActiveRecord' . DS . 'ActiveRecord.php';
require_once LIB . DS . 'Config.php';


class Load {

    public $controller;
    public $controllerName;
    public $action;
    public $actionName;

    /** @todo Implement __autoload class here... */

    public function __construct($classInstance = false) {
        if ($classInstance) {
            header('Content-Type: text/html; charset=utf-8');
        }
    }

    private function getControllerFolder() {
        return 'Controllers';
    }

    public function getControllerRoot() {
        return APP . DS . $this->getControllerFolder();
    }

    private function getControllerLabel() {
        return 'Controller';
    }

    /**
     * @return string
     */
    public function getControllerName() {
        $this->controllerName = Request::get('controller');

        # Default controller
        if ($this->controllerName == '') {
            $this->controllerName = "home";
        }

        $controllerName = ucfirst($this->controllerName);
        $this->setGlobalVariable('controllerName', $controllerName);

        return $controllerName;
    }

    /**
     * @return string
     */
    public function getController() {
        $controller = $this->getControllerName() . $this->getControllerLabel();
        $this->setGlobalVariable('controller', $controller);
        return $controller;
    }

    /**
     * @param Controller $controller
     */
    public function getControllerFile($controller) {
        # verifica se o arquivo de controle existe no diretório `Controller`
        if (file_exists($this->getControllerRoot() . DS . $controller . '.php'))
            # Inclui o controller na página
            require_once $this->getControllerRoot() . DS . $controller . '.php';
        else
            # Exception
            die("O Controller <strong>{$controller}</strong> não existe no diretório do MVC.");

        return;
    }

    /**
     * @param Controller $controller
     * @return mixed
     */
    private function getControllerInstance($controller) {
        return new $controller();
    }

    /**
     * Setting global variables
     * @param $key
     * @param $value
     */
    private function setGlobalVariable($key, $value) {
        return Request::setGlobal($key, $value);
    }

    public function getAction() {
        $action = Request::get('action');
        # Agora verificamos se a Action foi informada na URL
        if ($action == "") {
            # se não informamos a ação usamos o método padrão index
            $action = 'index';
        }

        return $action;
    }

    private function runAction($controlInstance, $action = null) {
        # Verifica se o método existe no objeto Controller
        if (method_exists($controlInstance, $action))
            # se existir, executa o método
            $controlInstance->$action();
        else
            # Se não existir, emite uma mensagem de erro
            die('Página não encontrada!');

        return;
    }

    public function getDebug() {
        if (DEBUG) {
            print "<hr>";

            print "<h4>Debug</h4>";

            print "<pre style=\"margin: 5px; padding: 5px;\">";
            print "O controller é: {$this->controller}<br />";
            print "O controllerName é: {$this->controllerName}<br />";
            print "O método do controller é: {$this->action}";
            print "</pre>";

            if (DEBUG_SERVER) {
                print "<h4>Debug Server</h4>";

                print "<pre style=\"margin: 5px; padding: 5px;\">";
                foreach ($_SERVER as $k => $v) {
                    print_r(sprintf("<p>[%s] => %s</p>", $k, strip_tags($v)));
                }
                print "</pre>";
            }
        }
    }

    public function run() {
        $load = new Load(true);

        $controller = $this->controller = $load->getController();
        $controllerName = $this->controllerName = $load->getControllerName();

        $load->getControllerFile($controller);
        $controlInstance = $load->getControllerInstance($controller);

        $action = $this->action = $load->getAction();
        $load->runAction($controlInstance, $action);

        $this->getDebug();
    }
}