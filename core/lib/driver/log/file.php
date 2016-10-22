<?php
/**
 * Created by PhpStorm.
 * User: kok
 * Date: 16-10-21
 * Time: 下午10:19
 */
namespace core\lib\driver\log;
use core\lib\config;
class file {
        public $path;//日志存储位置
    public function __construct(){
        $conf = config::get('option','log');
        $this->path = $conf['path'];
    }

    public function log($message,$file='log'){
        if(!is_dir($this->path))mkdir($this->path,'0777',true);

        return file_put_contents($this->path.date('YmdH').$file.'.php',date('Y-m-d H:i:s').json_encode($message).PHP_EOL,FILE_APPEND);
    }
}