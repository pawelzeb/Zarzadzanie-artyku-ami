<?php
session_save_path("/tmp");
	session_start();
//start sesji  - dane formularzy	


?>
<?php require_once('config.php'); 
// załadowanie pliku z danymi do połączenia z bazą SQL
?>
<!DOCTYPE html>
<html>
	<html lang="pl">
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Load Bootstrap -->
		<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
		

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

	
		
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	
   

<script src="tinymce/tinymce.min.js" referrerpolicy="origin"></script>
<!-- zaczytanie stylów css, jquery, bootstrap -->





   <script>
       tinymce.init({
      selector: 'textarea',
	  language : "pl",
      plugins: 'image code',
      toolbar: 'undo redo | image code',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
	  
	  // without images_upload_url set, Upload tab won't show up
    images_upload_url: 'upload.php',
    
    // override default upload handler to simulate successful upload
    images_upload_handler: function (blobInfo, success, failure) {
        var xhr, formData;
      
        xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.open('POST', 'upload.php');
      
        xhr.onload = function() {
            var json;
        
            if (xhr.status != 200) {
                failure('HTTP Error: ' + xhr.status);
                return;
            }
        
            json = JSON.parse(xhr.responseText);
        
            if (!json || typeof json.location != 'string') {
                failure('Invalid JSON: ' + xhr.responseText);
                return;
            }
        
            success(json.location);
        };
      
        formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());
      
        xhr.send(formData);
    },
    }); 
	  tinymce.init({
		  language : "pl",
        selector: '#textarea',
      });
    </script>
	<script>
tinymce.init({
    selector: '#myTextarea',
    plugins: 'image code',
    toolbar: 'undo redo | image code',
    
    // without images_upload_url set, Upload tab won't show up
    images_upload_url: 'tinymce_upload_image_php/upload.php',
    
    // override default upload handler to simulate successful upload
    images_upload_handler: function (blobInfo, success, failure) {
        var xhr, formData;
      
        xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.open('POST', 'upload.php');
      
        xhr.onload = function() {
            var json;
        
            if (xhr.status != 200) {
                failure('HTTP Error: ' + xhr.status);
                return;
            }
        
            json = JSON.parse(xhr.responseText);
        
            if (!json || typeof json.location != 'string') {
                failure('Invalid JSON: ' + xhr.responseText);
                return;
            }
        
            success(json.location);
        };
      
        formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());
      
        xhr.send(formData);
    },
});
</script>

		<link rel="stylesheet"
			href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
			integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I"
			crossorigin="anonymous" />
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
				integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
				crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
				integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
				crossorigin="anonymous"></script>
			

<style>
.btn {
   border-radius: 0;

</style>	
<!-- zaczytanie stylów css, tinymce, jquer, bootstrap -->	
	
	</head>

	<body>
	<div class='alert alert-success'>Zalogowany:	 <?php echo $_SESSION['user_id']; ?><div class="pr-md-5 float-sm-right"> <a href="http://zwikjawor.pl/projekt/login.php?logout">Wyloguj </a></div></div>
	<!-- sprawdzenie czy istnieje sesja użytkownika -->



<h1 style="color: green; text-align: center;">
				Panel administracyjny
			</h1>
<div class="container mt-3">

	<ul class="nav justify-content-center nav-pills mb-3" id="pills-tab" role="tablist">
<li class="nav-item dropdown">
    <a class="btn btn-success btn-primary dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
      aria-expanded="false">Artykuł</a>
    <div class="dropdown-menu dropdown-success" aria-labelledby="dropdownMenuOffset">
      <a class="dropdown-item" data-toggle="pill" href="#dodaj-artykul" role="tab" aria-controls="dodaj-artykuł" aria-selected="true">Dodaj artykuł</a>
      <a class="dropdown-item" data-toggle="pill" href="#spis-artykulow" role="tab" aria-controls="spis-artykulow" aria-selected="true">Spis artykułów</a> 
    </div>
  </li>
  

</ul>



<div class="tab-content">
    <div class="tab-pane fade" id="dodaj-artykul" role="tabpanel" aria-labelledby="dodaj-artykul-tab">
  <form action="article.php" method="POST" id="signupForm1">
<h4>Tytuły artykułu</h4>
  <input type="text" name="tytul" class="form-control"/>
  <br />
  <h4>Treść artykułu</h4>
  <textarea id="textarea" name="tekst"></textarea><button class="btn btn-info" id="submit2" type="submit" name="submit2">Wyślij</button></form></div>
  <div class="tab-pane fade" id="spis-artykulow" role="tabpanel" aria-labelledby="spis-artykulow-tab">spis-artykulow
  <?php require_once('art.php'); ?>
  </div>
  
  
  <div class="tab-pane fade" id="spis-artykulow" role="tabpanel" aria-labelledby="spis-artykulow-tab">spis-artykulow
  <?php require_once('art.php'); ?>
  </div>
<!-- formularz do dodawwania danych -->
   
 

  
		</div>
		
</div>
	</body>
</html>
