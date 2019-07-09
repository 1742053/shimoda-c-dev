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

$sql='SELECT otoshimono,otodate,place FROM otoshimono WHERE id=?';
$stmt=$dbh->prepare($sql);
$data[]=$pro_id;
$stmt->execute($data);

$rec=$stmt->fetch(PDO::FETCH_ASSOC);
$pro_otoshimono=$rec['otoshimono'];
$pro_otodate=$rec['otodate'];
$pro_place=$rec['place'];

$dbh=null;

}
catch(Exception $e)
{
	print'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

商品削除<br />
<br />
<?php 
print '落とし物';
print '<br />';
print $pro_otoshimono; 
print '<br />';
print '預かり日時';
print '<br />'; 
print $pro_otodate;
print '<br />'; 
print '場所'; 
print '<br />';
print $pro_place;
print '<br />';
?>
<br />
この商品を削除してよろしいですか？<br />
<br />
<form method="post" action="delete_done.php">
<input type="hidden" name="id" value="<?php print $pro_id; ?>">
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="ＯＫ">
</form>

</body>
</html>