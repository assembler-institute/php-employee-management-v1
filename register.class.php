 <?php

 class RegisterUser {

    private $username;
    private $raw_password;
    private $encrypted_password;
    public $error;
    public $success;
    private $storage = "resources/users.json";
    private $stored_users;
    private $new_user; //array

    public function __construct($username, $password){
        $this->username = trim($this->username);
        $this->username = filter_var($username, FILTER_SANITIZE_STRING);

        $this->raw_password = filter_var(trim($password), FILTER_SANITIZE_STRING);
        $this->encrypted_password = password_hash($password, $PASSWORD_DEFAULT);

        $this->stored_users = json_decode(file_get_contents($this->storage), true);
    };
    private function checkFieldValues(){};
    private function usernameExists(){};
    private function insertUser(){};

 }