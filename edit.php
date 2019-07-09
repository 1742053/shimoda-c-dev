<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>商品修正</title>
</head>
<body>

<?php

try
{

$pro_id=$_GET['id'];

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
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

商品修正<br />
<br />
商品コード<br />
<?php print $pro_id; ?>
<br />
<form method="post" action="edit_check.php">
<input type="hidden" name="id" value="<?php print $pro_id; ?>">
落とし物<br />
<input type="text" name="otoshimono" style="width:200px" value="<?php print $pro_otoshimono; ?>"><br />
預かり日時<br />
<input type="text" name="otodate" style="width:200px" value="<?php print $pro_otodate; ?>"><br />
場所<br />
<input type="text" name="place" style="width:200px" value="<?php print $pro_place; ?>"><br />
<br />
<input type="submit" onclick="edit_check.php" value="修正">
</form>
<form method="post" action="delete.php">
<input type="hidden" name="id" value="<?php print $pro_id; ?>">
<input type="submit" onclick="delete.php" value="削除">
<br />
<input type="button" onclick="history.back()" value="戻る">
<br />
</form>

</form>

</body>
</html>