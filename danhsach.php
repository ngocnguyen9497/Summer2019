<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>List User</h1>
	<h3><a href="formsubmit.php">Add</a></h3>
	<table border="1px" cellspacing="0" cellpadding="10">
		<tr>
			<th>Stt</th>
			<th>Username</th>
			<th>Email</th>
			<th>Address</th>
			<th>...</th>
		</tr>
		
		<?php
			include 'cn.php';
			$result = $conn->query("SELECT * FROM `tbl_user`");
			if ($result->num_rows > 1) {
				while ($row = $result->fetch_assoc()) {
					echo "<tr>
							<td>" . $row['stt'] . "</td>
							<td>" . $row['username'] . "</td>
							<td>" . $row['email'] . "</td>
							<td>" . $row['address'] . "</td>
							<td></td>
						</tr>";
				}
			}
			?>
	</table>
	
</body>
</html>
