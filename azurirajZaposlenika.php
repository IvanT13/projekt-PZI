<html>
	<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="evidencijaZaposlenikaCSS.css">
	<title>Ažuriranje zaposlenika</title>
	
	<style>
	
		#forma{
			margin: auto;
			padding: 0px 0px 0px 500px;
			
		}
		
		#azuriraj{
			padding: 10px 10px 10px 10px;
			margin: 5px 0px 5px 0px;
			font-size: 15px;
		}
		
		#odustani{
			padding: 10px 10px 10px 10px;
			margin: 5px 0px 5px 0px;
			font-size: 15px;
			text-align:center;
			
		}
	
	</style>
	
</head>
<body>
	<?php
		$con=mysqli_connect("127.0.0.1","root","");
					
		if(!$con){
			die("Nesupjelo spajanje: " . mysqli_error());
		}
		mysqli_select_db($con,"evidencija");
		$sql = "SELECT * FROM zaposlenici WHERE ID='$_GET[id]'";
		$myData = mysqli_query($con,$sql);
		$record = mysqli_fetch_array($myData);
		$id = $record['ID'];
		
		echo "<h2 align='center'> AŽURIRANJE PODATAKA: $record[ime] $record[prezime]  </h2>
		
		<div id='forma'>
		<form action='azurirajBack.php?id=$id' method='post'>
		
			<label>Ime: </label> <input type='text' name='ime' value='$record[ime]'/> </br>
			<label>Prezime </label> <input type='text' name='prezime' value='$record[prezime]'/> </br>
			<label>Spol: </label>
			<input type='text' name='spol' value='$record[spol]'> </br>
			<label>OIB: </label> <input type='number' name='oib' value='$record[OIB]'> </br>
			<label>Datum rođenja: </label> <input type='date' name='datum_rodjenja' value='$record[rodjenje]'/></br>
			<label>Stručna sprema: </label>
			<input type='text' name='strucna_sprema' value='$record[sprema]'></br>
			<label>Pozicija u tvrtki: </label> <input type='text' name='pozicija' value='$record[pozicija]'/> </br>
			<label>Mjesečna plaća: </label> <input type='number' name='placa' value='$record[placa]'/> </br>
			<input type='submit' value='Ažuriraj podatke' id='azuriraj'>
			<span onClick='odustani()'> <button id='odustani'>Odustani</button> </span>
			
		</form> 
		</div> 
		
		<script>
			function odustani(){
			
			window.open('ispisZaposlenika.php');
			window.close();
			
		}
		</script>"
 
	?>
</body>

		<footer>

			<p> Ivan Tomić - Stručni studij Telematika - Veleučilište u Rijeci - 2016/17 </p>

		</footer>
</html>