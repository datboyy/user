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
  protected $users_table = 'users';

  protected $username;
  protected $email;
  protected $password;
  protected $active;
  protected $registration_time;
  protected $last_logged_in;

  protected $setterAllowedValues = ['username', 'email', 'password', 'active', 'registration_time', 'last_logged_in'];

  public function __construct(PDO $dbh)
  {
    $this->dbh = $dbh;
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
        $this->{$argk} = $argv; // store value
      }
      else
      {
        throw new Exception(__METHOD__ . ' : invalid arg key `' . $argk . '`'); // invalid $argk
      }
    }
    return $this;
  }

  public function register()
  {
    // @TODO
    if(!empty($this->username))
    {
      $r = $this->dbh->prepare('SELECT COUNT(id) AS nbr FROM ' . $this->users_table . ' WHERE username = :username');
      $r->bindValue(':username', $this->username, PDO::PARAM_INT);
      $d = $r->execute();
      $res = $r->fetch();
      if($res['nbr'])
      {
        // Username already in use
        $r->closeCursor();
        return -1;
      }
      else
      {
        $r->closeCursor();
        $r = $this->dbh->prepare('INSERT INTO ' . $this->users_table . ' VALUES(NULL, :username, :email, :password, :active, :registration_time, :last_logged_in)');
        $r->bindValue(':username', $this->username, PDO::PARAM_STR);
        $r->bindValue(':email', $this->email, PDO::PARAM_STR);
        $r->bindValue(':password', password_hash($this->password, PASSWORD_BCRYPT));
        $r->bindValue(':active', 1, PDO::PARAM_INT);
        $r->bindValue(':registration_time', time(), PDO::PARAM_INT);
        $r->bindValue(':last_logged_in', 0, PDO::PARAM_INT);
        //
        // Register new user account
        return $r->execute();
      }
    }

  }

  public function login()
  {
    // @TODO
  }
}
// EOF
