<?php

if(isset($_GET['logout'])){
$_SESSION = [];
session_unset();
session_destroy();
setcookie ("id", "", time() - 10);
setcookie ("key", "", time() - 10);
}
$thamuz = "a";
require 'function.php';
session_start();
global $connt;
$admin = mysqli_fetch_assoc(mysqli_query($connt, "SELECT * FROM data_admin"));

  if(isset($_SESSION['idd'])){
    header("Location: index.php");
  }
  else{
      
  }
if(isset($_POST['submit'])){
  $usernameemail = strtolower(htmlspecialchars($_POST["usernameemail"]));
  $password = strtolower(htmlspecialchars($_POST["password"]));

  $result = mysqli_query($connt, "SELECT * FROM data_admin WHERE username = '$usernameemail' OR email = '$usernameemail'");
  if (mysqli_num_rows($result) >= 1){

    $row = mysqli_fetch_assoc($result);

    if (password_verify($password, $row["password"])){
        $_SESSION["loginn"] = true;
        $_SESSION["idd"] = $row["id"];
        header("Location: index.php?".$_SESSION["idd"]);
    }
    else{
		echo'Wrong Password';
      exit;
    }
  }
  else{
    echo'Email or Username Is Not Registered';
    exit;
  }
}
?>
<!DOCTYPE html>
<html>
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
<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="login.php">
					<h2>Template</h2>
				</a>
			</div>
		</div>
	</div>

	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-5" style = "margin: auto!important;">
					<div class="login-box bg-white box-shadow border-radius-10" style = "margin: auto!important;">
						<div class="login-title">
							<h2 class="text-center text-primary">Login To Admin</h2>
						</div>
						<form id = "myForm" method = "post" action = "" autocomplete = "off">
							<div class="input-group custom">
								<input type="text" required class="form-control form-control-lg" id = "usernameemail" name = "usernameemail" placeholder="Username or Email" maxlength = "40" spellcheck = "false">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input required type="password" class="form-control form-control-lg" placeholder="********" id = "password" name = "password" maxlength="49" spellcheck="false">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<input class="btn btn-primary btn-lg btn-block" type="submit" name = "submit" id = "submit"></input>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
</body>
</html>
