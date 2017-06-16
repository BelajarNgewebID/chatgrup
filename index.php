<?php
include 'inc/konfig.php';
$chat = new chat();
$random = rand(1,99999);
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1">
	<title>Chattingan by Riyan Satria</title>
	<script type="text/javascript" src="inc/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="inc/script.index.js"></script>
	<link href="inc/style.css" rel="stylesheet">
	<link href="inc/font-awesome.min.css" rel="stylesheet">
</head>
<body>

<div class="atas">
	<div class="judul">Chattingan</div>
</div>

<div class="boxLogin">
	<h2>Bergabung dengan Chat</h2>
	<hr size="2" color="#333" width="190px">
	<div id="isiID">ID Obrolan...</div>
	<input type="text" name="idobrolan" id="idobrolan" class="logBox">
	<div id="isiNama">Namamu...</div>
	<input type="text" name="nama" id="nama" class="logBox"><br />
	<div class="tombol">
		<button id="gabung">Join</button><br />
		<div>
		<hr size="2" color="#333" width="145px">
		<span>atau</span>
		</div>
		<button id="buat">buat chat baru</button>
	</div>
</div>

<div class="divBuat">
	<h2>Buat Obrolan Baru</h2>
	<input type="hidden" name="idobrolan2" id="idobrolan2" value="<?php echo $random; ?>">
	<input type="text" name="nama" id="namaObrolan" placeholder="Nama Obrolan..." class="buatBox">
	<input type="number" id="maxuser" name="maxuser" placeholder="Maks Member..." class="buatBox">
	<input type="text" name="namamu" id="namamu" placeholder="Namamu..." class="buatBox"><br />
	<button id="tblBuat">Buat</button>
</div>

</body>
</html>