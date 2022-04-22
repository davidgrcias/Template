<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <title>Kartu Ucapan Idul Fitri 2022</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Mr+Dafoe&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Satisfy&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Satisfy&family=Volkhov:ital,wght@1,700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Concert+One&family=Creepster&display=swap');
*{
  margin: 0px;
  padding: 0px;
}
html{
  width: 100%;
  height: 100%;
}
body{
  background: #616765;
  width: 100%;
  height: 100%;
  position: relative;
}

.container{
  width: 70%;
  height: 100%;
  background-color: #14498B;
  background-image: radial-gradient(
    650px circle at 50% 0%,
    #6984BB 15%,
    transparent 100%
  );
  margin: auto;
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;
  flex: 1;
}

img.logo{
  margin: 3em;

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
    font-family: "concert one";
    filter: hue-rotate(0deg);
    border: 5px;
    transition: transform .5s;
    padding-top: 1em;
    padding-bottom: 1em;
    padding-left: 3em;
    padding-right: 3em;
    margin-top: 2em;
  z-index: 100;
        }
        .button a:hover{
          text-decoration: none!important;
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
        .center{
          text-align: center;
          margin-top: 1.9em;
          margin-bottom: 3em;
        }
.selamat {
     font-size:2.2em!important;
     font-family:'satisfy';
   }
   .idul{
     font-family:"volkhov";
            color:#C4DA6D;
            font-size:5em;
            color:white;
            text-align:center;
   }
   .h{
  font-size: 4em;
   }

   .container .orang{
     display: flex;
     justify-content: space-between;
     position: absolute;
     width: 100%;
     bottom: 0;
   }

   .container .orang img{
     width: 25%;
   }

   img.pria{
    margin-left: -30px;
   }

   img.perempuan{
     margin-right: -30px;
   }

#frame{
  position: absolute;
  width: 100%;
  height: 100%;
  z-index: 50;
}

@media screen and (max-width: 720px) {
  body{

  }
  .selamat {
       font-size:6vw!important;
       margin-top: 2vw;
     }
     .idul{
              font-size:11vw;
     }
     .h{
    font-size: 10vw;
     }
     img.pria{
      margin-left: -4em;
      width:35vw!important;
      height:auto;
      z-index: 500;
     }
     img.perempuan{
       margin-right: -4em;
      width:35vw!important;
      height:auto;
       z-index: 500;
     }
     .container .orang img{
       width: 35%;
     }
     .button {

 padding-top: 1em;
 padding-bottom: 1em;
 padding-left: 3vw;
 padding-right: 3vw;
     }
}

/*@media screen and (max-width: 500px) AND (max-height: 900px) {*/
/*     img.pria{*/
/*      margin-left: -4em;*/
/*      width:42vw!important;*/
/*      height:auto;*/
/*      z-index: 500;*/
/*     }*/
/*     img.perempuan{*/
/*       margin-right: -4em;*/
/*      width:42vw!important;*/
/*      height:auto;*/
/*       z-index: 500;*/
/*     }*/
/*}*/

.disclaimer{
    opacity:0;
}
    </style>
  </head>
  <body>
    <img src="images/framepage3.png" id = "frame" alt="">
    <div class="container">
      <div class="orang">
        <img src="images/Lak-Mubarak.png" class = "pria"alt="">
        <img src="images/wanita-mubarak.png" class = "perempuan" alt="">
      </div>
      <div class="top">
        <img src="images/daailogo.png" class = "logo" width = 200 alt="">
      </div>
      <div class="center">
        <p class="selamat" style="color:#b5c769">Selamat Hari Raya</p>
        <p class="idul">Idul Fitri</p>
        <p class="h" style="color:#d1ffa8;">1443 H</p>
      </div>
      <div class="bottom">
        <div class="gradient-border button" id="lanjut">
            <a href="p1.php" style = "text-decoration: none!important;">Kirim Kartu Ucapan!</a>
        </div>
      </div>
    </div>
  </body>
</html>