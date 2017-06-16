<?php

$idobrolan = $_POST['idobrolan'];
$nama = $_POST['nama'];

include 'konfig.php';
$chat = new chat();

echo $chat->membaca($idobrolan, $nama);

?>