<?php
/**
 * Created by PhpStorm.
 * User: kok
 * Date: 16-10-21
 * Time: 下午10:18
 */
namespace core\lib;
use \core\lib\config;
class log {
    static $class;
    static public function init() {
        $driver = config::get('driver','log');
        $class = '\core\lib\driver\log\\'.$driver;
        self::$class = new $class();
    }

    static public function log($msg,$file='log'){
        self::$class->log($msg,$file);
    }
}