<?php

$autoload_path =  __DIR__ . "/../vendor/autoload.php";
$loader = require($autoload_path);

$loader->add('CentralDesktop\Thrift\ActiveMQ\Test', __DIR__);
