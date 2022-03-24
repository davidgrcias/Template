<?php
$connt = mysqli_connect("localhost", "root", "", "template");
session_start();
date_default_timezone_set("Asia/Jakarta");

if(!empty($_POST["kode"])){
  if($_POST["kode"] == "edituser"){
    edituser();
  }
  elseif($_POST["kode"] == "insertbulan"){
    insertbulan();
  }
  elseif($_POST["kode"] == "hapusjenis"){
    hapusjenis();
  }
  elseif($_POST["kode"] == "editsampah"){
    editsampah();
  }
  elseif($_POST["kode"] == "deletesampah"){
    deletesampah();
  }
  elseif($_POST["kode"] == "addsampah"){
    addsampah();
  }
  elseif($_POST["kode"] == "registrasi"){
    registrasi();
  }
  elseif($_POST["kode"] == "comment"){
    comment();
  }
  elseif($_POST["kode"] == "hapuskomen"){
    commentdeleted();
  }
  elseif($_POST["kode"] == "reply"){
    reply();
  }
  elseif($_POST["kode"] == "hapusreply"){
    replydeleted();
  }
  elseif($_POST["kode"] == "deleteaccount"){
    accountdeletedd();
  }
  elseif($_POST["kode"] == "hapususer"){
    accountdeleteddfromadmin();
  }
  elseif($_POST["kode"] == "hapussubscriber"){
    subscriberdeleted();
  }
  elseif($_POST["kode"] == "ubahutama"){
    ubahutama();
  }
  elseif($_POST["kode"] == "addtestimonial"){
    addtestimonial();
  }
  elseif($_POST["kode"] == "hapustestimonial"){
    hapustestimonial();
  }
  elseif($_POST["kode"] == "edittestimonial"){
    edittestimonial();
  }
  elseif($_POST["kode"] == "hapusgallery"){
    hapusgallery();
  }
  elseif($_POST["kode"] == "addgallery"){
    addgallery();
  }
  elseif($_POST["kode"] == "editgallery"){
    editgallery();
  }
  elseif($_POST["kode"] == "addnewscategory"){
    addnewscategory();
  }
  elseif($_POST["kode"] == "hapusnewskategori"){
    hapusnewskategori();
  }
  elseif($_POST["kode"] == "ubahkategoriberita"){
    ubahkategoriberita();
  }
  elseif($_POST["kode"] == "addnews"){
    addnews();
  }
  elseif($_POST["kode"] == "hapusnews"){
    hapusnews();
  }
  elseif($_POST["kode"] == "ubahberita"){
    ubahberita();
  }
  elseif($_POST["kode"] == "addadmin"){
    addadmin();
  }
  elseif($_POST["kode"] == "editadmin"){
    editadmin();
  }
  elseif($_POST["kode"] == "hapusadmin"){
    hapusadmin();
  }
  elseif($_POST["kode"] == "logintoadmin"){
    logintoadmin();
  }
  elseif($_POST["kode"] == "hidenews"){
    hidenews();
  }
  elseif($_POST["kode"] == "unhidenews"){
    unhidenews();
  }
  elseif($_POST["kode"] == "sendmessage"){
    sendmessage();
  }
  elseif($_POST["kode"] == "deletemessage"){
    deletemessage();
  }
  elseif($_POST["kode"] == "addjenis"){
    addjenis();
  }
  elseif($_POST["kode"] == "editjenis"){
    editjenis();
  }
}

function insertbulan(){
  global $connt;

  $id = $_POST["id"];
  $bulan = $_POST["bulan"];
  $tahun = $_POST["tahun"];

  $query = "UPDATE data_admin SET bulan = '$bulan', tahun = '$tahun' WHERE id = $id";

  mysqli_query($connt, $query);
  echo 1;
}

function editjenis(){
  global $connt;

  $id = $_POST["id"];
  $jenis = $_POST["jenis"];
  $jumlah = $_POST["jumlah"];


  $query = "UPDATE jenis SET harga = '$jumlah', jenis = '$jenis' WHERE id = $id";

  mysqli_query($connt, $query);
  echo 1;
}

function addjenis(){
  global $connt;

  $jenis = $_POST["jenis"];
  $jumlah = $_POST["jumlah"];

  $query = "INSERT INTO jenis VALUES('', '$jenis', '$jumlah')";

  mysqli_query($connt, $query);
  echo 1;
}

function hapusjenis(){
  global $connt;

  $deleteid = $_POST["deleteid"];
  $selectsampah = count(query("SELECT * FROM sampah WHERE jenis = $deleteid"));
  if($selectsampah >= 1){
    echo 0;
    exit;
  }

  $query = "DELETE FROM jenis WHERE id = $deleteid";
  mysqli_query($connt, $query);
  echo 1;
}

function addsampah(){
  global $connt;

  $date = date('d') . ' ' . date('F') . ' ' . date('Y');
  $user = $_POST["user"];
  $jenis = $_POST["jenis"];
  $area = $_POST["area"];
  $jumlah = $_POST["jumlah"];

  $selectjenis = mysqli_fetch_assoc(mysqli_query($connt, "SELECT * FROM jenis WHERE id = $jenis"));
  $selectjenisharga = $selectjenis["harga"];
  $totalsampah = $selectjenisharga * $jumlah;
  $selectuser = mysqli_fetch_assoc(mysqli_query($connt, "SELECT * FROM data_user WHERE id = $user"));
  $selectuserid = $selectuser["id"];
  $query = "INSERT INTO sampah VALUES('', '$selectuserid', '$date', '$area', '$jenis', '$jumlah', '$totalsampah')";

  mysqli_query($connt, $query);
  echo 1;
}

function editsampah(){
  global $connt;

  $id = $_POST["id"];
  $user = $_POST["user"];
  $jenis = $_POST["jenis"];
  $area = $_POST["area"];
  $jumlah = $_POST["jumlah"];

  $selectjenis = mysqli_fetch_assoc(mysqli_query($connt, "SELECT * FROM jenis WHERE id = $jenis"));
  $selectjenisharga = $selectjenis["harga"];
  $totalsampah = $selectjenisharga * $jumlah;
  $selectuser = mysqli_fetch_assoc(mysqli_query($connt, "SELECT * FROM data_user WHERE id = $user"));
  $selectuserid = $selectuser["id"];
  $query = "UPDATE sampah SET iduser = '$user', area = '$area', jenis = '$jenis', jumlah = '$jumlah', totalharga = '$totalsampah' WHERE id = $id";

  mysqli_query($connt, $query);
  echo 1;
}

function deletesampah(){
  global $connt;

  $deleteid = $_POST["deleteid"];
  $query = "DELETE FROM sampah WHERE id = $deleteid";
  mysqli_query($connt, $query);
  echo 1;
}

function registrasi(){
  global $connt;

  $date = date('d') . ' ' . date('F') . ' ' . date('Y');
  $nama  = ucwords(strtolower( htmlspecialchars($_POST["nama"]) ), " \.");
  $email = strtolower(htmlspecialchars($_POST["email"]));

  if(empty($nama)){
    echo 4;
    exit;
  }
  if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
    echo 4;
    exit;
  }

  $result = mysqli_query($connt, "SELECT email FROM data_user WHERE email = '$email'");
  if (mysqli_num_rows($result) >= 1){
    echo 999;
    exit;
  }

  $query = "INSERT INTO data_user VALUES('', '$nama', '$email', '$date')";
  mysqli_query($connt, $query);

  echo mysqli_affected_rows($connt);
}

function deletemessage(){
  global $connt;

  $deleteid = $_POST["deleteid"];
  $query = "DELETE FROM contact WHERE id = $deleteid";
  mysqli_query($connt, $query);
  echo 1;
}

function sendmessage(){
  global $connt;
  $email = strtolower(htmlspecialchars($_POST["email"]));
  $name = htmlspecialchars($_POST["name"]);
  $subject = htmlspecialchars($_POST["subject"]);
  $message = htmlspecialchars($_POST["message"]);
  if(empty($name)){
    echo 4;
    exit;
  }
  if(empty($subject)){
    echo 4;
    exit;
  }
  if(empty($message)){
    echo 4;
    exit;
  }
  if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
    echo 4;
    exit;
  }

  $query = "INSERT INTO contact VALUES('', '$name', '$email', '$subject', '$message')";
  mysqli_query($connt, $query);
  echo 1;
}

function unhidenews(){
  global $connt;
  $id = $_POST["idnya"];
  $author = "<span style = \"color: #5cb85c;\"> Public </span>";

  $query = "UPDATE news SET stat = 'p', status = '$author' WHERE id = $id";
  mysqli_query($connt, $query);
  echo mysqli_affected_rows($connt);
}

function hidenews(){
  global $connt;
  $id = $_POST["idnya"];
  $author = "<span style = \"color: #d9534f;\"> Private </span>";

  $query = "UPDATE news SET stat = 'x', status = '$author' WHERE id = $id";

  mysqli_query($connt, $query);
  echo mysqli_affected_rows($connt);
}

function logintoadmin(){
  global $connt;
  $usernameemail = strtolower(htmlspecialchars($_POST["usernameemail"]));
  $password = strtolower(htmlspecialchars($_POST["password"]));

  $result = mysqli_query($connt, "SELECT * FROM data_admin WHERE username = '$usernameemail' OR email = '$usernameemail'");
  if (mysqli_num_rows($result) >= 1){

    $row = mysqli_fetch_assoc($result);

    if (password_verify($password, $row["password"])){
        $_SESSION["loginn"] = true;
        $_SESSION["idd"] = $row["id"];
        echo 1;
    }
    else{
      echo 99;
      exit;
    }
  }
  else{
    echo 999;
    exit;
  }
}

function hapusadmin(){
  global $connt;

  $deleteid = $_POST["deleteid"];
  $query = "DELETE FROM data_admin WHERE id = $deleteid";
  mysqli_query($connt, $query);
  echo 1;
}

function editadmin(){
  global $connt;
  $id = $_POST["id"];
  $email = strtolower(htmlspecialchars($_POST["email"]));
  $username = strtolower(htmlspecialchars($_POST["username"]));
  $emailconfirm = strtolower(htmlspecialchars($_POST["emailconfirm"]));
  $usernameconfirm = strtolower(htmlspecialchars($_POST["usernameconfirm"]));
  $password = htmlspecialchars($_POST["password"]);

  if(empty($username)){
    echo 4;
    exit;
  }
  if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
    echo 4;
    exit;
  }

  $result = mysqli_query($connt, "SELECT email FROM data_admin WHERE email = '$email'");
  if (mysqli_num_rows($result) >= 1 && $email != $emailconfirm){
    echo 999;
    exit;
  }

  $result2 = mysqli_query($connt, "SELECT username FROM data_admin WHERE username = '$username'");
  if (mysqli_num_rows($result2) >= 1 && $username != $usernameconfirm){
    echo 9999;
    exit;
  }

  $query = "UPDATE data_admin SET email = '$email', username = '$username' WHERE id = $id";
  mysqli_query($connt, $query);
  echo mysqli_affected_rows($connt);

  if (!empty($password)){
    $passwordbaru = password_hash($password, PASSWORD_DEFAULT);
    $query2 = "UPDATE data_admin SET password = '$passwordbaru' WHERE id = $id";
    mysqli_query($connt, $query2);
    echo mysqli_affected_rows($connt);
  }
  else{

  }
}

function addadmin(){
  global $connt;
  $date = date('d') . ' ' . date('F') . ' ' . date('Y');
  $email = strtolower(htmlspecialchars($_POST["email"]));
  $username = strtolower(htmlspecialchars($_POST["username"]));
  $password = htmlspecialchars($_POST["password"]);
  if(empty($password)){
    echo 4;
    exit;
  }
  if(empty($username)){
    echo 4;
    exit;
  }
  if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
    echo 4;
    exit;
  }

  $result = mysqli_query($connt, "SELECT email FROM data_admin WHERE email = '$email'");
  if (mysqli_num_rows($result) >= 1){
    echo 999;
    exit;
  }
  $result2 = mysqli_query($connt, "SELECT username FROM data_admin WHERE username = '$username'");
  if (mysqli_num_rows($result2) >= 1){
    echo 9999;
    exit;
  }

  $passwordik = password_hash($password, PASSWORD_DEFAULT);
  $query = "INSERT INTO data_admin VALUES('', 'y', 'noprofil.jpg', '$email', '$username', '$passwordik', '$date', '', '')";
  mysqli_query($connt, $query);
  echo 1;
}

function ubahberita(){
  global $connt;
  $id = $_POST["id"];
  $titleold = $_POST["titleold"];
  $title = $_POST["title"];
  $author = $_POST["author"];
  $gallery = $_POST["gallery"];
  $category = $_POST["category"];
  $isiberita = $_POST["isiberita"];

  if( empty($title) || empty($author) || empty($category) || empty($isiberita) ){
    echo 4;
    exit;
  }

  if($titleold != $title){
    $juga = mysqli_query($connt, "SELECT * FROM news WHERE namaberita = '$title'");
    if(mysqli_num_rows($juga) >= 1){
      echo 4;
      exit;
    }

    $tukabatunama = str_replace(' ', '-', strtolower($titleold));
    unlink("news/$tukabatunama/index.php");
    rmdir("news/$tukabatunama");


    $newsrevision = str_replace(' ', '-', strtolower($title));
    @mkdir("../jurnal/news/$newsrevision");
    $myfile = fopen("../jurnal/news/$newsrevision/index.php", "w") or die("Unable to open file!");

    $txt =
    "
    <?php
    \$privasi = $id;
    \$juju = 'ini';
    require '../../pov.php';
    global \$connt;
    \$newss = mysqli_query(\$connt, 'SELECT * FROM news WHERE id = $id');
    \$news = mysqli_fetch_assoc(\$newss);
    \$sample_rate = \$news['dilihat'] + 1;
    \$queryy = \"UPDATE news SET dilihat = \$sample_rate WHERE id = $id\";
    mysqli_query(\$connt, \$queryy);
    ?>
    ";

    fwrite($myfile, $txt);
    fclose($myfile);
  }

  $query = "UPDATE news SET namaberita = '$title', namapembuat = '$author', isiberita = '$isiberita', kategori = '$category' WHERE id = $id";
  mysqli_query($connt, $query);
  echo mysqli_affected_rows($connt);
}

function hapusnews(){
  global $connt;

  $deleteid = $_POST["deleteid"];
  $tukabatu = mysqli_fetch_assoc(mysqli_query($connt, "SELECT * FROM news WHERE id = $deleteid"));
  $tukabatuka = $tukabatu["namaberita"];
  $tukabatunama = str_replace(' ', '-', strtolower($tukabatuka));
  unlink("news/$tukabatunama/index.php");
  rmdir("news/$tukabatunama");
  $query = "DELETE FROM news WHERE id = $deleteid";
  $query2 = "DELETE FROM komentar WHERE idnews = $deleteid";
  $query3 = "DELETE FROM reply WHERE idnews = $deleteid";
  mysqli_query($connt, $query);
  mysqli_query($connt, $query2);
  mysqli_query($connt, $query3);
  echo 1;
}

function addnews(){
  global $connt;
  $title = $_POST["title"];
  $author = $_POST["author"];
  $gallery = $_POST["gallery"];
  $category = $_POST["category"];
  $isiberita = $_POST["isiberita"];
  $date = date('d') . ' ' . date('F') . ' ' . date('Y');

  if( empty($title) || empty($author) || empty($gallery) || empty($category) || empty($isiberita) ){
    echo 4;
    exit;
  }

  $juga = mysqli_query($connt, "SELECT * FROM news WHERE namaberita = '$title'");
  if(mysqli_num_rows($juga) >= 1){
    echo 4;
    exit;
  }

  $query = "INSERT INTO news VALUES('', '$title', '$author', '$date', '$gallery', '$isiberita', '$category', 0, '<span style = \"color: #5cb85c;\"> Public </span>', 'p')";
  mysqli_query($connt, $query);
  echo mysqli_affected_rows($connt);

  $selecate = mysqli_fetch_assoc(mysqli_query($connt, "SELECT * FROM news WHERE namaberita = '$title'"));
  $selecateid = $selecate["id"];

  $newsrevision = str_replace(' ', '-', strtolower($title));
  @mkdir("../jurnal/news/$newsrevision");
  $myfile = fopen("../jurnal/news/$newsrevision/index.php", "w") or die("Unable to open file!");

  $txt =
  "
  <?php
  \$privasi = $selecateid;
  \$juju = 'ini';
  require '../../pov.php';
  global \$connt;
  \$newss = mysqli_query(\$connt, 'SELECT * FROM news WHERE id = $selecateid');
  \$news = mysqli_fetch_assoc(\$newss);
  \$sample_rate = \$news['dilihat'] + 1;
  \$queryy = \"UPDATE news SET dilihat = \$sample_rate WHERE id = $selecateid\";
  mysqli_query(\$connt, \$queryy);
  ?>
  ";

  fwrite($myfile, $txt);
  fclose($myfile);
}

function ubahkategoriberita(){
  global $connt;
  $id = $_POST["id"];
  $kategoriberitaold = $_POST["kategoriberitaold"];
  $kategoriberita = $_POST["kategoriberita"];

  if(empty($kategoriberita)){
    echo 4;
    exit;
  }
  if($kategoriberitaold == $kategoriberita){
    echo 4;
    exit;
  }
  $juga = mysqli_query($connt, "SELECT * FROM kategori WHERE namakategori = '$kategoriberita'");
  if(mysqli_num_rows($juga) >= 1){
    echo 4;
    exit;
  }

  $tukabatunama = str_replace(' ', '-', strtolower($kategoriberitaold));
  unlink("news/category/$tukabatunama/index.php");
  rmdir("news/category/$tukabatunama");


  $newscategoryrevision = str_replace(' ', '-', strtolower($kategoriberita));
  @mkdir("../jurnal/news/category/$newscategoryrevision");
  $myfile = fopen("../jurnal/news/category/$newscategoryrevision/index.php", "w") or die("Unable to open file!");

  $txt =
  "

  <?php
  \$privasi = $id;
  \$jija = 'itu';
  require '../../../piv.php';
  global \$connt;
  ?>

  ";

  fwrite($myfile, $txt);
  fclose($myfile);

  $query = "UPDATE kategori SET namakategori = '$kategoriberita' WHERE id = $id";
  mysqli_query($connt, $query);
  echo mysqli_affected_rows($connt);
}

function hapusnewskategori(){
  global $connt;

  $deleteid = $_POST["deleteid"];
  $tukabatu = mysqli_fetch_assoc(mysqli_query($connt, "SELECT * FROM kategori WHERE id = $deleteid"));
  $tukabatuka = $tukabatu["namakategori"];
  $tukabatunama = str_replace(' ', '-', strtolower($tukabatuka));
  unlink("news/category/$tukabatunama/index.php");
  rmdir("news/category/$tukabatunama");
  $query = "DELETE FROM kategori WHERE id = $deleteid";
  mysqli_query($connt, $query);
  echo 1;
}

function addnewscategory(){
  global $connt;
  $newscategory = $_POST["newscategory"];

  if( empty($newscategory) ){
    echo 4;
    exit;
  }

  $juga = mysqli_query($connt, "SELECT * FROM kategori WHERE namakategori = '$newscategory'");
  if(mysqli_num_rows($juga) >= 1){
    echo 4;
    exit;
  }

  $query = "INSERT INTO kategori VALUES('', '$newscategory')";
  mysqli_query($connt, $query);
  echo mysqli_affected_rows($connt);

  $selecate = mysqli_fetch_assoc(mysqli_query($connt, "SELECT * FROM kategori WHERE namakategori = '$newscategory'"));
  $selecateid = $selecate["id"];

  $newscategoryrevision = str_replace(' ', '-', strtolower($newscategory));
  @mkdir("../jurnal/news/category/$newscategoryrevision");
  $myfile = fopen("../jurnal/news/category/$newscategoryrevision/index.php", "w") or die("Unable to open file!");

  $txt =
  "

  <?php
  \$privasi = $selecateid;
  \$jija = 'itu';
  require '../../../piv.php';
  global \$connt;
  ?>

  ";

  fwrite($myfile, $txt);
  fclose($myfile);
}

function editgallery(){
  global $connt;
  $id = $_POST["id"];
  $name = $_POST["name"];

  if(empty($name)){
    echo 4;
    exit;
  }

  $query = "UPDATE gallery SET judul = '$name' WHERE id = $id";
  mysqli_query($connt, $query);
  echo mysqli_affected_rows($connt);
}

function addgallery(){
  global $connt;
  $name = $_POST["name"];
  $gallery = $_POST["gallery"];
  $tanggal = date('d') . ' ' . date('F') . ' ' . date('Y');

  if( empty($name) ){
    echo 4;
    exit;
  }

  $query = "INSERT INTO gallery VALUES('', '$name', '$tanggal', '$gallery')";
  mysqli_query($connt, $query);
  echo mysqli_affected_rows($connt);
}

function hapusgallery(){
  global $connt;

  $deleteid = $_POST["deleteid"];
  $query = "DELETE FROM gallery WHERE id = $deleteid";
  mysqli_query($connt, $query);
  echo 1;
}

function edittestimonial(){
  global $connt;
  $id = $_POST["id"];
  $name = $_POST["name"];
  $position = $_POST["position"];
  $testimony = $_POST["testimony"];

  if(empty($name) || empty($position) || empty($testimony)){
    echo 4;
    exit;
  }

  $query = "UPDATE testimonial SET nama = '$name', jabatan = '$position', isi = '$testimony' WHERE id = $id";
  mysqli_query($connt, $query);
  echo mysqli_affected_rows($connt);
}

function hapustestimonial(){
  global $connt;

  $deleteid = $_POST["deleteid"];
  $query = "DELETE FROM testimonial WHERE id = $deleteid";
  mysqli_query($connt, $query);
  echo 1;
}

function addtestimonial(){
  global $connt;
  $name = $_POST["name"];
  $position = $_POST["position"];
  $testimony = $_POST["testimony"];

  if(empty($name) || empty($position) || empty($testimony)){
    echo 4;
    exit;
  }

  $query = "INSERT INTO testimonial VALUES('', 'noprofil.jpg', '$name', '$position', '$testimony')";
  mysqli_query($connt, $query);
  echo mysqli_affected_rows($connt);
}

function ubahutama(){
  global $connt;
  $title = $_POST["title"];
  $carouseldescription = $_POST["carouseldescription"];
  $abouth2 = $_POST["abouth2"];
  $abouth3 = $_POST["abouth3"];
  $descriptionp = $_POST["descriptionp"];
  $firstp = $_POST["firstp"];
  $secondp = $_POST["secondp"];
  $thirdp = $_POST["thirdp"];
  $italicp = $_POST["italicp"];
  $testimonialtitle = $_POST["testimonialtitle"];
  $firstaddress = $_POST["firstaddress"];
  $secondaddress = $_POST["secondaddress"];
  $thirdaddress = $_POST["thirdaddress"];
  $phonenumber = $_POST["phonenumber"];
  $email = $_POST["email"];
  $subscribetitle = $_POST["subscribetitle"];
  $copyright = $_POST["copyright"];
  $instagram = $_POST["instagram"];
  $facebook = $_POST["facebook"];
  $twitter = $_POST["twitter"];
  $youtube = $_POST["youtube"];

  if(empty($title)){
    echo 4;
    exit;
  }
  if(empty($carouseldescription)){
    echo 4;
    exit;
  }
  if(empty($testimonialtitle)){
    echo 4;
    exit;
  }
  if(empty($phonenumber)){
    echo 4;
    exit;
  }
  if(empty($email)){
    echo 4;
    exit;
  }
  if(empty($firstaddress)){
    echo 4;
    exit;
  }
  if(empty($secondaddress)){
    echo 4;
    exit;
  }
  if(empty($thirdaddress)){
    echo 4;
    exit;
  }
  if(empty($subscribetitle)){
    echo 4;
    exit;
  }
  if(empty($copyright)){
    echo 4;
    exit;
  }

  $query = "UPDATE utama SET nama = '$title', des = '$carouseldescription', h2about = '$abouth2', h3about = '$abouth3',
  pdes = '$descriptionp', p1 = '$firstp', p2 = '$secondp', p3 = '$thirdp', pitalic = '$italicp', testi = '$testimonialtitle',
  alamat1 = '$firstaddress', alamat2 = '$secondaddress', alamat3 = '$thirdaddress', notelp = '$phonenumber', email = '$email',
  subscribetitle = '$subscribetitle', copyright = '$copyright', instagram = '$instagram', facebook = '$facebook', twitter = '$twitter', youtube = '$youtube' WHERE id = 1";
  mysqli_query($connt, $query);
  echo mysqli_affected_rows($connt);
}

function subscriberdeleted(){
  global $connt;
  $deleteid = $_POST["deleteid"];
  $query = "DELETE FROM subscriber WHERE id = $deleteid";
  mysqli_query($connt, $query);
  echo 1;
}

function accountdeleteddfromadmin(){
  global $connt;

  $deleteid = $_POST["deleteid"];

  $selectsampah = count(query("SELECT * FROM sampah WHERE iduser = $deleteid"));
  if($selectsampah >= 1){
    echo 0;
    exit;
  }

  $query = "DELETE FROM data_user WHERE id = $deleteid";
  mysqli_query($connt, $query);
  echo 1;
}

function accountdeletedd(){
  global $connt;
  $deleteid = $_POST["deleteid"];
  $query = "DELETE FROM data_user WHERE id = $deleteid";
  $query2 = "DELETE FROM komentar WHERE iduser = $deleteid";
  mysqli_query($connt, $query);
  mysqli_query($connt, $query2);
  echo 1;
}

function replydeleted(){
  global $connt;
  $deleteid = $_POST["deleteid"];
  $barulagi = str_replace('s', '', $deleteid);
  $query = "DELETE FROM reply WHERE id = '$barulagi'";
  mysqli_query($connt,$query);
  echo 1;
}

function reply(){
  global $connt;
  $idnews = $_POST["idnews"];
  $iduser = $_POST["iduser"];
  $idkomentar  = $_POST["idkomentar"];
  $reply = htmlspecialchars($_POST["reply"]);
  $tanggal = $_POST["tanggal"];
  if(empty($iduser)){
    echo 4;
    exit;
  }
  if(empty($idkomentar)){
    echo 4;
    exit;
  }
  if(empty($reply)){
    echo 4;
    exit;
  }
  if(empty($idnews)){
    echo 4;
    exit;
  }
  $result2 = mysqli_query($connt, "SELECT * FROM reply WHERE isireply = '$reply' AND iduser = $iduser AND idkomentar = $idkomentar");
  if (mysqli_num_rows($result2) >= 1){
    echo 4;
    exit;
  }
  $result3 = mysqli_query($connt, "SELECT * FROM reply WHERE iduser = $iduser AND idkomentar = $idkomentar");
  if (mysqli_num_rows($result3) >= 3){
    echo 99;
    exit;
  }
  $query = "INSERT INTO reply VALUES('', '$idkomentar', '$iduser', '$reply', '$tanggal', '$idnews')";
  mysqli_query($connt, $query);
  echo mysqli_affected_rows($connt);
}

function commentdeleted(){
  global $connt;
  $deleteid = $_POST["deleteid"];
  $query = "DELETE FROM komentar WHERE id = $deleteid";
  $query2 = "DELETE FROM reply WHERE idkomentar = $deleteid";
  mysqli_query($connt,$query);
  mysqli_query($connt,$query2);
  echo 1;
}

function comment(){
  global $connt;
  $iduser = $_POST["iduser"];
  $idnews  = $_POST["idnews"];
  $comment = htmlspecialchars($_POST["comment"]);
  $tanggal = $_POST["tanggal"];
  if(empty($iduser)){
    echo 4;
    exit;
  }
  if(empty($idnews)){
    echo 4;
    exit;
  }
  if(empty($comment)){
    echo 4;
    exit;
  }
  $result2 = mysqli_query($connt, "SELECT * FROM komentar WHERE isikomentar = '$comment' AND iduser = $iduser AND idnews = $idnews");
  if (mysqli_num_rows($result2) >= 1){
    echo 4;
    exit;
  }
  $result3 = mysqli_query($connt, "SELECT * FROM komentar WHERE iduser = $iduser AND idnews = $idnews");
  if (mysqli_num_rows($result3) >= 3){
    echo 99;
    exit;
  }
  $query = "INSERT INTO komentar VALUES('', '$idnews', '$iduser', '$comment', '$tanggal')";
  mysqli_query($connt, $query);
  echo mysqli_affected_rows($connt);
}

function edituser(){
  global $connt;
  $id = $_POST["id"];
  $nama  = ucwords(strtolower( htmlspecialchars($_POST["nama"]) ), " \.");
  $email = strtolower(htmlspecialchars($_POST["email"]));
  $emailconfirm = $_POST["emailconfirm"];
  if(empty($nama)){
    echo 4;
    exit;
  }
  if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
    echo 4;
    exit;
  }
  $result = mysqli_query($connt, "SELECT email FROM data_user WHERE email = '$email'");
  if (mysqli_num_rows($result) >= 1 && $email != $emailconfirm){
    echo 999;
    exit;
  }
  $query = "UPDATE data_user SET nama = '$nama', email = '$email' WHERE id = $id";
  mysqli_query($connt, $query);
  echo mysqli_affected_rows($connt);
}

function query($query){
  global $connt;
  $result = mysqli_query($connt, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
  }

  return $rows;
}
?>
