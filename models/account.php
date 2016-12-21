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
            $ins = $db->prepare('
INSERT INTO gebruiker(gebruiker_naam, gebruiker_email, gebruiker_wachtwoord, gebruiker_adres, gebruiker_postcode, gebruiker_plaats)
VALUES(:gebruiker_naam, :gebruiker_email, :gebruiker_wachtwoord, :gebruiker_adres, :gebruiker_postcode, :gebruiker_plaats)');

            $ins->bindParam(":gebruiker_naam", $name);
            $ins->bindParam(":gebruiker_email", $username);
            $ins->bindParam(":gebruiker_wachtwoord", $password_hash);
            $ins->bindParam(":gebruiker_adres", $address);
            $ins->bindParam(":gebruiker_postcode", $postalcode);
            $ins->bindParam(":gebruiker_plaats", $place);
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
            $req = $db->prepare("SELECT * FROM gebruiker WHERE gebruiker_email=:username LIMIT 1");
            $req->execute(array(':username' => $username));
            $userRow = $req->fetch(PDO::FETCH_ASSOC);
            if ($req->rowCount() > 0) {
                if (password_verify($password, $userRow['gebruiker_wachtwoord'])) {
                    $_SESSION['user_session'] = $userRow['gebruiker_id'];
                    $_SESSION['username'] = $userRow['gebruiker_naam'];
                    $_SESSION['user_email'] = $userRow['gebruiker_email'];
                    $_SESSION['user_password'] = $userRow['gebruiker_wachtwoord'];
                    $_SESSION['user_adres'] = $userRow['gebruiker_adres'];
                    $_SESSION['user_postcode'] = $userRow['gebruiker_postcode'];
                    $_SESSION['user_place'] = $userRow['gebruiker_plaats'];
                    $_SESSION['role'] = $userRow['role_id'];
                    header("location: /");
                    exit();
                } else {
                    return false;
                }
            } else {
                echo "verkeerde username of wachtwoord, probeer het opnieuw! <br /> u word over 3 seconden terug ";
                header("Refresh:3; url=/?controller=pages&action=login", true, 303);
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function edit($name, $username, $address, $postalcode, $place){
        try {
            $db = Db::getInstance();
            // check if username already exists
//            $password_hash = password_hash($password, PASSWORD_BCRYPT);
            $ins = $db->prepare('UPDATE gebruiker SET gebruiker_naam=:gebruiker_naam, gebruiker_email=:gebruiker_email, gebruiker_adres=:gebruiker_adres, gebruiker_postcode=:gebruiker_postcode, gebruiker_plaats=:gebruiker_plaats WHERE gebruiker_email=:gebruiker_email');

            $ins->bindParam(":gebruiker_naam", $name);
            $ins->bindParam(":gebruiker_email", $username);
//            $ins->bindParam(":gebruiker_wachtwoord", $password_hash);
            $ins->bindParam(":gebruiker_adres", $address);
            $ins->bindParam(":gebruiker_postcode", $postalcode);
            $ins->bindParam(":gebruiker_plaats", $place);
            $ins->execute();

            return $ins;
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

    public static function get_role($gebruiker_email)
    {
        $db = Db::getInstance();
        $req = $db->prepare("SELECT * FROM gebruiker WHERE gebruiker_email=:gebruiker_email LIMIT 1");
        $req->execute(array(':gebruiker_email' => $gebruiker_email));
        print_r($req);
    }

}