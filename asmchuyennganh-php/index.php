<?php
require_once ( 'dbhelp.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Chuyennganh Management</title>
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
				Quản lý chuyên ngành
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th width="60px">STT</th>
							<th>Mã chuyên ngành</th>
							<th>Tên chuyên ngành</th>
							<th width="60px"></th>
							<th width="60px"></th>
						</tr>
					</thead>
					<tbody>
<?php
$sql		 = "select * from chuyennganh";
$chuyennganhList = executeResult($sql);

$index = 0;
foreach ($chuyennganhList as $cnl) {
	echo '<tr>
			<td>' .(++$index).'</td>
			<td>' .$cnl['macn'].'</td>
			<td>' .$cnl['tencn'].'</td>
			<td><button class="btn btn-warning" onclick=\'window.open("input.php?macn='.$cnl['macn'].'","_self")\'>Edit</button></td>
			<td><button class="btn btn-danger" onclick="deleteChuyennganh('.$cnl['macn'].')">Delete</button></td>
		  </tr>';
}
?>

					</tbody>
				</table>
				<button class="btn btn-success" onclick="window.open('input.php', '_seft')">Add Chuyennganh</button>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function deleteChuyennganh(macn) {
			option = confirm('Bạn có muốn xóa chuyên ngành này không')
			if(!option)	{
				return;
			}

			console.log(macn)
			$.post('delete_chuyennganh.php', {
				'macn': macn
			}, function(data) {
				alert(data)
				location.reload()
			})
		}
	</script>
</body>
</html>	