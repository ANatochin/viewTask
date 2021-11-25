<?php
require_once 'vendor/autoload.php';

use Core\Router;

//use Lib\DB\Connector;
use Lib\DB\Select;
use Lib\DB\Insert;
use Lib\DB\Update;
use Lib\DB\Delete;


$router = new Router();
$router ->run();


//
//
//$select = new Select();
//$select->setTableNames('users');
//$select->setFieldNames(['name','surname']);
//$select->setOrderedBy('surname');
////$select->setOrder('');
//$select->setLimited(54);
//$select->setOffset(2);
//$select ->setWhereConditions([
//    'id = 5',
//    [ 'id' => 5, 'title' => 'test'],
//    ['like', ['title' => 'test']],
//] );
//
//$sqlString = $select->getSqlString();
//echo ($sqlString);
//echo ('<br>');
//
//
//$insert = new Insert();
//$insert->setTable('users');
//$insert->setFields(['name','surname']);
//$insert->setValues(['name','surname']);
//
//$sqlInsertStr = $insert->getSqlString();
//echo ($sqlInsertStr);
//echo ('<br>');
//
//$update = new Update();
//$update->setTable('posts');
//// $update->setDataToUpdate(['name = vasya', 'some_field'=>'some_value', ['title'=> 'test']]);
//$update->setDataToUpdate(['subject'=>'changed subject']);
//$update ->setWhereConditions('id = 18');
////$update ->setWhereConditions([
////    'id = 5',
////    [ 'id' => 5, 'title' => 'test'],
////    ['like', ['title' => 'test']],
////] );
//
//$sqlUpdateStr = $update->getSqlString();
//echo ($sqlUpdateStr);
//echo ('<br>');
//
//$delete = new Delete();
//$delete->setTableName('posts');
//$delete ->setWhereConditions('id = 26');
//$deleteSQLStr = $delete->getSqlString();
//echo ($deleteSQLStr);
//echo ('<br>');
