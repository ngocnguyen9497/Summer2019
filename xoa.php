<?php
	include('cn.php');
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$sql="DELETE from tbl_user where stt='$id'";
		$query=mysqli_query($conn, $sql);
		header('Location: list.php');
	} 
 ?>