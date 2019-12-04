<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= base_url();?>assets/bootstrap/css/bootstrap.css">
	<title>Document</title>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-sm-12">
<p style="text-align: center;">Bukti Belanja PT ABADI JAYA</p>
	<table style="width:100%; ">
		<tr style="border:1px solid black">
			<td style="border-bottom:1px solid black">Deskripsi</td>
			<td style="border-bottom:1px solid black">Qty</td>
			<td style="border-bottom:1px solid black">Harga</td>
		</tr>
        <?php foreach($hasil as $row) { ;?>
		<tr>
			<td><?= $row->deskripsi;?></td>
			<td><?= $row->qty;?></td>
			<td id="sub" style="text-align: right;"><?= number_format($row->harga);?></td>
		</tr>
        <?php } ;?>
        <tr>
        <td colspan="2" style="border-top:1px solid black">TOTAL</td>
        <td style="border-top:1px solid black;text-align: right;"><?= number_format($total) ;?></td>
        </tr>
	</table>
</div>
</div>
</div>
</body>
</html>
