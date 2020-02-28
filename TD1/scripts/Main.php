<?php

use games\AppConf;
use games\q1;

require_once '../vendor/autoload.php';


$app = new AppConf();
$app->addDbConf("config/conf.ini");
$q1 = new q1();

$q1->donneMario();
