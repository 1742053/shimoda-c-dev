<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
	print 'ログインされていません。<br />';
	print '<a href="./login.html">ログイン画面へ</a>';
	exit();
}
else
{
	print $_SESSION['user_userid'];
	print 'さんログイン中<br />';
	print '<br />';
}
?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>管理者用テキスト一覧</title>
</head>
<body>

<?php

try
{

$dsn='mysql:dbname=torio;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT id,otoid,text,mail FROM text WHERE 1';
//$sql='SELECT id,otoid,text,mail FROM text WHERE 1 ORDER BY name ASC';//昇順
//$sql='SELECT id,otoid,text,mail FROM text WHERE 1 ORDER BY name DESC';//降順

$stmt=$dbh->prepare($sql);
$stmt->execute();

$dbh=null;

print '管理者用テキスト一覧<br /><br />';

while(true)
{
    $rec=$stmt->fetch(PDO::FETCH_ASSOC);
    if($rec==false)
    {
        break;
    }

    print $rec['id'].' ';
    print $rec['otoid'].' ';
    print $rec['text'].' ';
    print $rec['mail'].' ';
    print '<br />';
}
 print '<form action="logout.php">';
 print '<input type="submit" value="ログアウト">';
 print '</form>';
 print '<form action="kanichiran.php">';
 print '<input type="submit" value="戻る">';
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
