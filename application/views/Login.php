<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Aplikasi Kasir ::..Login..::</title>
	<link rel="stylesheet" href="<?= base_url();?>assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url();?>assets/fontawesome/css/all.css">
	<link rel="stylesheet" href="<?= base_url();?>assets/animate.css">
	<script src="<?= base_url();?>assets/js/jquery-3.4.1.min.js"></script>
	<style>
		body {
			background-color: #ddd;
		}

		.tengah {
			margin-top: 10%;
		}

		.head-log {
			border: none;
			background-color: white;
			font-weight: bold;
			font-size: 1.3em;
			box-shadow: 2px 2px 2px blue !important;
		}

		.input {
			border: none;
			border-bottom: 1px solid black;
		}

	</style>
</head>

<body>
	<div class="container">
		<div class="row justify-content-center">
			<div id="load" class="col-md-4" style="font-size:2em;">
			</div>
		</div>
		<div class="row justify-content-center tengah">
			<div class="col-sm-6 animated fadeInLeftBig">
				<div class="card head-log">
					<div class="card-header head-log text-center">LOGIN APLIKASI KASIR</div>
					<div class="card-body">
						<div class="form-group">
							<input id="nik" type="text" name="nik" placeholder="Enter Your NIK.."
								class="form-control input">
						</div>
						<div class="form-group">
							<input id="password" type="text" name="pass" placeholder="Enter Your Password.."
								class="form-control input">
						</div>
						<br />
						<div class="form-group">
							<button class="btn btn-primary" id="sub">Login</button>
						</div>
					</div>
				</div><br/>
				NIK : 2015015915 | password : 123456
			</div>
		</div>
	</div>
	</div>
</body>
<script>
    document.getElementById("nik").value = "";
document.getElementById("password").value = "";

$("#sub").on("click", function () {
        $("#load").html("laoding....");
        var nik = $("#nik").val();
        var password = $("#password").val();
        $.ajax({
            url: "<?php echo site_url("Login/check_validation");?>",
            method: "POST",
            data: {
                nik: nik,
                password: password
            },
            dataType: "JSON",

            success: function (response) {
                $("#load").html(response.status);
                if (response.url != "") {
                    window.location.href = response.url;
                }
            }
        })
    })
</script>

</html>
