<html>
		<head>
			<meta charset="utf-8"/>
			<link rel="stylesheet" type="text/css" href="evidencijaZaposlenikaCSS.css">
			<title>Ispis zaposlenika</title>
			
			<style>
				h2{
				
					text-align: center;
					margin-top: 20px;
				}
				
				button{
					padding: 10px 10px 10px 10px;
					margin: 5px 0px 5px 1027px;
					font-size: 15px;
					
					
				}
				#tablica{
					margin: auto;
					padding: 20px 0px 0px 200px;
					
				}
				
			</style>
			
		</head>
		<body>
			<h2> ISPIS ZAPOSLENIKA </h2>
			
			<?php
				
				$con=mysqli_connect("127.0.0.1","root","");
				
				if(!$con){
					die("Nesupjelo spajanje: " . mysqli_error());
				}
				mysqli_select_db($con,"evidencija");
				$sql = "SELECT * FROM zaposlenici";
				$myData = mysqli_query($con,$sql);
				echo " <div id = 'tablica'>
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
				echo "<button onclick='nazad()'>Nazad</button> </br>";
				echo "<script>
					function nazad(){
						window.open('glavniIzbornik.html');
						window.close();
					}
					</script>";
				
			

			
			
			?>
	
		</body>
		<footer>

			<p> Ivan Tomić - Stručni studij Telematika - Veleučilište u Rijeci - 2016/17 </p>

		</footer>

	
	
	</html>