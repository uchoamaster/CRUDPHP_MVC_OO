<?php

session_start();

require 'config.php';
require 'vendor/autoload.php';

$core = new Core\Core();
$core->run();