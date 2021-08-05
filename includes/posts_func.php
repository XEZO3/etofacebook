<?php
class posts{
    static function getposts(){
        $query = database::query("select  distinct posts.id,posts.user_id,posts.text from posts join frinds on  posts.user_id = frinds.user1_id or  posts.user_id = frinds.user2_id  where (frinds.user1_id = ? or frinds.user2_id = ?) and frinds.state= 1 order by id",array($_COOKIE['uid'],$_COOKIE['uid']));
        if($query->rowCount() > 0){
            $rows=$query->fetchAll(PDO::FETCH_ASSOC);
            foreach($rows as $row){
                 $id = $row['user_id'];
                 //if($id != $_COOKIE['uid']){
                   // if($id != $_COOKIE['uid']){
                        $post_text = $row['text'];
                        $ids= $row['id'];
                         posts::postbody($ids,$post_text,posts::getusername($id));
                       
                      
                   // }
                    
                    
                    
            }
            
                // $query2 = database::query("select * from posts where user_id = ? order by posts.id",array($_COOKIE['uid']));
                // if($query2->rowCount() > 0){
                //     $rows=$query2->fetchAll(PDO::FETCH_ASSOC);
                //     foreach($rows as $row){
                //         $post_text = $row['text'];
                //          posts::postbody($row['id'],$post_text);
                //     }
                    
                // }
            
        }
    }
    static function postbody($id,$post_text,$post_maker){
      
echo "
        <div class='card gedf-card' style='margin-top:30px;border-radius:30px'>
        <div class='card-header'>
            <div class='d-flex justify-content-between align-items-center'>
                <div class='d-flex justify-content-between align-items-center'>
                    <div class='mr-2'>
                        <img class='rounded-circle' width='45' src='https://picsum.photos/50/50' alt=''>
                    </div>
                    <div class='ml-2' >
                        <div class='h5 m-0'>$post_maker</div>
                        <div class='h7 text-muted'>Miracles Lee Cross</div>
                    </div>
                </div>
                
            </div>

        </div>
        <div class='card-body' style='border:1px solid'>
            <div class='text-muted h7 mb-2'> <i class='fa fa-clock-o'></i>10 min ago</div>
            

            <p class='card-text'>
                $post_text
            </p>
        </div>
        <div class='card-footer' style='background-color:white'>
        <div class='comments' id='comments'>
                        
        ".posts::comments($id)."
       </div>
       <form method='post' class='comment_post'>
                        <input type='text' name='comment' style='width:300px'>
                        <input type='hidden' name='post_id' value='$id'>
                        <input type='submit' name='addcoment'>
                        </form>
        </div>
    </div>
        
      ";
       
       
                       // return $body;
    }
    static function creatpost(){
        $query = database::query("INSERT INTO `posts` (`user_id`, `text`) VALUES (?, ?);",array($_COOKIE['uid'],$_POST['text']));
    }
    static function comments($id){
        $query = database::query("select * from comments join posts on comments.post_id = posts.id where 
      posts.id = ?",array($id));
    
        if($query->rowCount() > 0) {
            $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    
            $comments = [];
            foreach ($rows as $row) {
                $all = "
                <div class='media' style='margin-top:-35px'>
                          
                            <a class='media-left' href='#'>
                              <img src=''>
                            </a>
                            <div class='media-body'>
                                
                              <h4 class='media-heading user_name'>".posts::getusername($row['com_user_id'])."</h4>
                              ".$row['comment']."
                            </div>
                          </div>
                <hr>
                ";
                $comments[] =$all;
                
            }
            return implode("<br>", $comments);
        }
        return "<p>No comments so far...</p>";
    }
    static function creatcoment(){
        $query = database::query("INSERT INTO `comments`(`post_id`, `com_user_id`, `comment`) VALUES (?,?,?)",array($_POST['post_id'],$_COOKIE['uid'],$_POST['comment']));
    }
    static function getusername($id){
        $query = database::query("select * from users where id = ?",array($id));
        if($query->rowCount() > 0) {
            $rows = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach($rows as $row){
                $username = $row['username'];
            }
            return $username;
        }
    }
}
?>


