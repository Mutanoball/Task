<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
spl_autoload_register(function ($class) {
    include $class . '.php';
});


$params = $_GET;
$dbparams = array ( "host" => 'localhost',
                    "user" => 'admin',
                    "password" => '',
                    "database" => 'base');
$db = new db($dbparams);
$logger = new Logger();
$salt='1235';
$url = substr($_SERVER['REQUEST_URI'],1);
$page = preg_replace('/^([^?]+)(\?.*?)?(#.*)?$/', '$1$3', $url);



switch ($page) {
    case 'bank1':
    $bank = new ProviderController(new Provider1Processor($logger, $salt), $db, $logger);
    $bank->process($params);
    break;

    case 'bank2':
    $bank = new ProviderController(new Provider2Processor($logger, $salt), $db, $logger);
    $bank->process($params);
    break;

    case 'list':
    $list = new TransactonPaginator($params['name'], $db);
    $list->print();
    break;
}
?>


