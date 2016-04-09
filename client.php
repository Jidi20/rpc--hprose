<?php
include_once('Hprose/HproseHttpClient.php');

$client = new HproseHttpClient("http://localhost/hprose/server.php");
header("Content-type:text/html;charset=utf-8");


echo $client->helloWord("---ok了");


?>