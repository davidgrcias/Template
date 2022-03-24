<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Mr+Dafoe&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Satisfy&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Satisfy&family=Volkhov:ital,wght@1,700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Concert+One&display=swap');
        body {
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
        .container {
            height: 100%;
            width:70%;
            display: flex;
            justify-content: center;
  background-color: hsl(218, 41%, 15%);
  background-image: radial-gradient(
    650px circle at 50% 0%,
    hsl(218, 41%, 35%) 15%,
    hsl(218, 41%, 30%) 35%,
    hsl(218, 41%, 20%) 75%,
    hsl(218, 41%, 19%) 80%,
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
        font-size: 8em;
        color: white;
        text-shadow: 0 0 0.05em #fff, 0 0 0.2em #09F547, 0 0 0.3em #09F547;
        text-align: center;
    }
    @keyframes move-twink-back {
        from {background-position:0 0;}
        to {background-position:-10000px 5000px;}
    }
    @-webkit-keyframes move-twink-back {
        from {background-position:0 0;}
        to {background-position:-10000px 5000px;}
    }
    @-moz-keyframes move-twink-back {
        from {background-position:0 0;}
        to {background-position:-10000px 5000px;}
    }
    @-ms-keyframes move-twink-back {
        from {background-position:0 0;}
        to {background-position:-10000px 5000px;}
    }

    .stars, .twinkling, .clouds {
    position:absolute;
    top:0;
    left:0;
    right:0;
    bottom:0;
    width:100%;
    height:100%;
    display:block;
    }

    .stars {
    background:#000 url(http://www.script-tutorials.com/demos/360/images/stars.png) repeat top center;
    z-index:0;
    overflow:hidden;
    }

    .twinkling{
    background:transparent url(http://www.script-tutorials.com/demos/360/images/twinkling.png) repeat top center;
    z-index:0;

    -moz-animation:move-twink-back 200s linear infinite;
    -ms-animation:move-twink-back 200s linear infinite;
    -o-animation:move-twink-back 200s linear infinite;
    -webkit-animation:move-twink-back 200s linear infinite;
    animation:move-twink-back 200s linear infinite;
    }

    @keyframes smoothbounceball{
    from { transform: translate3d(0, 0, 0);}
    to { transform: translate3d(0, 200px, 0);}
}
    .frame {
        position: absolute;
    animation: smoothbounceball 0.5s;
    animation-direction: alternate;
    animation-iteration-count: 4;
        background-attachment: fixed;
        height:150px;
        width:150px;
        z-index:2;
        
        }
        h2{
            font-family:'satisfy';
            font-size:5em;
            color:white;
            text-align:center;
        }
        .mubarak{
            font-family:"volkhov";
            color:#E0B493;
        }
        .gradient-border {
        --borderWidth: 3px;
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
            font-size:1em;
    padding: 20px 10px;
    border-radius: 25px;
    color: white;
    text-decoration: none;
    text-transform: uppercase;
    text-align: center;
    overflow: hidden;
    margin: 25px;
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
        A:hover{
            color:white;
            text-decoration: underline;
        }
        .clear {
    clear: both;
}
    </style>
</head>
<body>
<div class="stars"></div>
<div class="twinkling"></div>
    <div class="container vh-100">
        <div class="container">
            <div><p class="title">2022</p><br>
            <h2> Happy Eid <p class="mubarak">Mubarak</p></h2><br>
            <div class="gradient-border button" id="lanjut">
            <a href="p2.php" >Kirim Kartu Ucapan!</a>
            </div>            
        </div>
        </div>
<img class="frame"src="eidmubarakpira.png" style="left:20%">
<img class="frame"src="eidmubarakwanita.png" style="right:20%">
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>