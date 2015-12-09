<?php
session_start();
session_destroy();
echo ' <center>Ha terminado la sesion </center>';
echo '<script>$(document).ready(function(){setTimeout(function(){location.href = "index.php";}, 2000);});</script>';
?>
