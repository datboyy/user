<?php
/*
+-------------------+--------------+------+-----+---------+----------------+
| Field             | Type         | Null | Key | Default | Extra          |
+-------------------+--------------+------+-----+---------+----------------+
| id                | int(11)      | NO   | PRI | NULL    | auto_increment |
| username          | varchar(255) | NO   |     | NULL    |                |
| email             | varchar(255) | NO   |     | NULL    |                |
| password          | varchar(255) | NO   |     | NULL    |                |
| active            | int(1)       | NO   |     | NULL    |                |
| registration_time | int(11)      | NO   |     | NULL    |                |
| last_logged_in    | int(11)      | NO   |     | NULL    |                |
+-------------------+--------------+------+-----+---------+----------------+
*/
class User
{

  protected $dbh;

  protected $username;
  protected $email;
  protected $password;
  protected $active;
  protected $registration_time;
  protected $last_logged_in;

  protected $setterAllowedValues = ['username', 'email', 'password', 'active', 'registration_time', 'last_logged_in'];

  public function __construct(PDO $dbh)
  {
    $this->dbh = $PDO
  }

  public function set($argk, $argv = null)
  {
    if(is_array($argk))
    {
      foreach($argk as $k => $v)
      {
        $this->set($k, $v); // recursion
      }
    }
    else
    {
      if(in_array($argk, $this->setterAllowedValues))
      {
        $this->{$argk} = $argv;
      }
    }
  }

  public function register()
  {
    // @TODO
  }

  public function login()
  {
    // @TODO
  }
}
// EOF
