$(document).ready(function() {
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
				url: "../inc/gabungObrolan.php",
				data: dataObrolan,
				success: function(html) {
					document.location = '../chat/'+idobrolan;
				}
			});
		}
	});
});