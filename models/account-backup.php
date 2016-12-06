<?php

class Account
{

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

    public static function create($username, $password)
    {
        $db = Db::getInstance();
        // check if username already exists
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $check = $db->query('SELECT username FROM users');
        $check->execute();
        $result = $check->fetchAll(PDO::FETCH_COLUMN, 'username');
        if (in_array($username, $result)) {
            echo 'de gebruikersnaam "' . $username . '" is al in gebruik, probeer het opnieuw! <br />';
            echo 'u word over 3 seconden terug geredirect naar de signup page';
            header("Refresh:3; url=/?controller=pages&action=signup", true, 303);
        } else {
            $ins = $db->prepare("INSERT INTO users (username, userpw)
            VALUES ('$username', '$password_hash')");
            $ins->execute(array('username' => $username, 'password' => $password_hash));
            require_once('views/users/signup.php');
        }
    }

    public static function login($username, $password)
    {
        $db = Db::getInstance();
        $req = $db->query("SELECT * FROM users WHERE username = '$username'");
        $req->execute();
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        if (password_verify($password, $password_hash)) {
            echo $password ."<br />";
            echo $password_hash;
            $result = $req->fetchAll(PDO::FETCH_COLUMN, 'username');
            print_r($result);
            header("url=/", true, 303);
        }else{
            echo "noob!";
        }
    }

}