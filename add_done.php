<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>DB登録</title>
</head>
<body>

<?php

try
{

$post=$_POST;
$pro_otoshimono=$post['otoshimono'];
$pro_otodate=$post['otodate'];
$pro_place=$post['place'];

$dsn='mysql:dbname=torio;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='INSERT INTO otoshimono(otoshimono,otodate,place) VALUES (?,?,?)';
$stmt=$dbh->prepare($sql);
$data[]=$pro_otoshimono;
$data[]=$pro_otodate;
$data[]=$pro_place;
$stmt->execute($data);

$dbh=null;

print $pro_otoshimono;
print $pro_otodate;
print $pro_place;
print 'を追加しました。<br />';

}
catch(Exception$e)
{
	print'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

<a href="kanichiran.php">戻る</a>

</body>
</html>
