<?php

$id = rand(1,999999999);
$idobrolan = $_POST['idobrolan'];
$pesan = $_POST['pesan'];
$nama = $_POST['nama'];
$waktu = time();

include 'konfig.php';
$chat = new chat();

echo $chat->mengirim($id, $idobrolan, $nama, $pesan, $waktu, "");

?>