<?php
$conn = mysqli_connect("localhost", "root", "", "template");

if(isset($_POST["submitimage"])){
  $email = $_POST["email"];
  $imageName = $_POST["imageName"];
  $color_id = $_POST["color_id"];

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

      move_uploaded_file($tmpName, '../usersUpload/' . $newImageName);
      $query = "INSERT INTO card VALUES('', '$email', '$imageName', '$newImageName', '$color_id', 0)";
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
