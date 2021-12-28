<?php
if(isset($_POST['macn']))	{
	$macn = $_POST['macn'];

	require_once ('dbhelp.php');
	$sql = "delete from chuyennganh where macn = '$macn'";
	execute($sql);

	echo 'Xóa chuyên ngành thành công';
}