<?php
require_once("originalinit.php");

$msg = $_POST["message"];
if (!isset($_SESSION["user"]["name"])) {    //ログイン画面から直接URLにoriginalinputと打ち込まれてもちゃんとログインして下さいっていう式
    header('location: originallogin.php');
    exit();
}  elseif(empty($msg["message"])){    //チャットで何も打たずに送信しても反映されないよの式
    header("location:original.php");
    exit();
}  else {
$new_chat = (object)$msg;
require_once("originalchat_data.php");
array_push($messages, $new_chat);
$messages = json_encode($messages);
file_put_contents($path, $messages);

header("location:original.php");
exit();
}


/*

if (empty($msg["message"])) { //if(!isset)
    header("location:original.php");
    exit();
