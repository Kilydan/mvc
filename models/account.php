<?php
class Account{

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
    public static function create($username, $password){
        $db = Db::getInstance();
        // check if username already exists
        $password = password_hash($password, PASSWORD_BCRYPT)."\n";
        $check =  $db->query('SELECT username FROM users');
        $check->execute();
        $result = $check->fetchAll(PDO::FETCH_COLUMN, 'username');
        if(in_array($username, $result)){
            echo 'de gebruikersnaam ' . $username . ' is al in gebruik, probeer het opnieuw! <br />';
            echo '<a href="/?controller=pages&action=signup">Terug</a><br />';
        }
        else{
            $ins = $db->prepare("INSERT INTO users (username, userpw)
            VALUES ('$username', '$password')");
            $ins->execute(array('username' => $username, 'password' => $password));
            require_once('views/users/signup.php');
        }
    }
    public function login($username, $password) {

    }

}