<?php

class Admincontroller
{
    public function autos()
    {
        require_once('views/pages/admin/autos.php');
    }

    public function gebruikers()
    {
        require_once('views/pages/admin/gebruikers.php');
    }

    public function reserveringen()
    {
        require_once('views/pages/admin/reserveringen.php');
    }
}