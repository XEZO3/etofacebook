<?php

class users{
    
    public static $session_id;
    static function getfrinduser(){
        
      
        $query = database::query("select * from frinds join users on frinds.user1_id = users.id or frinds.user2_id= users.id where (frinds.user1_id = ? or frinds.user2_id =?) and state = ?",array($_COOKIE['uid'],$_COOKIE['uid'],1));
        if($query->rowCount() > 0){
            $rows=$query->fetchAll(PDO::FETCH_ASSOC);
            foreach($rows as $row){
                $name = $row['username'];
                $id = $row['id'];
                if($id != $_COOKIE['uid'] ){
               //echo"<a href = 'index.php?touser=$name'> <div class=\"frind\" ><span class='span'>$name</span>
               
               //</div></a>";
               echo"<button style='width:100%' value='$name' type='button' id='gettouser' onclick=\" fnTabChanges(this.value)\">$name</button><br>";
                }
            }
        }
    }
    static function addfrind(){
        
        $id = $_POST['id'];
        $query1 = database::query("select * from `frinds` where user1_id = ? and user2_id = ? or user1_id = ? and user2_id =? and (state = ? or state = ?)",array($_COOKIE['uid'],$id,$id,$_COOKIE['uid'],1,0));
        if($query1->rowCount() >0){
            echo"he is your frind";
        }else{
        $query = database::query("INSERT INTO `frinds` (`user1_id`, `user2_id`, `state`) VALUES (?, ?, 0)",array($_COOKIE['uid'],$_POST['id']));
        if($query == 1){
            echo "hhhhhhhhhhhhh";
        }
    }
    }
    static function alluser(){
        $query = database::query("select * from users",array());
        if($query->rowCount() > 0){
            $rows=$query->fetchAll(PDO::FETCH_ASSOC);
            foreach($rows as $row){
                $name = $row['username'];
                $id = $row['id'];
                
                if($id != $_COOKIE['uid']){
                echo "<div class='user'>
                <span class='span'>$name</span>
                <form method='post'>
                <input type='hidden' name='id' value='$id'>
              <input type='submit' name='submit' class='input' value='add frind' >
                </form></div>";
                }
            }
        }
    }
    static function acceptfrequest(){
        $query = database::query("update frinds set state = ? where user1_id = ? and user2_id = ?",array(1,$_POST['id'],$_COOKIE['uid']));
        
    }
    static function getrequest(){
        $query = database::query("select * from frinds join users on frinds.user1_id = users.id where frinds.user2_id = ? and state = ?",array($_COOKIE['uid'],0));
        if($query->rowCount() > 0){
            $rows=$query->fetchAll(PDO::FETCH_ASSOC);
            foreach($rows as $row){
                $name = $row['username'];
                $id = $row['id'];
                
                if($id != $_COOKIE['uid']){
                echo "<div class='user'>
                <span class='span'>$name</span>
                <form method='post'>
                <input type='hidden' name='id' value='$id'>
              <input type='submit' name='submitrequest' class='input' value='accept' >
                </form></div>";
                }
            }
        }
    }
    
    
}
//"select * from frinds join users on frinds.user1_id = users.id or frinds.user2_id= users.id where frinds.user1_id = ? or frinds.user2_id =?
// <form method='post'>
//                <input type='hidden' name='id' value='$id'>
//               <input type='submit' name='submit' >
//                </form>

// SELECT * FROM `posts` JOIN users,frinds on
// posts.user_id = frinds.user1_id or posts.user_id= frinds.user2_id 
// where frinds.user1_id = 7 or frinds.user2_id =9

//susses

//select * from posts join frinds on posts.user_id = frinds.user2_id or posts.user_id= frinds.user1_id

?>
