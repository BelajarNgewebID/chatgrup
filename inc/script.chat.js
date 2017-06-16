$(document).ready(function() {
	var idobrolan = $("#idobrolan").val();
	var nama = $("#pesan").val();
	var dataBaca = 'idobrolan='+idobrolan+'&nama='+nama;
	var timeout = setTimeout(reloadChat, 1000);

	function reloadChat() {
		$("#percakapan").load("../inc/loadSemuaChat.php", function() {
			timeout = setTimeout(reloadChat, 1000);
		});
		$.ajax({
			type: "POST",
			url: "../inc/membaca.php",
			data: dataBaca,
			success: function(html) {
				$("#percakapan").load("../inc/loadSemuaChat.php");
			}
		});
	}
	$("#keluar").click(function() {
		var idobrolan = $("#idobrolan").val();
		var data = 'idobrolan='+idobrolan;
		$.ajax({
			type: "POST",
			url: "../inc/keluar.php",
			data: data,
			success: function(html) {
				document.location = '../index.php';
			}
		});
	});
	$("#kirim").click(function() {
		var idobrolan = $("#idobrolan").val();
		var pesan = $("#pesan").val();
		var nama = $("#nama").val();
		var kirim = 'idobrolan='+idobrolan+'&pesan='+pesan+'&nama='+nama;
		if(pesan == '') {
			$("#pesan").css({"background":"#e74c3c"});
			return false;
		}
		$.ajax({
			type: "POST",
			url: "../inc/mengirim.php",
			data: kirim,
			success: function(html) {
				$("#percakapan").load("../inc/loadSemuaChat.php");
				$("#pesan").val('');
			}
		});
	});
	$("#pesan").click(function() {
		$("#pesan").css({"background":"#fff"});
	});
});