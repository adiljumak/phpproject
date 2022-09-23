<?php

class SigninController extends Signin
{
    private $login;
    private $password;

    public function __construct($login, $password) {
        $this->login = $login;
        $this->password = $password;
    }

    public function signinUser() {
        $this->getUser($this->login, $this->password);
    }


}