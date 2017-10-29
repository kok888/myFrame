<?php
/**
 * Created by PhpStorm.
 * User: kok
 * Date: 16-10-21
 * Time: 下午3:37
 */
namespace app\controller;
class indexController extends \core\Loader {
    public function index(){

        $model = new \app\model\userModel('user');
        dump($model->getOne('tt','*',['id'=>3]));
        $this->assign('lover','kok');
        $this->display('index.html');
    }

    function say(){
        $data = '<br/>hello world!This is my frame';
        $this->assign('data',$data);
        $this->display('say.html');
    }
    function test(){
        $test = __METHOD__;
        $this->assign('method',$test);
        $this->display('test.html');
    }
    function qq(){
        p($_GET);
        $a = \core\lib\config::get('method','route');
         $a = \core\lib\config::get('method','route');
        exit;
        p($a);
        $this->assign('hello','word');
        $this->assign('data','777');
        $this->display('say.html');
    }

}