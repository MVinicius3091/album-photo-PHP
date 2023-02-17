<?php

abstract class Connection {

    public $con;

    public function __construct()
    {
        try {
            
            $pdo = new PDO('pgsql:host=localhost;dbname=gallery_photo;', 'postgres', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->con = $pdo;
        } catch (PDOException $e) {
            echo 'DB CONNECTION ERROR ' . $e->getMessage();
        }
    }

   
}
