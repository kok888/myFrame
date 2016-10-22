<?php
/**
 * Created by PhpStorm.
 * User: kok
 * Date: 16-10-22
 * Time: 上午10:18
 */
namespace app\model;
use \core\lib\model;
class UserModel extends model{
    public $table;
    public function __construct($tableName){
        $this->table = $tableName;
        parent::__construct();
    }
    public function list(){

        return $this->select($this->table,'*');
    }

    public function getOne($table='',$column,$where){
        if(!$table)$table = $this->table;
        return $this->get($table,$column,$where);
    }

    //缺少的自行补充　恩　～　-　　　
}