<?php
$id = $_GET['id'];
include 'inc/konfig.php';
$chat = new chat();
setcookie('idobrolan',$id,time() + 999999, "/");
session_start();
$mem = $chat->getData($id, "anggota");
$pec = explode(",", $mem);
$tot = count($pec);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1">
	<title><?php echo $chat->getData($id, "namaObrolan"); ?></title>
	<link href="../inc/style.css" rel="stylesheet">
	<script type="text/javascript" src="../inc/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="../inc/script.chat.js"></script>
</head>
<body>

<input type="hidden" id="idobrolan" value="<?php echo $id; ?>">
<input type="hidden" id="nama" value="<?php echo $_SESSION['chatting']; ?>">

<div class="atas">
	<div class="judul"><?php echo $chat->getData($id, "namaObrolan")." <span>($tot)</span>"; ?></div>
	<button id="keluar">Keluar</button>
</div>

<div class="container">

<div id="percakapan">

</div>
<div id="ketik">
	<table align="center">
		<tr>
			<td><textarea id="pesan"></textarea></td>
			<td><button id="kirim">Kirim</button></td>
		</tr>
</div>

</div>

</body>
</html>