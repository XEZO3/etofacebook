<?php
class messanger{
    static function loadmessage(){
        $userid = $_COOKIE['username'];
        $touser = $_GET['touser'];
        $query = database::query("select * from messages where touser = ? and fromuser= ? or touser = ? and fromuser = ? order by id",array($touser,$userid,$userid,$touser));
        if($query->rowCount() >0){
            $rows=$query->fetchAll(PDO::FETCH_ASSOC);
            foreach($rows as $row){
                $message = $row['message'];
                $fromuser = $row['fromuser'];
                messanger::body($fromuser,$message);
            }
        }
    }
    static function body($fromuser,$message){
        
        
        $messages = "";
        if($_COOKIE['username'] == $fromuser){
        $messages ="
        <br>
        <div class=\"message-go\">
        <p>$message</p>
        </div>
        ";
        }else{
            $messages ="
            <br>
            <div class=\"message-come\">
            <p>$message</p>
            </div>
            ";  
        }
        echo $messages;
    }
    static function sendmessage($touser,$message){
        $query = database::query("INSERT INTO `messages`(`touser`, `fromuser`, `message`) VALUES (?,?,?) ",array($touser,$_COOKIE['username'],$message));
    }
}
?>