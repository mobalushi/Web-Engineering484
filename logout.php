<?php
session_start();
session_destroy();
header('Location: lab2.php?msg=loggedout');
exit;
?>