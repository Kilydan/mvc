<?php
    class Car{
        // we define 3 attributes
        // they are public so that we can access them using $post->author directly
        public $auto_kenteken;
        public $auto_merk;
        public $auto_type;
        public $auto_prijs;
        public $auto_beschrijving;

        public function __construct($auto_kenteken, $auto_merk, $auto_type, $auto_prijs, $auto_beschrijving) {
            $this->auto_kenteken = $auto_kenteken;
            $this->auto_merk = $auto_merk;
            $this->auto_type = $auto_type;
            $this->auto_prijs = $auto_prijs;
            $this->auto_beschrijving = $auto_beschrijving;
        }

        public static function all() {
            $list = [];
            $db = Db::getInstance();
            $req = $db->query('SELECT * FROM autos');

            // we create a list of post objects from the database results
            foreach($req->fetchAll() as $car) {
                $list[] = new Car($car['auto_kenteken'], $car['auto_merk'], $car['auto_type'], $car['auto_prijs'], $car['auto_beschrijving']);
            }

            return $list;
        }

        public static function find($auto_kenteken) {
            $db = Db::getInstance();
            // we make sure the $id is an int
            $req = $db->prepare('SELECT * FROM autos WHERE kenteken = :kenteken');
            // the query was prepared, now we replace :id with our actual $id value
            $req->execute(array('auto_kenteken' => $auto_kenteken));
            $post = $req->fetch();

            return new Post($post['id'], $post['author'], $post['content']);
        }
    }