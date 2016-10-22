<?php
/**
 * Created by PhpStorm.
 * User: kok
 * Date: 16-10-21
 * Time: 下午3:59
 */
namespace core\lib;
use core\lib\config;
class model extends \medoo {
    public function __construct () {
        $opt = config::all('database');
        parent::__construct($opt);
    }

}