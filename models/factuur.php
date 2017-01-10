<?php
class Factuur
{
    public $factuurnummer;
    public $orderdatum;
    public $medewerker_id;
    public $klant_id;

    public function __construct($factuurnummer, $orderdatum, $medewerker_id, $klant_id)
    {
        $this->id = $klant_id;
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
    public static function invoices($usersession)
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->prepare('SELECT * FROM orders WHERE klant_id=:klant_id');
        $req->bindValue('klant_id', $usersession);
        $req->execute();
        $fctrRow = $req->fetchAll(PDO::FETCH_OBJ);
        if ($req->rowCount() > 0) {
            foreach ($fctrRow as $factuur) {

                $_SESSION['factuurnummer'] = $factuur->factuurnummer;
                $_SESSION['orderdatum'] = $factuur->orderdatum;
                $_SESSION['medewerker_id'] = $factuur->medewerker_id;
                $_SESSION['klant_id'] = $factuur->klant_id;
                $list[] = new Factuur($factuur->factuurnummer, $factuur->orderdatum, $factuur->medewerker_id, $factuur->klant_id);
            }
        }
        print_r($list);
        return $list;
    }
}