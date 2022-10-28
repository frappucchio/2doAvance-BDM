<?php


class ConexionBD {
    public static function Connect(){

        $connection = new PDO("mysql:host=localhost:3308;dbname=tiendaBDM", "root", "");

        $connection->exec("set names utf8");

        return $connection;
    }

}
