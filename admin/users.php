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
	<?php require 'pre-loader.php'; ?>

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
								<h4>Data Table Users</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="../banksampah/">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Users</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
        <!-- Simple Datatable start -->
				<div class="card-box mb-30" id = "tableka">
					<div class="pd-20" style = "display: flex; align-items: center; justify-content: space-between; padding-right: 20px; box-sizing: border-box;">
						<h4 class="text-blue h4">Data Table Users</h4>
						<a href="adduser.php" class = "btn btn-success">Add User</a>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th>#</th>
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
    							$userfull = query("SELECT * FROM data_user ORDER BY id DESC");
									$i = 1;
    						?>
    						<?php foreach($userfull as $user) : ?>
								<tr id = "<?php echo $user['id']; ?>">
									<td id = "<?php echo $user['id']; ?>"><?php echo $i; ?></td>
									<td id = "namaberita"><?php echo $user["nama"]; ?></td>
									<td id = "<?php echo $user['id']; ?>"><?php echo $user["email"]; ?></td>
									<td><?php echo $user["tanggal"]; ?></td>
									<td id = "<?php echo $user['id']; ?>"><?php $iduser = $user["id"]; ?>
  								<?php echo count(query("SELECT * FROM sampah WHERE iduser = $iduser")); ?></td>
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
									<td id = "<?php echo $user['id']; ?>">
										<div class="dropdown" id = "<?php echo $user['id']; ?>">
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
								<?php $i++; ?>
                <?php endforeach; ?>
							</tbody>
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
														url: '../banksampah/function.php',
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
