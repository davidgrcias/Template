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
	#hirow{
	  border-radius: 0px!important;
	  display: flex;
	  justify-content: space-between!important;
		width: 98%;
		margin: auto;
	}

	#hirow form{
	  width: 100%!important;
	  display: flex;
	  justify-content: space-between!important;
	}
	#hirow form .left{
		width: 100%!important;
	}
	#hirow form .left select{
	  width: 20%;
	  padding: 10px 10px 10px 10px;
	  border-color: #DCDCDC;
	}
</style>
<body>
	<script>
		const xhttp = new XMLHttpRequest();
		xhttp.onload = function() {
			document.getElementById("pb-20").innerHTML = this.responseText;
		}
		xhttp.open("GET", "getbulan.php?q=semua&i=semua");
		xhttp.send();
	</script>
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
								<h4>Data Table Laporan Sampah</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="../banksampah/">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Laporan</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
        <!-- Simple Datatable start -->
				<div class="card-box mb-30" id = "tableka">
					<div class="pd-20" style = "display: flex; align-items: center; justify-content: space-between; padding-right: 20px; box-sizing: border-box;">
						<h4 class="text-blue h4">Data Table Laporan Sampah</h4>
					</div>
					<div class="row" id = "hirow">
            <form class="" id = "myForm" action="" method="post">
							<div class="left">
								<select class="bulan" name="bulan" id = "bulan" style = "background: white!important;" onchange="showBulan(this.value,$('select[name=tahun]').val())">
	                <option value="semua" selected>SEMUA (Bulan)</option>
	                <option value="January">Januari</option>
	                <option value="February">Februari</option>
	                <option value="March">Maret</option>
	                <option value="April">April</option>
	                <option value="May">Mei</option>
	                <option value="June">Juni</option>
	                <option value="July">Juli</option>
	                <option value="August">Agustus</option>
	                <option value="September">September</option>
	                <option value="October">Oktober</option>
	                <option value="November">November</option>
	                <option value="Desember">Desember</option>
	              </select>
								<select class="tahun" name="tahun" id = "tahun" style = "background: white!important;" onchange="showBulan($('select[name=bulan]').val(),this.value)">
	                <option value="semua" selected>SEMUA (Tahun)</option>
									<?php  for ($i=2022; $i < 2060; $i++) : ?>
									<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
									<?php endfor; ?>
	              </select>
							</div>
              <div class="right">

              </div>
            </form>
						<script>
							function showBulan(str,btr) {
							  const xhttp = new XMLHttpRequest();
							  xhttp.onload = function() {
							    document.getElementById("pb-20").innerHTML = this.responseText;
							  }
							  xhttp.open("GET", "getbulan.php?q="+str+"&i="+btr);
							  xhttp.send();
							}
						</script>
          </div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
						    <tr>
						      <th class="datatable-nosort">#</th>
						      <th class="datatable-nosort">Nama</th>
						      <th class="datatable-nosort">Tanggal</th>
						      <th class="datatable-nosort">Area</th>
						      <th class="datatable-nosort">Jenis</th>
						      <th class="datatable-nosort">Jumlah (KG)</th>
						      <th class="datatable-nosort">Total Harga</th>
						      <th class="datatable-nosort">Action</th>
						    </tr>
						  </thead>
							<tbody id = "pb-20">

							</tbody>
						</table>
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
	<script src="vendors/scripts/datatable-setting.js"></script>
</body>
</html>
