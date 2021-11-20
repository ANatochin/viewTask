<?php
require_once 'vendor/autoload.php';

use Core\Router;

//use Lib\DB\Connector;
use Lib\DB\Select;
use Lib\DB\Insert;


$router = new Router();
$router ->run();




$select = new Select();
$select->setTableNames('users');
$select->setFieldNames(['name','surname']);
$select->setOrderedBy('surname');
//$select->setOrder('');
$select->setLimited(54);
$select->setOffset(2);
$select ->setWhereConditions([
    'id = 5',
    [ 'id' => 5, 'title' => 'test'],
    ['like', ['title' => 'test']],
] );

$sqlString = $select->getSqlString();
echo ($sqlString);
echo ('<br>');


$insert = new Insert();
$insert->setTable('users');
$insert->setFields(['name','surname']);
$insert->setValues(['name','surname']);

$sqlInsertStr = $insert->getSqlInsert();

echo ($sqlInsertStr);


