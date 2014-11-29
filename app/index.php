<?php


namespace app;

use app\Libs\Load;


if (!defined('DS'))
    define('DS', DIRECTORY_SEPARATOR);

if (!defined('APP'))
    define('APP', __DIR__);

if (!defined('LIB'))
    define('LIB', APP . DS . 'Libs');

if (!defined('DEBUG'))
    define('DEBUG', true);


require_once 'Libs' . DIRECTORY_SEPARATOR . 'Load.php';

$load = new Load();
$load->run();
