<!DOCTYPE html>
<html>
<?php require 'head.php'; ?>
<style media="screen">
	body{
		overflow-x: hidden!important;
	}
	@media(max-width: 991px){
		div#tableka{
			overflow-x: scroll!important;
		}
	}
</style>
<body>
	<?php require 'pre-loader.php'; ?>

	<?php require 'header.php'; ?>

	<?php require 'left-side-bar.php'; ?>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="row" style = "display: flex; flex-wrap: wrap; justify-content: center;">
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div style = "display: flex; height: 80px;">
							<div class="progress-data" style = "border-right: 1px solid #eaeaea; display: flex; justify-content: center; width: 50%!important;">
								<i style = "color: #1e90ff; display: block; font-size: 50px; margin: auto!important;" class="icon-copy fa fa-user-circle-o" aria-hidden="true"></i>
							</div>
							<div class="widget-data" style = "padding: 0px 0px 0px 0px; display: flex; flex-direction: column; justify-content: center; align-items: center; margin: auto; text-align: center; width: 30%!important;">
								<div class="h4 mb-0" style = "color: #1e90ff; width: 80px; text-align: center;"><?php echo count(query("SELECT * FROM data_user")); ?></div>
								<div class="weight-600 font-14" style = "color: #1e90ff; width: 80px; text-align: center;"><a style = "color: #1e90ff;" href = "users.php">Users</a></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div style = "display: flex; height: 80px;">
							<div class="progress-data" style = "border-right: 1px solid #eaeaea; display: flex; justify-content: center; width: 50%!important;">
								<i style = "color: 	#00ff00; display: block; font-size: 50px; margin: auto!important;" class="icon-copy fa fa-list" aria-hidden="true"></i>
							</div>
							<div class="widget-data" style = "padding: 0px 0px 0px 0px; display: flex; flex-direction: column; justify-content: center; align-items: center; margin: auto; text-align: center; width: 30%!important;">
								<div class="h4 mb-0" style = "color: #00ff00; width: 80px; text-align: center;"><?php echo count(query("SELECT * FROM jenis")); ?></div>
								<div class="weight-600 font-14" style = "color: #00ff00; width: 80px; text-align: center;"><a style = "color: #00ff00;" href = "jenis.php">Jenis</a></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div style = "display: flex; height: 80px;">
							<div class="progress-data" style = "border-right: 1px solid #eaeaea; display: flex; justify-content: center; width: 50%!important;">
								<i style = "color: #ff6347; display: block; font-size: 50px; margin: auto!important;" class="icon-copy fa fa-trash" aria-hidden="true"></i>
							</div>
							<div class="widget-data" style = "padding: 0px 0px 0px 0px; display: flex; flex-direction: column; justify-content: center; align-items: center; margin: auto; text-align: center; width: 30%!important;">
								<div class="h4 mb-0" style = "color: #ff6347; width: 80px; text-align: center;"><?php echo count(query("SELECT * FROM sampah")); ?></div>
								<div class="weight-600 font-14" style = "color: #ff6347; width: 80px; text-align: center;"><a style = "color: #ff6347;" href = "sampah.php">Sampah</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row" style = "display: flex; justify-content: center;">
				<div class="bg-white pd-20 card-box mb-30" style = "width: 97%;">
					<div id="chart4"></div>
				</div>
			</div>
			<div class="card-box mb-30" id = "tableka">
				<div class="flexut" style = "display: flex; align-items: center; justify-content: space-between; padding-right: 20px;">
					<h2 class="h4 pd-20">20 Recent Users</h2>
					<a href="adduser.php" class = "btn btn-success">Add User</a>
				</div>
				<table class="data-table table nowrap">
					<thead>
						<tr>
							<th>Nama</th>
							<th>Email</th>
							<th>Tanggal Daftar</th>
							<th>Sampah</th>
							<th>Total Uang</th>
							<th class="datatable-nosort">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$userfull = query("SELECT * FROM data_user ORDER BY id DESC LIMIT 20");
						?>
						<?php foreach($userfull as $user) : ?>
						<tr id = "<?php echo $user['id']; ?>">
							<td>
								<!-- <h5 class="font-16">Shirt</h5> -->
								<?php echo $user["nama"]; ?>
							</td>
							<td><?php echo $user["email"]; ?></td>
							<td><?php echo $user["tanggal"]; ?></td>
							<td>
								<?php $iduser = $user["id"]; ?>
								<?php echo count(query("SELECT * FROM sampah WHERE iduser = $iduser")); ?>
							</td>
							<td>
								<?php
								$kumpulansampah = mysqli_query($connt, "SELECT * FROM sampah WHERE iduser = $iduser");
								$totaluang = 0;
								foreach($kumpulansampah as $sampah){
									$totaluang += $sampah["totalharga"];
								}
								?>

								<?php
								echo number_format($totaluang, 0, '', '.');
								 ?>
							</td>
							<td>
								<div class="dropdown">
									<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
										<i class="dw dw-more"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
										<a class="dropdown-item" href="edituser.php?id=<?php echo $user['id']; ?>"><i class="dw dw-edit2"></i> Edit</a>
										<div style = "cursor: pointer;" class="dropdown-item" onclick = "deleteaccountadmin(<?php echo $user['id']; ?>);"><i class="dw dw-delete-3"></i> Delete</div>
									</div>
								</div>
							</td>
						</tr>
						<?php endforeach; ?>

						<script type="text/javascript">
							function deleteaccountadmin(iduser){
									$(document).ready(function(){
											var deleteid = iduser;
											var kode = "hapususer";
											<?php if($admin["notif"] == "y") : ?>
											var confirmalert = confirm("Are You Sure You Want To Delete This User?");
											<?php else : ?>
											var confirmalert = true;
											<?php endif; ?>
											if (confirmalert == true){
												$.ajax({
													url: '../jurnal/function.php',
													type: 'POST',
													data: {deleteid:deleteid,kode:kode},
													success: function(response){
													if(response == 1){
														<?php if($admin["notif"] == "y") : ?>
														alert('User Deleted Successfully');
														<?php endif; ?>
														document.getElementById(deleteid).style.display = "none";
													}else if(response == 99){
														 alert('You Have Reached The Limit For Reply To This Comment');
													 }else if(response == 999){
														 alert('Email Is Already Taken');
													 }else if(response == 9999){
															 alert('Username Is Already Taken');
														 }else{
													 }
													}
												});
											}
									});
							}
						</script>
					</tbody>
				</table>
			</div>
			<?php require 'footer-wrap.php'; ?>
		</div>
	</div>
	<!-- js -->
	<?php
	$date7 = date("d", strtotime("-7 days")) . " " . date('F') . " " . date("Y");
          $date6 = date("d", strtotime("-6 days")) . " " . date('F') . " " . date("Y");
          $date5 = date("d", strtotime("-5 days")) . " " . date('F') . " " . date("Y");
          $date4 = date("d", strtotime("-4 days")) . " " . date('F') . " " . date("Y");
          $date3 = date("d", strtotime("-3 days")) . " " . date('F') . " " . date("Y");
          $date2 = date("d", strtotime("-2 days")) . " " . date('F') . " " . date("Y");
          $date1 = date("d", strtotime("-1 days")) . " " . date('F') . " " . date("Y");
					$date = date("d") . " " . date('F') . " " . date("Y");

					$penggunaini = count(query("SELECT * FROM data_user WHERE tanggal = '$date'"));
$pengguna7 = count(query("SELECT * FROM data_user WHERE tanggal = '$date7'"));
$pengguna6 = count(query("SELECT * FROM data_user WHERE tanggal = '$date6'"));
$pengguna5 = count(query("SELECT * FROM data_user WHERE tanggal = '$date5'"));
$pengguna4 = count(query("SELECT * FROM data_user WHERE tanggal = '$date4'"));
$pengguna3 = count(query("SELECT * FROM data_user WHERE tanggal = '$date3'"));
$pengguna2 = count(query("SELECT * FROM data_user WHERE tanggal = '$date2'"));
$pengguna1 = count(query("SELECT * FROM data_user WHERE tanggal = '$date1'"));

$komentarini = count(query("SELECT * FROM sampah WHERE tanggal = '$date'"));
$komentar7 = count(query("SELECT * FROM sampah WHERE tanggal = '$date7'"));
$komentar6 = count(query("SELECT * FROM sampah WHERE tanggal = '$date6'"));
$komentar5 = count(query("SELECT * FROM sampah WHERE tanggal = '$date5'"));
$komentar4 = count(query("SELECT * FROM sampah WHERE tanggal = '$date4'"));
$komentar3 = count(query("SELECT * FROM sampah WHERE tanggal = '$date3'"));
$komentar2 = count(query("SELECT * FROM sampah WHERE tanggal = '$date2'"));
$komentar1 = count(query("SELECT * FROM sampah WHERE tanggal = '$date1'"));
	?>
	<?php require 'js.php'; ?>
	<script type="text/javascript">
		// chart 4
		Highcharts.chart('chart4', {
			chart: {
				type: 'column'
			},
			title: {
				text: 'Numbers of Growth'
			},
			xAxis: {
				categories: [
				'<?= $date7; ?>',
				'<?= $date6; ?>',
				'<?= $date5; ?>',
				'<?= $date4; ?>',
				'<?= $date3; ?>',
				'<?= $date2; ?>',
				'<?= $date1; ?>',
				'<?= $date; ?>'
				],
				crosshair: true
			},
			yAxis: {
				min: 0,
				title: {
					text: 'Numbers'
				}
			},
			tooltip: {
				headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
				pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name} : </td>' +
				'<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
				footerFormat: '</table>',
				shared: true,
				useHTML: true
			},
			plotOptions: {
				column: {
					pointPadding: 0.2,
					borderWidth: 0
				}
			},
			series: [{
				name: 'Sampah',
				data: [<?= $komentar7; ?>, <?= $komentar6; ?>, <?= $komentar5; ?>, <?= $komentar4; ?>, <?= $komentar3; ?>, <?= $komentar2; ?>, <?= $komentar1; ?>, <?php echo $komentarini; ?>]
			},{
				name: 'Users',
				data: [<?= $pengguna7; ?>, <?= $pengguna6; ?>, <?= $pengguna5; ?>, <?= $pengguna4; ?>, <?= $pengguna3; ?>, <?= $pengguna2; ?>, <?= $pengguna1; ?>, <?php echo $penggunaini; ?>]

			}]
		});
	</script>
</body>
</html>
