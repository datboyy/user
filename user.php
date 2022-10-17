<?php
class User
{
  protected $username;
  protected $email;
  protected $password;

  protected $setterAllowedValues = ['username', 'email', 'password'];

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
