<?php
session_start();
session_destroy();
echo ' <center><h4>Ha terminado la sesion </h4></center>';
echo '<script>$(document).ready(function(){setTimeout(function(){location.href = "index.php";}, 2000);});</script>';
?>
