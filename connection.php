<?php
class Db
{
    private static $instance = NULL;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $drivers = PDO::getAvailableDrivers ();
            echo '<pre>' . print_r ($drivers, true) . '</pre>';
            self::$instance = new PDO('mysql:host=localhost;dbname=mvc', 'root', '', $pdo_options);
        }
        return self::$instance;
    }
}