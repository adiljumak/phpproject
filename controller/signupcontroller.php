<?php

class SignupController extends Signup
{
    private $login;
    private $password;
    private $passwordrepeat;
    public function __construct($login, $password, $passwordrepeat) {
        $this->login = $login;
        $this->password = $password;
        $this->passwordrepeat = $passwordrepeat;
    }

    public function signupUser() {
        if($this->passwordRepeatCheck() == false) {
            header("Location: ../index.php?error=true");
            exit();
        }
        if($this->loginTakenCheck() == false) {
            header("Location: ../index.php?error=true");
            exit();
        }

        $this->setUser($this->login, $this->password);

    }

    private function passwordRepeatCheck() {
        $result = true;
        if($this->passwordrepeat !== $this->password) {
            $result = false;
        }
        return $result;
    }

    private function loginTakenCheck() {
        $result = true;
        if(!$this->checkUser($this->login)) {
            $result = false;
        }
        return $result;
    }


}