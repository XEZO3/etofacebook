<?php
 $con;
class database{
public static $con;
 private static function connect(){
    $dsn = "mysql:host =localhost;dbname=facebook";
    database::$con= new PDO ($dsn,"root","");
    $conn= new PDO ($dsn,"root","");
    return $conn;
 }
 static function query($sql,$parm){
     $query = database::connect()->prepare($sql);
     $query->execute($parm);
     return $query;
 }
}

?>