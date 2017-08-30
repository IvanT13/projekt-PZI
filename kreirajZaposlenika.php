<?php
	
	$con = mysqli_connect('127.0.0.1','root','');
	
	if(!$con){
		echo "Neuspjelo spajanje na bazu";
	}
	
	if(!mysqli_select_db($con,'evidencija')){
		echo "Baza podataka nije izabrana";
	}
	
	$fields = array('ime','prezime','spol','oib','datum_rodjenja','strucna_sprema','pozicija','placa');
	$error = false;
	
	foreach($fields AS $fieldname){
		if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])){
			echo "Polje: " .$fieldname. " je prazno! <br>";
			$error = true;
			header("refresh:2; url='unosZaposlenika.html'");
		}
		
		
	}
	
	if(strlen($_POST['oib']) != 11){
			echo "OIB mora imati 11 znamenki <br>";
			$error = true;
			header("refresh:2; url='unosZaposlenika.html'");
		}
	
	if(!$error){
		$ime = $_POST['ime'];
		$prezime = $_POST['prezime'];
		$spol = $_POST['spol'];
		$oib = $_POST['oib'];
		$rodjenje = $_POST['datum_rodjenja'];
		$sprema = $_POST['strucna_sprema'];
		$pozicija = $_POST['pozicija'];
		$placa = $_POST['placa'];
	
		$sql = "INSERT INTO zaposlenici (ime,prezime,spol,OIB,rodjenje,sprema,pozicija,placa) VALUES('$ime','$prezime','$spol','$oib','$rodjenje','$sprema','$pozicija','$placa')";
	
		if(mysqli_query($con,$sql)){
			echo "Podaci uspjesno uneseni u bazu podataka";
			
		}
		else{
			echo "Podaci nisu uneseni u bazu podataka";
		}
		
		header("refresh:2; url='unosZaposlenika.html'");
	}
	
?>