<?php
include("includes/header.php");

if(isset($_POST['message']) && !empty($_POST['message'])){

    messanger::sendmessage($_POST['touser'],$_POST['message']);
    echo "done";
}
?>