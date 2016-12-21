<?php

class Car
{
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $auto_kenteken;
    public $auto_merk;
    public $auto_type;
    public $auto_prijs;
    public $auto_beschrijving;
    public $auto_image;

    public function __construct($auto_kenteken, $auto_merk, $auto_type, $auto_prijs, $auto_beschrijving, $auto_image)
    {
        $this->auto_kenteken = $auto_kenteken;
        $this->auto_merk = $auto_merk;
        $this->auto_type = $auto_type;
        $this->auto_prijs = $auto_prijs;
        $this->auto_beschrijving = $auto_beschrijving;
        $this->auto_image = $auto_image;
    }

    public static function all()
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM autos');

        // we create a list of post objects from the database results
        foreach ($req->fetchAll() as $car) {
            $list[] = new Car($car['auto_kenteken'], $car['auto_merk'], $car['auto_type'], $car['auto_prijs'], $car['auto_beschrijving'], $car['auto_image']);
        }
        return $list;
    }

    public static function find($auto_kenteken)
    {
        $db = Db::getInstance();
        // we make sure the $id is an int
        $req = $db->prepare('SELECT * FROM autos WHERE auto_kenteken = :kenteken');
        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('kenteken' => $auto_kenteken));
        $carRow = $req->fetch(PDO::FETCH_ASSOC);
        if($req->rowCount() > 0){
            $_SESSION['auto_kenteken'] = $carRow['auto_kenteken'];
        }
        $car = $req->fetch();
        return new Car($car['auto_kenteken'], $car['auto_merk'], $car['auto_type'], $car['auto_prijs'], $car['auto_beschrijving'], $car['auto_image']);
    }

    public static function rent($kenteken, $start_date, $end_date)
    {
        $start_date = strtotime($start_date);
        $start_date = date('Y-m-d', $start_date);

        $end_date = strtotime($end_date);
        $end_date = date('Y-m-d', $end_date);
        try {

            $db = Db::getInstance();
            $ins = $db->prepare('
            INSERT INTO orders(orderdatum, klant_id) VALUES(NOW(), :klant_id);');
            $ins->bindParam(":klant_id", $_SESSION['user_session']);
            $ins->execute();
            $get_id = $db->query("SELECT LAST_INSERT_ID()");
            $id_value = $get_id->fetch(PDO::FETCH_NUM);
            $id_value = $id_value[0];
            $ins = $db->prepare('INSERT INTO reservering (auto_kenteken, factuurnummer, auto_gereserveerd_van, auto_gereserveerd_tot) VALUES(:kenteken, :factuurnummer, :start_date, :end_date)');
            $ins->bindParam(":kenteken", $kenteken);
            $ins->bindParam(":factuurnummer", $id_value);
            $ins->bindParam(":start_date", $start_date);
            $ins->bindParam(":end_date", $end_date);
            $ins->execute();

            $req = $db->prepare('SELECT * FROM orders WHERE factuurnummer=:factuurnummer LIMIT 1');
            $req->execute(array(':factuurnummer' => $id_value));
            $carRow = $req->fetch(PDO::FETCH_ASSOC);
            if($req->rowCount() > 0){
                $_SESSION['orderdatum'] = $carRow['orderdatum'];
            }

            $req = $db->prepare('SELECT * FROM autos WHERE auto_kenteken=:kenteken LIMIT 1');
            $req->execute(array(':kenteken' => $kenteken));
            $carRow = $req->fetch(PDO::FETCH_ASSOC);
            if($req->rowCount() > 0){
                $_SESSION['auto_merk'] = $carRow['auto_merk'];
                $_SESSION['auto_type'] = $carRow['auto_type'];
                $_SESSION['auto_prijs'] = $carRow['auto_prijs'];
            }

            $req = $db->prepare('SELECT * FROM reservering WHERE factuurnummer=:factuurnummer LIMIT 1');
            $req->execute(array(':factuurnummer' => $id_value));
            $carRow = $req->fetch(PDO::FETCH_ASSOC);
            if($req->rowCount() > 0){
                $_SESSION['factuurnummer'] = $carRow['factuurnummer'];
                $_SESSION['start_date'] = $carRow['auto_gereserveerd_van'];
                $_SESSION['end_date'] = $carRow['auto_gereserveerd_tot'];

                $req = $db->prepare('SELECT * FROM gebruiker WHERE gebruiker_id=:klant_id LIMIT 1');
                $req->execute(array(':klant_id' => $_SESSION['user_session']));
                $carRow = $req->fetch(PDO::FETCH_ASSOC);
                if($req->rowCount() > 0){
                    $_SESSION['gebruiker_email'] = $carRow['gebruiker_email'];
                    $_SESSION['gebruiker_adres'] = $carRow['gebruiker_adres'];
                    $_SESSION['gebruiker_postcode'] = $carRow['gebruiker_postcode'];
                    $_SESSION['gebruiker_plaats'] = $carRow['gebruiker_plaats'];
                }
            }

            return $ins;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}