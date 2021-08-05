<?php
class auth{
    static function login(){
        $query = database::query("select * from users where username = ?",array($_POST['username']));
        if($query->rowCount() > 0){
        $rows=$query->fetchAll(PDO::FETCH_ASSOC);
            foreach($rows as $row){
                $name = $row['username'];
                $id = $row['id'];
            }
           
            setcookie('uid', $id, time() + ( 365 * 24 * 60 * 60) );
            setcookie('username', $name, time() + ( 365 * 24 * 60 * 60) );
    }
    header("Location: index.php ");
    }
    static function check(){
        if(!isset($_COOKIE['uid']) || !isset($_COOKIE['username'])){
            
            header("location: log.php");
            exit;
            }
        else{
            setcookie('uid', $_COOKIE['uid'], time() + ( 365 * 24 * 60 * 60) );
            setcookie('username', $_COOKIE['username'], time() + ( 365 * 24 * 60 * 60) );
        }
    }
}

?>