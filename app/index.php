<?php


namespace app;

use app\Libs\Load;

if (!defined('DS'))
    define('DS', DIRECTORY_SEPARATOR);

if (!defined('AND'))
    define('AND', '&&');

if (!defined('APP'))
    define('APP', __DIR__);

if (!defined('LIB'))
    define('LIB', APP . DS . 'Libs');

if (!defined('MODELDIR'))
    define('MODELDIR', APP . DS . 'Models');

if (!defined('THEMEDIR'))
    define('THEMEDIR', APP . DS . 'Themes');

if (!defined('VIEWDIR'))
    define('VIEWDIR', APP . DS . 'Views');

if (!defined('DEBUG'))
    define('DEBUG', true);

if (!defined('DEBUG_SERVER'))
    define('DEBUG_SERVER', true);


require_once 'Libs' . DIRECTORY_SEPARATOR . 'Load.php';

$load = new Load();
$load->run();
