<?php
include_once 'header.php';
include_once 'includes/nilai.inc.php';
$pgn = new Nilai($db);
if($_POST){
	
	include_once 'includes/kriteria.inc.php';
	$eks = new Kriteria($db);

	$eks->id = $_POST['id'];
	$eks->nm = $_POST['nm'];
	$eks->bb = $_POST['bb'];
	
	if($eks->insert()){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil Tambah Data!</strong> Tambah lagi atau <a href="kriteria.php">lihat semua data</a>.
</div>
<?php
	}
	
	else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Gagal Tambah Data!</strong> Terjadi kesalahan, coba sekali lagi.
</div>
<?php
	}
}
?>
		<div class="row">
		  <div class="col-xs-12 col-sm-12 col-md-8">
		  	<div class="page-header">
			  <h5>Tambah Kriteria</h5>
			</div>
			
			    <form method="post">
				  <div class="form-group">
				    <label for="kt">ID Kriteria</label>
				    <input type="text" class="form-control" id="id" name="id" required>
				  </div>
				  <div class="form-group">
				    <label for="tp">Nama Kriteria</label>
				    <input type="text" class="form-control" name="nm" id="nm" required="">
				    <!-- <select class="form-control" id="nm" name="nm">
				    	<option value='benefit'>Benefit</option>
				    	<option value='cost'>Cost</option>
				    </select> -->
				  </div>
				  <div class="form-group">
				    <label for="jm">Bobot Kriteria</label>
				    <select class="form-control" id="bb" name="bb">
				    	<?php
						$stmt2 = $pgn->readAll();
						while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
							extract($row2);
							echo "<option value='{$jum_nilai}'>{$jum_nilai}</option>";
						}
					    ?>
				    </select>
				  </div>
				  <button type="submit" class="btn btn-primary">Simpan</button>
				  <button type="button" onclick="location.href='kriteria.php'" class="btn btn-success">Kembali</button>
				</form>
			  
		  </div>
		  <div class="col-xs-12 col-sm-12 col-md-4">
		  	<?php include_once 'sidebar.php'; ?>
		  </div>
		</div>
		<?php
include_once 'footer.php';
?>