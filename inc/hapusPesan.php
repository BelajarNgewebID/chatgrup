<?php
include 'konfig.php';
$chat = new chat();

$idpesan = $_POST['idpesanku'];
$hapus = $chat->hapus($idpesan);

?>