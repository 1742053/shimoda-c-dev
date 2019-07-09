<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>テキスト入力</title>
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
print $pro_id;
print $pro_otoshimono;
print $pro_otodate;
print $pro_place;
print '<form method="post" action="text_check.php">';
print '<input type="hidden" name="id" value="'.$pro_id.'">';
print '※落とした日付、物名、物の特徴を詳しく記載してください。';
print '<br/ >';
print '<textarea name="text" maxlength="200" style="width:800px;height:150px"></textarea>';
print '<br/ >';
print '<br/ >';
print '※メールアドレスの記載をお願いします。';
print '<br/ >';
print 'メールアドレス：';
print '<input type="text" name="mail" style="width:500px;height:30px">';
print '<form action="text_check.php">';
print '<br/ >';
print '<input type="submit" value="OK">';
print '</form>';
}

catch (Exception $e)
{
	 print 'ただいま障害により大変ご迷惑をお掛けしております。';
	 exit();
}

?>
</body>
</html>
