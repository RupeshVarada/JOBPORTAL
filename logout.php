<?php
session_start();
if(isset($_SESSION['usname']))
{

// unset($_SESSION['status']);
// unset($_SESSION['usname']);
session_destroy();
}
echo '<script>window.location.replace("index.php")</script>';


?>