<?php
$connt = mysqli_connect("localhost", "root", "", "banksampah");

$bulan = '';
$tahun = '';

if(isset($_GET["q"])){
  if($_GET["q"] == "semua"){
    $bulan = "";
  }
  else{
    $bulan = $_GET["q"];
  }
}

if(isset($_GET["i"])){
  if($_GET["i"] == "semua"){
    $tahun = "";
  }
  else{
    $tahun = $_GET["i"];
  }
}

$userfull = mysqli_query($connt, "SELECT * FROM sampah WHERE tanggal LIKE '%$bulan%' AND tanggal LIKE '%$tahun%' ORDER BY id DESC");
?>


    <?php
      $i = 1;
    ?>
    <?php foreach($userfull as $user) : ?>
    <tr id = "<?php echo $user['id']; ?>">
      <td id = "<?php echo $user['id']; ?>"><?php echo $i; ?></td>
      <?php
      $iduser = $user["iduser"];
      $selectuser = mysqli_fetch_assoc(mysqli_query($connt, "SELECT * FROM data_user WHERE id = $iduser"));
      $selectusernama = $selectuser["nama"];
      ?>
      <td><?php echo $selectusernama; ?></td>
      <td><?php echo $user["tanggal"]; ?></td>
      <td><?php echo $user["area"]; ?></td>
      <?php
      $idjenis = $user["jenis"];
      $selectjenis = $selectuser = mysqli_fetch_assoc(mysqli_query($connt, "SELECT * FROM jenis WHERE id = $idjenis"));
      $selectjenisnama = $selectjenis["jenis"];
      ?>
      <td><?php echo $selectjenisnama; ?></td>
      <td><?php echo $user["jumlah"]; ?> Kg</td>
      <td><?php
      echo number_format($user["totalharga"], 0, '', '.');
      ?>
      </td>
      <td id = "<?php echo $user['id']; ?>">
        <div class="dropdown" id = "<?php echo $user['id']; ?>">
          <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
            <i class="dw dw-more"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
            <a class="dropdown-item" href="editsampah.php?id=<?php echo $user['id']; ?>"><i class="dw dw-edit2"></i> Edit</a>
            <div style = "cursor: pointer;" class="dropdown-item" onclick = "deleteaccountadmin(<?php echo $user['id']; ?>);"><i class="dw dw-delete-3"></i> Delete</div>
          </div>
        </div>
      </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
    <?php $jaja = 0; ?>
    <?php $juju = 0; ?>
    <?php foreach($userfull as $user) : ?>
      <?php
      $jaja += $user["totalharga"];
      $juju += $user["jumlah"];
      ?>
    <?php endforeach; ?>
    <tr>
      <td style = "font-weight: bold;">TOTAL SEMUA : </td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td><?php echo $juju ?> Kg</td>
      <td style = "font-weight: bold;"><?php echo number_format($jaja, 0, '', '.'); ?></td>
      <td></td>
    </tr>
