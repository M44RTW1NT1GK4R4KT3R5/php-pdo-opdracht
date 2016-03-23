<table border="1">
	<thead>
		<tr>
			<th>Naam</th>
			<th>E-mail</th>
			<th>Bericht</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			try {
				//Creating connection for mysql
				$db = new PDO("mysql:host=$servername;dbname=opdracht", $username, $password);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$query = $db->prepare("SELECT * FROM phples");
				if ($query->execute()){
					$tabel = $query->fetchAll(PDO::FETCH_ASSOC);
					foreach ($tabel as $row) {
						echo "<tr>";
						foreach ($row as $column) {
							echo "<td>";
							print_r($column);
							echo "</td>";
						}
						echo "</tr>";
					}
					/* for ($i=0; $i<count($tabel); $i++){
						echo "<tr><td>". $tabel[$i] ."</td></tr>";
					} */
				}

			}catch(PDOException $e){
				echo "<div class=\"alert alert-danger\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Fout!</strong> ".$e->getMessage()."</div>";
			}
		?>
	</tbody>
</table>