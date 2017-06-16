<?php

include 'konfig.php';
$chat = new chat();
session_start();

$idobrolan = $_POST['idobrolan'];
$nama = $_SESSION['chatting'];

echo $chat->keluarGrup($idobrolan, $nama);

?>