<?php
	$con=mysqli_connect("127.0.0.1","root","");
				
	if(!$con){
		die("Nesupjelo spajanje: " . mysqli_error());
	}
	mysqli_select_db($con,"evidencija");
	$sql = "DELETE FROM zaposlenici WHERE ID='$_GET[id]'";
	$myData = mysqli_query($con,$sql);
	
	if(mysqli_query($con,$sql)){
		echo "Zaposlenik izbrisan";
		header("refresh:1; url=ispisZaposlenika.php");
	}else{
		echo "Pogreska brisanja";
	}

?>