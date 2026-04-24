<?php

class SignupContr extends Signup {

  private $username;
  private $pwd;
  private $repeatPwd;
  private $email;

  public function __construct($username, $pwd, $repeatPwd, $email) {
    $this->username = $username;
    $this->pwd = $pwd;
    $this->repeatPwd = $repeatPwd;
    $this->email = $email;
  }

  public function createUser() {
    if (!$this->emptyInput()) {
      header("location: ../signup.php?error=empty_input");
      exit();
    }

    if (!$this->validUsername()) {
      header("location: ../signup.php?error=invalid_uid");
      exit();
    }

    if (!$this->pwdMatch()) {
      header("location: ../signup.php?error=passwords_dont_match");
      exit();
    }

    if ($this->userExists()) {
      header("location: ../signup.php?error=username_taken");
      exit();
    }

    $this->setUser($this->username, $this->pwd, $this->email);
  }

  private function emptyInput() {
    return !(empty($this->username) || empty($this->pwd) || empty($this->repeatPwd) || empty($this->email));
  }

  private function validUsername() {
    return preg_match("/^[a-zA-Z0-9]*$/", $this->username);
  }

  private function pwdMatch() {
    return $this->pwd === $this->repeatPwd;
  }

  private function userExists() {
    return $this->checkUser($this->username, $this->email);
  }
}
