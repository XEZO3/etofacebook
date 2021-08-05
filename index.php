<?php
include("includes/header.php");

 
users::$session_id = $_COOKIE['uid'];
auth::check();
//if( !empty($_GET['touser'])){
    $touser =!empty($_GET['touser']) ? $_GET['touser'] : "";
  // }

if(isset($_POST['submit'])){
    users::addfrind();
}
if(isset($_POST['creatpost'])){
    posts::creatpost();
}
if(isset($_POST['addcoment'])){
    posts::creatcoment();
}
if(isset($_POST['submitrequest'])){
   users::acceptfrequest();

}
// if(isset($_POST['send'])){
//    messanger::sendmessage();
// }
?>

<!DOCTYPE html>

<html>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<head>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

<style>
.frinds{
    height: 100%;
    background-color: white;
    float: left;
    width: 20%;
    margin-top: 10px;
    border-radius: 30px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    
}
.frindsframe,.frindsframeacc,.frindsframeadd{
    overflow-y: scroll;
    height: 30%;
}
.span{
    font-size: 40px;
}
.frind{
    background-color: white;
    height: 75px;
    border-radius: 20px;
    text-align: center;
    border: 2px solid;
    margin-top: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
a{
    text-decoration: none;
    color: black;
    
}
.posts{
    float: left;
    height: 500px;
    width: 60%;
    margin-top: 10px;
    border-radius: 30px;
}
.messanger{
    float: left;
    height: 900px;
    width: 20%;
    background-color:white ;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    margin-top: 10px;
    border-radius: 30px;
}
.user{
    background-color: white;
    height: 100px; 
    border-radius: 20px;
    text-align: center;
    border: 2px solid;
    margin-top: 10px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

}
a:hover{
    text-decoration: none;
    
}
nav{
border-radius: 20px;
background-color: #FEF5F5;
}
.postsframe{
overflow-y: scroll;
height: 800px;
}
.post{
    border: 2px solid;
    border-radius: 18px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    margin-top: 20px;
    background-color:#FEF5F5 ;
}
.post_texts{
    height: 100px;
}
.comments{
    height: 200px;
    overflow-y: scroll;
    overflow-x: hidden;
}
.comment_post{
    height: 30px;
}
input{
border-radius: 10px;
}
.creatpost{
border: 1px solid;
border-radius: 15px;
}
.message-go{
    float: right;
    width: 250px;
    background-color: #e4e6eb;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    border-radius: 10px;
    margin-top: 20px;
}
.message-come{
    width: 250px;
    float: left;
    margin-top: 20px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    border-radius: 10px;
    background-color: #5A56F4;
    color: white;
}
</style>
</head>
<body>
<?php
include("newnavbar.php")
?>
<div class="frinds" >
<p style='font-size: 40px;'>الاصدقاء</p>
<div class="frindsframe">
<?php
//users::getfrinduser();
?>
</div>
<p style='font-size: 40px;'>قبول طلبات الصداقة</p>
<div class='frindsframeacc'>
<?php
//users::getrequest();
?>
</div>
<p style='font-size: 40px;'>اضافة صديق</p>
<div class='frindsframeadd'>
<?php
users::alluser();
?>
</div>
</div>
<div class="posts">
<form class="creatpost" method="post" style='text-align:center'>
<textarea style='width:300px;border-radius: 15px;' name="text"></textarea><br>
<input type="submit" name="creatpost">
</form>
<div class='postsframe' id='postsframe' >
<?php
 posts::getposts();

?>
</div>
</div>
<div class ="messanger" >
<p style='font-size: 40px;'>المحادثات</p>
<div id='messanger' style='overflow-y:scroll;height:750px'>
<?php


?>
</div>
<form method="POST" id="send">
<input type='text' id='message' name='message'>
<input type='submit'  name='send'>
</form>
<?php

?>
</div>
</body>
<script>
        function fnTabChanges(data){
    return tousers = data;
    
}
    </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script> 
$(document).ready(function(){
          
    
    $("#send").submit(function(event){
    event.preventDefault()
    var message = document.getElementById("message").value;
    //var touser = "<?php //echo $touser ?>";
     $.post("send.php",{message:message,touser:tousers},function(data){
      
       $('#message').val('');
     });
    });
    setInterval(function() {
            $(".frindsframeacc").load("jquery/load_frindreq.php?action=getrequest");
            $(".frindsframe").load("jquery/load_frindreq.php?action=getall");
            $("#messanger").load("jquery/load_chat.php?touser="+tousers+"");
           
           $("#messanger").scrollTop($("#messanger")[0].scrollHeight);
        }, 1000);
        
    // $("#messanger").load("jquery/load_chat.php?touser=<?php //echo $touser;?>");
    // var refreshId2 = setInterval(function() {
    //     $("#messanger").load("jquery/load_chat.php?touser=<?php //echo $touser;?>");
    // }, 100);
    //  $("#frindsframeacc").load("jquery/load_frindreq.php");
    //  var refreshId3 = setInterval(function() {
    //      $("#frindsframeacc").load("jquery/load_frindreq.php");
    //  }, 10);
        
});

</script>
</html>