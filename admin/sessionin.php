<?php
if(!empty($_SESSION['idd'])){
  $ididid = $_SESSION['idd'];
}
else{
  $ididid = "";
}

if(!empty($ididid)){
  $users = mysqli_query($connt, "SELECT * FROM data_admin WHERE id = $ididid");
  $user = mysqli_fetch_assoc($users);
}
else{
  header("Location: login.php");
}
?>
