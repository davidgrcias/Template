<?php
if(!isset($_GET["id"])){
  header("Location: p1.php");
}
$con = mysqli_connect("localhost","root","","template");
if (!$con) {
  die('Could not connect: ' . mysqli_error());
}
$acak='none';
function generate(){
  global $acak;
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i <5; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];

  $acak= $randomString;
}
}
function urlmaking(){
  global $con,$acak;
  generate();
$checking=mysqli_query($con, "SELECT * FROM card_end WHERE unique_name='$acak'");
$row = mysqli_num_rows($checking);
if ($row>=1) {
  urlmaking();
}
}

$id = $_GET['id'];
$indomie = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM card_end"));
$kumpulan = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM card WHERE card_id = $id"));
$result = mysqli_query($con,"SELECT * FROM card WHERE card_id='$id'");
$row = mysqli_num_rows($result);
$rows=[]; //kotk kosong

    while ($rowa /*bajunya */= mysqli_fetch_assoc($result)){
        $rows=$rowa; //baju masukin kotaknya ga bawa lemari
    }

if(isset($_POST['selesai']))
{
  urlmaking();

  $card_id = $_POST['card_id'];
  $imageName = $_POST['imageName'];
  $image = $_POST['image'];
  $bgcolor = $_POST['bgcolor'];
  $kepada = $_POST['kepada'];
  $isi = $_POST['isi'];
  $dari = $_POST['dari'];
  $textcolor = $_POST['text_color'];

  $sql= "INSERT INTO card_end VALUES ('','$card_id', '$kepada', '$isi', '$dari','$acak') ";
  $query = mysqli_query($con, $sql);

  $resultb = mysqli_query($con,"SELECT id_end FROM card_end ORDER BY id_end DESC limit 1");
  $rowk = mysqli_num_rows($resultb);
  $rowz=[]; //kotk kosong
  echo "<br>";
  while ($rowb /*bajunya */= mysqli_fetch_assoc($resultb)){
    $rowz=$rowb; //baju masukin kotaknya ga bawa lemari
}

  session_start();
  $_SESSION["card_now"]=$rowz["id_end"];
  $_SESSION["card_color"]=$bgcolor;
  $_SESSION["text_color"]=$textcolor;
    if($query) {
      header('Location: p3.php');
    } else {
      header('Location: p2.php?status=gagal');
          }
    }
?>

<!-- HTML -->
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Kartu Ucapan Idul Fitri 2022</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Mr+Dafoe&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Satisfy&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Satisfy&family=Volkhov:ital,wght@1,700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Concert+One&family=Creepster&display=swap');
        body {
  background-repeat: no-repeat;
  background-color: hsl(218, 41%, 15%);
  background-image: radial-gradient(
    650px circle at 50% 0%,
    hsl(218, 41%, 35%) 15%,
    hsl(218, 41%, 30%) 35%,
    hsl(218, 41%, 20%) 75%,
    hsl(218, 41%, 19%) 80%,
    transparent 100%
  );
}

    .stepper-wrapper {
  font-family: 'satisfy';
  font-size:25px;
  margin-top: 50px;
  display: flex;
  justify-content: space-between;
  margin-bottom: 20px;
  color:white;
}
.stepper-item {
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;
  flex: 1;

}

.stepper-item::before {
  position: absolute;
  content: "";
  border-bottom: 2px solid #ccc;
  width: 100%;
  top: 20px;
  left: -50%;
  z-index: 2;
}

.stepper-item::after {
  position: absolute;
  content: "";
  border-bottom: 2px solid #ccc;
  width: 100%;
  top: 20px;
  left: 50%;
  z-index: 2;
}

.stepper-item .step-counter {
  position: relative;
  z-index: 5;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: #0a2e16;
  margin-bottom: 6px;
}

.stepper-item.active {
  font-weight: bold;
}

.stepper-item.completed .step-counter {
  background-color: #4bb543;
}

.stepper-item.completed::after {
  position: absolute;
  content: "";
  border-bottom: 2px solid #00ff04;
  width: 100%;
  top: 20px;
  left: 50%;
  z-index: 3;
}

.stepper-item:first-child::before {
  content: none;
}
.stepper-item:last-child::after {
  content: none;
}
.step-name{
    font-family:'concert one';
    font-size:20px;
}

.moon{
  position: absolute;
     top: 8%;
     left: 40%;
     transform: translate(-50%, -50%);
     height: 100px;
     width: 100px;
     box-shadow: -15px 15px 0 5px white  ;
     border-radius: 50%;
     z-index: -1;
    filter: blur(2px);
   }

   .thumbnail{
       overflow: hidden;
       position:relative;
	    top:4%;
	    width:80%;
	    /* left:10%; */
 	    border-radius:10px;
	    box-shadow: 1px 1px 5px 0px rgba(0,0,0,0.5);
   }
   .imagethumbnail{
       /* max-width:100%; */
       width: 773px;;
       height: 1064px;
       transition: all 1s ease;
   }
   .caption{
       text-align: center;
            font-family:"volkhov";
            font-size:40px;
            color: #b08d5b;
        }
        a {
            color:white;
            text-decoration: none;
        }
        a:hover{
            text-decoration: none;
        text-shadow:0px 0px 30px white;
        transition: all 0.2s ease-in;
        }

        .sticky-bottom-right {
  font-weight: bold;
  font-family:'creepster';
  font-size:2vw;
  position: absolute;
  right: 0;
  bottom: 0;
}

.bgcolor {
	position:relative;
	width: 960px;;
	height: 1920px;
  background-color:#0057B7;
  color:white;
	/* background-image:url('bgcolor/bgc1.JPG'); */
	background-size: 100% repeat;
}
.colorSelect {
	position:absolute;
	left:20px; top:300px;
	-border:1px solid red;
}
.colorSelect .csBox {
	margin:40px 0px;
	width:55px; height:55px;
	border:1px solid gray;
	--border-radius:25px;
	overflow:hidden;
	box-shadow:1px 1px 5px 1px rgba(0,0,0,0.3);
	box-sizing:border-box;
	cursor:pointer;
}
.colorSelect .csBox:hover {
	box-shadow:1px 1px 5px 1px rgba(0,0,0,0.5);
	border:1px solid silver;
}

.isiform {
	margin:15% 8% 0 8%;
	width:84%;
	box-sizing:border-box;
	--border:1px solid red;
}

.kepada {
	font-size: 25px; line-height:70px;
	height:50px; width:40%;
	box-sizing: border-box;
	--background: transparent;
	border: 2px solid #ff9999;
	border-radius: 15px;
	color: #3c3222;
	padding-left:10px;
	outline-width: 1px;
	outline-color:#ff4c4d;
	float:left;
}
.isi {
	font-size: 25px;
	height:180px; width:100%;
	box-sizing: border-box;

	--background: transparent;
	border: 2px solid #ff9999;
	border-radius: 15px;
	color: #3c3222;
	padding-left:10px;
	outline-width: 1px;
	outline-color:#ff4c4d;
	margin-top:20px;
	margin-bottom:20px;
	text-align:center;
}
.dari {
	font-size: 25px; line-height:70px;
	height:50px; width:40%;
	box-sizing: border-box;

	--background: transparent;
	border: 2px solid #ff9999;
	border-radius: 15px;
	color: #3c3222;
	padding-right:10px;
	outline-width: 1px;
	outline-color:#ff4c4d;
	--float:right;
	text-align:right;

}
input[type='submit'] {
	color:#00FF00;
	font-size:25px; font-weight:bold;
	background-color:#fafafa;
	min-width:7em;
	padding:10px;
	border:4px solid #b08d5b;
	border-radius:20px;
	cursor:pointer;
}
.pilihan {
	position:relative;
	margin-top:25px;
	display:inline-block;
	width:420px; max-width:420px;
	font-size:25px;
}

.step-name{
  cursor: pointer;
}

.step-counter{
  cursor: pointer;
}

    </style>
<script>
function myFunction() {
   document.getElementById("bgc").style.backgroundColor = "#0057B7";
   document.getElementById("bgcolor").value = "#0057B7";
   document.getElementById("ucapan").style.color = "white";
   document.getElementById("doa").style.color = "white";
   document.getElementById("textcolor").value = "white";
}
function myFunction2() {
   document.getElementById("bgc").style.backgroundColor = "#F1E6B2";
   document.getElementById("bgcolor").value = "#F1E6B2";
   document.getElementById("ucapan").style.color = "black";
   document.getElementById("doa").style.color = "black";
   document.getElementById("textcolor").value = "black";
}
function myFunction3() {
   document.getElementById("bgc").style.backgroundColor = "#7BA4DB";
   document.getElementById("bgcolor").value = "#7BA4DB";
   document.getElementById("ucapan").style.color = "white";
   document.getElementById("doa").style.color = "white";
   document.getElementById("textcolor").value = "white";
}
function myFunction4() {
   document.getElementById("bgc").style.backgroundColor = "#707372";
   document.getElementById("bgcolor").value = "#707372";
   document.getElementById("ucapan").style.color = "black";
   document.getElementById("doa").style.color = "black";
   document.getElementById("textcolor").value = "black";
}

var Doa=false;
function pilih1() {
	var o=document.getElementById('pilihan1');
	var theWord=o.value;
	// for(var i=1; i<5; i++)
  theWord=theWord.replace("<br>","\n");

	var tbox=document.getElementById('isi');

	tbox.value=theWord;

}
function pilih2() {
	var o=document.getElementById('pilihan2');
	var theWord2=o.value;

	var tbox=document.getElementById('isi');
	if (Doa>0) {
		tbox.value=theWord2;
	} else {
		tbox.value = tbox.value + theWord2;
	}
	Doa=0;
}
</script>
</head>
<body body onload = "autoClick();">
<div class="moon"></div>
<div class="container">
<div class="stepper-wrapper">
      <div class="stepper-item completed">
        <div class="step-counter"><a href="p1.php">1</a></div>
        <div class="step-name"><span onclick = "directp1();">Pilihan Kartu Ucapan</span></div>
      </div>
      <div class="stepper-item active" >
        <div class="step-counter" style="background-color: #4bb543;"><a href="">2</a></div>
        <div class="step-name" style="text-decoration:none;" onclick = "window.location.reload();">Tulis Pesan Anda</div>
      </div>
      <div class="stepper-item">
        <div class="step-counter" style = "cursor: not-allowed;">3</div>
        <div class="step-name" style = "cursor: not-allowed;">Kirim Kartu</div>
      </div>
    </div>
    <script type="text/javascript">
      function directp1(){
        document.location.href = "p1.php";
      }
      function directp2(){
        document.location.href = "p2.php";
      }
    </script>
<center>
      <!-- ini ntar ambil semua data trus itung ada berapa kan nah trus digituin -->
  <!-- <div class="col-md-7"> -->
          <div class="caption">
            <p>Card Name : <?php echo $kumpulan["imageName"] ?></p>
          </div>

    <div class="bgcolor" id="bgc">
      <div class="thumbnail">
          <img src="usersUpload/<?php echo $kumpulan["image"] ?>" class="imagethumbnail" style="width:100%">
      </div>
      <div class='colorSelect'>
			  <div class='csBox' onclick="myFunction()" style='background-color:#0057B7;'></div>
			  <div class='csBox' onclick="myFunction2()" style='background-color:#F1E6B2;'></div>
			  <div class='csBox' onclick="myFunction3()" style='background-color:#7BA4DB;'></div>
			  <div class='csBox' onclick="myFunction4()" style='background-color:#707372;'></div>
		  </div>

    <form method='POST' action=''>
		  <input type='hidden' name='card_id' value='<?php echo $rows["card_id"] ?>' >
		  <input type='hidden' name='imageName' value='<?php echo $rows["imageName"] ?>'>
		  <input type='hidden' name='image' value='<?php echo $rows["image"] ?>'>
		  <input type='hidden' name='bgcolor' id="bgcolor" value='#0057B7'>
		  <input type='hidden' name='text_color' id="textcolor" value='white'>

		<div class='isiform'>
			<input type='text' name='kepada' class='kepada' value='Kepada'>

			<textarea class='isi' name='isi' id="isi">Isi</textarea>

			<div style='text-align:right;'>
				<input type='text' name='dari' class='dari' value='Dari'>
			</div>

			<div style='margin-top:40px; float:left; font-size:30px;'>
      <script>
        function shortString(selector) {
        const elements = document.querySelectorAll(selector);
        const tail = '...';
        if (elements && elements.length) {
          for (const element of elements) {
            let text = element.innerText;
            if (element.hasAttribute('data-limit')) {
              if (text.length > element.dataset.limit) {
                element.innerText = `${text.substring(0, element.dataset.limit - tail.length).trim()}${tail}`;
              }
            } else {
              throw Error('Cannot find attribute \'data-limit\'');
            }
          }
        }
      }

      window.onload = function() {
        shortString('.short');
      };
      </script>
			<p id="ucapan" style="display: inline;">Ucapan:</p> <select id="pilihan1" size = "return this.length();" class='pilihan' style = "width: 100%;" onchange='pilih1()'>
        <option value=''>* Ucapan *</option>
        <option class="short" data-limit='70' value='Selamat hari raya idul fitri 1443 H.'>Selamat hari raya idul fitri 1443 H</option>
        <option class="short" data-limit='70' value='Bulan Ramadan beranjak pergi, semoga kita semua kembali fitri.'>Bulan Ramadan beranjak pergi, semoga kita semua kembali fitri</option>
        <option class="short" data-limit='70' value='Bulan suci Ramadan telah berlalu, fajar hari kemenangan tampak mewarnai langit, membawa sinar kedamaian dan kesucian.'>Bulan suci Ramadan telah berlalu, fajar hari kemenangan tampak mewarnai langit, membawa sinar kedamaian dan kesucian</option>
        <option class="short" data-limit='70' value='Ucapan 4.'>Ucapan 4</option>
        <option class="short" data-limit='70' value='Ucapan 5.'>Ucapan 5</option>
      </select>
<br>
      &nbsp&nbsp&nbsp&nbsp&nbsp<p id="doa" style="display: inline;">Doa:</p> <select id="pilihan2" class='pilihan' onchange='pilih2()'>
        <option value='' id = "doa">* Doa *</option>
        <option class="short" data-limit='70' value=' Taqabbalallahu minna wa minkum.'>Taqabbalallahu minna wa minkum 1</option>
        <option class="short" data-limit='70' value=' Mohon maaf lahir dan batin.'>Mohon maaf lahir dan batin</option>
        <option class="short" data-limit='70' value=' Di hari yang suci ini, semoga kita senantiasa diberikan ampunan dan diberkahi kegembiraan.'>Di hari yang suci ini, semoga kita senantiasa diberikan ampunan dan diberkahi kegembiraan</option>
        <option class="short" data-limit='70' value=' Doa 4.'>Doa 4</option>
        <option class="short" data-limit='70' value=' Doa 5.'>Doa 5</option>
      </select>
			</div><!-- /style -->

			<div style='clear:both;text-align:center; margin-top:240px;'>
				<input id="download" type='submit' value='Selesai!' name="selesai">
			</div>
		</form>

<div style='height:200px;'></div>

    </div> <!-- /cardBase -->
  <!-- </div> --> <!-- col-md-7 -->
</div>
</center>
<script type="text/javascript">
      function autoClick(){
        $("#download").click();
      }

      $(document).ready(function(){
        var element = $("#bgc");

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
