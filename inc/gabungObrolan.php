<?php
include 'konfig.php';

$chat = new chat();

$idobrolan = $_POST['idobrolan'];
$nama = $_POST['nama'];

echo $chat->gabungObrolan($idobrolan, $nama);

?>