<?php
require_once '../vendor/autoload.php';
//require_once '../src/AppConf.php';

//use games\AppConf;
use games\q1;

$app = new games\AppConf();
$app->addDbConf("../config/conf.ini");
$q1 = new q1();

$q1->donneMario();
