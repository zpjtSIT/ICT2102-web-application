<?php 
$_COOKIE["token"] = null;
?>
<script src="js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script>
$.cookie("token", null);
location.replace("index.php");
</script>