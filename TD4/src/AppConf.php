<?php

namespace games;

use \Illuminate\Database\Capsule\Manager as DB;

class AppConf{
    public static function addDbConf($file){
        $conf = parse_ini_file($file);
        $db = new DB();
        DB::enableQueryLog();
        $db->addConnection($conf);
        $db->setAsGlobal();
        $db->bootEloquent();
    }
}