<?php
require '../user.php';

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

$User = (new User($dbh))
            ->set(['username' => 'Jane',
                   'email'    => 'Jane@Doe.com']);


// Login
if(!isset($_GET['register']))
{


}
// Register
else
{

}
// EOF 
