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
								<h4>Data Table Sampah</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="../banksampah/">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Sampah</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
        <!-- Simple Datatable start -->
				<div class="card-box mb-30" id = "tableka">
					<div class="pd-20" style = "display: flex; align-items: center; justify-content: space-between; padding-right: 20px; box-sizing: border-box;">
						<h4 class="text-blue h4">Data Table Sampah</h4>
						<a href="addsampah.php" class = "btn btn-success">Add Sampah</a>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th>#</th>
									<th>Nama</th>
									<th>Tanggal</th>
									<th>Area</th>
									<th>Jenis</th>
                  <th>Jumlah (KG)</th>
                  <th>Total Harga</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
                <?php
    							$userfull = query("SELECT * FROM sampah ORDER BY id DESC");
									$i = 1;
    						?>
    						<?php foreach($userfull as $user) : ?>
								<tr id = "<?php echo $user['id']; ?>">
									<td id = "<?php echo $user['id']; ?>"><?php echo $i; ?></td>
									<?php
									$iduser = $user["iduser"];
									$selectuser = mysqli_fetch_assoc(mysqli_query($connt, "SELECT * FROM data_user WHERE id = $iduser"));
									$selectusernama = $selectuser["nama"];
									?>
									<td><?php echo $selectusernama; ?></td>
                  <td><?php echo $user["tanggal"]; ?></td>
                  <td><?php echo $user["area"]; ?></td>
									<?php
									$idjenis = $user["jenis"];
									$selectjenis = $selectuser = mysqli_fetch_assoc(mysqli_query($connt, "SELECT * FROM jenis WHERE id = $idjenis"));
									$selectjenisnama = $selectjenis["jenis"];
									?>
                  <td><?php echo $selectjenisnama; ?></td>
                  <td><?php echo $user["jumlah"]; ?> Kg</td>
                  <td><?php
									echo number_format($user["totalharga"], 0, '', '.');
									?>
									</td>
									<td id = "<?php echo $user['id']; ?>">
										<div class="dropdown" id = "<?php echo $user['id']; ?>">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
    										<a class="dropdown-item" href="editsampah.php?id=<?php echo $user['id']; ?>"><i class="dw dw-edit2"></i> Edit</a>
    										<div style = "cursor: pointer;" class="dropdown-item" onclick = "deleteaccountadmin(<?php echo $user['id']; ?>);"><i class="dw dw-delete-3"></i> Delete</div>
											</div>
                      <script type="text/javascript">
          							function deleteaccountadmin(iduser){
          									$(document).ready(function(){
          											var deleteid = iduser;
          											var kode = "deletesampah";
          											<?php if($admin["notif"] == "y") : ?>
          											var confirmalert = confirm("Are You Sure You Want To Delete This Sampah?");
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
          														alert('Sampah Deleted Successfully');
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
