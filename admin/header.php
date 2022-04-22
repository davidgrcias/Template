<?php
$tanggal = date('d') . ' ' . date('F') . ' ' . date('Y');
?>
<style media="screen">
  .header-left{
    width: 70%!important;
  }
  .header-right{
    width: 30%!important;
  }
</style>
<div class="header" id = "header">
  <div class="header-left">
    <div class="menu-icon dw dw-menu"></div>
    <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
    <div class="header-search">
      <form>
        <div class="form-group mb-0">
          <h5 style = "text-align: center;"><?= $tanggal; ?></h5>
        </div>
      </form>
    </div>
  </div>
  <div class="header-right">
    <!--
    <div class="user-notification">
      <div class="dropdown">
        <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
          <i class="icon-copy dw dw-notification"></i>
          <span class="badge notification-active"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="notification-list mx-h-350 customscroll">
            <ul>
              <li>
                <a href="#">
                  <img src="vendors/images/img.jpg" alt="">
                  <h3>John Doe</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                </a>
              </li>
              <li>
                <a href="#">
                  <img src="vendors/images/photo1.jpg" alt="">
                  <h3>Lea R. Frith</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                </a>
              </li>
              <li>
                <a href="#">
                  <img src="vendors/images/photo2.jpg" alt="">
                  <h3>Erik L. Richards</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                </a>
              </li>
              <li>
                <a href="#">
                  <img src="vendors/images/photo3.jpg" alt="">
                  <h3>John Doe</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                </a>
              </li>
              <li>
                <a href="#">
                  <img src="vendors/images/photo4.jpg" alt="">
                  <h3>Renee I. Hansen</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                </a>
              </li>
              <li>
                <a href="#">
                  <img src="vendors/images/img.jpg" alt="">
                  <h3>Vicki M. Coleman</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  -->
    <div class="user-info-dropdown">
      <div class="dropdown">
        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
          <span class="user-icon">
            <img src="../images/eidmubarakpira.png" alt="">
          </span>
          <span class="user-name">&nbsp;<?php echo $user["username"]; ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
          <a class="dropdown-item" style = "cursor: pointer!important;" onclick = "logout();"><i class="dw dw-logout"></i> Log Out</a>
        </div>
      </div>
      <script type="text/javascript">
        function logout(){
          location.href = "logout.php";
        }
      </script>
    </div>
  </div>
</div>
