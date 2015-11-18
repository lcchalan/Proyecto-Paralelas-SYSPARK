<?php
session_start();
session_destroy();
echo ' <center>Ha terminado la sesion </center>';
?>
<script>
location.href = "index.php";
</script>

