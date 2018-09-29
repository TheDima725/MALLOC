<html>
 <head>
  <title> Visualizzazione </title>
  <link rel="stylesheet" href="http://getbootstrap.com/css/#form-example" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css" type="text/css" >
 </head>

 <body>
  <?php require 'header.php'; ?>
  <div class="row">
   <div class="col-md-3"> Menu <?php require 'menu.php'; ?> </div>
   <div class="col-md-9">

   <?php
    require 'config.php';
	$connect = mysqli_connect($host, $user, $pwd, $db);
	$q = mysqli_query($connect,'SELECT * FROM film');
	if(!$q)
	 echo 'Query errata';
	else
	 while($row = mysqli_fetch_assoc($q))
 	{ $film[] = $row; }
 	mysqli_free_result($q);
	/* echo '<table class="table"><tr style="font-size: 20px"><td>ID FILM</td><td>Titolo</td><td>Anno</td><td>Durata</td><td>Immagine</td><td>Regista</td><td>Descrizione</td></table>'; */
	 echo '<table class="table">';

	 foreach($film as $riga){
 	 echo '<tr>';
 	 foreach($riga as $campo=>$valore){
	 echo "<td> $valore </td>";
  	}
  	echo '<tr>';
 	}
	 echo '</table>';
    ?>
   </div>
  </div>
  <?php require 'footer.php'; ?>
 </body>
</html>