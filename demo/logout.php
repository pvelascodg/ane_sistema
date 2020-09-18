<?php session_start();
session_destroy();

?>
<?php   include("sesion.php");
		
		echo '<meta http-equiv="refresh" content="2;URL=http://'.$_SERVER["HTTP_HOST"].'/demo/index.php" />';
		//echo '<meta http-equiv="refresh" content="2;URL=http://localhost/amde/index.php" />';
	?>
	
     <?php 
