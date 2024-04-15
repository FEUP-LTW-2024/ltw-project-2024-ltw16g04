<?php
    function getDatabaseConnection(){
        $db = new PDO('sqlite:' . __DIR__ . '/../data/martechplace.db');
        
        return $db;
    }
?>