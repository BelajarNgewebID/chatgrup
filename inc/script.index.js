$(document).ready(function() {
	$("#idobrolan").click(function() {
		$("#isiID").css({"font-size":"17px"});
		$("#isiID").animate({top: "96px"});
		$("#idobrolan").css({"background":"none"});
	});
	$("#nama").click(function() {
		$("#isiNama").css({"font-size":"17px"});
		$("#isiNama").animate({top: "186px"});
		$("#nama").css({"background":"none"});
	});
	$("#gabung").click(function() {
		var idobrolan = $("#idobrolan").val();
		var nama = $("#nama").val();
		var dataObrolan = 'idobrolan='+idobrolan+'&nama='+nama;
		if(idobrolan == '') {
			$("#idobrolan").css({"background":"#e74c3c"});
			return false;
		}else if(nama == '') {
			$("#nama").css({"background":"#e74c3c"});
			return false;
		}else {
			$.ajax({
				type: "POST",
				url: "inc/gabungObrolan.php",
				data: dataObrolan,
				success: function(html) {
					document.location = './chat/'+idobrolan;
				}
			});
		}
	});
	$("#buat").click(function() {
		$(".boxLogin").fadeOut(300);
		$(".divBuat").fadeIn(450);
	});
	$("#tblBuat").click(function() {
		var idobrolan = $("#idobrolan2").val();
		var namaObrolan = $("#namaObrolan").val();
		var maxuser = $("#maxuser").val();
		var namamu = $("#namamu").val();
		var data = 'namaObrolan='+namaObrolan+'&maxuser='+maxuser+'&namamu='+namamu+'&idobrolan='+idobrolan;
		if(namaObrolan == '') {
			$("#namaObrolan").css({"background":"#e74c3c"});
			return false;
		}else if(maxuser == '') {
			$("#maxuser").css({"background":"#e74c3c"});
			return false;
		}else if(namamu == '') {
			$("#namamu").css({"background":"#e74c3c"});
			return false;
		}else {
			$.ajax({
				type: "POST",
				url: "inc/buatChat.php",
				data: data,
				success: function(html) {
					document.location = './chat/'+idobrolan;
				}
			});
		}
	});
	$("#namaObrolan").click(function() {
		$("#namaObrolan").css({"background":"#fff"});
	});
	$("#maxuser").click(function() {
		$("#maxuser").css({"background":"#fff"});
	});
	$("#namamu").click(function() {
		$("#namamu").css({"background":"#fff"});
	});
});