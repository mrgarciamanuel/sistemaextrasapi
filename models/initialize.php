<?php 
    defined('DS') ? null: define('DS', DIRECTORY_SEPARATOR);
    //defining root path of the api
    defined('SITE_ROOT') ? null : define('SITE_ROOT', DS . 'laragon'. DS.'www'.DS.'sistemaextrasapi');

    //defining configuration path and models path
    defined('CONFIG_PATH') ? null : define('CONFIG_PATH', SITE_ROOT.DS. 'config');
    defined('MODELS_PATH') ? null : define('MODELS_PATH', SITE_ROOT.DS. 'models');
    defined('GLOBAL_PATH') ? null : define('GLOBAL_PATH', SITE_ROOT.DS. 'global');

    require_once(CONFIG_PATH.DS."config.php");
    require_once(MODELS_PATH.DS."employee.php");
    require_once(GLOBAL_PATH.DS."general.php");
?>