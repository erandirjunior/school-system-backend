<?php

define('ROOT_PATH', dirname(__DIR__));

require_once ROOT_PATH.'/vendor/autoload.php';

(new \Dotenv\Dotenv(ROOT_PATH))->load();