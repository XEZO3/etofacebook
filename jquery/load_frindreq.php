<?php
include("../includes/header.php");
if($_GET['action']=="getrequest"){
users::getrequest();
}elseif($_GET['action']=="getall")
{
    users::getfrinduser();
}else{
    echo"no datas";
}
?>