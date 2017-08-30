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
	$id = $_GET['id'];
	foreach($fields AS $fieldname){
		if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])){
			echo "Polje: " .$fieldname. " je prazno! <br>";
			$error = true;
			header("refresh:2; url='azurirajZaposlenika.php?id=$id'");
		}
	}
	
	if(strlen($_POST['oib']) != 11){
			echo "OIB mora imati 11 znamenki <br>";
			$error = true;
			header("refresh:2; url='azurirajZaposlenika.php?id=$id'");
		}
	if($_POST['strucna_sprema'] != 'NKV' && $_POST['strucna_sprema'] != 'KV' && $_POST['strucna_sprema'] != 'SSS' && $_POST['strucna_sprema'] !='VSS' && $_POST['strucna_sprema'] != 'VKV'){
		echo "Unos za pretragu stručne spreme mora biti NKV, KV, VKV, SSS ili VSS";
		$error = true;
		header("refresh:2; url='azurirajZaposlenika.php?id=$id'");
		
	}
	if ($_POST['spol'] != 'M' && $_POST['spol'] != 'Z'){
		echo "Unos za pretragu spola mora biti M ili Z";
		$error = true;
		header("refresh:2; url='azurirajZaposlenika.php?id=$id'");
	}
	
	if(!$error){
		$id = $_GET['id'];
		$ime = $_POST['ime'];
		$prezime = $_POST['prezime'];
		$spol = $_POST['spol'];
		$oib = $_POST['oib'];
		$rodjenje = $_POST['datum_rodjenja'];
		$sprema = $_POST['strucna_sprema'];
		$pozicija = $_POST['pozicija'];
		$placa = $_POST['placa'];
	
		$sql = "UPDATE zaposlenici SET ime='$ime', prezime='$prezime', spol='$spol', OIB='$oib', rodjenje='$rodjenje', sprema='$sprema', pozicija='$pozicija', placa='$placa' WHERE ID = '$id'";
	
		if(mysqli_query($con,$sql)){
			echo "Podaci uspjesno ažurirani";
			header("refresh:2; url='ispisZaposlenika.php'");
			
			
		}
		else{
			echo "Podaci nisu ažurirani";
			
		}
		
	}
?>