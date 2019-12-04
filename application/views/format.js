get_net();
	// MAIN MENU
	$("#pos").on("click", function () {
		$("#pb").css("display", "none");
		$("#bpb").css("display", "none");
		$("#poskasir").css("display", "block");
	});
	$("#apb").on("click", function () {
		$("#bpb").css("display", "none");
		$("#poskasir").css("display", "none");
		$("#pb").css("display", "block");
	});
	$("#abpb").on("click", function () {
		$("#poskasir").css("display", "none");
		$("#pb").css("display", "none");
		$("#bpb").css("display", "block");
	});
	// MAIN MENU

	//FUNCTION TOMBOL-TOMBOL
	$("#strk").on("click", function(){
		struk();
	})
	$("#plupos").on('keypress',function(e) {
    	if(e.which == 13) {
       		 $("#qtypos").focus();
    	}
	});
	$("#qtypos").on('keypress',function(e) {
    	if(e.which == 13) {
			var plu_cek_pos = $("#plupos").val();
			var qty_cek_pos = $("#qtypos").val();
			$.ajax({
				url : "<?= site_url("Main/insert_sales");?>",
				type : "POST",
				data : {
					plu_cek_pos:plu_cek_pos,
					qty_cek_pos:qty_cek_pos
				},
				dataType : "JSON",
				success:function(response){
					if(response.status == "gagal") {
						alert("PLU DAN QTY TIDAK BOLEH KOSONG");
					} if(response.status == "gagal2") {
						alert("BARANG DENGAN PLU " + plu_cek_pos + " TIDAK DITEMUKAN");
					} if(response.status == "sukses") {
						get_net();
					}
				}
			})
        	
    	}
	});


	//MENU POS KASIR
	function get_net(){
		$.ajax({
			url : "<?= site_url("Main/get_net");?>",
			dataType : "JSON",
			success: function(response){
				var sum = 0;
				$.each(response, function(i, val){
					$("#transaksi").append("<tr><td id='plu'>" + val.plu + "</td><td>"+ val.deskripsi +"</td><td>"+ val.qty +"</td><td id='hg'>"+ val.harga +"</td></tr>");
					sum+=val.harga;
				})
				$("#total").text(sum);
				$("#totalmu").val(sum);
			}
		})
	}

	function get_struk(){
		$.ajax({
			url : "<?= site_url("Main/get_struk");?>",
			dataType : "JSON",
		})
	}
	