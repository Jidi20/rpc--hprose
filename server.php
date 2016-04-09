<?php
include_once('Hprose/HproseHttpServer.php');


function helloWord($args){
	$dbhost = '127.0.0.1';
	$username = 'root';
	$userpass = '';
	$dbdatabase = 'fmstudent';

	$db=new mysqli($dbhost,$username,$userpass,$dbdatabase);
	if(mysqli_connect_error()){
	 	echo 'Could not connect to database.';
	 	exit;
	}
	mysqli_query($db, "set names utf8");
	$result=$db->query("SELECT * FROM fm_article WHERE id=1");
	$row=$result->fetch_row();
	header("Content-type:text/html;charset=utf-8");
	$row[3] = htmlspecialchars_decode($row[3]);

	return '这里是查询数据库的内容：<br/>'.$row[3].$args;
} 

$server = new HproseHttpServer();

$server->addFunction('helloWord');

$server->handle();

?>