<?php

require_once '../vendor/autoload.php';
//require_once '../src/AppConf.php';

use games\q3;

$app = new games\AppConf();
$app->addDbConf("../config/conf.ini");
$q3 = new q3();
$q3->whereQuery1();
$q3->whereQuery2();
$q3->whereQuery3();
