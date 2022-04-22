<?php require 'session.php'; ?>
<?php require 'connt.php'; ?>
<?php require 'sessionin.php'; ?>
<?php
function query($query){
	global $connt;
	$result = mysqli_query($connt, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}

	return $rows;
}
?>
<!DOCTYPE html>
<html>
<?php require 'head.php'; ?>
<style media="screen">
	body{
		overflow-x: hidden!important;
	}
	#DataTables_Table_0_wrapper{
		overflow-x:hidden!important;
	}
	#DataTables_Table_0_wrapper > .row > .col-sm-12{
		overflow-x: scroll!important;
		width: 100%!important;
	}
	#DataTables_Table_0_wrapper > .row > .col-md-6{
    overflow: hidden!important;
		margin-top: 10px!important;
  }
  #DataTables_Table_0_wrapper > .row > .col-md-5{
    overflow: hidden!important;
  }
  #DataTables_Table_0_wrapper > .row > .col-md-7{
    overflow: hidden!important;
		margin-top: 10px!important;
  }
	#namaberita{
    max-width: 120px!important;
    white-space: normal!important;
  }
</style>
<body>
	<?php require 'header.php'; ?>
	<?php require 'left-side-bar.php'; ?>

	<div class="mobile-menu-overlay"></div>
  <div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
        <div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Data Table Kartu</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Kartu</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
        <!-- Simple Datatable start -->
				<div class="card-box mb-30" id = "tableka">
					<div class="pd-20" style = "display: flex; align-items: center; justify-content: space-between; padding-right: 20px; box-sizing: border-box;">
						<h4 class="text-blue h4">Data Table Kartu</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th>#</th>
									<th>Kartu</th>
									<th>Email Pengirim</th>
									<th>Nama Kartu</th>
                  <th>Status</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
                <?php
    							$userfull = query("SELECT * FROM card ORDER BY card_id DESC");
									$i = 1;
    						?>
    						<?php foreach($userfull as $user) : ?>
								<tr id = "<?php echo $user['card_id']; ?>">
									<td id = "<?php echo $user['card_id']; ?>"><?php echo $i; ?></td>
									<?php
									$iduser = $user["card_id"];
									?>
                  <td> <img src="../usersUpload/<?php echo $user['image']; ?>" alt="" width = 400> </td>
									<td><?php echo $user["email"]; ?></td>
                  <td><?php echo $user["imageName"]; ?></td>
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
									<td id = "<?php echo $user['card_id']; ?>">
										<div class="dropdown" id = "<?php echo $user['card_id']; ?>">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
    										<div style = "cursor: pointer;" class="dropdown-item" onclick = "deleteaccountadmin(<?php echo $user['card_id']; ?>);"><i class="dw dw-delete-3"></i> Delete</div>
												<?php if($user["approval"] == 1) : ?>
												<div style = "cursor: pointer;" class="dropdown-item" onclick = "hide(<?php echo $user['card_id']; ?>);"><i class="dw dw-hide"></i>Jangan Tampilkan</div>
												<?php else : ?>
												<div style = "cursor: pointer;" class="dropdown-item" onclick = "unhide(<?php echo $user['card_id']; ?>);"><i class="dw dw-eye"></i>Tampilkan</div>
												<?php endif; ?>
											</div>
                      <script type="text/javascript">
          							function deleteaccountadmin(iduser){
          									$(document).ready(function(){
          											var deleteid = iduser;
          											var kode = "hapususer";
          											var confirmalert = confirm("Apakah Kamu Yakin Ingin Menghapus Kartu Ini?");
          											if (confirmalert == true){
          												$.ajax({
          													url: 'function.php',
          													type: 'POST',
          													data: {deleteid:deleteid,kode:kode},
          													success: function(response){
          													if(response == 1){
          														alert('Kartu Berhasil Dihapus');
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
										</div>
									</td>
								</tr>
								<?php $i++; ?>
                <?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- Simple Datatable End -->
      </div>
      <?php require 'footer-wrap.php'; ?>
    </div>
  </div>
	<!-- js -->
	<?php require 'js.php'; ?>
  <!-- buttons for Export datatable -->
	<script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="src/plugins/datatables/js/pdfmake.min.js"></script>
	<script src="src/plugins/datatables/js/vfs_fonts.js"></script>
	<!-- Datatable Setting js -->
	<script src="vendors/scripts/datatable-setting.js"></script></body>
</body>
</html>