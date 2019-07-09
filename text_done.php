<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>テキスト送信</title>
</head>
<body>

<?php

try
{

$post=$_POST;
$pro_otoid=$post['id'];
$pro_text=$post['text'];
$pro_mail=$post['mail'];

$dsn='mysql:dbname=torio;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='INSERT INTO text(otoid,text,mail) VALUES (?,?,?)';
$stmt=$dbh->prepare($sql);
$data[]=$pro_otoid;
$data[]=$pro_text;
$data[]=$pro_mail;
$stmt->execute($data);

$dbh=null;

print $pro_text;
print $pro_mail;
print 'を送信しました。<br />';

}
catch(Exception$e)
{
	print'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

<a href="ichiran.php">戻る</a>

</body>
</html>
