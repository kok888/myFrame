<?php
/**
 * Created by PhpStorm.
 * User: kok
 * Date: 16-10-21
 * Time: 下午5:27
 */
  namespace core\lib;
  class config{
      static public  $conf = [];
      static public function get($name,$file){
          $file = CORE.'/config/'.$file.'.php';
          if(isset(self::$conf[$file])){
              return self::$conf[$file][$name];
          }else{
              if(is_file($file)){
                  $confArr  = include $file;
                  if(isset($confArr[$name])){
                      self::$conf[$file] = $confArr;
                      return $confArr[$name];
                  }else{
                      throw new \Exception('没找到配置项'.$name);
                  }
              }else {
                  throw new \Exception("找不到配置文件".$file.'.php');
              }
          }
      }

      static public function all($file){
          $file = CORE.'/config/'.$file.'.php';
          if(isset(self::$conf[$file])){
              return self::$conf[$file];
          }else{
              if(is_file($file)){
                  $confArr  = include $file;

                  if(isset($confArr)){
                      self::$conf[$file] = $confArr;

                      return $confArr;
                  }else{
                      throw new \Exception('配置文件内容为空');
                  }
              }else {
                  throw new \Exception("找不到配置文件".$file.'.php');
              }
          }
      }
  }