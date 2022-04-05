<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style media="screen">
  #modalUpload{
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background-color: rgba(0, 0, 0, 0.6);
  z-index: 100;
  /* display: flex; */
  display: flex;
  justify-content: center;
  align-items: center;
}

.modal{
  background-color: #e6ecf0;
  padding: 10px 0 20px 0;
  width: 100%;
  height: 100%;
  text-align: center;
  display: flex;
  align-items: center;
  justify-content: center;

}

.top-form{
  display: flex;
  justify-content: flex-end;
}

.top-form .close-modal{
  cursor: pointer;
  padding: 0 20px;
  font-size: 20px;
}

.login-form{
  width: 100%;
}

.login-form h2{
  letter-spacing: 1px;
  margin-top: 10px;
  margin-bottom: 30px;
}

.login-form form input, .login-form form select{
  width: 75%;
  margin-bottom: 20px;
  padding: 12px 12px;
  box-sizing: border-box;
  border: 1px solid #d0d5d8;
  border-radius: 3px;
}

.login-form form button{
  padding: 12px 0px;
  width: 75%;
  background-color: #5dca88;
  border: 0;
  border-radius: 3px;
  color: white;
  margin: 10px auto;
  cursor: pointer;
}

.btn-warning{
  position: relative;
  padding: 11px 16px;
  font-size: 15px;
  line-height: 1.5;
  border-radius: 3px;
  color: #fff;
  background-color: #ffc100!important;
  border: 0;
  transition: 0.2s;
  overflow: hidden; \\ L
}

.btn-warning input[type = "file"]{
  cursor: pointer;
  position: absolute;
  left: 0%;
  top: 0%;
  transform: scale(3);
  opacity: 0;
}

.btn-warning:hover{
  background-color: #d9a400!important;
}
</style>

<div id="modalUpload">
    <div class="modal">
      <div class="top-form">
      </div>
      <div class = "login-form">
        <h1>Upload Kartu</h1>
        <form action="" method = "post" spellcheck = "false" autocomplete="off" enctype="multipart/form-data">
          <input class="form-control" type="email" placeholder="Email" required name = "email">
          <input class="form-control" type="text" placeholder="Nama Kartu" required name = "imageName">
          <div class="upload" style = "margin-top: -10px;">
            <button type = "button" class = "btn-warning">
              <i class = "fa fa-upload"></i> Upload Kartu
              <input type="file" name="image" accept=".jpg, .jpeg, .png" required>
            </button>
          </div>
          <button type = "submit" name = "submitimage" class = "submit-btn">Submit</button>
        </form>
      </div>
    </div>
  </div>

<?php
$conn = mysqli_connect("localhost", "root", "", "template");

if(isset($_POST["submitimage"])){
  $email = $_POST["email"];
  $imageName = $_POST["imageName"];

  if($_FILES["image"]["error"] == 4){
    echo
    "<script> alert('Image Does Not Exist'); </script>"
    ;
  }
  else{
    $fileName = $_FILES["image"]["name"];
    $fileSize = $_FILES["image"]["size"];
    $tmpName = $_FILES["image"]["tmp_name"];

    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));
    if ( !in_array($imageExtension, $validImageExtension) ){
      echo
      "
      <script>
        alert('Invalid Image Extension');
      </script>
      ";
    }
    else if($fileSize > 1000000){
      echo
      "
      <script>
        alert('Image Size Is Too Large');
      </script>
      ";
    }
    else{
      $newImageName = $imageName . " - " . date("Y.m.d") . " - " . date("h.i.sa");
      $newImageName .= '.' . $imageExtension;

      move_uploaded_file($tmpName, 'usersUpload/' . $newImageName);
      $query = "INSERT INTO card VALUES('', '$email', '$imageName', '$newImageName', 0)";
      mysqli_query($conn, $query);
      echo
      "
      <script>
        alert('Successfully Added');
        document.location.href = '';
      </script>
      ";
    }
  }
}
