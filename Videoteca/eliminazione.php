<html>
 <head>
  <title> Modificazione </title>
  <link rel="stylesheet" href="http://getbootstrap.com/css/#form-example" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css" type="text/css">
 </head>

 <body>
  <?php require 'header.php'; ?>
  <div class="row">
   <div class="col-md-3"> Menu <?php require 'menu.php'; ?> </div>
   <div class="col-md-9">
    <?php
      if(!empty($_POST))
	  {
	   //CODICE PHP
	   require 'config.php';
	   $connect = mysqli_connect($host, $user, $pwd, $db);
	   $chiave = $_POST['chiave'];
	   $q = "DELETE FROM film WHERE chiave = $chiave";
	   $query = mysqli_query($connect, $q);
	   if($query) { echo 'Film eliminato correttamente!'; }
	   else { echo 'Errore nell\' eliminazione del film!!'; }
	  }
	  else
	  {
	   ?>
	   
	   <form action="eliminazione.php" method="post">
	   <label for="title"> Inserisci la chiave della riga per eliminare il film dal database </label><br>
	   <label for="key"> Chiave: </label><br>
	   <input type="intval" name="chiave" required>
	   <button type="submit"> Elimina </button>
	   </form>
	   <?php }  ?>	
   </div>
   </div>
   <?php require 'footer.php'; ?>
  </body>
</html>