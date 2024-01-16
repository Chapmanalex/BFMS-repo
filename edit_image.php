<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>edit image</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- the back button -->
   <button class="btn btn-info mt-4 ml-4" 
          onclick="history.back()" >
          <span data-feather='arrow-left'></span>
          <strong>BACK</strong>
  </button>

  <!-- <input type="file" id="image-input" />
<img id="image-preview" />

<script>
function previewImage() {
  const image = document.getElementById("image-input").files[0];
  const reader = new FileReader();

  reader.onload = function() {
    const preview = document.getElementById("image-preview");
    preview.src = reader.result;
  };

  reader.readAsDataURL(image);
}

document.getElementById("image-input").addEventListener("change", previewImage);
</script> -->

  <!-- /////////////////////////////////////////////////////////////// -->
  <!-- function for image preview -->
  

  <div class="container">
    <div class="row mt-4">
      <div class="col-md-8 ">
        <div class="card">
          <div class="card-header">
            <h5>My Image</h5>
          </div>
          <img id="image-preview" />
          
        </div>
        
      </div>
      <div class="col-md-8 mt-2">
        <div class="card">
        <form class="form" 
          action="imageupload_action.php"
          method="POST"
          id="imageform" 
          enctype="multipart/form-data">
          

          <div class="col-md-12 mt-2">
          <div class="input-group-apend">
          <label class="custom-file-label">input your image file </label>
          <input type="file" 
                 name="fileToUpload"
                 id="image-input"
                 class="custom-file-input"
                 required  >

                  <button class="btn btn-secondary btn-block mt-4" 
                    type="submit" 
                    name='but_upload' 
                    id="profilepicinput">
                    Upload
                  </button>
            
          </div>
          </div>
          <div class="row ">
            
          </div>
          
      
    </form>
          
        </div>
        
      </div>
      
    </div>

    <script>
function previewImage() {
        const image = document.getElementById("image-input").files[0];
        const reader = new FileReader();

        reader.onload = function()
         {
        const preview = document.getElementById("image-preview");
         preview.src = reader.result;
         };

        reader.readAsDataURL(image);
}

   document.getElementById("image-input").addEventListener("change", previewImage);
</script> 
    
  </div>

<!-- <div class="container d-flex justify-content-center align-items-center" 
				style="min-height: 100vh">
	<div class="row">
		<div class="col-lg-12 offset-md mt-4">
		
		    <form class="form mt-10" 
              action="imageupload_action.php" 
              method="POST" 
              id="imageform" 
              enctype="multipart/form-data">
			           <div class="row">
                      <div class="input-group">
                            <div class="custom-file">
                                  <input type="file" 
                                         name='fileToUpload' 
                                         class="custom-file-input" 
                                         id="profilepic" 
                                         aria-describedby="profilepicinput" 
                                         required>
                                  <label class="custom-file-label" 
                                         for="profilepic">
                                  </label>
                              </div>
                      <br>
                      <br>
                      
                      </div>
                  </div>
                  <div class="row">
            	         <div class="input-group ">
            		            <div class="col pull-left">
                              <a href="" 
                                 class="btn btn-secondary"> cancel</a>
                            </div>
                          <button class="btn btn-secondary pull-right" 
                                  type="submit" 
                                  name='but_upload' 
                                  id="profilepicinput">
                                  Upload Picture
                          </button>
                       </div>
            	
                  </div>
        </form>
    </div>
	</div>


</div> -->

</body>
</html>