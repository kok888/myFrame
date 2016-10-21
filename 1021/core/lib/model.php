<?php
/**
 * Created by PhpStorm.
 * User: kok
 * Date: 16-10-21
 * Time: 下午3:59
 */
namespace core\lib;
use core\lib\config;
class model extends \PDO {
    public function __construct () {
        $dsn = config::get('dsn','database');
        $userName = config::get('userName','database');
        $passwd   = config::get('passwd','database');
        $pdo ='';
        try{
            $pdo = parent::__construct($dsn, $userName, $passwd);
        }catch(\PDOException $e) {
            p($e->getMessage());
        }
        return $pdo;
    }

}