<?php
session_start();

$username = 'root';
$password = '';
$database = 'dummy';
try
{
  $dbh = new PDO("mysql:host=localhost;dbname=$database", "$username", "$password");
}
catch(PDOException $e)
{
  echo $e->getMessage();
}
// EOF
