<?php

class Database{
    public static function connect(){
        $db = new mysqli("localhost",'root','Xavi123$','videogames_shop');
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}