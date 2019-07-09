<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>商品削除</title>
</head>
<body>

<?php

try
{

$pro_id=$_POST['id'];

$dsn='mysql:dbname=torio;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='DELETE FROM otoshimono WHERE id=?';
$stmt=$dbh->prepare($sql);
$data[]=$pro_id;
$stmt->execute($data);

$dbh=null;

}
catch (Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

削除しました。<br />
<br />
<a href="kanichiran.php"> 戻る</a>

</body>
</html>