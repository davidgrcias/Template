<?php
$con = mysqli_connect("localhost","root","","template");
if (!$con) {
  die('Could not connect: ' . mysqli_error());
}

$result = mysqli_query($con,"SELECT * FROM card");
$row = mysqli_num_rows($result);
$rows=[]; //kotk kosong
    while ($rowa /*bajunya */= mysqli_fetch_assoc($result)){
        $rows[]=$rowa; //baju masukin kotaknya ga bawa lemari
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

            .mosque{
                height: 80vw;
                width: 80vw;
                z-index:-2;
                filter: blur(2px);
            }
            .thumbnail{
                margin-top:3%;
            }
            .imagethumbnail{
                /* max-width:100%; 3750%*/
                width:920px;
                height:1840px;
                display:block;
                margin: 0 auto;
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
            width: 50px;
            height: 50px;
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
            .clear{
                
            }
    </style>
</head>
<body>
<div class="moon"></div>
<div class="bottomcenter"><img src="mosque.png" class="mosque"></img></div>
<div class="container">
<div class="stepper-wrapper">
      <div class="stepper-item completed">
        <div class="step-counter">1</div>
        <div class="step-name">Pilih Kartu Ucapan</div>
      </div>
      <div class="stepper-item completed">
        <div class="step-counter">2</div>
        <div class="step-name">Tulis Pesan Anda</div>
      </div>
      <div class="stepper-item completed active">
        <div class="step-counter">3</div>
        <div class="step-name">Kirim Kartu</div>
      </div>
    </div>
    <div class="wrapper">
    <div class="icon other" onclick="history.go(-1)">
    <div class="tooltip">Back</div>
    <span><i class="fa fa-arrow-rotate-back"></i></span>
  </div>
  <a style="all:unset;" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fparse.com">
  <div class="icon facebook">
    <div class="tooltip">Facebook</div>
    <span style="all:unset;"><i class="fa fa-facebook-f"></i></span>
  </div></a>
  <a style="all:unset;" target="_blank" href="http://twitter.com/share?text=textgoeshere&url=http://urlgoeshere&hashtags=hashtag1,hashtag2,hashtag3">
  <div class="icon twitter">
    <div class="tooltip">Twitter</div>
    <span style="all:unset;"><i class="fa fa-twitter"></i></span>
  </div></a>
  <a style="all:unset;" href="whatsapp://send?text=<?php #url disni?>" data-action="share/whatsapp/share">
  <div class="icon whatsapp">
    <div class="tooltip">Whatsapp</div>
    <span style="all:unset;"><i class="fa fa-whatsapp"></i></span>
  </div></a>
  <a style="all:unset;" target="_blank" href="https://line.me/share/url?url=<URL>&text=<TEXT>">
  <div class="icon line">
    <div class="tooltip">Line</div>
    <span style="all:unset;"><i class="fab fa-line"></i></span>
  </div></a>
  <a style="all:unset;" target="_blank" href="https://telegram.me/share/url?url=<URL>&text=<TEXT>">
  <div class="icon telegram">
    <div class="tooltip">Telegram</div>
    <span style="all:unset;"><i class="fa fa-telegram"></i></span>
  </div></a>
  <a style="all:unset;" download="endProduct/exampletemplatenumbaone.png" href="endProduct/exampletemplatenumbaone.png" title="ImageName">
  <div class="icon other">
    <div class="tooltip">Download</div>
    <span style="all:unset;"><i class="fa fa-download"></i></span>
  </div></a>
</div>
    <form>
 <!-- <input type="button" value="No, really, go back!" onclick="history.go(-1)"> -->
</form>
<a href="#" class="wrapper" style="width:20%">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Salin Tautan
    </a>
  <div class="row">
    <div class="centerize">
      <div class="thumbnail">
          <img src="endProduct/exampletemplatenumbaone.png" style="align:center;"class="imagethumbnail">
      </div>
          <div class="caption">
            <p><?php?></p>
          </div>
      </div>
  </div>
</div>
<a href="index.php" class="wrapper" style="width:25%">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Buat Kartu Lagi!
    </a>
</body>
</html>


