<?php
	include('cn.php');
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$sql="SELECT * from tbl_user where stt='$id'";
		$query=mysqli_query($conn, $sql);
		$row=mysqli_fetch_array($query);
	}
	if(isset($_POST['update'])){
		$username=$_POST['username'];
		$email=$_POST["email"];
		$address=$_POST["address"];
		if($username=='' || $email== '' || $address==''){
			if(empty($username)){
			$error_name="Bạn chưa nhập tên";
		}
			if (empty($email)){
                $error_email = 'Bạn chưa nhập email';
            }
 			if (empty($address)){
                $error_address = 'Bạn chưa nhập địa chỉ';
            }
		}else{
		$sql="UPDATE `tbl_user` SET `username`='$username',`email`='$email',`address`='$address' WHERE stt='$id'";
		$query=mysqli_query($conn, $sql);
		header('Location: list.php');
		}
	}
?>

	<h1>Update user</h1>
	<form action="" method="POST">
		<table>
			<tr>
				<td>Username :</td>
				<td><input type="text" name="username" value="<?php echo $row['username'] ?>">
					<?php echo  isset($error_name) ? $error_name : ""  ?>
				</td>

			</tr>
			<tr>
				<td>Email:</td>
				<td><input type="text" name="email" value="<?php echo $row['email'] ?>">
					<?php echo isset($error_email) ? $error_email : "" ?></td>	
			</tr>
			<tr>
				<td>Address:</td>
				<td><textarea name="address" id="" cols="30" rows="10"><?php echo $row['address'] ?></textarea>
					<?php echo isset($error_address) ? $error_address : "" ?></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>