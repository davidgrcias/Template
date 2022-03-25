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
   }
   .thumbnail:hover{
transition: all 1s ease;
    box-shadow:0px 0px 30px white;
   }
   .imagethumbnail{
       /* max-width:100%; */
       width:2843.75%;
       height:635px;
transition: all 1s ease;
   }
   .imagethumbnail:hover{
   transform:scale(1.15);
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
    </style>
</head>
<body>
<div class="moon"></div>
<div class="container">
<div class="stepper-wrapper">
      <div class="stepper-item completed">
        <div class="step-counter">1</div>
        <div class="step-name">Pilih Kartu Ucapan</div>
      </div>
      <div class="stepper-item">
        <div class="step-counter">2</div>
        <div class="step-name">Tulis Pesan Anda</div>
      </div>
      <div class="stepper-item">
        <div class="step-counter">3</div>
        <div class="step-name">Kirim Kartu</div>
      </div>
    </div>

  <div class="row">
      <!-- ini ntar ambil semua data trus itung ada berapa kan nah trus digituin -->
  <?php for ($i = 0; $i <$row;$i++):?>
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="p3.php?id=<?=$rows[$i]["card_id"]; ?>" target="_self">
          <img src="usersUpload/<?=$rows[$i]["image"];?>" class="imagethumbnail" style="width:100%">
      </div>
          <div class="caption">
            <p><?=$rows[$i]["imageName"];?></p>
          </div>
        </a>
      </div>
    <?php endfor; ?>
  </div>
</div>

</body>
</html>


