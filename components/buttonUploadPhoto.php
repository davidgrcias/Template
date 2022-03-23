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
  display: none;
  justify-content: center;
  align-items: center;
}

.modal{
  background-color: #e6ecf0;
  padding: 10px 0 20px 0;
  border-radius: 10px;
  width: 450px;
  text-align: center;
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

.login-form h2{
  letter-spacing: 2px;
  margin-top: 10px;
  margin-bottom: 30px;
}

.login-form form input{
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
<button type="button" name="button" id="modalUpload-show">Kirim Foto</button>

<div id="modalUpload">
    <div class="modal">
      <div class="top-form">
        <div class="close-modal">
          &#10006;
        </div>
      </div>
      <div class = "login-form">
        <h2>Upload Foto</h2>
        <form id = "uploadForm" action="" method = "post" spellcheck = "false"  autocomplete="off" enctype="multipart/form-data">
          <input class="form-control" type="email" placeholder="Email" required name = "email">
          <input class="form-control" type="text" placeholder="Nama Foto" required name = "imageName">
          <div class="upload" style = "margin-top: -10px;">
            <button type = "button" class = "btn-warning">
              <i class = "fa fa-upload"></i> Upload Foto
              <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png" required>
            </button>
          </div>
          <button type = "submit" name = "submit" onclick = "uploadImage();" class = "submit-btn">Submit</button>
        </form>
      </div>
    </div>
  </div>

<script type="text/javascript">
    $(function() {

      $('#modalUpload-show').click(function() {
        $('#modalUpload').fadeIn().css("display", "flex");
      });

      $('.close-modal').click(function() {
        $('#modalUpload').fadeOut();
      });
    });
  </script>

  <script type="text/javascript">
      // Prevent form from submit or refresh
      var form = document.getElementById("uploadForm");
      function handleForm(event) { event.preventDefault(); }
      form.addEventListener('submit', handleForm);
      // Function
      function uploadImage(){
        $(document).ready(function(){

          $.ajax({
            // Action
            url: 'function.php',
            // Method
            type: 'POST',
            data: {
              // Get value
              imageName: $("input[name=imageName]").val(),
              email: $("input[name=email]").val(),
              image: $("input[name=image]").val(),
              action: "uploadImage"
            },
            success:function(response){
              // Response is the output of action file
              if(response == 1){
                alert("Data Added Successfully!");
              }
              else if(response == 2){
                alert("Email Is Not Available");
              }
              else if(response == 3){
                alert("You Must Be Able To Speak More Than 1 Language");
              }
              else{

              }
            }
          });
        });
      }
    </script>
