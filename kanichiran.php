<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
	print 'ログインされていません。<br />';
	print '<a href="./index.html">ログイン画面へ</a>';
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
<title>落とし物一覧</title>
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

$sql='SELECT id,otoshimono,otodate,place FROM otoshimono WHERE 1';
//$sql='SELECT id,otoshimono,otodate,place FROM otoshimono WHERE 1 ORDER BY name ASC';//昇順
//$sql='SELECT id,otoshimono,otodate,place FROM otoshimono WHERE 1 ORDER BY name DESC';//降順

$stmt=$dbh->prepare($sql);
$stmt->execute();

$dbh=null;

print '落とし物一覧<br /><br />';

//検索キーワード入力
print '<form method="get" action="">';
print '落とし物が届いた日付';
print '<br />';
print '<input type="text" name="otoshimonodate" placeholder="例：20190101">';
print '<br />';
print '落とし物の名称';
print '<br />';
print '<input type="text" name="keyword" placeholder="例：筆箱">';
print '<br />';
print '<input type="submit" value="検索">';
print '</form>';

//検索キーワード代入
if (isset($_GET['otoshimonodate'])){
	$otoshimonodate=$_GET['otoshimonodate'];
}
else{
	$otoshimonodate='';
}

if (isset($_GET['keyword'])){
 $keyword=$_GET['keyword'];
}
else{
 $keyword='';
}
print '<br />';

print '<form method="get" action="add.php">';
print '<input type="submit" value="落とし物を追加">';
print '</form>';
print '<form method="get" action="edit.php">';
print '落とし物更新・削除:落とし物ID入力';
print '<input type="text" name="id" style="width:50px">';
print '<input type="submit" value="決定">';
print '</form>';
print '<form method="get" action="text.php">';
print '<a href="kantext.php" onclick="document.form.submit();return false;">';
print 'テキスト閲覧ページ';
print '</a>';
print '</form>';

while(true)
{
 $rec=$stmt->fetch(PDO::FETCH_ASSOC);
 if($rec==false)
 {
  break;
 }
 //検索処理
 if ((stripos($rec['otoshimono'],$keyword)!==false)&&($rec['otodate']==$otoshimonodate)){
	print $rec['id'].' ';
	print $rec['otoshimono'].' ';
	print $rec['otodate'].' ';
	print $rec['place'].' ';
	print '<br />';
 }	

}
 	print '<form action="logout.php">';
 	print '<input type="submit" value="ログアウト">';
}


catch (Exception $e)
{
	 print 'ただいま障害により大変ご迷惑をお掛けしております。';
	 exit();
}

?>

</body>
</html>
