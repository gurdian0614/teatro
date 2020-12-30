<?php
$hostname = '127.0.0.1';
$database = 'teatro';
$username = '';
$password = '';

$mysqli = new mysqli($hostname, $username,$password, $database);
if ($mysqli -> connect_errno) {
die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno() 
. ") " . $mysqli -> mysqli_connect_error());
}
?>