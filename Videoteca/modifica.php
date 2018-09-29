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
	  if(empty($_POST)) { $mode = 0; }
	  else { $mode = $_POST['mode']; }
	  
	  
	  
	  require 'config.php';
	  $connect = mysqli_connect($host, $user, $pwd, $db);
	  if($connect = FALSE){echo 'Errore di connessione';}
	  switch($mode)
	  {
	   case 0:
	   echo $mode;
	  ?>
	   <form action="modifica.php" method="post">
	   <label for="title"> Inserisci la chiave per la modifica </label><br>
	   <label for="code">Chiave: </label><br>
	   <input type="text" name="code" required><br>
	   <button type="submit" name="mode" value="1"> Cerca </button>
	   </form>
	   <?php
	   break;
	   
	   case 1:
	    echo $mode;
	    require 'config.php';
		$connect = mysqli_connect($host, $user, $pwd, $db);
	    $check = $_POST['code'];
		unset($_POST['code']);
		$query = mysqli_query($connect, "SELECT * FROM film WHERE chiave = $check");
		if($query)
		{
		 $row = mysqli_fetch_assoc($query);
		 $chiave = $row['chiave'];
		 $titolo = $row['titolo'];
		 $anno = $row['anno'];
		 $durata = $row['durata'];
		 $immagine = $row['immagine'];
		 $regista = $row['regista'];
		 $descrizione = $row['descrizione'];
		 mysqli_free_result($query);
		}
		else { echo 'Query errata'; }
		?>
		<form action="modifica.php" method="post">
		<label for="title"> Modifica i dati (non è obbligatorio modificarli tutti) </label><br>
		<input type="intval" name="chiave" value="<?php echo $chiave; ?>" hidden><br>
		<label for="titolo"> Titolo: </label><br>
		<input type="text" name="titolo" value="<?php echo $titolo; ?>"><br>
		<label for="anno"> Anno: </label><br>
		<?php require 'time.php'; ?><br>
		<label for="durata">Durata: </label><br>
		<input type="text" name="durata" value="<?php echo $durata; ?>"><br>
		<label for="immagine">Immagine: </label><br>
		<input type="text" name="immagine" value="<?php echo $immagine; ?>"><br>
		<label for="regista">Regista: </label><br>
		<input type="text" name="regista" value="<?php echo $regista; ?>"><br>
		<label for="descrizione">Descrizione: </label><br>
		<textarea name="descrizione" value="<?php echo $descrizione; ?>"> </textarea><br>
		<button type="submit" name="mode" value="2"> Modifica </button>
		</form>
		<?php
		break;
	   
	   case 2:
	   echo $mode;
	   require 'config.php';
	   $connect = mysqli_connect($host, $user, $pwd, $db);
	    $chiave = $_POST['chiave'];
	    $chiave = mysqli_real_escape_string($connect, $chiave);
	    $titolo = $_POST['titolo'];
		$titolo = mysqli_real_escape_string($connect, $titolo);
		$anno = $_POST['anno'];
		$anno = mysqli_real_escape_string($connect, $anno);
		$durata = $_POST['durata'];
		$durata = mysqli_real_escape_string($connect, $durata);
		$immagine = $_POST['immagine'];
		$immagine = "<img src=".$immagine." />";
		strip_tags($immagine);
		$regista = $_POST['regista'];
		$regista = mysqli_real_escape_string($connect, $regista);
		$descrizione = $_POST['descrizione'];
		
		$descrizione = mysqli_real_escape_string($connect, $descrizione);
	    $query = mysqli_query($connect, "UPDATE film SET titolo = $titolo, anno = $anno, durata = $durata, immagine = $immagine, regista = $regista, descrizione = $descrizione WHERE chiave = $chiave");
		if($query = TRUE)
			echo 'Modifica eseguita con successo';
		else
			echo 'Errore nella modifica';  
	  } 
	  
	  ?>
	</div>
	
	</div>
	<?php require 'footer.php'; ?>
 </body>
 </html>