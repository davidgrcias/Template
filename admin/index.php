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
								<i style = "color: 	#00ff00; display: block; font-size: 50px; margin: auto!important;" class="icon-copy fa fa-image" aria-hidden="true"></i>
							</div>
							<div class="widget-data" style = "padding: 0px 0px 0px 0px; display: flex; flex-direction: column; justify-content: center; align-items: center; margin: auto; text-align: center; width: 30%!important;">
								<div class="h4 mb-0" style = "color: #00ff00; width: 80px; text-align: center;"><?php echo count(query("SELECT * FROM card")); ?></div>
								<div class="weight-600 font-14" style = "color: #00ff00; width: 80px; text-align: center;"><a style = "color: #00ff00;" href = "card.php">Kartu</a></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div style = "display: flex; height: 80px;">
							<div class="progress-data" style = "border-right: 1px solid #eaeaea; display: flex; justify-content: center; width: 50%!important;">
								<i style = "color: 	#FF6347; display: block; font-size: 50px; margin: auto!important;" class="icon-copy fa fa-list" aria-hidden="true"></i>
							</div>
							<div class="widget-data" style = "padding: 0px 0px 0px 0px; display: flex; flex-direction: column; justify-content: center; align-items: center; margin: auto; text-align: center; width: 30%!important;">
								<div class="h4 mb-0" style = "color: #FF6347; width: 80px; text-align: center;"><?php echo count(query("SELECT * FROM color")); ?></div>
								<div class="weight-600 font-14" style = "color: #FF6347; width: 80px; text-align: center;"><a style = "color: #FF6347;" href = "color.php">Warna</a></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div style = "display: flex; height: 80px;">
							<div class="progress-data" style = "border-right: 1px solid #eaeaea; display: flex; justify-content: center; width: 50%!important;">
								<i style = "color: #1e90ff; display: block; font-size: 50px; margin: auto!important;" class="icon-copy fa fa-user-circle-o" aria-hidden="true"></i>
							</div>
							<div class="widget-data" style = "padding: 0px 0px 0px 0px; display: flex; flex-direction: column; justify-content: center; align-items: center; margin: auto; text-align: center; width: 30%!important;">
								<div class="h4 mb-0" style = "color: #1e90ff; width: 80px; text-align: center;"><?php echo count(query("SELECT * FROM data_admin")); ?></div>
								<div class="weight-600 font-14" style = "color: #1e90ff; width: 80px; text-align: center;"><a style = "color: #1e90ff;" href = "admin.php">Admin</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-box mb-30" id = "tableka">
				<div class="flexut" style = "display: flex; align-items: center; justify-content: space-between; padding-right: 20px;">
					<h2 class="h4 pd-20">20 Kartu Terbaru</h2>
				</div>
				<table class="data-table table nowrap">
					<thead>
						<tr>
							<th>Kartu</th>
							<th>Email Pengirim</th>
							<th>Nama Kartu</th>
							<th>Warna</th>
							<th>Status</th>
							<th class="datatable-nosort">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$userfull = mysqli_query($connt, "SELECT * FROM card ORDER BY card_id DESC LIMIT 20");
						?>
						<?php foreach($userfull as $user) : ?>
						<tr id = "<?php echo $user['card_id']; ?>">
							<td> <img src="../usersUpload/<?php echo $user['image']; ?>" alt="" width = 400> </td>
							<td> <?php echo $user["email"]; ?> </td>
							<td width = 180>
								<!-- <h5 class="font-16">Shirt</h5> -->
								<?php echo $user["imageName"]; ?>
							</td>
							<td>
								<?php $colorid = $user["color_id"]; ?>
								<?php $color = mysqli_fetch_assoc(mysqli_query($connt, "SELECT * FROM color WHERE color_id = $colorid")); ?>
								<?php echo $color["color"]; ?>
							</td>
							<td>
								<?php $approval = $user["approval"]; ?>
								<?php if($approval == 0){
									$point = "Tidak Tampil";
								}
								else{
									$point = "Tampil";
								}

								echo $point;
								?>
							</td>
							<td>
								<div class="dropdown">
									<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
										<i class="dw dw-more"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
										<div style = "cursor: pointer;" class="dropdown-item" onclick = "deleteaccountadmin(<?php echo $user['card_id']; ?>);"><i class="dw dw-delete-3"></i> Hapus</div>
										<?php if($user["approval"] == 1) : ?>
										<div style = "cursor: pointer;" class="dropdown-item" onclick = "hide(<?php echo $user['card_id']; ?>);"><i class="dw dw-hide"></i>Jangan Tampilkan</div>
										<?php else : ?>
										<div style = "cursor: pointer;" class="dropdown-item" onclick = "unhide(<?php echo $user['card_id']; ?>);"><i class="dw dw-eye"></i>Tampilkan</div>
										<?php endif; ?>
									</div>
								</div>
							</td>
						</tr>
						<?php endforeach; ?>
						<script type="text/javascript">
							function hide(idnya){
									$(document).ready(function(){
											var kode = "hidenews";
												$.ajax({
													url: 'function.php',
													type: 'POST',
													data: { idnya:idnya,kode:kode},
													success: function(response){
													if(response == 1){
														alert('Kartu Berhasil Tidak Ditampilkan');
														window.location.reload();
													}else if(response == 99){
														 alert('Password Does Not Match');
													 }else if(response == 999){
														 alert('Email Is Already Taken');
													 }else if(response == 9999){
															 alert('Username Is Already Taken');
														 }else{

													 }
													}
												});
									});
							}
						</script>
						<script type="text/javascript">
							function unhide(idnya){
									$(document).ready(function(){
											var kode = "unhidenews";
												$.ajax({
													url: 'function.php',
													type: 'POST',
													data: { idnya:idnya,kode:kode},
													success: function(response){
													if(response == 1){
														alert('Kartu Berhasil Ditampilkan');
														window.location.reload();
													}else if(response == 99){
														 alert('Password Does Not Match');
													 }else if(response == 999){
														 alert('Email Is Already Taken');
													 }else if(response == 9999){
															 alert('Username Is Already Taken');
														 }else{

													 }
													}
												});
									});
							}
						</script>
						<script type="text/javascript">
							function deleteaccountadmin(iduser){
									$(document).ready(function(){
											var deleteid = iduser;
											var kode = "hapususer";
											<?php if($admin["notif"] == "y") : ?>
											var confirmalert = confirm("Apakah Kamu Yakin Ingin Menghapus Ini?");
											<?php else : ?>
											var confirmalert = true;
											<?php endif; ?>
											if (confirmalert == true){
												$.ajax({
													url: 'function.php',
													type: 'POST',
													data: {deleteid:deleteid,kode:kode},
													success: function(response){
													if(response == 1){
														<?php if($admin["notif"] == "y") : ?>
														alert('Kartu Berhasil Dihapus');
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
	<?php require 'js.php'; ?>
</body>
</html>
