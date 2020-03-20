<?php

require_once '../vendor/autoload.php';
//require_once '../src/AppConf.php';

use games\q4;

$app = new games\AppConf();
$app->addDbConf("../config/conf.ini");
$q4 = new q4();
$q4->autogen();
