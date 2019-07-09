<?php

//DB処理
try
{

//データ受取
$user_userid=$_POST['userid'];
$user_userpass=$_POST['userpass'];

//DB接続
$dsn='mysql:dbname=torio;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//DB読取
$sql='SELECT id FROM user WHERE userid=? AND userpass=?';
$stmt=$dbh->prepare($sql);
$data[]=$user_userid;
$data[]=$user_userpass;
$stmt->execute($data);

//DB切断
$dbh=null;

//ログイン判定
$rec=$stmt->fetch(PDO::FETCH_ASSOC);
$sub_userid=substr($user_userid,0,1);


if($rec==false)
{
	print 'ログインに失敗しました<br />';
	print '<br />';
	print 'IDまたは、パスワードが間違っています。<br />';
	print '確認の上、もう一度ログインしてください。<br />';
	print '<br />';
	print '<a href="index.html"> 戻る</a>';
}
else
{
	if($sub_userid=='1'){
	//セッションの開始
	session_start();
	$_SESSION['login']=1;
    $_SESSION['user_id']=$rec['id'];
	$_SESSION['user_userid']=$user_userid;
	//リダイレクト処理
	header('Location:ichiran.php');
	exit();
	}
	else{
//セッションの開始
	session_start();
	$_SESSION['login']=1;
    $_SESSION['user_id']=$rec['id'];
	$_SESSION['user_userid']=$user_userid;
	//リダイレクト処理
	header('Location:kanichiran.php');
	}
}

}
catch(Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>
