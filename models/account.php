<?php

class Account
{
    public $id;
    public $username;
    public $password;

    public function __construct($id, $username, $password)
    {
        $this->id = $id;
        $username = $_GET['username'];
        $password = $_GET['password'];
        $this->username = $username;
        $this->password = $password;
    }

    public static function create($username, $password)
    {
        try {
            $db = Db::getInstance();
            // check if username already exists
            $password_hash = password_hash($password, PASSWORD_BCRYPT);
            $ins = $db->prepare("INSERT INTO users(username, userpw)
                               VALUES(:username, :userpw)");

            $ins->bindParam(":username", $username);
            $ins->bindParam(":userpw", $password_hash);
            $ins->execute();

            return $ins;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function login($username, $password)
    {
        try {
            $db = Db::getInstance();
            $req = $db->prepare("SELECT * FROM users WHERE username=:username LIMIT 1");
            $req->execute(array(':username' => $username));
            $userRow = $req->fetch(PDO::FETCH_ASSOC);
            if ($req->rowCount() > 0) {
                if (password_verify($password, $userRow['userpw'])) {
                    $_SESSION['user_session'] = $userRow['id'];
                    $_SESSION['username'] = $userRow['username'];
                    $_SESSION['role'] = $userRow['role'];
                    header("location: /");
                    exit();
                } else {
                    return false;
                }
            } else {
                echo "verkeerde username of wachtwoord, probeer het opnieuw! <br /> u word over seconden terug ";
                header("Refresh:3; url=/?controller=pages&action=login", true, 303);
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function is_loggedin()
    {
        if (isset($_SESSION['user_session'])) {
            echo "hihi ingelogd";
            require_once('views/users/logout.php');
            return true;
        } else {
            echo "nog geen account?";
        }
    }

    public static function logout()
    {
        session_destroy();
        unset($_SESSION['user_session']);
        header("location: /");
        exit();
    }

    public static function get_role($username)
    {
        $db = Db::getInstance();
        $req = $db->prepare("SELECT * FROM users WHERE username=:username LIMIT 1");
        $req->execute(array(':username' => $username));
        print_r($req);
    }

}