<?php

namespace core\lib;
use core\lib\config;

/**
 * 路由类
 * Class route
 * @package core\lib
 */
class route{
    public $ctrl;
    public $method;

    function __construct(){
       if($_SERVER['REQUEST_URI'] && $_SERVER['REQUEST_URI'] != '/'){
           $path = $_SERVER['REQUEST_URI'];
           $pathArr =  explode('/',ltrim($path,'/'));

           if(isset($pathArr[0])) {
               $this->ctrl = $pathArr[0];
               unset($pathArr[0]);
           }
           if(isset($pathArr[1])) {
               $this->method = $pathArr[1];
               unset($pathArr[1]);
           } else {
               $this->method = config::get('method','route');
           }

           $count = count($pathArr);
           if($count){
               $count = $count + 2 ;
               $i = 2 ;
               while ($i<$count ){
                   if($pathArr[$i+1]) {
                       $_GET[$pathArr[$i]] =  $pathArr[$i + 1];
                   }
                   $i+=2;
               }
           }

       }else{
           $this->ctrl   = config::get('controller','route');
           $this->method =  config::get('method','route');
       }
    }

}