<?php
session_start();

echo '<pre>';
var_dump($_SESSION);
echo '</pre>';

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
