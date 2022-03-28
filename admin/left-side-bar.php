<?php
if(empty($thamuz)){
  header("Location: login.php");
}
else{

}
?>
<div class="left-side-bar">
  <div class="brand-logo">
    <a href="" style = "display: flex; align-items: flex-end!important;">
      <img style = "margin-left: auto; margin-right: auto; padding-bottom: 5px!important;" src="../eidmubarakpira.png" alt="" class="light-logo" width = "45">
      <p style = "font-size: 14px; line-height: 15px; text-align: center; margin-left: 2px;">Admin - Template</p>
    </a>
    <div class="close-sidebar" data-toggle="left-sidebar-close">
      <i class="ion-close-round"></i>
    </div>
  </div>
  <div class="menu-block customscroll">
    <div class="sidebar-menu">
      <ul id="accordion-menu">
        <li class="dropdown">
          <a href="index.php" class="dropdown-toggle no-arrow">
            <span class="micon dw dw-home"></span><span class="mtext">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="kartu.php" class="dropdown-toggle no-arrow">
            <span class="micon dw dw-image"></span><span class="mtext">Kartu</span>
          </a>
        </li>
        <li>
          <a href="warna.php" class="dropdown-toggle no-arrow">
            <span class="micon dw dw-list3"></span><span class="mtext">Warna</span>
          </a>
        </li>
        <li>
          <a href="admin.php" class="dropdown-toggle no-arrow">
            <span class="micon dw dw-user"></span><span class="mtext">Admin</span>
          </a>
        </li>
        <li>
          <a href="logout.php" class="dropdown-toggle no-arrow">
            <span class="micon dw dw-logout"></span><span class="mtext">Logout</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>
