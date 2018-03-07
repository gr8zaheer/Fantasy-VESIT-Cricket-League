<?php
session_start();
if(!isset($_SESSION['user_log_uid']))
  {
    header('Location: index.php');
    exit;
  } 
session_destroy();
echo "successful";
exit;
?>