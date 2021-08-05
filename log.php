<?php
include("includes/header.php");
if(isset($_POST['submit'])){
    
    auth::login();
}
echo"<form method=\"post\">
<input type=\"text\" name='username'>
<input type=\"submit\" name=\"submit\">
</form>"

?>