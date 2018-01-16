<?php
include_once 'header.php';
include_once 'includes/nilai.inc.php';
$pro3 = new Nilai($db);
$stmt3 = $pro3->readAll();
include_once 'includes/alternatif.inc.php';
$pro1 = new Alternatif($db);
$stmt1 = $pro1->readAll();
$stmt4 = $pro1->readAll();
include_once 'includes/kriteria.inc.php';
$pro2 = new Kriteria($db);
$stmt2 = $pro2->readAll();
?>
<div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
		<div class="row">
		  <div class="col-xs-12 col-sm-12 col-md-4">
		  	<div class="page-header">
			  <h5>Nilai Preferensi</h5>
			</div>
			<div class="panel panel-default">
			  <div class="panel-body">
			    <ol>
			    	<?php
					while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
					?>
				  	<li><?php echo $row3['ket_nilai'] ?> (<?php echo $row3['jum_nilai'] ?>)</li>
				  	<?php
					}
				  	?>
				</ol>
			  </div>
			</div>
		  </div>
		  <div class="col-xs-12 col-sm-12 col-md-4">
		  	<div class="page-header">
			  <h5>Kriteria-Kriteria</h5>
			</div>
			<div class="panel panel-default">
			  <div class="panel-body">
			    <ol class="list-unstyled">
			    	<?php
					while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
					?>
				  	<li>(<?php echo $row2['id_kriteria'] ?>) <?php echo $row2['nama_kriteria'] ?></li>
				  	<?php
					}
				  	?>
				</ol>
			  </div>
			</div>
		  </div>
		  <div class="col-xs-12 col-sm-12 col-md-4">
		  	<div class="page-header">
			  <h5>Alternatif Produk</h5>
			</div>
			<div class="panel panel-default">
			  <div class="panel-body">
			    <ol class="list-unstyled">
			    	<?php
					while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
					?>
				  	<li>(<?php echo $row1['id_alternatif'] ?>) <?php echo $row1['nama_alternatif'] ?></li>
				  	<?php
					}
				  	?>
				</ol>
			  </div>
			</div>
		  </div>
		</div>
		
		
		<footer class="text-center">&copy; Kelompok 1 Sistem Informasi ~ Tugas SPK AHP</footer>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/highcharts.js"></script>
	<script src="js/exporting.js"></script>
	<script>
	var chart1; // globally available
	$(document).ready(function() {
	      chart1 = new Highcharts.Chart({
	         chart: {
	            renderTo: 'container2',
	            type: 'column'
	         },  
	         title: {
	            text: 'Grafik Perangkingan '
	         },
	         xAxis: {
	            categories: ['Alternatif']
	         },
	         yAxis: {
	            title: {
	               text: 'Jumlah Nilai'
	            }
	         },
	              series:            
	            [
	            <?php
	            while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)){
	                  ?>
	                 //data yang diambil dari database dimasukan ke variable nama dan data
	                 //
	                  {
	                      name: '<?php echo $row4['nama_alternatif'] ?>',
	                      data: [<?php echo $row4['hasil_akhir'] ?>]
	                  },
	                  <?php } ?>
	            ]
	      });
	   });  
	   </script>
	</body>
</html>