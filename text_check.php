<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>入力内容チェック</title>
</head>
<body>

<?php

$post=$_POST;
$pro_id=$post['id'];
$pro_text=$post['text'];
$pro_mail=$post['mail'];

if($pro_text=='')
{
	print 'テキストが入力されていません。<br />';
}
else
{
	print 'テキスト:';
	print $pro_text;
	print '<br />';
}

if($pro_mail=='')
{
	print 'メールが入力されていません。<br />';
}
else
{
	print 'メール:';
	print $pro_mail;
	print '<br />';
}

if($pro_text=='' || $pro_mail=='')
{
	print '<form>';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '</form>';
}
else
{
	print 'この内容で送信しますか？<br />';
	print '<form method="post" action="text_done.php">';
	print '<input type="hidden" name="id" value="'.$pro_id.'">';
	print '<input type="hidden" name="text" value="'.$pro_text.'">';
	print '<input type="hidden" name="mail" value="'.$pro_mail.'">';
	print '<br />';
	print '<input type="button" onclick="history.back()" value="修正">';
	print '<input type="submit" value="送信">';
	print '</form>';
}

?>

</body>
</html>
