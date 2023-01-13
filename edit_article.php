 <!doctype html>
 <?php if(isset($_POST['submit2'])) {
	if(isset($_POST['autor'])) {	
	if (!empty($_SERVER['HTTP_REFERER'])) {
		header("Location: ".$_SERVER['HTTP_REFERER']);	
}
}}
?>

<?php require_once('meta_date.html'); 
  require_once('config.php'); 
session_save_path("/tmp");
	session_start();
	
 ?>
  
  <body>
    <title>Panel admina</title>

    <div class='alert alert-success'>Witaj2<div class="pr-md-5 float-sm-right"> <a href="$_SERWER['HTTP_HOST']/login.php?logout">Wyloguj</a></div></div>
  

  
   <script>
tinymce.init({
  selector: 'textarea',  // change this value 
language: "pl",
  plugins: 'image',
  a11y_advanced_options: true
});

	  tinymce.init({
		  language : "pl",
        selector: '#textarea',
      });
	  
    </script>

   <script>  
 $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Materiał" class="form-control name_list" required /></td><td><input type="number" name="name[]" placeholder="Ilość" class="form-control name_list" min="1" max="100" required /></td><td><input type="number" name="name[]" placeholder="Cena" class="form-control name_list" min="100.00" max="10000.00" step="0.01" required /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">Usuń pozycję</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      $('#submit').click(function(){            
           $.ajax({  
                url:"name.php",  
                method:"POST",  
                data:$('#signupForm').serialize(),  
                success:function(data)  
                {  
                     alert(data);  
                     $('#signupForm')[0].reset();  
                }  
           });  
      }); 
	  $('#submit2').click(function(){            
           $.ajax({  
                url:"edit_article.php",  
                method:"POST",  
                data:$('#signupForm').serialize(),  
                success:function(data)  
                {  
                     alert(data);  
                     $('#signupForm')[0].reset();  
                }  
           });  
      });

 });  
 </script>
  

  <script>
  
	$.validator.setDefaults({
		submitHandler: function() {
			alert("submitted!");
		}
	});

	</script>
	
		<style>
	#commentForm {
		width: 500px;
	}
	#commentForm label {
		width: 250px;
	}
	#commentForm label.error, #commentForm input.submit {
		margin-left: 253px;
	}
	#signupForm {
		//width: 670px;
	}
	#signupForm label.error {
		margin-left: 10px;
		width: auto;
		display: inline;
	}
	#newsletter_topics label.error {
		display: none;
		margin-left: 103px;
	}
	</style>
  
  		<script>
$(document).ready(function(){
	$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
		localStorage.setItem('activeTab', $(e.target).attr('href'));
	});
	var activeTab = localStorage.getItem('activeTab');
	if(activeTab){
		$('#myTab a[href="' + activeTab + '"]').tab('show');
	}
});

</script>
<!--
<script language="javascript">

var ref=document.referrer;
var anachor = 'wstecz';
document.write('You have arrived from<BR> '+ref)

</script>
<script>
if (ref == 'http://localhost:8080/admin.php') {
  document.write("<p>Link: " + anachor.link("http://localhost:8080/admin.php'") + "</p>");	
} 
else if (ref == '$_SERVER['HTTP_REFERER']./admin.php') {
  document.write("<p>Linki: " + anachor.link("http://localhost:8080/admin.php'") + "</p>");	
} 
</script>
-->
	</head>
	
<?php


$id = isSet( $_POST['id'] ) ? intval( $_POST['id'] ) : 0;

 


if(isset($_POST['autor'])) {
if($id>0) {
	$result = $db -> Prepare("UPDATE `artykulyprojekt` SET `autor`=:autor,`tytul`=:tytul,`tekst`=:tekst WHERE id = :id");
 $result -> bindParam(':id', $id, PDO::PARAM_INT);
}

if($id<=0) {
	 $result = $db->prepare( 'INSERT INTO `artykulyprojekt` VALUES("", :autor, :tytul, :tekst)');	
$result -> bindParam(':autor', $_SESSION['user_id'], PDO::PARAM_STR); 

}

				$result -> bindParam(':autor', $_SESSION['user_id'], PDO::PARAM_INT);
				$result -> bindParam(':tytul', $_POST['tytul'], PDO::PARAM_STR);
				$result -> bindParam(':tekst', $_POST['tekst'], PDO::PARAM_STR);
				$result -> execute(); 
}
	
$idi = isSet( $_GET['id'] ) ? intval( $_GET['id'] ) : 0;
if($idi>0) {
				$result = $db->prepare('SELECT * FROM artykulyprojekt WHERE id = :id' );
				$result -> bindParam(":id", $idi, PDO::PARAM_STR);
				$result -> execute(); 
//print_r($result -> fetch());
$val = $result -> fetch();
}
/*
echo 'id:'.$val['id'].'<br />';
echo 'tytul:'.$val['tytul'].'<br />';
echo 'tekst:'.$val['tekst'].'<br />';
echo 'autor:'. $val['autor'].'<br />';

if($val !== false) {
	  echo 'jest oka';
  }
  else {
  echo 'źle';
  }
*/
?>

 <h3><?php echo !empty( $_GET['id'] ) ? 'Edytujesz' : 'Dodajesz';?> artykuł</h3>
 
<form method="post" action="edit_article.php">
<?php

if($idi>0) {
	 echo '<input type="hidden" name="id" value="' . $idi. '">';
	//echo '<input type="hidden" name="idi" value="' . $id . '">';
}
	?>
 <input type="hidden" name="autor" class="form-control" <?php if( isSet( $val['autor'] ) ) { echo 'value="'. $val['autor'] .'"';}  ?> /> 
 <h4>Tytuł artykułu</h4>
 <input type="text" name="tytul" class="form-control" <?php  echo 'value="'. $val['tytul'] .'"';  ?> />
  <br />
  <h4>Treść artykułu</h4>
  <textarea id="textarea" name="tekst"><?php  echo $val['tekst'];  ?></textarea>
  <button class="btn btn-info" id="submit2" type="submit" name="submit2">Wyślij</button></form></div>

          <a href="javascript: window.location.href='<?php echo 'http://zwikjawor.pl/projekt/admin.php#spis-artykułów' ?>'">Wróć.</a>









	