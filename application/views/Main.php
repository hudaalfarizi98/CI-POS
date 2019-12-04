<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>APLIKASI KASIR</title>
	<link rel="stylesheet" href="<?= base_url();?>assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url();?>assets/fontawesome/css/all.css">
	<link rel="stylesheet" href="<?= base_url();?>assets/animate.css">
	<link rel="stylesheet" href="<?= base_url();?>assets/style.css">
	<script src="<?= base_url();?>assets/js/jquery-3.4.1.min.js"></script>
	<script src="<?= base_url();?>assets/js/bootstrap.bundle.js"></script>
	<script src="<?= base_url();?>assets/autoNumeric.js"></script>
	<style>
		a {
			cursor: pointer;
		}

		tr {
			border: 1px solid #ddd;
		}

		body {
			background-color: #ddd;
		}

		.frame {
			min-height: 600px;
			background-color: white;
			box-shadow: 2px 5px 2px blue !important;
		}

		.wrap {
			padding-left: 2%;
			padding-right: 2%;
			padding-top: 1%;
		}

		.brand-text {
			color: white;
			font-weight: bold;
			font-size: 1.2em;
			padding-top: 2px;
		}

		.bg-gradient-kasir {
			background-color: #E55300;
			background-image: -webkit-gradient(linear, left top, left bottom, color-stop(10%, #E55300), to(#224abe));
			background-image: linear-gradient(180deg, #141212 10%, #514444 100%);
			background-size: cover;
		}

		.bg-gradient-primary {
			background-color: #4e73df;
			background-image: -webkit-gradient(linear, left top, left bottom, color-stop(10%, #4e73df), to(#224abe));
			background-image: linear-gradient(180deg, #4e73df 10%, #224abe 100%);
			background-size: cover;
		}

		.bg-gradient-content {
			background-color: white;
		}

		#poskasir {
			display: none;
		}

		#pb {
			display: none;
		}

		#bpb {
			display: none;
		}

	</style>
</head>

<body>
	<div class="container-fluid wrap" style="position:;">

		<!--container tengah -->
		<div id="wrapper">
			<div class="">
				<?= $this->session->userdata("ip") ;?> | <?= $this->session->userdata("browser");?>|
				<?= $this->session->userdata("browser_versi");?> | <?= $this->session->userdata("os");?>
				<div class="row frame" style="padding-right:4px;">
					<div class="col-sm-3 bg-gradient-primary">
						<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
							<!-- Sidebar - Brand -->
							<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
								<div class="sidebar-brand-icon">
								</div>
								<div class="brand-text">KEDAI KU</div>
							</a>

							<!-- Divider -->
							<hr class="sidebar-divider my-0">

							<!-- Nav Item - Dashboard -->
							<li class="nav-item">
								<a class="nav-link" id="pos">
									<i class="fas fa-fw fa-dollar-sign"></i>
									<span>POS KASIR</span></a>
							</li>

							<!-- Divider -->
							<hr class="sidebar-divider">

							<!-- Heading -->
							<div class="sidebar-heading">
								Product Master
							</div>

							<!-- Nav Item - PESAN TERIMA BARANG -->
							<li class="nav-item">
								<a class="nav-link" id="apb">
									<i class="fas fa-fw fa-truck-loading"></i>
									<span>PESAN TERIMA BARANG</span></a>
							</li>

							<!-- Nav Item - BUKTI PEMROSESAN BARANG -->
							<li class="nav-item">
								<a class="nav-link" id="abpb">
									<i class="fas fa-fw fa-print"></i>
									<span>CETAK BPB</span></a>
							</li>
							<!-- Nav Item - STOK BARANG -->
							<li class="nav-item">
								<a class="nav-link" href="index.html">
									<i class="fas fa-fw fa-app-store"></i>
									<span>STOK BARANG</span></a>
							</li>

							<!-- Divider -->
							<hr class="sidebar-divider">

							<!-- Heading -->
							<div class="sidebar-heading">
								REPORT
							</div>
							<!-- Nav Item - CLOSIG SHIFT -->
							<li class="nav-item">
								<a class="nav-link" href="index.html">
									<i class="fas fa-fw fa-file"></i>
									<span>CLOSING SHIFT</span></a>
							</li>
							<!-- Nav Item - CLOSING HARIAN -->
							<li class="nav-item">
								<a class="nav-link" href="index.html">
									<i class="fas fa-fw fa-file"></i>
									<span>CLOSING HARIAN</span></a>
							</li>
							<!-- Nav Item - CLOSING BULANAN -->
							<li class="nav-item">
								<a class="nav-link" href="index.html">
									<i class="fas fa-fw fa-file"></i>
									<span>CLOSING BULANAN</span></a>
							</li>
						</ul>
					</div>
					<!-- =============================== MENU POS KASIR =============================================== -->
					<div class="col-sm-9 bg-gradient-content" style="min-height:600px;padding-left:20px;" id="poskasir">
						<div class="row" style="border-bottom:1px solid black;">
							<table style="border:none; width:50%;">
								<tr>
									<td>Nama Kasir</td>
									<td>:</td>
									<td>Huda Alfarizi</td>
								</tr>
								<tr>
									<td>JAM</td>
									<td>:</td>
									<td> <b id="jam"></b> : <b id="menit"></b> : <b id="detik"></b> </td>
								</tr>
							</table>
						</div><br />
						<div class="row" style="height:400px;overflow:scroll;">
							<div class="table-responsive">
								<table class="table-striped" style="width:100%; padding-left:2px;">
									<thead style="background-color: aqua;">
										<th>PLU</th>
										<th>Nama Barang</th>
										<th>QTY</th>
										<th>Harga</th>
									</thead>
									<tbody id="transaksi"></tbody>
									<tfoot style="background-color:#ddd;">
										<td colspan="3">TOTAL</td>
										<td class="total" style="text-align:left;"></td>
									</tfoot>
								</table>
							</div>
						</div><br />
						<div class="row" style="margin-bottom:0px;">
							<div class="col-sm-6">
								<input id="plupos" type="text" name="trans"
									style="border:none; border-bottom:1px solid black" placeholder="SCAN BARANG">:
								<input id="qtypos" type="text" name="qty"
									style="border:none; border-bottom:1px solid black" placeholder="QTY">
							</div>
							<div class="col-sm-6">
								<input class="ada" type="text" name="uangkon" style="border:none; border-bottom:1px solid black"
									placeholder="Uang Konsumen">:
								<input id="kembali" type="text" name="kembali" style="border:none; border-bottom:1px solid black"
									placeholder="Kembali" disabled="disabled">
							</div>
						</div>
						<br />
						<div class="row">
							<input type="text" hidden="hidden" id="totalmu" name="totalmu">
							<button id="strukpos" class="btn btn-primary"> <i class="fa fa-print"></i> Struk</button> -
							<button class="btn btn-warning" style="color:white;"><i class="fa fa-clock"></i>
								PENDING</button> -
							<button class="btn btn-danger"><i class="fa fa-trash"></i> CANCEL</button>
						</div>
					</div>
					<!-- =============================== PENUTUP MENU POS KASIR =============================================== -->

					<!-- =============================== MENU POS PROSES BARANG =============================================== -->
					<div class="col-sm-9 bg-gradient-content" style="min-height:600px;padding-left:20px;" id="pb">
						<div class="row" style="border-bottom:1px solid black;font-weight:bold;" class="text-center">
							<p class="col-sm-12 text-center">PROSES PESAN TERIMA BARANG</p>
						</div><br />
						<div class="row">
							<div class="col-sm-8">
								<input type="text" name="brdcd-barang" placeholder="MASUKKAN BARCODE SJ"
									style="border:none; border-bottom:3px solid black; width:200px;">
							</div>
							<div class="col-sm-4">
								<button id="sup" class="btn btn-primary" data-toggle="modal" data-target="#logoutModal">
									Pilih Supplier</button>
							</div>
						</div><br />
						<div class="row">
							<div class="col-sm-12">
								<input type="text" name="nosj" style="border:none; border-bottom:1px solid black;"
									placeholder="No SJ">
							</div>
						</div><br />

						<div class="row">
							<div class="col-sm-12"
								style="border:1px solid black;background-color:#ddd; overflow:scroll; height:320px;">
								<table style="width:100%;">
									<th class="text-center" width="3%">No</th>
									<th class="text-center" width="15%">Plu</th>
									<th class="text-center" width="50%">Deskripsi</th>
									<th class="text-center" width="30%">Qty</th>
								</table>
							</div>
						</div> <br />

						<div class="row">
							<div class="col-sm-4">
								<input type="text" name="masukanplu" style="border:none; border-bottom:1px solid black;"
									placeholder="MASUKKAN PLU">
							</div>
							<div class="col-sm-4">
								<input type="text" name="qty" style="border:none; border-bottom:1px solid black;"
									placeholder="MASUKKAN QTY">
							</div>
							<div class="col-sm-4">
								<button class="btn btn-success"><i class="fa fa-truck-loading"></i> Proses</button>
							</div>
						</div>

					</div>
					<!-- =============================== MENU POS PROSES BARANG =============================================== -->





					<!-- =============================== MENU CETAK BUKTI PEMROSESAN BARANG =============================================== -->
					<div class="col-sm-9 bg-gradient-content" style="min-height:600px;padding-left:20px;" id="bpb">
						<div class="row" style="border-bottom:1px solid black;">
							<div class="col-sm-12 text-center">
								<p style="font-weight:bold;">CETAK BUKTI PEMROSESAN BARANG</p>
							</div>
						</div><br />
						<div class="row">
							<div class="col-sm-4">
								<input type="text" name="kodebpb" style="border:none; border-bottom:1px solid black;"
									placeholder="MASUKKAN NO BPB">
							</div>
							<div class="col-sm-4">
								<label> PILIH TANGGAL </label> <i class="fa fa-calendar"> </i>
								<input type="date" name="tglbpb" style="border:none; border-bottom:1px solid black;"
									placeholder="PILIH TANGGAL ">
							</div>
						</div><br />
						<div class="row">
							<div class="col-sm-12">
								<table style="width:50%">
									<th>No BPB</th>
									<th>TANGGAL</th>
								</table>
							</div>
						</div>
					</div>
					<!-- =============================== MENU CETAK BUKTI PEMROSESAN BARANG =============================================== -->
					<!-- =============================== MENU STOK BARANG =============================================== -->
					<div class="col-sm-9 bg-gradient-content" style="min-height:600px;padding-left:20px;" id="bpb">
						<div class="row" style="border-bottom:1px solid black;">
							<div class="col-sm-12 text-center">
								<p style="font-weight:bold;">STOK BARANG BARANG</p>
							</div>
						</div><br />
						<div class="row">
							<div class="col-sm-4">
								<input type="text" name="kodebpb" style="border:none; border-bottom:1px solid black;"
									placeholder="MASUKKAN PLU">
							</div>
						</div><br />
						<div class="row">
							<div class="col-sm-12">
								<table style="width:50%">
									<th>No</th>
									<th>PLU</th>
									<th>Deskripsi</th>
									<th>Qty</th>
								</table>
							</div>
						</div>
					</div>
					<!-- =============================== MENU STOK BARANG =============================================== -->
				</div>
			</div>

			<footer class="sticky-footer">
				<div class="container">
					<p class="text-center">&copy; Huda Alfarizi</p>
				</div>
			</footer>
		</div>
	</div>

	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Pilih / Masukkan Kode Supplier</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<input type="text" name="kodesup" class="form-control" placeholder="MASUKAN KODE SUP">
					</div>
					<div class="row" style="border:1px solid black; height:200px;">
						<table style="width:100%;">
							<th>Kode Sup</th>
							<th>Deskripsi</th>
						</table>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="login.html">Pilih</a>
				</div>
			</div>
		</div>
	</div>
</body>
<script>
	$("#pos").on("click", function () {
		$("#pb").css("display", "none");
		$("#bpb").css("display", "none");
		$("#poskasir").css("display", "block");
		$("#transaksi").load(" #transaksi");
		get_net();
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
						$("#plupos").val("");
						$("#qtypos").val("");
						$("#plupos").focus();
						$("#transaksi").load(" #transaksi");
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
					$("#transaksi").append("<tr><td id='plu'>" + val.plu + "</td><td>"+ val.deskripsi +"</td><td>"+ val.qty +"</td><td id='hg' class='rupiah' style='text-align:left;'>"+ val.harga +"</td></tr>");
					sum+=val.harga;
				$(".total").text(sum);
				})
				$(".total").number(true,'');
				$('.rupiah').number(true,'');
			}
		})
	}

	function get_struk(){
		$.ajax({
			url : "<?= site_url("Main/get_struk");?>",
			dataType : "JSON",
		})
	}



	window.setTimeout("waktu()", 1000);
 
	function waktu() {
		var waktu = new Date();
		setTimeout("waktu()", 1000);
		document.getElementById("jam").innerHTML = waktu.getHours();
		document.getElementById("menit").innerHTML = waktu.getMinutes();
		document.getElementById("detik").innerHTML = waktu.getSeconds();
	}

	$(".ada").keydown(function(){
		$(".ada").number(true);
		
	});
	
	$(".ada").on('keypress',function(e) {
    	if(e.which == 13) {
				$("#kembali").focus();
				var total;
				var ug;
				total =  $(".total").text();
				console.log(total);
    	}
	});

</script>

</html>
