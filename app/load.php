<?php

header('Content-Type: text/html; charset=utf-8');

if (!defined('DS'))
	define('DS', DIRECTORY_SEPARATOR);

if (!defined('APP'))
	define('APP', __DIR__);

if (!defined('LIB'))
	define('LIB', APP . DS . 'Libs');

require_once LIB . DS . 'Request.php';
require_once LIB . DS . 'View.php';
require_once LIB . DS . 'Controller.php';
require_once LIB . DS . 'Config.php';
require_once LIB . DS . 'Database.php';
 
$controller = Request::get('controller');

# Verifica se o Controller foi informado na URL
if ($controller == '') {
    # agora definimos um controller padrão
    # quando nenhum controller for informado
    $controller = "home";
}

$controller = ucfirst($controller);
$controllerName = $controller;
$controller = $controllerName . 'Controller';
$action = Request::get('action');

// Setting global variables
Request::setGlobal('controller', $controller);
Request::setGlobal('controllerName', $controllerName);

# verifica se o arquivo de controle existe no diretório `Controller`
if (file_exists(__DIR__ . DS . 'Controllers' . DS . $controller . '.php'))
	# Inclui o controller na página
	require_once __DIR__ . DS . 'Controllers' . DS . $controller . '.php';
else
	# Exception
	die("O Controller <strong>{$controller}</strong> não existe no diretório do MVC.");

# Instancia o Controller
$controller = new $controller();


# Agora verificamos se a Action foi informada na URL
if ($action == "") {
    # se não informamos a ação
    # usamos o método padrão index
    $action = 'index';
}

# Verifica se o método existe no objeto Controller
if (method_exists($controller, $action))
	# se existir, executa o método
	$controller->$action();
else
	# Se não existir, emite uma mensagem de erro
	die('Página não encontrada!');

/*
print "O controller é: {$controller}<br />";
print "O controllerName é: {$controllerName}<br />";
print "O método do controller é: {$action}";
*/
