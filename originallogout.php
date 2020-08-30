<?php
require_once("originalinit.php");
$_SESSION = []; 
if (ini_get("session.use_cookies")) { 
    setcookie(session_name(), '', time() - 42000);
}
session_destroy(); 
header('location: originallogin.php');
exit();
//ログアウトはこういうもの理解しようとするほど訳がわからなくなる
