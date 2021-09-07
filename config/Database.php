<?php 

class Database {


    public static function connect(){
        try {
            $db = new PDO(DNS.':host='.HOSTNAME.':'.PORT.';dbname='.DATABASE.';charset='.CHARSET,USERNAME,PASSWORD);
            return $db;
        } catch (PDOException $ex) {
            die("Error in the connection -> " . $ex->getMessage());
        }
    }

}


?>