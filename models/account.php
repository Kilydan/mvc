<?php

class Account
{
    public $id;
    public $name;
    public $username;
    public $password;
    public $address;
    public $postalcode;
    public $place;

    public function __construct($id, $name, $username, $password, $address, $postalcode, $place)
    {
        $this->id = $id;
        $name = $_GET['name'];
        $username = $_GET['username'];
        $password = $_GET['password'];
        $address = $_GET['address'];
        $postalcode = $_GET['postalcode'];
        $place = $_GET['place'];
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;
        $this->address = $address;
        $this->postalcode = $postalcode;
        $this->place = $place;
    }

    public static function create($name, $username, $password, $address, $postalcode, $place)
    {
        try {
            $db = Db::getInstance();
            // check if username already exists
            $password_hash = password_hash($password, PASSWORD_BCRYPT);
            $ins = $db->prepare("INSERT INTO klant(klant_naam, klant_email, klant_wachtwoord, klant_adres, klant_postcode, klant_plaats)
                               VALUES(:klant_naam, :klant_email, :klant_wachtwoord, :klant_adres, :klant_postcode, :klant_plaats)");

            $ins->bindParam(":klant_naam", $name);
            $ins->bindParam(":klant_email", $username);
            $ins->bindParam(":klant_wachtwoord", $password_hash);
            $ins->bindParam(":klant_adres", $address);
            $ins->bindParam(":klant_postcode", $postalcode);
            $ins->bindParam(":klant_plaats", $place);
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