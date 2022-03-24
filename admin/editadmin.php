<?php
if( !isset($_GET["id"]) ){
  header("Location: index.php");
}

?>

<!DOCTYPE html>
<html>
<?php require 'head.php'; ?>
<style media="screen">
  #cont{
    margin-top: -20px;
  }
  #cont .profil{
    display: flex;
    justify-content: center;
    position: relative;
    width: 100px;
    margin: auto;
  }

  #cont .profil > img{
    border: 6px solid #eaeaea;
    border-radius: 50%;
    width: 100px;
  }

  #cont .profil .round{
    background: #80BDFF;
    width: 32px;
    height: 32px;
    line-height: 32px;
    text-align: center;
    border-radius: 50%;
    cursor: pointer;
    position: absolute;
    bottom: 0;
    right: 0;
  }

  #cont .profil input{
    opacity: 0;
    position: absolute;
    width: 32px;
    height: 37px;
    z-index: 2;
    cursor: pointer;
    box-sizing: content-box;
    border-radius: 50%;
    bottom: -2px;
    right: 0px;
  }

  input[type=file], /* FF, IE7+, chrome (except button) */
  input[type=file]::-webkit-file-upload-button { /* chromes and blink button */
      cursor: pointer;
  }

  #cont .profil .round img{
    margin-top: 4px;
  }

  @media (max-width: 768px){
    #nbsp{
      display: none;
    }
  }

  @media (max-width: 768px){
    #flexit{
      flex-direction: column!important;
      align-items: center!important;
      width: 100%;
    }

    #flexit button{
      display: block!important;
      width: 100%!important;
    }

    #flexit div{
      width: 100%;
    }

    #flexit .btn-primary{
      margin-top: -30px!important;
    }
  }
</style>
<body>
  <?php
  $zilong = $_GET["id"];
  $yujao = mysqli_query($connt, "SELECT * FROM data_admin WHERE id = '$zilong'");

  if(mysqli_num_rows($yujao) == 0){
    header("Location: admin.php");
  }
  ?>
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
								<h4>Edit Admin</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="../banksampah/admin.php">Admin</a></li>
									<li class="breadcrumb-item active" aria-current="page">EditAdmin</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
        <?php
        $cuid = $_GET["id"];
        $yuyuop = mysqli_fetch_assoc(mysqli_query($connt, "SELECT * FROM data_admin WHERE id = $cuid"));
        ?>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 card-box mb-30" style = "padding-bottom: 5px!important;">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue">Edit Admin</h4>
						</div>
					</div>
          <div class="row" style = "display: flex; flex-direction: column; align-items: center; text-align: center!important; padding-bottom: 40px;">
          </div>
					<form id = "myForm" method = "post" action = "" autocomplete = "off">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Email</label>
							<div class="col-sm-12 col-md-10">
                <input type="hidden" name="id" id = "id" value="<?php echo $yuyuop['id']; ?>">
                <input type="hidden" name="usernameconfirm" id = "usernameconfirm" value="<?php echo $yuyuop['username']; ?>">
                <input type="hidden" name="emailconfirm" id = "emailconfirm" value="<?php echo $yuyuop['email']; ?>">
								<input required type="text" class="form-control" id = "email" name = "email" maxlength="39" value = "<?php echo $yuyuop['email']; ?>" spellcheck="false">
							</div>
            </div>
            <div class="form-group row">
  						<label class="col-sm-12 col-md-2 col-form-label">Username</label>
  						<div class="col-sm-12 col-md-10">
  							<input required type="text" class="form-control" id = "username" name = "username" maxlength="17" value = "<?php echo $yuyuop['username']; ?>" spellcheck="false">
  						</div>
  					</div>
            <div class="form-group row">
  						<label class="col-sm-12 col-md-2 col-form-label">Password</label>
  						<div class="col-sm-12 col-md-10">
  							<input type="password" class="form-control" id = "password" name = "password" maxlength="49" spellcheck="false">
  						</div>
              <label class="col-sm-12 col-md-2 col-form-label" id = "nbsp">&nbsp;</label>
              <div class = "col-sm-12 col-md-10">
                <p style = "color: red; font-size: 14px!important;">Leave it blank if don't change the password</p>
              </div>
  					</div>
            <div class="form-group row">
              <div id="flexit" style = "margin-top: -40px!important; position: relative; display: flex; justify-content: flex-end; flex-direction: row; width: 100%; padding-left: 15px; padding-right: 15px;">
                <div class="mt-5 text-right"><button class="btn btn-primary" type="submit" onclick = "jadi();" name = "submit" id = "submit">Save</button></div>
              </div>
            </div>
					</form>
				</div>
        <script type="text/javascript">
        var form = document.getElementById("myForm");
        function handleForm(event) { event.preventDefault(); }
        form.addEventListener('submit', handleForm);
        </script>
        <script type="text/javascript">
          function jadi(){
              $(document).ready(function(){
                  var id = document.getElementById('id').value;
                  var username = document.getElementById('username').value;
                  var email = document.getElementById('email').value;
                  var password = document.getElementById('password').value;
                  var usernameconfirm = document.getElementById('usernameconfirm').value;
                  var emailconfirm = document.getElementById('emailconfirm').value;
                  var kode = "editadmin";
                    $.ajax({
                      url: 'function.php',
                      type: 'POST',
                      data: {id:id,username:username,email:email,password:password,usernameconfirm:usernameconfirm,emailconfirm:emailconfirm,kode:kode},
                      success: function(response){
                      if(response == 1){
                        alert('Successfully Changed!');
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
				<!-- Default Basic Forms End -->



			</div>
			<?php require 'footer-wrap.php'; ?>
		</div>
	</div>
	<?php require 'js.php'; ?>
</body>
</html>
