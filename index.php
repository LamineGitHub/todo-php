<?php
require_once 'vendor/autoload.php';

use App\Application;


$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

Application::process();
