<!DOCTYPE html>
<html>
<?php
$thamuz = "a";
require 'function.php';
session_start();
if(!isset($_SESSION["idd"])){
$_SESSION = [];
session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}
global $connt;
$admin = mysqli_fetch_assoc(mysqli_query($connt, "SELECT * FROM data_admin"));
echo $_SESSION["idd"];

        function logout(){
            $_SESSION = [];
            session_unset();
            session_destroy();
          header("Location:login1.php");
        }
?>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Admin - Template</title>

	<!-- Site favicon -->
	<link rel="icon" type="image/png" sizes="16x16" href="../eidmubarakpira.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
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

<?php
if(empty($thamuz)){
  header("Location: login1.php");
}
else{

}

if(!empty($_SESSION['idd'])){
  $ididid = $_SESSION['idd'];
}
else{
  $ididid = "";
}

var_dump($_SESSION['idd']);
var_dump($thamuz);

if(!empty($ididid)){
  $users = mysqli_query($connt, "SELECT * FROM data_admin WHERE id = $ididid");
  $user = mysqli_fetch_assoc($users);
}
?>
<?php
$tanggal = date('d') . ' ' . date('F') . ' ' . date('Y');
?>
<style media="screen">
  .header-left{
    width: 70%!important;
  }
  .header-right{
    width: 30%!important;
  }
</style>
<div class="header" id = "header">
  <div class="header-left">
    <div class="menu-icon dw dw-menu"></div>
    <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
    <div class="header-search">
      <form>
        <div class="form-group mb-0">
          <h5 style = "text-align: center;"><?= $tanggal; ?></h5>
        </div>
      </form>
    </div>
  </div>
  <div class="header-right">
    <!--
    <div class="user-notification">
      <div class="dropdown">
        <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
          <i class="icon-copy dw dw-notification"></i>
          <span class="badge notification-active"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="notification-list mx-h-350 customscroll">
            <ul>
              <li>
                <a href="#">
                  <img src="vendors/images/img.jpg" alt="">
                  <h3>John Doe</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                </a>
              </li>
              <li>
                <a href="#">
                  <img src="vendors/images/photo1.jpg" alt="">
                  <h3>Lea R. Frith</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                </a>
              </li>
              <li>
                <a href="#">
                  <img src="vendors/images/photo2.jpg" alt="">
                  <h3>Erik L. Richards</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                </a>
              </li>
              <li>
                <a href="#">
                  <img src="vendors/images/photo3.jpg" alt="">
                  <h3>John Doe</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                </a>
              </li>
              <li>
                <a href="#">
                  <img src="vendors/images/photo4.jpg" alt="">
                  <h3>Renee I. Hansen</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                </a>
              </li>
              <li>
                <a href="#">
                  <img src="vendors/images/img.jpg" alt="">
                  <h3>Vicki M. Coleman</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  -->
    <div class="user-info-dropdown">
      <div class="dropdown">
        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
          <span class="user-icon">
            <img src="../eidmubarakpira.png" alt="">
          </span>
          <span class="user-name">&nbsp;<?php echo $user["username"]; ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
          <a class="dropdown-item" style = "cursor: pointer!important;" onclick = "logout();"><i class="dw dw-logout"></i> Log Out</a>
        </div>
      </div>
    </div>
  </div>
</div>


	<?php
if(empty($thamuz)){
  header("Location: login.php");
}
else{

}
?>
<div class="left-side-bar">
  <div class="brand-logo">
    <a href="" style = "display: flex; align-items: flex-end!important;">
      <img style = "margin-left: auto; margin-right: auto; padding-bottom: 5px!important;" src="../eidmubarakpira.png" alt="" class="light-logo" width = "45">
      <p style = "font-size: 14px; line-height: 15px; text-align: center; margin-left: 2px;">Admin - Template</p>
    </a>
    <div class="close-sidebar" data-toggle="left-sidebar-close">
      <i class="ion-close-round"></i>
    </div>
  </div>
  <div class="menu-block customscroll">
    <div class="sidebar-menu">
      <ul id="accordion-menu">
        <li class="dropdown">
          <a href="index.php" class="dropdown-toggle no-arrow">
            <span class="micon dw dw-home"></span><span class="mtext">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="kartu.php" class="dropdown-toggle no-arrow">
            <span class="micon dw dw-image"></span><span class="mtext">Kartu</span>
          </a>
        </li>
        <li>
          <a href="admin.php" class="dropdown-toggle no-arrow">
            <span class="micon dw dw-user"></span><span class="mtext">Admin</span>
          </a>
        </li>
        <li>
          <a href="login.php?logout=yes" class="dropdown-toggle no-arrow">
            <span class="micon dw dw-logout"></span><span class="mtext">Logout</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>


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
								<div class="weight-600 font-14" style = "color: #00ff00; width: 80px; text-align: center;"><a style = "color: #00ff00;" href = "kartu.php">Kartu</a></div>
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
