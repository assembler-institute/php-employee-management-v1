<?php
class LoginUser{
    //class properties
    private $username;
    private $password;
    public $error;
    public $success;
    private $storage = "../resources/user.json";
    private $stored_user;

    //class methods

    public function __construct($username, $password){
        $this->username = $username;
        $this->password = $password;
        $this->stored_user = json_decode(file_get_contents($this->storage), true);
        $this->login();
    }


    private function login(){
        foreach ($this->stored_user as $user) {
            if($user['username'] == $this->username){
                if(password_verify($this->password $user['password'])){
                    sesssion_start();
                    $_SESSION['user'] = $this->username;
                    header("location:../dashboard.php"); exiit();
                }
            }
        }
    }
}