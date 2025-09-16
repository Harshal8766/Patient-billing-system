 <?php
// This file logs the user out
session_start();
session_destroy();
header("Location: index.php");
exit();
?>