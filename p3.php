<?php
require 'config.php';
$tahap=$_SESSION['tahap'];
if($tahap!==2&&!isset($_GET["ides"])){
    header("Location:p1.php?notif=MohonIkutiTahapan");
}
if(!isset($_GET["ides"])&&!isset($_SESSION["tahap"])){
    header("Location:p1.php?notif=MohonIkutiTahapan");
}
$ourweb="https://sigantengs.000webhostapp.com/p3.php?";
if(isset($_GET["ides"])){
    $ide=$_GET['ides'];
    $kumpulanuyu = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM card_end WHERE unique_name = '$ide'"));
    if($kumpulanuyu==false){
        header("Location:p1.php?notif=URLTidakValid");
    }
    $kumpulanuyucard_id = $kumpulanuyu["card_id"];
    $kumpulan = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM card WHERE card_id = $kumpulanuyucard_id"));
    $result = mysqli_query($con,"SELECT * FROM card_end WHERE unique_name ='$ide'");
    $resultdua = mysqli_query($con,"SELECT * FROM card_end WHERE unique_name ='$ide'");
    $row = mysqli_num_rows($result);
$rowh=[]; //kotk kosong
    while ($rowd /*bajunya */= mysqli_fetch_assoc($resultdua)){
        $rowh[]=$rowd; //baju masukin kotaknya ga bawa lemari
    }
$cclor= $rowh[0]["card_color"];
$tcolor= $rowh[0]["text_color"];
    if($resultdua===false) {
        header("Location:p1.php");
    }
}else{
$cnow=$_SESSION["card_now"];
$cclor= $_SESSION["card_color"];
$tcolor= $_SESSION["text_color"];
$kumpulanuyu = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM card_end WHERE id_end = $cnow"));
$kumpulanuyucard_id = $kumpulanuyu["card_id"];
$kumpulan = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM card WHERE card_id = $kumpulanuyucard_id"));
$result = mysqli_query($con,"SELECT * FROM card_end WHERE id_end=$cnow");
}
$row = mysqli_num_rows($result);
$rows=[]; //kotk kosong
    while ($rowa /*bajunya */= mysqli_fetch_assoc($result)){
        $rows[]=$rowa; //baju masukin kotaknya ga bawa lemari
    }
    if(isset($_SESSION["card_now"])&&!isset($_GET["ides"])){
$urls= "ides=" . $rows[0]['unique_name'];
}else {
$urls= "ides=" . $rows[0]['unique_name'];
}
?>

<!-- HTML -->
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
    </script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js">
    </script>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <link rel="stylesheet" href="p4style.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css" integrity="sha512-xX2rYBFJSj86W54Fyv1de80DWBq7zYLn2z0I9bIhQG+rxIF6XVJUpdGnsNHWRa6AvP89vtFupEPDP8eZAtu9qA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/brands.min.css" integrity="sha512-OivR4OdSsE1onDm/i3J3Hpsm5GmOVvr9r49K3jJ0dnsxVzZgaOJ5MfxEAxCyGrzWozL9uJGKz6un3A7L+redIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Kartu Ucapan Idul Fitri 2022</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Mr+Dafoe&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Satisfy&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Satisfy&family=Volkhov:ital,wght@1,700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Concert+One&family=Creepster&display=swap');
                    body {
            background-repeat: no-repeat;
  background-color: #616765;
            background-image: radial-gradient(
                650px circle at 50% 0%,
                #888f8c 60%,
                transparent 100%
            );
            }
.disclaimer{
    display:none;
}
                .stepper-wrapper {
            font-family: 'satisfy';
            font-size:25px;
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            color:gray;
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
            background-color: #d3eb75;
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
                font-size:20px;
            }

            .mosque{
              width: 80vw;
  height: auto;
bottom:-3%;
                z-index:-2;
                /*filter: blur(2px);*/
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
                        font-size:25px;
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
                .centerize{
                    align:center;
                }

                .bottomcenter{
                    z-index: -1;
                    position: fixed;
            left: 50%;
            top:50%;
            transform: translate(-50%, -50%);
            margin: auto;
        }

        @import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");

            * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            }

            *:focus,
            *:active {
            outline: none !important;
            -webkit-tap-highlight-color: transparent;
            }


            .wrapper {
            margin-left: auto;
            margin-right: auto;
                        display: flex;
                        justify-content: center;
            }

            .wrapper .icon {
            position: relative;
            background-color: #ffffff;
            border-radius: 50%;
            padding: 15px;
            margin: 10px;
            width:1em;
            height: 1em;
            font-size: 18px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: all 0.2s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            }

            .wrapper .tooltip {
            position: absolute;
            top: 0;
            font-size: 14px;
            background-color: #ffffff;
            color: #ffffff;
            padding: 5px 8px;
            border-radius: 5px;
            box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
            opacity: 0;
            pointer-events: none;
            transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            }

            .wrapper .tooltip::before {
            position: absolute;
            content: "";
            height: 8px;
            width: 8px;
            background-color: #ffffff;
            bottom: -3px;
            left: 50%;
            transform: translate(-50%) rotate(45deg);
            transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            }

            .wrapper .icon:hover .tooltip {
            top: -45px;
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
            }

            .wrapper .icon:hover span,
            .wrapper .icon:hover .tooltip {
            text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.1);
            }

            .wrapper .facebook:hover,
            .wrapper .facebook:hover .tooltip,
            .wrapper .facebook:hover .tooltip::before {
            background-color: #3b5999;
            color: #ffffff;
            }

            .wrapper .twitter:hover,
            .wrapper .twitter:hover .tooltip,
            .wrapper .twitter:hover .tooltip::before {
            background-color: #46c1f6;
            color: #ffffff;
            }

            .wrapper .instagram:hover,
            .wrapper .instagram:hover .tooltip,
            .wrapper .instagram:hover .tooltip::before {
            background-color: #bc2a8d;
            color: #ffffff;
            }

            .wrapper .whatsapp:hover,
            .wrapper .whatsapp:hover .tooltip,
            .wrapper .whatsapp:hover .tooltip::before {
            background-color: #25D366;
            color: #ffffff;
            }

            .wrapper .line:hover,
            .wrapper .line:hover .tooltip,
            .wrapper .line:hover .tooltip::before {
            background-color: #00B900;
            color: #ffffff;
            }

            .wrapper .telegram:hover,
            .wrapper .telegram:hover .tooltip,
            .wrapper .telegram:hover .tooltip::before {
            background-color: #229ED9;
            color: #ffffff;
            }

            .wrapper .other:hover,
            .wrapper .other:hover .tooltip,
            .wrapper .other:hover .tooltip::before {
            background-color: black;
            color: #ffffff;
            }

            a{
                position: relative;
                display: inline-block;
                padding: 25px 30px;
                margin: 40px 0;
                color: #07f403;
                text-decoration: none;
                text-transform: uppercase;
                transition: 0.5s;
                letter-spacing: 4px;
                overflow: hidden;
                margin-right: 50px;

            }
            a:hover{
                background: #07f403;
                color: #050801;
                box-shadow: 0 0 5px #07f403,
                            0 0 25px #07f403,
                            0 0 50px #07f403,
                            0 0 200px #07f403;
                -webkit-box-reflect:below 1px linear-gradient(transparent, #0005);
            }
            a:nth-child(1){
                filter: hue-rotate(270deg);
            }
            a:nth-child(2){
                filter: hue-rotate(110deg);
            }
            a span{
                position: absolute;
                display: block;
            }
            a span:nth-child(1){
                top: 0;
                left: 0;
                width: 100%;
                height: 2px;
                background: linear-gradient(90deg,transparent,#07f403);
                animation: animate1 1s linear infinite;
            }
            @keyframes animate1{
                0%{
                    left: -100%;
                }
                50%,100%{
                    left: 100%;
                }
            }
            a span:nth-child(2){
                top: -100%;
                right: 0;
                width: 2px;
                height: 100%;
                background: linear-gradient(180deg,transparent,#07f403);
                animation: animate2 1s linear infinite;
                animation-delay: 0.25s;
            }
            @keyframes animate2{
                0%{
                    top: -100%;
                }
                50%,100%{
                    top: 100%;
                }
            }
            a span:nth-child(3){
                bottom: 0;
                right: 0;
                width: 100%;
                height: 2px;
                background: linear-gradient(270deg,transparent,#07f403);
                animation: animate3 1s linear infinite;
                animation-delay: 0.50s;
            }
            @keyframes animate3{
                0%{
                    right: -100%;
                }
                50%,100%{
                    right: 100%;
                }
            }


            a span:nth-child(4){
                bottom: -100%;
                left: 0;
                width: 2px;
                height: 100%;
                background: linear-gradient(360deg,transparent,#07f403);
                animation: animate4 1s linear infinite;
                animation-delay: 0.75s;
            }
            @keyframes animate4{
                0%{
                    bottom: -100%;
                }
                50%,100%{
                    bottom: 100%;
                }
            }

            .bgcolor {
            	position:relative;
                background-color:<?=$cclor;?>;
                color:<?=$tcolor;?>;
            	/* background-image:url('bgcolor/<?=$cclor;?>'); */
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
                .clear{

                }

                .step-name{
                  cursor: pointer;
                }

                .step-counter{
                  cursor: pointer;
                }
                @media screen and (max-width: 800px) {
                .bgcolor {
                  /* max-height: 1000px!important; */
                }
                .wrapper{
                  width:280px!important;
                }
                .mosque{
                width: 120vw;
                height: auto;
                  bottom: -10%!important;
                z-index:-2;
                /*filter: blur(2px);*/
            }
              }
    </style>
</head>
<body onload = "autoClick();">
<div class="bottomcenter"><img src="images/mosque-bright.png" class="mosque"></img></div>
<div class="container">
<div class="stepper-wrapper" style="margin-top:3%;">
      <div class="stepper-item completed">
        <div class="step-counter" onclick = "directp1();">1</div>
        <div class="step-name"><span onclick = "directp1();">Pilih Kartu Ucapan</span></div>
      </div>
      <div class="stepper-item completed">
        <div class="step-counter" style = "cursor: not-allowed;">2</div>
        <div class="step-name" style = "cursor: not-allowed;">Tulis Pesan Anda</div>
      </div>
      <div class="stepper-item completed active">
        <div class="step-counter"><span onclick = "window.location.reload();">3</span></div>
        <div class="step-name"><span onclick = "window.location.reload();">Kirim Kartu</span></div>
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
    <div class="wrapper">
    <div class="icon other" onclick="history.go(-1)">
    <div class="tooltip">Back</div>
    <span><i class="fa fa-arrow-rotate-back"></i></span>
  </div>
  <a style="all:unset;" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?=$ourweb.$urls;?>">
  <div class="icon facebook">
    <div class="tooltip">Facebook</div>
    <span style="all:unset;"><i class="fa fa-facebook-f"></i></span>
  </div></a>
  <a style="all:unset;" target="_blank" href="http://twitter.com/share?text=Check Out My Card!&url=<?=$ourweb.$urls;?>&hashtags=hashtag1,hashtag2,hashtag3">
  <div class="icon twitter">
    <div class="tooltip">Twitter</div>
    <span style="all:unset;"><i class="fa fa-twitter"></i></span>
  </div></a>
  <a style="all:unset;" href="whatsapp://send?text=<?=$ourweb.$urls;?>" data-action="share/whatsapp/share">
  <div class="icon whatsapp">
    <div class="tooltip">Whatsapp</div>
    <span style="all:unset;"><i class="fa fa-whatsapp"></i></span>
  </div></a>
  <a style="all:unset;" target="_blank" href="https://telegram.me/share/url?url=<?=$ourweb.$urls;?>&text=Check Out My Card!">
  <div class="icon telegram">
    <div class="tooltip">Telegram</div>
    <span style="all:unset;"><i class="fa fa-telegram"></i></span>
  </div></a>
  <a id="download" style="all:unset;">
  <div class="icon other">
    <div class="tooltip">Download</div>
    <span style="all:unset;"><i class="fa fa-download"></i></span>
  </div></a>
</div>


<a href="#" class="wrapper" style="width:30%" id="copylink"onclick="copyURL()" onmouseout="outFunc()">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Salin Tautan
    </a>
    <div id="htmlContent">
    <center>
      <!-- ini ntar ambil semua data trus itung ada berapa kan nah trus digituin -->
  <!-- <div class="col-md-7"> -->

    <div class="bgcolor" style="width:100%;padding-top:15%;padding-bottom:0%;" id="bgc">
      <div class="seper">
        <div class="thumbnail">
          <img src="usersUpload/<?= $kumpulan['image']; ?>" class="imagethumbnail" style="width:100%;height:100%;">
        </div>
      </div>
		<div style="margin:2% 8% 0% 8%;width:84%;box-sizing:border-box;">
			<p style="text-align:left;font-size: 4vw; height:50px; width:50%;box-sizing: border-box;--background: transparent;border-radius: 15px;padding-left:10px;outline-width: 1px;outline-color:#ff4c4d;float:left;">
            <?= $rows[0]['kepada']?> </p>
      <p style="margin:20% 0% 20% 0%;opacity:0;">.</p>

			<p style="font-size: 4vw; width:100%;box-sizing: border-box;--background: transparent;border-radius: 15px;padding-left:10px;outline-width: 1px;outline-color:#ff4c4d;margin-top:20px;margin-bottom:20px;text-align:center;">
            <?= $rows[0]['isi']?></p>
      <p style="margin:5% 0% 5% 0%;opacity:0;">.</p>

			<p style="text-align:right;font-size: 4vw; height:50px; width:50%;box-sizing: border-box;--background: transparent;border-radius: 15px;padding-left:10px;padding-bottom:10%;outline-width: 1px;outline-color:#ff4c4d;float:right;">
            <?= $rows[0]['dari']?></p>

			<div style='clear:both;text-align:center; margin-top:5%;'>
			</div>


    </div> <!-- /cardBase -->
  <!-- </div> --> <!-- col-md-7 -->
</div>
</center>
        </div>
</div>
<a href="p1.php" class="wrapper" style="width:25%">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Buat Kartu Lagi!
    </a>

    <script>
    function copyURL() {
    navigator.clipboard.writeText("<?=$ourweb.$urls;?>");

    var tooltip = document.getElementById("copylink");
    tooltip.innerHTML = "Copied Card's URL";

    }

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
