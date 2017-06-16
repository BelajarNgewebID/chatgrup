<?php

include 'konfig.php';
$chat = new chat();

$idobrolan = $_POST['idobrolan'];
$namaObrolan = $_POST['namaObrolan'];
$maxuser = $_POST['maxuser'];
$namamu = $_POST['namamu'];

$chat->buatObrolan($idobrolan, $namaObrolan, $maxuser, $namamu);

?>