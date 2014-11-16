<?php

header('Content-Type: text/html; charset=utf-8');


if (!defined('DS'))
	define('DS', DIRECTORY_SEPARATOR);

require_once 'Libs/Request.php';
 
$controller = Request::get('controller');
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

# Instancia o controller
$controller = new $controller();

# verifica se o método existe no objeto controller
if (method_exists($controller, $action))
	# se existir, executa o método
	$controller->$action();
else
	# se não existir, emite uma mensagem de erro
	die('Página não encontrada!');

/*
print "O controller é: {$controller}<br />";
print "O controllerName é: {$controllerName}<br />";
print "O método do controller é: {$action}";
*/
