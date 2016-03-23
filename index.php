<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>opdracht php</title>
		<script type="text/javascript">
		function gereed(){
			var naam = document.getElementById("naam").value;
			var email = document.getElementById("email").value;
			var bericht = document.getElementById("bericht").value;
			if (naam != "" && email != "" && bericht != ""){
				var loc = "naam="+naam+"&email="+email+"&bericht="+bericht;
				var url = "neerzetten.php?" + loc;
				AJAX(url,"bericht");
			}
		}
			function AJAX(bron,id) {
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() { 
					if (xhttp.readyState == 4 && xhttp.status == 200) { 
						document.getElementById(id).innerHTML = xhttp.responseText;
	   				}
				}
				xhttp.open("GET", bron, true);
				xhttp.send();
			}
		</script>
	</head>
	<body>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<table>
			<tr>
				<td>Naam:</td>
				<td><input required type="text" name="naam" id="naam"></td>
			</tr>
			<tr>
				<td>E-Mail:</td>
				<td><input required type="text" name="email" id="email"></td>
			</tr>
			<tr>
				<td>Bericht:</td>
				<td><input required type="text" name="bericht" id="bericht"></td>
			</tr>
			<tr>
				<td><button type="button" name="button" onclick="gereed()">Verstuur</button></td>
				<td><button type="button" name="button" onclick="AJAX('legen.php','bericht')">Leeg database</button></td>
			</tr>
		</table>
		<br>
		<button type="button" name="receive" onclick="AJAX('ophalen.php','databasedata')" >Ontvang database data</button>
		<div id="databasedata"/>
		<div id="bericht"/>
	</body>
</html>