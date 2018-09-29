<html>
 <head>
  <title> Inserimento </title>
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
	  require 'config.php';
	  $connect = mysqli_connect($host, $user, $pwd, $db);
	  $titolo = $_POST['titolo'];
	  $titolo = mysqli_real_escape_string($connect, $titolo);
	  $anno = $_POST['anno'];
	  $anno = mysqli_real_escape_string($connect, $anno);
	  $durata = $_POST['durata'];
	  $durata = mysqli_real_escape_string($connect, $durata);
	  $immagine = $_POST['immagine'];
	  $immagine = mysqli_real_escape_string($connect, $immagine);
	  $immagine = "<img src=".$immagine." />";
	  strip_tags($immagine);
	  $regista = $_POST['regista'];
	  $regista = mysqli_real_escape_string($connect, $regista);
	  $descrizione = $_POST['descrizione'];
	  $descrizione = mysqli_real_escape_string($connect, $descrizione);
	  $query = "INSERT INTO film (titolo, anno, durata, immagine, regista, descrizione)VALUES('$titolo', '$anno', '$durata', '$immagine', '$regista', '$descrizione')";
	  $q = mysqli_query($connect, $query);
	  if($q)
           echo '<div class="alert alert-success" role="alert"> Inserito correttamente! </div>';
	  else
           echo 'ERRORE!!';
         }
	 else
	 {
	  ?>
	  <form action="inserimento.php" method="post">
	  <div class="form-group">
	  <label for="titolo"> Inserisci il film: </label><br>
	  <p style="text-align: right"> *la maggiorparte dei campi sono obbligatori </p><br>
	  <label for="titolo"> Titolo: </label><br>
	  <input type="text" name="titolo" required><br>
	  <label for="anno"> Anno: </label><br>
	  <?php require 'time.php'; ?>
	  <label for="durata"> Durata (XX:YY:ZZ) </label><br>
	  <input type="text" name="durata" required><br>
	  <label for="immagine"> Inserisci il link della copertina per poterla visualizzare in futuro(opzionale): </label><br>
	  <input type="link" name="immagine"><br>
	  <label for="regista"> Regista: </label><br>
	  <input type="text" name="regista" required><br>
	  <label for="descrizione"> Descrizione (opzionale): </label><br>
	  <textarea name="descrizione" placeholder="inserisci qui..."> </textarea>
	  <button type="submit"> Inserisci </button>
	  </div>
	  </form>
	 <?php  } ?>
	</div>
   </div>
   <?php require 'footer.php'; ?>
  </body>
</html>  
	 