<?php
/**
 * Created by PhpStorm.
 * User: kok
 * Date: 16-10-21
 * Time: 下午2:39
 */
namespace core;

class kok {
    public $fields= [];
    static public $classMap = [];
    static public function run(){
        $route = new \core\lib\route();
        $ctrlClass =  $route->ctrl;
        $method    =  $route->method;
        $classPath = APP.'/controller/'.$ctrlClass.'Controller.php';
        if(is_file($classPath)) {
            include($classPath);
            $ctrlClass = '\\'.MODULE.'\controller\\'.$ctrlClass.'Controller';
            $ctrlClass = new $ctrlClass();
            $ctrlClass->$method();
        } else {
            throw new \Exception('找不到控制器'.$ctrlClass);
        }


    }

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
        $file  = APP.'/view/'.$file;
        if(is_file($file)){
            extract($this->fields);
            include $file;
        }
    }
}