<?php



namespace App\Libs;

// Using Medoo namespace
use Medoo\Medoo;

class DB {
    protected $db=null;

    public function __construct(){
        $this->db = new Medoo([
            'database_type' => 'mysql',
            'database_name' => 'wedevs',
            'server' => 'localhost',
            'username' => 'root',
            'password' => ''
        ]);
    }
}