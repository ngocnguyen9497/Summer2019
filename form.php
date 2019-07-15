
<?php
include('cn.php');
$error=array();
if(isset($_POST["gui"])){
	$username=$_POST["username"];
	$email=$_POST["email"];
	$address=$_POST["address"];
	$sql="SELECT* from tbl_user where username='$username'";
	$query=mysqli_query($conn, $sql);
	if(empty($username)){
			$error['name']="Bạn chưa nhập tên";
		}
	if (empty($email)){	
			$error['email'] = 'Bạn chưa nhập email';
	}else{
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      	$error['email'] = "Email không hợp lệ"; 
    }
	}
	if (empty($address)){
			$error['address'] = 'Bạn chưa nhập địa chỉ';
		}
	if(mysqli_num_rows($query)>0){
		$error['name']='Tên tài khoản đã tồn tại';
		}
	if(empty($error)){
 
		$sql="INSERT INTO tbl_user(`username`, `email`, `address`) 
		VALUES ('$username','$email','$address')";
		$query=mysqli_query($conn, $sql);
		header('Location: list.php');
	}
}
?>
<h1>Form submit</h1>
<form action="" method="POST">
	<table>
		<tr>
			<td>Username :</td>
			<td><input type="text" name="username">
				<?php echo  isset($error['name']) ? $error['name'] : ""  ?>
			</td>

		</tr>
		<tr>
			<td>Email:</td>
			<td><input type="text" name="email">
				<?php echo  isset($error['email']) ? $error['email'] : ""  ?></td>	
			</tr>
			<tr>
				<td>Address:</td>
				<td><textarea name="address" id="" cols="30" rows="10"></textarea>
					<?php echo isset($error['address']) ? $error['address'] : "" ?></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="gui" value="Submit"></td>
				</tr>
			</table>
		</form>