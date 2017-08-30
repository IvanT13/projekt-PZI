<html>
	<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="evidencijaZaposlenikaCSS.css">
	<title>Evidencija zaposlenika</title>
	
	<style>
		h2{
			text-align: center;
			margin-top: 20px;
		}
		
		.tablica{
			margin: auto;
			padding: 20px 0px 0px 200px;
		}
		
		.botun{
			padding: 10px 10px 10px 10px;
			margin: 5px 0px 5px 1027px;
			font-size: 15px;
		}
	
	</style>
	
</head>
<body>
	<h2> REZULTAT PRETRAGE </h2>
	
	<?php
		
		if(!isset($_POST['odabir']) || empty($_POST['odabir'])){
			echo "Polje za odabir ne smije biti prazno";
			header("refresh:4; url=traziZaposlenika.html");
		}else if(!isset($_POST['subjekt']) || empty($_POST['subjekt'])){
			echo "Polje za unos ne smije biti prazno";
			header("refresh:4; url=traziZaposlenika.html");
		}
		else{
			$odabir = $_POST['odabir'];
			$subjekt = $_POST['subjekt'];
			if($odabir == 'ime'){
				$con=mysqli_connect("127.0.0.1","root","");
								
					if(!$con){
						die("Nesupjelo spajanje: " . mysqli_error());
					}
					mysqli_select_db($con,"evidencija");
					$sql = "SELECT * FROM zaposlenici WHERE ime='$subjekt'";
					$myData = mysqli_query($con,$sql);
					echo "<div class = 'tablica'>
					<table border = 1>
					<tr>
					<th>Ime</th>
					<th>Prezime</th>
					<th>Spol</th>
					<th>OIB</th>
					<th>Datum rođenja</th>
					<th>Stručna sprema</th>
					<th>Pozicija u tvrtki</th>
					<th>Mjesečna plaća</th>
					<th>Izbriši</th>
					<th>Ažuriraj podatke</th>
					</tr>";
					while($record = mysqli_fetch_array($myData)){
						echo "<tr>";
						echo "<td>" . $record['ime'] . "</td>";
						echo "<td>" . $record['prezime'] . "</td>";
						echo "<td>" . $record['spol'] . "</td>";
						echo "<td>" . $record['OIB'] . "</td>";
						echo "<td>" . $record['rodjenje'] . "</td>";
						echo "<td>" . $record['sprema'] . "</td>";
						echo "<td>" . $record['pozicija'] . "</td>";
						echo "<td>" . $record['placa'] . "</td>";
						echo "<td><a href=izbrisiZaposlenika.php?id=".$record['ID'].">Izbriši</a></td>";
						echo "<td><a href=azurirajZaposlenika.php?id=".$record['ID'].">Ažuriraj</a></td>";
						echo "</tr>";
									
						}
				
				echo "</table> </div>";
				
				echo "<button onclick='nazad()' class='botun'>Nazad</button> </br>";
				echo "<script>
					function nazad(){
						window.close();
						window.open('traziZaposlenika.html');
					}
					</script>";
			}
			else if($odabir == 'prezime'){
				$con=mysqli_connect("127.0.0.1","root","");
								
					if(!$con){
						die("Nesupjelo spajanje: " . mysqli_error());
					}
					mysqli_select_db($con,"evidencija");
					$sql = "SELECT * FROM zaposlenici WHERE prezime='$subjekt'";
					$myData = mysqli_query($con,$sql);
					echo " <div class = 'tablica'> <table border = 1>
					<tr>
					<th>Ime</th>
					<th>Prezime</th>
					<th>Spol</th>
					<th>OIB</th>
					<th>Datum rođenja</th>
					<th>Stručna sprema</th>
					<th>Pozicija u tvrtki</th>
					<th>Mjesečna plaća</th>
					<th>Izbriši</th>
					<th>Ažuriraj podatke</th>
					</tr>";
					while($record = mysqli_fetch_array($myData)){
						echo "<tr>";
						echo "<td>" . $record['ime'] . "</td>";
						echo "<td>" . $record['prezime'] . "</td>";
						echo "<td>" . $record['spol'] . "</td>";
						echo "<td>" . $record['OIB'] . "</td>";
						echo "<td>" . $record['rodjenje'] . "</td>";
						echo "<td>" . $record['sprema'] . "</td>";
						echo "<td>" . $record['pozicija'] . "</td>";
						echo "<td>" . $record['placa'] . "</td>";
						echo "<td><a href=izbrisiZaposlenika.php?id=".$record['ID'].">Izbriši</a></td>";
						echo "<td><a href=azurirajZaposlenika.php?id=".$record['ID'].">Ažuriraj</a></td>";
						echo "</tr>";
									
						}
				
				echo "</table> </div>";
				
				echo "<button onclick='nazad()' class='botun'>Nazad</button> </br>";
				echo "<script>
					function nazad(){
						window.close();
						window.open('traziZaposlenika.html');
					}
					</script>";
			}
			else if($odabir == 'spol'){
				if($subjekt != 'M' && $subjekt != 'Z'){
					echo "Unos za pretragu spola mora biti M ili Z";
					header("refresh:4; url=traziZaposlenika.html");
				}else{
					$con=mysqli_connect("127.0.0.1","root","");
								
					if(!$con){
						die("Nesupjelo spajanje: " . mysqli_error());
					}
					mysqli_select_db($con,"evidencija");
					$sql = "SELECT * FROM zaposlenici WHERE spol='$subjekt'";
					$myData = mysqli_query($con,$sql);
					echo " <div class = 'tablica'> <table border = 1>
					<tr>
					<th>Ime</th>
					<th>Prezime</th>
					<th>Spol</th>
					<th>OIB</th>
					<th>Datum rođenja</th>
					<th>Stručna sprema</th>
					<th>Pozicija u tvrtki</th>
					<th>Mjesečna plaća</th>
					<th>Izbriši</th>
					<th>Ažuriraj podatke</th>
					</tr>";
					while($record = mysqli_fetch_array($myData)){
						echo "<tr>";
						echo "<td>" . $record['ime'] . "</td>";
						echo "<td>" . $record['prezime'] . "</td>";
						echo "<td>" . $record['spol'] . "</td>";
						echo "<td>" . $record['OIB'] . "</td>";
						echo "<td>" . $record['rodjenje'] . "</td>";
						echo "<td>" . $record['sprema'] . "</td>";
						echo "<td>" . $record['pozicija'] . "</td>";
						echo "<td>" . $record['placa'] . "</td>";
						echo "<td><a href=izbrisiZaposlenika.php?id=".$record['ID'].">Izbriši</a></td>";
						echo "<td><a href=azurirajZaposlenika.php?id=".$record['ID'].">Ažuriraj</a></td>";
						echo "</tr>";
									
						}
				
				echo "</table> </div>";
				
				echo "<button onclick='nazad()' class='botun'>Nazad</button> </br>";
				echo "<script>
					function nazad(){
						window.close();
						window.open('traziZaposlenika.html');
					}
					</script>";
				}
			}
			else if($odabir == 'sprema'){
				if($subjekt != 'NKV' && $subjekt != 'KV' && $subjekt != 'SSS' && $subjekt !='VSS' && $subjekt != 'VKV'){
					echo "Unos za pretragu stručne spreme mora biti NKV, KV, VKV, SSS ili VSS";
					header("refresh:4; url=traziZaposlenika.html");
				}
				else{
					$con=mysqli_connect("127.0.0.1","root","");
								
					if(!$con){
						die("Nesupjelo spajanje: " . mysqli_error());
					}
					mysqli_select_db($con,"evidencija");
					$sql = "SELECT * FROM zaposlenici WHERE sprema = '$subjekt'";
					$myData = mysqli_query($con,$sql);
					
					echo " <div class = 'tablica'> <table border = 1>
					<tr>
					<th>Ime</th>
					<th>Prezime</th>
					<th>Spol</th>
					<th>OIB</th>
					<th>Datum rođenja</th>
					<th>Stručna sprema</th>
					<th>Pozicija u tvrtki</th>
					<th>Mjesečna plaća</th>
					<th>Izbriši</th>
					<th>Ažuriraj podatke</th>
					</tr>";
					while($record = mysqli_fetch_array($myData)){
						echo "<tr>";
						echo "<td>" . $record['ime'] . "</td>";
						echo "<td>" . $record['prezime'] . "</td>";
						echo "<td>" . $record['spol'] . "</td>";
						echo "<td>" . $record['OIB'] . "</td>";
						echo "<td>" . $record['rodjenje'] . "</td>";
						echo "<td>" . $record['sprema'] . "</td>";
						echo "<td>" . $record['pozicija'] . "</td>";
						echo "<td>" . $record['placa'] . "</td>";
						echo "<td><a href=izbrisiZaposlenika.php?id=".$record['ID'].">Izbriši</a></td>";
						echo "<td><a href=azurirajZaposlenika.php?id=".$record['ID'].">Ažuriraj</a></td>";
						echo "</tr>";
									
						}
				
				echo "</table>  </div>";
				
				echo "<button onclick='nazad()' class='botun'>Nazad</button> </br>";
				echo "<script>
					function nazad(){
						window.close();
						window.open('traziZaposlenika.html');
					}
					</script>";
				}
				
			}
			
		}
		
		
	?>
</body>
</html>