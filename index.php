<?php
	//koneksi database
	$server = "localhost";
	$user = "root";
	$pass = "";
	$database = "dblatihan";

	$koneksi = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($koneksi));

//jika tombol simpan diklik
	if(isset($_POST['bsimpan']))
	{
		$simpan = mysqli_query($koneksi, "INSERT INTO tuser (nama, email, telpon) 
										VALUES ('$_POST[tnama]', 
												'$_POST[temail]', 
												'$_POST[ttelpon]',)
										");
		if($simpan) //jika simpan suskse
		{
			echo "<script>
					alert('Simpan data sukses!');
					document.location='index.php';
				</script>";
		} 
		else // jika simpan gagal
		{
			echo "<script>
					alert('Simpan data GAGAL!!!');
					document.location='index.php';
				</script>";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>belajaryuk</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		
	<h1 class="text-center">DATA MAHASISWA</h1>
	<h2 class="text-center">S1 Sistem Informasi</h2>
	<h3 class="text-center">2018</h3>

	<!---Awal Card Form--->
		<div class="card mt-5">
		  <div class="card-header bg-primary text-white">
		    Form Input Data User
		  </div>
		  <div class="card-body">
		  	<form method="post" action="">
		  		<div class="form-group">
		  			<label>Nama</label>
		  			<input type="text" name="tnama" class="form-control" placeholder="Input Nama anda disini!" required>
		  		</div>
		  		<div class="form-group">
		  			<label>Email</label>
		  			<input type="text" name="temail" class="form-control" placeholder="Input Email anda disini!" required>
		  		</div>
		  		<div class="form-group">
		  			<label>Telpon</label>
		  			<input type="text" name="ttelpon" class="form-control" placeholder="Input Telpon anda disini!" required>
		  		</div>
		  		
		  		<button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
		  		<button type="reset" class="btn btn-danger" name="breset">Reset</button>
		  	</form>
		  </div>
		</div>
	<!---Akhir Card Form--->

	<!---Awal Card Tabel--->
		<div class="card mt-5">
		  <div class="card-header bg-success text-white">
		    Daftar User
		  </div>
		  <div class="card-body">
		  	<table class="table table-bordered table-striped">
		  		<tr>
		  			<th>No.</th>
		  			<th>Nama</th>
		  			<th>Email</th>
		  			<th>Telpon</th>
		  			<th>Aksi</th>
		  		</tr>
		  		<?php
		  			$no = 1;
		  			$tampil = mysqli_query($koneksi, "SELECT * from tuser order by id_user desc");
		  			while($data = mysqli_fetch_array($tampil)) :
		  		?>
		  		<tr>
		  			<td><?=$no++;?></td>
		  			<td><?=$data['nama']?></td>
		  			<td><?=$data['Email']?></td>
		  			<td><?=$data['Telpon']?></td>
		  			<td>
		  				<a href="#" class="btn btn-warning"> Ubah </a>
		  				<a href="#" class="btn btn-danger"> Hapus </a>
		  			</td>
		  		</tr>
		  	<?php endwhile; //penutup perulangan while ?>
		  	</table>

		  </div>
		</div>
	<!---Akhir Card Tabel--->

</div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>