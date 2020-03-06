<?php

require_once '../vendor/autoload.php';
//require_once '../src/AppConf.php';

use games\q2;

$app = new games\AppConf();
$app->addDbConf("../config/conf.ini");
$q2 = new q2();
$q2->jeuxSony();
