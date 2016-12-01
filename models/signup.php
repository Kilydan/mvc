<?php
session_start();
$username = $_GET['username'];
$password = $_GET['password'];
echo $username;
echo $password;

//echo "name: " . $user_name . "<br />";
//echo "password: " . $user_pw;
class Signup{

    public $id;
    public $username;
    public $password;

    public function __construct($id, $username, $password)
    {
        echo $username;
        $this->id = $id;
        $username = $_GET['username'];
        $password = $_GET['password'];
        $this->username = $username;
        $this->password = $password;
    }
    public function create($username, $password){
        $db = Db::getInstance();
        $ins = $db->query("INSERT INTO users (username, userpw)
VALUES ('$username', '$password')");
        dump("ihih hij komt hier");
        die();
        $ins->execute(array('username' => $username, 'password' => $password));
        $signup = $ins->fetch();

        return;

    }
    public function login($username, $password) {

    }

}