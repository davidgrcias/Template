<?php
$con = mysqli_connect("localhost","root","","template");
if (!$con) {
  die('Could not connect: ' . mysqli_error());
}

$id = $_GET['id'];
$result = mysqli_query($con,"SELECT * FROM card WHERE card_id='$id'");
$row = mysqli_num_rows($result);
$rows=[]; //kotk kosong

    while ($rowa /*bajunya */= mysqli_fetch_assoc($result)){
        $rows=$rowa; //baju masukin kotaknya ga bawa lemari
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
  font-size:2vw;
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
  border-bottom: 2px solid #ccc;
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
    font-size:1.5vw;
}
    
.moon{
     position: absolute;
     top: 8%;
     left: 40%;
     transform: translate(-50%, -50%);
     height: 10vw;
     width: 10vw;
     box-shadow: -15px 15px 0 5px white  ;
     border-radius: 50%;
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
	background-image:url('bgcolor/bgc1.JPG');
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
	font-size: 25px; line-height:70px;
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
    </style>
<script>
function myFunction() {
   document.getElementById("bgc").style.backgroundImage = "url(bgcolor/bgc1.JPG)";
}
function myFunction2() {
   document.getElementById("bgc").style.backgroundImage = "url(bgcolor/bgc2.JPG)";
}
function myFunction3() {
   document.getElementById("bgc").style.backgroundImage = "url(bgcolor/bgc3.JPG)";
}
function myFunction4() {
   document.getElementById("bgc").style.backgroundImage = "url(bgcolor/bgc4.JPG)";
}
function myFunction5() {
   document.getElementById("bgc").style.backgroundImage = "url(bgcolor/bgc5.JPG)";
}
function myFunction6() {
   document.getElementById("bgc").style.backgroundImage = "url(bgcolor/bgc6.JPG)";
}
</script>
</head>
<body>
<div class="moon"></div>
<div class="container">
<div class="stepper-wrapper">
      <div class="stepper-item completed">
        <div class="step-counter"><a href="p2.php">1</a></div>
        <div class="step-name">Pilihan Kartu Ucapan</div>
      </div>
      <div class="stepper-item completed">
        <div class="step-counter"><a href="">2</a></div>
        <div class="step-name">Tulis Pesan Anda</div>
      </div>
      <div class="stepper-item">
        <div class="step-counter">3</div>
        <div class="step-name">Kirim Kartu</div>
      </div>
    </div>
<center>
      <!-- ini ntar ambil semua data trus itung ada berapa kan nah trus digituin -->
  <!-- <div class="col-md-7"> -->
          <div class="caption">
            <p>Card Name : <?php echo $rows["imageName"] ?></p>
          </div>
          
    <div class="bgcolor" id="bgc">
      <div class="thumbnail">
          <img src="usersUpload/<?php echo $rows["image"] ?>" class="imagethumbnail" style="width:100%">
      </div>
      <div class='colorSelect'>
			  <div class='csBox' onclick="myFunction()"><img src='bgcolor/bgc1.JPG'></div>
			  <div class='csBox' onclick="myFunction2()"><img src='bgcolor/bgc2.JPG'></div>
			  <div class='csBox' onclick="myFunction3()"><img src='bgcolor/bgc3.JPG'></div>
			  <div class='csBox' onclick="myFunction4()"><img src='bgcolor/bgc4.JPG'></div>
			  <div class='csBox' onclick="myFunction5()"><img src='bgcolor/bgc5.JPG'></div>
			  <div class='csBox' onclick="myFunction6()"><img src='bgcolor/bgc6.JPG'></div>
		  </div>

    <form method='POST' action='p4.php'>
		  <input type='hidden' name='card_id' value='<?php echo $rows["card_id"] ?>' >
		  <input type='hidden' name='bgc' value='' >
		  <input type='hidden' name='' value='' >

		<div class='isiform' >
			<input type='text' name='kepada' class='kepada' value='Kepada' >
			<textarea class='isi' name='isi'>Isi</textarea>

			<div style='text-align:right;'>
				<input type='text' name='dari' class='dari' value='Dari'>
			</div>

			<div style='margin-top:40px; float:left; font-size:30px;'>

			Meditasi:<select class='pilihan'>
        <option value=''>* Mengutip Jing Si *</option>
        <option value=''>Meditasi 1</option>
        <option value=''>Meditasi 2</option>
        <option value=''>Meditasi 3</option>
        <option value=''>Meditasi 4</option>
        <option value=''>Meditasi 5</option>
      </select>
<br>
      Berkat:<select class='pilihan' name="">
        <option value=''>* Kata-kata keberuntungan *</option>
        <option value=''>Berkat 1</option>
        <option value=''>Berkat 2</option>
        <option value=''>Berkat 3</option>
        <option value=''>Berkat 4</option>
        <option value=''>Berkat 5</option>
      </select>
			</div><!-- /style -->

			<div style='clear:both;text-align:center; margin-top:240px;'>
				<input type='submit' value='Selesai!' name="submit">
			</div>
		</form>

<div style='height:200px;'></div>

    </div> <!-- /cardBase -->
  <!-- </div> --> <!-- col-md-7 -->
</div>
</center>
</body>
</html>