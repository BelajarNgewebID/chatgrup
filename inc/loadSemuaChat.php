<script type="text/javascript">
	$("#hapusPesanku").click(function() {
		var idpesan = $("#idpesanku").val();
		var idpesanku = 'idpesanku='+idpesan;
		$.ajax({
			type: "POST",
			url: "../inc/hapusPesan.php",
			data: idpesanku,
			
		});
	});
</script>
<?php

include 'konfig.php';
include 'emotikon.php';
$chat = new chat();
session_start();
$id = $_COOKIE['idobrolan'];
$sesi = $_SESSION['chatting'];

foreach ($chat->loadAllChat($id) as $row) {
	if($sesi == $row['nama']) {
		$punya = "id='chatSaya'";
		$opsi = "";
	}else {
		$punya = "id='chatDia'";
		$opsi = "";
	}
	$pesan = emot($row['pesan']);
	echo "<div class='cakap' $punya id='{$row['idpesan']}'>".
		 "<div class='namaCakap'>{$row['nama']}</div>".
		 "<input type='hidden' id='idpesanku' value='{$row['idpesan']}'>".
		 "<div class='pesannya'>".$pesan."</div>".
		 $opsi.
		 "</div>";
}

?>