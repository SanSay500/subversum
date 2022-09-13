<?php
//phpinfo();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require __DIR__ . '/vendor/autoload.php';

use Curl\Curl;
print_r($_POST['email']);
print_r($_POST['password']);
print_r($_POST['name']);
print_r($_POST['confirmPassword']);
$curl = new Curl();
$curl->setBasicAuthentication('subversuman', 'mW5ihMGs');
var_dump($curl);
$curl->post('https://subversum.space/api/register', array(
    'email' => 'fay.rita@example.com',
    'name' => 'Murzik',
    'password' => 'password',
    'confirmPassword' => 'password',
));

var_dump($curl->response);
