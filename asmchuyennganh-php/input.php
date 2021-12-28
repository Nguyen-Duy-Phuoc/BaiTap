<?php
require_once ('dbhelp.php');

$s_macn = '';
$s_tencn = '';

if (!empty($_POST)) {
	$s_macn = '';

	if (isset($_POST['macn'])) {
		$s_macn = $_POST['macn'];
	}

	if (isset($_POST['tencn']	)) {
		$s_tencn = $_POST['tencn'];
	}
	if ($s_macn != '') {
		//update
		//$sql = "update chuyennganh set macn = '$s_macn', tencn = '$s_tencn' where id = " .$s_id;
		$sql = "insert into chuyennganh(macn, tencn) value ('$s_macn', '$s_tencn')";
	} else {
		//insert
		//$sql = "insert into chuyennganh(macn, tencn) value ('$s_macn', '$s_tencn')";
		$sql = "update chuyennganh set macn = '$s_macn', tencn = '$s_tencn' where macn = '$s_macn'";
	};

	execute($sql);  

	header('Location: index.php');
	die();
}
$s_macn = '';
if (isset($_GET['macn'])) {
	$s_macn          = $_GET['macn'];

	$sql         = "select * from chuyennganh where macn = '$s_macn'" ;

	$chuyennganhList = executeResult($sql);
	if ($chuyennganhList != null && count($chuyennganhList) > 0) {
		$std        = $chuyennganhList[0];
		$s_macn 	= $std['macn'];
		$s_tencn 	= $std['tencn'];
	} else {
		$macn = '';
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registation Form * Form Tutorial</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Add Chuyennganh</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="text">Macn:</label>

					  <input required="true" type="text" class="form-control" id="usr" name="macn" value="<?=$s_macn?>">
					</div>
					<div class="form-group">
					  <label for="text">Tencn:</label>
					  <input required="true" type="text" class="form-control" id="usr" name="tencn" value="<?=$s_tencn?>">
					</div>
					<button class="btn btn-success">Save</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>