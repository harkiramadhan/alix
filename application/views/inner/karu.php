<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$title?></title>

	<style>
		@import url('https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap');

		@page {
			size: A4;
			margin: 100;
		}
		@media print {
			html, body {
				width: 210mm;
				height: 297mm;
			}
		}
		.noujian {
			font-size: 170%;
            margin-top: 9px;
            font-family: verdana;
		}
		.nama {
			font-size: 100%;
            font-family: verdana;
		}
		.asal-sekolah {
			font-size: 100%;
			margin-top: 2px;
            font-family: verdana;
		}
		.kartuujian {
			border: 1px solid white;
			height:12cm;
			padding:0 0 0 0;
			width:8.5cm;
			background-image:url('<?= base_url('') ?>assets/img/bg-kartu-ujian.png');
			background-size:100%;
            background-repeat: no-repeat;
			text-align: center;
		}
		.potong {
			position: relative;
			margin-left: 25%;
			border: 1px dashed black;
			height: 12.07cm;
			width: 8.57cm;
		}
		.cut {
			margin-left: 24%;
			margin-bottom: -2px;
		}
	</style>

</head>

<body>
	<div class="container">
	<h3><span style="color:red;">PRINT A4</span>, Gunting Garis Putus-Putus, Dibawa Ketika Mengikuti Seleksi.</h3>
		<img src="<?= base_url('assets/img/cut.png') ?>" alt="" class="cut">
		<div class="potong">
			<div class="kartuujian">
				<div style="height: 4cm; width: 3cm; margin-left: 104.4px; overflow: hidden; position: relative;margin-top: 182.6px; border-radius: 5px;">
					<img style="position: absolute; left: -1090.8%; right: -1092%; top: -1000%; bottom: -1000%; margin: auto; height: 4cm; width: 3cm; border-radius: 5px;" src="<?= base_url('upload/img/'.$foto->img) ?>">
				</div>
				<div class="noujian"><b><?= $siswa->noujian ?></b></div>
				<div class="nama"><b><?= $siswa->nama." / ".$siswa->jenkel ?></b></div>
				<div class="asal-sekolah"><b><?= $siswa->asal_sekolah ?></b></div>
			</div>
		</div>

		<h2 style="color:red">Penting!</h2>
		<h3><b style="color:red">Name Tag Plastik Akan Diberikan Ketika Registrasi Saat Hari Pelaksanaan Seleksi</b> <br><br>
		<u>Harap Konfirmasi Telah Mendaftar Pada WhatsApp Berikut : <b style="color:red">0878-8331-0048</b> dan <b style="color:red">0812-8346-1881</b></u> <br><br>
		<b>Perlengkapan Yang Harus Dibawa : </b> <br>
			<ul>
				<li> Pensil</li>
				<li> Pensil Warna (Krayon)</li>
				<li> Penghapus</li>
				<li> Rautan</li>
			</ul>  
		<b>Pakaian 		: </b> Seragam TK atau Bebas (Menutupi Aurat) <br>
		<b>Tanggal Pelaksanaan Seleksi : </b> 8 Februari 2019  <br>
		<b>Lokasi Seleksi : </b> SDIT Al Hikmah <br>
		<b>Waktu Seleksi 	: </b> Pukul 07.30 WIB s/d 11.00 WIB</h3>
	</div>
</body>
</html>