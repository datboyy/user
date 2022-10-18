<?php
require '../config.php';
require '../user.php';
//
// Template variables
$templateVars = [];
//
// Register
if(isset($_GET['register']))
{
  if(isset($_POST['email'], $_POST['username'], $_POST['password'], $_POST['password_confirmation']))
  {
    if($_POST['password'] == $_POST['password_confirmation'])
    {
      unset($_POST['password_confirmation']);
      $templateVars[] = ['password_missmatch', 0];
      // Registers new user, passes result as template variable
      $templateVars[] = ['register_success', (new User($dbh))->set($_POST)
                                                             ->register()];
    }
    else
    {
      $templateVars[] = ['password_missmatch', 1];
    }
  }
  require 'templates/register.html';
}
//
// Login
else
{
  if(isset($_POST['username'], $_POST['password']))
  {
    $templateVars[] = ['login_success', (new User($dbh))->set($_POST)
                                                        ->login()];
  }
  require 'templates/login.html';
}
// EOF
