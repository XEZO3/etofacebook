<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Get Text Input Field Value in JavaScript</title>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
var touser;
</script>
<button onclick=" fnTabChanges(this.value)" id='gettouser' value="1">Button1</button>
<button onclick=" fnTabChanges(this.value)" id='gettouser' value="2">Button2</button>
<script>
function fnTabChanges(data){
    return touser = data;
    
}
setInterval(function() {
           console.log(touser);
        }, 1000);

</script>
</body>
</html>