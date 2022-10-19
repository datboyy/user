<?php
require '../config.php';
require '../user.php';
// Template variables
$templateVars = [];
// Logout controller process
if(new Users($dbh))->isLoggedIn())
{
  require 'templates/logout.php';
}
// Register controller process
elseif(isset($_GET['register']))
{
  if(isset($_POST['email'], $_POST['username'], $_POST['password'], $_POST['password_confirmation']))
  {
    if($_POST['password'] == $_POST['password_confirmation'])
    {
      unset($_POST['password_confirmation']);
      $templateVars[] = ['password_missmatch', 0];
      $templateVars[] = ['register_success', (new User($dbh))->set($_POST)->register()]; // register new user, pass result as template variable
    }
    else
    {
      $templateVars[] = ['password_missmatch', 1];
    }
  }
  require 'templates/register.html';
}
// Login controller process
else
{
  if(isset($_POST['username'], $_POST['password']))
  {
    $templateVars[] = ['login_success', (new User($dbh))->set($_POST)->login()];
  }
  require 'templates/login.html';
}
// EOF
