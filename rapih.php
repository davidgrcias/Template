<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Convert HTML To Image</title>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
    </script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js">
    </script>
  </head>
  <style media="screen">
.bgcolor {
	position:relative;
	width: 920px;;
	height: 1840px;
	background-image:url('bgcolor/bgc1.JPG');
	background-size: 100% repeat;
}

   .bottombutton{
     font-size:3vw;
     left:50%;
     color:white;
     padding:20px;
     background-color:lightgray;
     border-radius:50px;
     box-shadow: 5px 5px 10px 5px rgba(0,0,0,0.5);
   }
  </style>
  <body onload = "autoClick();">
  <br>
  <span class="bottombutton">
    <a id="download">Download</a>
  </span>
  <span class="bottombutton" style="margin-left:10px;">
    <a onclick="history.go(-1)">Kembali</a>
  </span>
<br><br><br>
    <div id = "htmlContent">
    <center>
      <!-- ini ntar ambil semua data trus itung ada berapa kan nah trus digituin -->
  <!-- <div class="col-md-7"> -->
          
    <div class="bgcolor" id="bgc">
      <div style="overflow: hidden;position:relative;top:4%;width:80%;border-radius:10px;box-shadow: 1px 1px 5px 0px rgba(0,0,0,0.5);">
          <img src="usersUpload/<?= 'Bunga - 2022.03.24 - 05.24.10am.jpeg' ?>" class="imagethumbnail" style="width:780px;height:1065px;">
      </div>
		<div style="margin:15% 8% 0 8%;width:84%;box-sizing:border-box;">
			<p style="text-align:left;font-size: 25px; line-height:70px;height:50px; width:40%;box-sizing: border-box;--background: transparent;border-radius: 15px;color: #3c3222;padding-left:10px;outline-width: 1px;outline-color:#ff4c4d;float:left;">Kepada: </p>
      <br><br><br><br><br>
      
			<p style="font-size: 25px; line-height:70px;height:180px; width:100%;box-sizing: border-box;--background: transparent;border-radius: 15px;color: #3c3222;padding-left:10px;outline-width: 1px;outline-color:#ff4c4d;margin-top:20px;margin-bottom:20px;text-align:center;">Isi</p>

      <br><br>
      
				<p style='align:right;text-align:right;float:right;font-size: 25px; line-height:70px;height:50px; width:40%;box-sizing: border-box;--background: transparent;border-radius: 15px;color: #3c3222;padding-right:10px;outline-width: 1px;outline-color:#ff4c4d;'>Dari :</p>

			<div style='margin-top:40px; float:left; font-size:30px;'>

			
			</div><!-- /style -->

			<div style='clear:both;text-align:center; margin-top:240px;'>
			</div>

<div style='height:200px;'></div>

    </div> <!-- /cardBase -->
  <!-- </div> --> <!-- col-md-7 -->
</div>
</center>
    </div>
    
    <script type="text/javascript">
      function autoClick(){
        $("#download").click();
      }

      $(document).ready(function(){
        var element = $("#htmlContent");
        $("#download").on('click', function(){

          html2canvas(element, {
            onrendered: function(canvas) {
              var imageData = canvas.toDataURL("image/jpg");
              var newData = imageData.replace(/^data:image\/jpg/, "data:application/octet-stream");
              $("#download").attr("download", "image.jpg").attr("href", newData);
            }
          });
        });
      });
    </script>
  </body>
</html>
