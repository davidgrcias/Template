<?php
session_start();
$_SESSION["tahap"]=1;
?>
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
  background-color: #616765;
}
        .container {
            height: 100%;
            width:70%;
            display: flex;
            justify-content: center;
  background-color: #14498B;
  background-image: radial-gradient(
    650px circle at 50% 0%,
    #6984BB 15%,
    transparent 100%
  );
            z-index: 1;
        }

        .moon{
     position: absolute;
     top: 50%;
     left: 50%;
     transform: translate(-50%, -50%);
     height: 100px;
     width: 100px;
     box-shadow: -15px 15px 0 5px white  ;
     border-radius: 50%;
   }
        .title {
        font-family: 'Mr Dafoe';
        font-size: 12vw;
        color: hsl(66.43, 93.33%, 70.59%);
        text-shadow: 0 0 0.05em #fff, 0 0 0.2em hsl(90.27, 71.97%, 69.22%), 0 0 0.3em hsl(90.27, 71.97%, 69.22%);
        text-align: center;
    }


    @keyframes smoothbounceball{
    from { transform: translate3d(0, 200px, 0);}
    to { transform: translate3d(0, 0, 0);}
}
    .frame {
        position: absolute;
    animation: smoothbounceball 2s;
    animation-direction: alternate;
        background-attachment: fixed;
        max-width:40%;
        height:auto;
        z-index:2;

        }
        
    .framedaai {
        position: absolute;
        top:5%;
        background-attachment: fixed;
        max-width:15%;
        height:auto;
        z-index:2;

        }
        h2{
            font-family:'satisfy';
            font-size:6vw;
            color:white;
            text-align:center;
        }
        .mubarak{
            font-family:"volkhov";
            color:#C4DA6D;
        }
        .gradient-border {
        --borderWidth: 20%;
        background: #1D1F20;
        position: relative;
        border-radius: var(--borderWidth);
        }
        .gradient-border:after {
        content: '';
        position: absolute;
        top: calc(-1 * var(--borderWidth));
        left: calc(-1 * var(--borderWidth));
        height: calc(100% + var(--borderWidth) * 2);
        width: calc(100% + var(--borderWidth) * 2);
        background: linear-gradient(60deg, #00ff22, #27c43c, #329c40, #255e2c,#1a3747, #22486b, #2c969c, #38ebf5);
        border-radius: calc(2 * var(--borderWidth));
        z-index: -1;
        animation: animatedgradient 3s ease alternate infinite;
        background-size: 300% 300%;
        }


        @keyframes animatedgradient {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        #lanjut{
            transition-timing-function: ease;
        }

        .button {
    padding: 5% 1%;
    border-radius: 25px;
    color: white;
    text-decoration: none;
    text-transform: uppercase;
    text-align: center;
    overflow: hidden;
    margin: 5%;
    font-family: "concert one";
    filter: hue-rotate(0deg);
    border: 5px;
    transition: transform .5s;
        }
        .button:hover{
            transform: scale(1.2);
    text-decoration: underline;

        }
        a {
            color:white;
            text-decoration: none;
        }
        a:hover{
            color:white;
            text-decoration: underline;
        }

        .sticky-bottom-right {
  font-weight: bold;
  font-family:'creepster';
  font-size:2vw;
  position: absolute;
  right: 0;
  bottom: 0;
}

        .clear {
    clear: both;
}

@media screen and (max-width: 800px) {
                .container {
                  width: 300px!important;
                }
                .title{
                    font-size:20vw;
                }
                h2{
                    margin-top:60px;
                    font-size:15vw;
                }
                .button{
                    /* font-size:; */
                }
                .frame {
        position: absolute;
    animation: smoothbounceball 0.5s;
    animation-direction: alternate;
        background-attachment: fixed;
        max-width:45%;
        height:auto;
        z-index:2;

        }
        
    .framedaai {
        position: absolute;
        top:5%;
        background-attachment: fixed;
        max-width:25%;
        height:auto;
        z-index:2;
        }
        .inlineOverrideone {
     font-size:8vw!important;
   }   
   .inlineOverridetwo {
     font-size:15vw!important;
   }   
   .inlineOverrideleft {
     left:1%!important;
   }   
   .inlineOverrideright {
     right:1%!important;
   }   
              }
.disclaimer{
    display:none;
}
    </style>
</head>
<body>
    <div class="container vh-100">
        <div class="container">
            <img class="framedaai"src="images/daailogo.png">
            <div>
                <h2 style="margin-top:50%;"> <p class="inlineOverrideone" style="font-size:2.5vw;color:#b5c769">Selamat Hari Raya</p> <p class="mubarak">Idul Fitri</p><p class="inlineOverridetwo" style="font-size:5.5vw;color:#d1ffa8;">1443 H</p></h2><br>
            <div class="gradient-border button" id="lanjut">
            <a href="p1.php" >Kirim Kartu Ucapan!</a>
            </div>
        </div>
        </div>
<img class="frame foto"src="images/Lak-Mubarak.png" class="inlineOverrideleft" style="bottom:0%;left:10%">
<img class="frame foto"src="images/pere-mubarak.png" class="inlineOverrideright" style="bottom:-5%;right:10%">
</div>

    <div class="sticky-bottom-right"></div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
