<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require __DIR__ . '/vendor/autoload.php';

use Curl\Curl;

$curl = new Curl();
$curl->setBasicAuthentication('subversuman', 'mW5ihMGs');
var_dump($curl);
$curl->get('https://subversum.space/api/users');
var_dump($curl->response);
