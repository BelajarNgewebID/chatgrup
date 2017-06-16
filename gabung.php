<?php
include 'inc/konfig.php';
$chat = new chat();
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1">
	<title>Bergabung ke <?php echo $chat->getData($id, "namaObrolan"); ?></title>
	<link href="../inc/style.gabung.css" rel="stylesheet">
	<script type="text/javascript" src="../inc/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="../inc/script.gabung.js"></script>
</head>
<body>

<div class="container">
	<h1>Bergabung ke <?php echo $chat->getData($id, "namaObrolan"); ?></h1>
	<input type="hidden" id="idobrolan" value="<?php echo $id; ?>">
	<input type="text" name="nama" id="nama" class="joinBox" placeholder="Masukkan Nama untuk Bergabung...">
	<br />
	<button id="gabung">Bergabung</button>
</div>

</body>
</html>