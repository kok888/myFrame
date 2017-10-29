<?php
/**
 * Created by PhpStorm.
 * User: kok
 * Date: 16-10-21
 * Time: 下午2:39
 * 载入类
 */
namespace core;

class Loader {
    public $fields= [];
    static public $classMap = [];
    static public function run(){
        \core\lib\log::init();

        $route = new \core\lib\route();
        $ctrlClass =  $route->ctrl;
        $method    =  $route->method;
        $classPath = APP.'/controller/'.$ctrlClass.'Controller.php';
        if(is_file($classPath)) {
            include($classPath);
            $ctrlClass = '\\'.MODULE.'\controller\\'.$ctrlClass.'Controller';
            $ctrl = new $ctrlClass();
            $ctrl->$method();
            \core\lib\log::log('controller:'.get_class($ctrl).PHP_EOL.'method:'.$method);
        } else {
            throw new \Exception('找不到控制器'.$ctrlClass);
        }


    }

    /**
     * 命名空间 \\ 替换成/
     * @param $class
     * @return bool
     */
    static public function load($class){
        $class = str_replace('\\','/',$class);
        if(isset(self::$classMap[$class])){
            return true;
        }
        if(is_file(BASEPATH.'/'.$class.'.php')){
           include BASEPATH.'/'.$class.'.php';
            self::$classMap[$class] = $class;
            return true;
        } else {
            return false;
        }
    }

    public function assign($name,$value) {
        $this->fields[$name] = $value;
    }

    public function display($file) {
        $oFile = $file;
        $file  = APP.'/view/'.$file;
        if(is_file($file)){

           \Twig_Autoloader::register();
            $loader = new \Twig_Loader_Filesystem(APP.'/view/');
            $twig = new \Twig_Environment($loader, array(
                'cache' => APP.'/view/cache',
                'debug'=>DEBUG
            ));

            $temp = $twig->loadTemplate($oFile);
            $temp->display($this->fields?$this->fields:'');

        }
    }
}