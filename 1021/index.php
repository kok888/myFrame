<?php
/**
 * Created by PhpStorm.
 * User: kok
 * Date: 16-10-21
 * Time: 下午2:25
 */
 define ('BASEPATH',realpath('./'));
 define('CORE',BASEPATH.'/core');
 define('APP',BASEPATH.'/app');
 define('MODULE','app');
define('DEBUG',true);
if(DEBUG){
    ini_set('display_errors','On');
}else{
    ini_set('display_errors ','Off');
}

include(CORE.'/common/function.php');
include(CORE.'/kok.php');
spl_autoload_register('\core\kok::load');
\core\kok::run();
